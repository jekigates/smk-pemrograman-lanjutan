<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\ArticleCategory;
use App\Models\ArticleComment;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = collect(Article::all())->map(function ($article) {
            $article_has_categories = ArticleCategory::where('article_id', $article->id)->get();
            $article_categories = collect();

            foreach ($article_has_categories as $article_has_category) {
                $category = Category::find($article_has_category->category_id);
                $article_categories->push($category);
            }
            $article->categories = $article_categories;
            $article->author = User::find($article->author_id);
            unset($article->author_id);

            return $article;
        });

        return view('articles.index', compact('articles'));
    }

    public function create_comment($article_id)
    {
        $article = Article::find($article_id);

        $parent_comments = collect();
        $parent_comments_filter = Comment::all();

        foreach ($parent_comments_filter as $parent_comment_filter) {
            if ($parent_comment_filter->parent_comment_id == null) {
                $parent_comments->push($parent_comment_filter);
            }
        }

        return view('articles.create_comment', [
            'article' => $article,
            'parent_comments' => $parent_comments,
        ]);
    }

    public function store_comment(Request $request, $article_id)
    {
        $comment = Comment::create([
            'parent_comment_id' => $request->parent_comment_id,
            'comment' => $request->comment,
            'reader_id' => auth()->user()->id,
            'article_id' => $article_id,
        ]);

        return redirect('/articles/' . $article_id);
    }

    public function edit_comment(Request $request, $article_id, $comment_id)
    {
        $article = Article::find($article_id);
        $comment = Comment::find($comment_id);

        $parent_comment = collect();
        $parent_comment->id = null;

        if ($comment->parent_comment_id != null) {
            $parent_comment = Comment::where('id', $comment->parent_comment_id)->first();
        }

        return view('articles.edit_comment', [
            'article' => $article,
            'comment' => $comment,
            'parent_comment' => $parent_comment,
        ]);
    }

    public function update_comment(Request $request, $article_id, $comment_id)
    {
        $article = Article::find($article_id);
        $comment = Comment::find($comment_id);
        $comment->comment = $request->comment;
        $comment->save();

        return redirect('/articles/' . $article_id);
    }

    public function destroy_comment(Request $request, $article_id, $comment_id)
    {
        $article = Article::find($article_id);
        Comment::find($comment_id)->delete();
        Comment::where('parent_comment_id', $comment_id)->delete();

        return redirect('/articles/' . $article_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => '',
            'author_id' => auth()->user()->id,
        ]);

        $image_name = $article->id . '.' . $request->file('image')->extension();
        $request->file('image')->storeAs('articles_images', $image_name, 'public');

        $article->image = $image_name;
        $article->save();

        $article_categories = explode(',', $request->categories);

        foreach ($article_categories as $article_category) {
            ArticleCategory::create([
                'article_id' => $article->id,
                'category_id' => $article_category,
            ]);
        }

        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        $article_has_categories = ArticleCategory::where('article_id', $article->id)->get();
        $article_categories = collect();

        foreach ($article_has_categories as $article_has_category) {
            $category = Category::find($article_has_category->category_id);
            $article_categories->push($category);
        }
        $article->categories = $article_categories;
        $article->author = User::find($article->author_id);
        $article->different_time_from_created_at = $article->created_at->diffForHumans(Carbon::now());

        $article_parent_comments = collect();
        $article_parent_comments_filter = Comment::where('article_id', $id)->get();

        foreach ($article_parent_comments_filter as $article_parent_comment_filter) {
            if ($article_parent_comment_filter->parent_comment_id == null) {
                $article_parent_comment_filter->reader = User::find($article_parent_comment_filter->reader_id);
                $article_parent_comment_filter->different_time_from_created_at = (Carbon::parse($article_parent_comment_filter->created_at))->diffForHumans(Carbon::now());
                $article_parent_comment_filter->comments = Comment::where('parent_comment_id', $article_parent_comment_filter->id)->get();

                $article_parent_comment_filter->comments = collect(Comment::where('parent_comment_id', $article_parent_comment_filter->id)->get())->map(function ($article_parent_comment_filter_comment) {
                    $article_parent_comment_filter_comment->reader = User::find($article_parent_comment_filter_comment->reader_id);
                    $article_parent_comment_filter_comment->different_time_from_created_at = (Carbon::parse($article_parent_comment_filter_comment->created_at))->diffForHumans(Carbon::now());

                    return $article_parent_comment_filter_comment;
                });

                $article_parent_comments->push($article_parent_comment_filter);
            }
        }

        $article->parent_comments = $article_parent_comments;
        unset($article->author_id);

        return view('articles.show', [
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        $article_has_categories = ArticleCategory::where('article_id', $article->id)->get();
        $article_categories = collect();

        foreach ($article_has_categories as $article_has_category) {
            $category = Category::find($article_has_category->category_id);
            $article_categories->push($category);
        }
        
        $article->categories = $article_categories;

        return view('articles.edit', [
            'article' => $article,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('image');

        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        
        if($image != null) {
            $image_path = 'public/articles_images/'.$article->image;

            if(Storage::exists($image_path)) {
                Storage::delete($image_path);
            }

            $image_name = $article->id . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('articles_images', $image_name, 'public');

            $article->image = $image_name;
        }

        $article->save();

        $article_categories_old = ArticleCategory::where('article_id', $article->id)->get();

        foreach ($article_categories_old as $article_category_old) {
            ArticleCategory::where('article_id', $article_category_old->article_id)->where('category_id', $article_category_old->category_id)->delete();
        }

        $article_categories = explode(',', $request->categories);

        foreach ($article_categories as $article_category) {
            ArticleCategory::create([
                'article_id' => $id,
                'category_id' => $article_category,
            ]);
        }

        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $image_path = 'public/articles_images/'.$article->image;

        if(Storage::exists($image_path)) {
            Storage::delete($image_path);
        }

        Comment::where('article_id', $id)->delete();

        $article->delete();
        ArticleCategory::where('article_id', $id)->delete();

        return redirect('/articles');
    }
}