<?php
namespace AStateForum\Http\Controllers;
use Input;
use Auth;
use AStateForum\Models\Post;
use AStateForum\Models\Comment;
use Illuminate\Http\Request;
class ForumController extends Controller
{
	public function getPost()
	{
		return view('pages.question');
	}

	public function postQuestion(Request $request)
	{
		 //dd(Auth::user()->id);
		
		$this->validate($request, [
			'title' => 'required|min:3|max:80',
			'category' => 'required',
			'body' =>'required|min:6',
		]);
		
		Post::create([
			'user_id' => Auth::user()->id,
			'title' => $request->input('title'),
			'category' => $request->input('category'),
			'body' => $request->input('body'),
			]);
			
		return redirect()->route('pages.forumViewPost')->with('info', 'Your post has been created successfully.');
		
	}

	public function postComment(Request $request, $postId)
	{
		
		$this->validate($request, [
			"reply-{$postId}" => 'required|max:1000',
			], [
			'required' => 'Something about the Comment is required.'
		]);

		Comment::create([
			'user_id' => Auth::user()->id,
			'post_id' => $postId,
			'userComment' => $request->input("reply-{$postId}"),
			
			]);
			/*
			$reply = Comment::create([
					'userComment' => $request->input("reply-{$postId}"),
				])->user()->associate(Auth::user());
			$post->replies()->save($reply);*/
		return redirect()->route('pages.forumViewPost')->with('info', 'Your Comment has been posted successfully.');
		
	}

	public function getViewPost()
	{
		//$posts  = Post::all()->orderBy('created_at', 'desc')->paginate(5);
		$posts =Post::orderBy('created_at', 'desc')->paginate(4);
		$comments=Comment::all();
		//dd($posts);
		//$posts =Comment::orderBy('created_at', 'desc')->paginate(4);
		//dd($post);
		//$comments = $posts->comments()->get();
		//return view('pages.viewpost')->with('posts', $posts);
		return view('pages.viewpost')->with('posts', $posts)->with('comments',$comments);
		//return view('pages.viewpost')->with('posts', $posts)->with('comments',$comments);
		//return view('pages.viewpost');
	}
	public function getForumViewPost()
	{
		//$posts  = Post::all()->orderBy('created_at', 'desc')->paginate(5);
		$posts =Post::orderBy('created_at', 'desc')->paginate(4);
		$comments=Comment::all();
		//dd($posts);
		//$posts =Comment::orderBy('created_at', 'desc')->paginate(4);
		//dd($post);
		//$comments = $posts->comments()->get();
		//return view('pages.viewpost')->with('posts', $posts);
		return view('pages.viewpost')->with('posts', $posts)->with('comments',$comments);
		//return view('pages.viewpost')->with('posts', $posts)->with('comments',$comments);
		//return view('pages.viewpost');
	}
}