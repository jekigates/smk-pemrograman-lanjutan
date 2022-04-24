<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admin = User::create([
            'name' => 'Admin Name',
            'email' => 'admin@ski.sch.id',
            'password' => Hash::make('adminski'),
        ]);

        $role_admin = Role::create(['name' => 'admin']);

        $user_admin->assignRole($role_admin);

        $permissions_admin = [
            'view all permissions',
            'view a permission',
            'create a permission',
            'edit a permission',
            'delete a permission',

            'view all roles',
            'view a role',
            'create a role',
            'edit a role',
            'delete a role',

            'view all users',
            'view an user',
            'create an user',
            'edit an user',
            'delete an user',
            
            'view all categories',
            'view a category',
            'create a category',
            'edit a category',
            'delete a category',

            'view all articles',
            'view an owned article',
            'create an owned article',
            'edit an article',
            'delete an article',
            'view all published articles',
            'view an published article',

            'view all comments on an article',
            'create an owned comment on an article',
            'edit a comment on an article',
            'update a comment on an article',
            'delete a comment on an article',
        ];

        foreach ($permissions_admin as $permission_admin) {
            Permission::firstOrCreate(['name' => $permission_admin]);
            $role_admin->givePermissionTo($permission_admin);
        }

        $user_author = User::create([
            'name' => 'Author Name',
            'email' => 'author@ski.sch.id',
            'password' => Hash::make('authorski'),
        ]);

        $role_author = Role::create(['name' => 'author']);

        $user_author->assignRole($role_author);

        $permissions_author = [
            'view all owned articles',
            'view an owned article',
            'create an owned article',
            'edit an owned article',
            'update an owned article',
            'delete an owned article',
            'view all published articles',
            'view an published article',

            'view all comments on an article',
            'create an owned comment on an article',
            'edit an owned comment on an article',
            'update an owned comment on an article',
            'delete an owned comment on an article',
        ];

        foreach ($permissions_author as $permission_author) {
            Permission::firstOrCreate(['name' => $permission_author]);
            $role_author->givePermissionTo($permission_author);
        }

        $category_happy = Category::create([
            'name' => 'Happy',
            'description' => 'Tell happy stories.',
        ]);

        $category_program = Category::create([
            'name' => 'Program',
            'description' => 'Tell program stories.',
        ]);

        $user_reader = User::create([
            'name' => 'Reader Name',
            'email' => 'reader@ski.sch.id',
            'password' => Hash::make('readerski'),
        ]);

        $role_reader = Role::create(['name' => 'reader']);

        $user_reader->assignRole($role_reader);

        $permissions_reader = [
            'view all published articles',
            'view an published article',
            'view all comments on an article',
            'create an owned comment on an article',
            'edit an owned comment on an article',
            'update an owned comment on an article',
            'delete an owned comment on an article',
        ];

        foreach ($permissions_reader as $permission_reader) {
            Permission::firstOrCreate(['name' => $permission_reader]);
            $role_reader->givePermissionTo($permission_reader);
        }
    }
}
