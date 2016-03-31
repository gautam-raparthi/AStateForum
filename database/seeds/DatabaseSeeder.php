<?php

use Illuminate\Database\Seeder;
use AStateForum\Models\User;
use AStateForum\Models\Post;
use AStateForum\Models\Comment;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 $this->call('UserTableSeeder');
    	 $this->command->info('User table seeded!');
    	 $this->call('PostTableSeeder');
    	 $this->command->info('Post table seeded!');
    	 $this->call('CommentTableSeeder');
         $this->command->info('Comment table seeded!');
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(
        	[		
        			'email' => 'gautam.rpt@gmail.com',
					'username' => 'gautam',
					'password' => '$2y$10$tJYKKwAcKq6YFxZCfersxeK.O4D05tNWY4k00BbcYNUIQ3je8dAg.',
					'first_name' => 'gautam',
					'last_name' => 'rparthi',
					'location' => 'Jonesboro, US',
					'remember_token' =>'iTtVXkgmrkC5tYCjjiKZKb2WdGx79boMKcL1Ii3AvHfycxW9LXIDlmnqmiLW',
					'created_at' =>'2016-03-31 13:36:57',
					 'updated_at' =>'2016-03-31 13:51:59'
			]);
        User::create(
        	[		
        			'email' => 'sandeep@gmail.com',
					'username' => 'sandy',
					'password' => '$2y$10$tJYKKwAcKq6YFxZCfersxeK.O4D05tNWY4k00BbcYNUIQ3je8dAg.',
					'first_name' => 'sandeep',
					'last_name' => 'kalla',
					'location' => 'Texas, US',
					'remember_token' =>'iTtVXkgmrkC5tYCjjiKZKb2WdGx79boMKcL1Ii3AvHfycxW9LXIDlmnqmiLW',
					'created_at' =>'2016-03-31 13:36:57',
					 'updated_at' =>'2016-03-31 13:51:59'
			]);
        User::create(
        	[		
        			'email' => 'shankar.@gmail.com',
					'username' => 'shankar',
					'password' => '$2y$10$tJYKKwAcKq6YFxZCfersxeK.O4D05tNWY4k00BbcYNUIQ3je8dAg.',
					'first_name' => 'shankar',
					'last_name' => 'dabbiru',
					'location' => 'Hyd,India',
					'remember_token' =>'iTtVXkgmrkC5tYCjjiKZKb2WdGx79boMKcL1Ii3AvHfycxW9LXIDlmnqmiLW',
					'created_at' =>'2016-03-31 13:36:57',
					'updated_at' =>'2016-03-31 13:51:59'
			]);
    }

}

class PostTableSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();

        Post::create(
        	[		
        			'user_id' => '1',
					'title' => 'Suggest me which cache system is best in php',
					'category' => 'php',
					'body' => 'Please suggest me which cache system is worth. And how it will work. How web experts handle it.',
					'created_at' =>'2016-03-31 13:40:10',
					 'updated_at' =>'2016-03-31 13:40:10'
			]);
        Post::create(
        	[		
        			'user_id' => '2',
					'title' => 'Providing white space in a Swing GUI',
					'category' => 'java',
					'body' => 'How can I provide white space without resorting to explicitly setting the position or size of components?',
					'created_at' =>'2016-03-31 13:42:17',
					 'updated_at' =>'2016-03-31 13:42:17'
			]);
         Post::create(
        	[		
        			'user_id' => '3',
					'title' => 'Whats the easiest way to install  missing Perl module?',
					'category' => 'perl',
					'body' => 'Is there an easier way to install it than downloading, untarring, making, etc?',
					'created_at' =>'2016-03-31 13:44:15',
					 'updated_at' =>'2016-03-31 13:44:15'
			]);

         Post::create(
        	[		
        			'user_id' => '1',
					'title' => 'What is the scope of variables in JavaScript?',
					'category' => 'javascript',
					'body' => 'What is the scope of variables in javascript? Do they have the same scope inside as opposed to outside a function? ',
					'created_at' =>'2016-03-31 13:46:20',
					 'updated_at' =>'2016-03-31 13:46:20'
			]);
         Post::create(
        	[		
        			'user_id' => '2',
					'title' => 'How can I parse JSON with C#?',
					'category' => 'csharp',
					'body' => 'The input in responsecontent is JSON, but it is not properly parsed into a JSON object. How should I properly serialize it?',
					'created_at' =>'2016-03-31 13:48:49',
					 'updated_at' =>'2016-03-31 13:48:49'
			]);
        
    }

}

class CommentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('comments')->delete();

        Comment::create(
        	[		
        			'user_id' => '2',
					'post_id' => '4',
					'userComment' => 'Javascript uses scope chains to establish the scope for a given function.',
					'created_at' =>'2016-03-31 13:49:54',
					 'updated_at' =>'2016-03-31 13:49:54'
			]);
        Comment::create(
        	[		
        			'user_id' => '1',
					'post_id' => '5',
					'userComment' => 'By Using .Net Json Serialize classes.',
					'created_at' =>'2016-03-31 13:51:14',
					 'updated_at' =>'2016-03-31 13:51:14'
			]);
    }
}
