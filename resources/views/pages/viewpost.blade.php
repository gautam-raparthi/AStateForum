@extends('templates.default')

@section('content')
	<h3 style="color:Olive;margin-left:150px;font-family:Book Antiqua;">View All Posts In The Forum</h3><hr>
	<div class="column">
		<div class="col-lg-6">

			@if(!$posts->count())
				<p>There's are no post's to show, yet.</p>
			@else
				@foreach($posts as $post)
					<!-- <h1>{{ $post->user->getAvatarUrl() }}</h1> -->
					<div class="media">
					    <a  data-toggle="tooltip" title="{{ $post->user->getNameOrUsername() }}" class="pull-left" href="{{ route('profile.index', ['username' => $post->user->username]) }}">
					        <img class="media-object" alt="{{ $post->user->getNameOrUsername() }}" src="{{ $post->user->getAvatarUrl() }}" width="40" height="40">
					    </a>
					    <div class="media-body"  >
					    	<h3 class="media-heading" style="color:Black;font-family:Book Antiqua;"><i>{{ $post->title }}</i></h3>

					    	<h5 style="color:DarkGreen;font-family:Book Antiqua;font-size:15px"><p><i>{{ $post->body }}</i></p></h5>
					    	<h5><b><i>Category: </i></b><b><span class="label label-success">{{ $post->category }}</span></b></h5>

					        <ul class="list-inline">
					        	<li> <h5 class="media-heading" style="color:Olive;font-family:Book Antiqua;" ><b><i>Posted By: </i></b><a  href="{{ route('profile.index', ['username' => $post->user->username]) }}">{{ $post->user->getNameOrUsername() }}</a></h5></li>
					        	<li><h5>==></h5></li>
					            <li><h5 class="media-heading" style="color:IndianRed;font-family:Book Antiqua;" ><b><i>{{ $post->created_at->diffForHumans() }}
					            						</i></b></h5></li> 
					        </ul>
					        @if($comments->count())
					        	<h5><b><span class="label label-info">Comments</span></b></h5>
						       @foreach($comments as $comment)
						       		<!-- <h5>{{ $comment->userComment }}</h5> -->
							       @if($comment->post_id == $post->id)
									        <div class="media">
									            <a class="pull-left" href="#">
									                <img class="media-object" alt="" src="">
									            </a>
									            <div class="media-body" style="color:DarkBlue;font-family:Book Antiqua;font-size:15px">
									                <b><i><p>{{ $comment->userComment }}</p></i></b>
									                <ul class="list-inline">
									                	<li><h5 class="media-heading" style="color:Olive;font-family:Book Antiqua;" ><b><i>Commented By:  </i></b><a href="{{ route('profile.index', ['username' => $comment->user->username]) }}">{{ $comment->user->getNameOrUsername() }}</a></h5></li>
					        							<li><h5>==></h5></li>
					            						<li><h5 class="media-heading" style="color:IndianRed;font-family:Book Antiqua;" ><b><i>{{ $comment->created_at->diffForHumans() }}
					            						</i></b></h5></li> 
									                </ul>
									               
									            </div>
									        </div>
						        @endif()
						        @endforeach
						    @endif
						    @if(Auth::check())
					        <form role="form" action="{{ route('status.reply',['postId' => $post->id]) }}" method="post">
					            <div class="form-group{{ $errors->has("reply-{$post->id}") ? ' has-error' : ''}}">
					                <textarea name="reply-{{ $post->id }}" class="form-control" rows="2" placeholder="Comment to this Post"></textarea>
					                @if($errors->has("reply-{$post->id}"))
	                				<span class="help-block">{{ $errors->first("reply-{$post->id}") }}</span>
	                				@endif
					            </div>
					            <input type="submit" value="Comment" class="btn btn-primary btn-sm">
					            <input type="hidden" name="_token" value="{{ Session::token() }}">
					        </form>
					        @endif
					    </div>
					</div>
				@endforeach
				{!! $posts->render() !!}
			@endif
		</div>
	</div>
	
@stop