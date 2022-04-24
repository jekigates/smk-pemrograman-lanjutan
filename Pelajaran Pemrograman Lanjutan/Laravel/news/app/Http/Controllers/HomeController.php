<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Article; 
use App\Models\Category;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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
            $article['categories'] = $article_categories;
            $article['author'] = User::find($article['author_id']);

            $article['different_time_from_created_at'] = $article['created_at']->diffForHumans(Carbon::now());

            return $article;
        });

        return view('home', compact('articles'));
    }
}
