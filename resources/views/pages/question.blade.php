@extends('templates.default')

@section('content')
	<div class="row">
	    <div class="col-lg-6">
	    	<h3>Post your Question</h3>
	        <form class="form-vertical" role="form" method="post" action="{{ route('pages.question') }}">
	            <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
	                <label for="title" class="control-label">Title</label>
	                <input type="text" name="title" class="form-control" id="title" value="{{ Request::old('title') ?: ''}}">
	                @if($errors->has('title'))
	                	<span class="help-block">{{ $errors->first('title')}}</span>
	                @endif
	            </div>
	            <div class="form-group{{ $errors->has('category') ? ' has-error' : ''}}">
	                <label for="category" class="control-label">Category</label>
	                <select class="form-control" name="category" >
	                	<option value="php">PHP</option>
		                <option value="csharp">C#</option>
		                <option value="java">Java</option>
		                <option value="perl">Perl</option>
		                <option value="python">Python</option>
		                <option value="javascript">JavaScript</option>
	                </select>
	               <!--  <input type="text" name="category" class="form-control" id="category" value="{{ Request::old('category') ?: ''}}"> -->
	                @if($errors->has('category'))
	                	<span class="help-block">{{ $errors->first('category')}}</span>
	                @endif
	            </div>
	            <div class="form-group{{ $errors->has('body') ? ' has-error' : ''}}">
	                <label for="body" class="control-label">Message Body</label>
	                <textarea name="body" placeholder="Tell us about your question" rows="10" class="form-control" id="body" value=""></textarea>
	                @if($errors->has('body'))
	                	<span class="help-block">{{ $errors->first('body')}}</span>
	                @endif
	            </div>
	            <div class="form-group">
	                <button type="submit" name= "reset" value="1" class="btn btn-primary">Post Question</button>
	                <button type="button" onclick="window.location='{{ route("pages.viewPost") }}'" class="btn btn-info">View All Posts</button>
	            </div>
	            <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
	        </form>
	    </div>
	</div>
@stop