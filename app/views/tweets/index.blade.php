@extends('layouts.tweetIndex') 

@section('userInfo')
	<p class="user-name">{{ link_to("users/profiles/".Auth::user()->nickname, Auth::user()->name) }}</p>
	<h5 class="nickname">{{ link_to("users/profiles/".Auth::user()->nickname, '@'.Auth::user()->nickname) }}</h5>
@stop

@section('formToTweetAndInfos')
	<li class="list-group-item">Tweets &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ link_to("users/profiles/".Auth::user()->nickname, $tweetCount) }}</li>
  	<li class="list-group-item">Following &nbsp;&nbsp; {{ link_to("users/profiles/following/".Auth::user()->nickname, $followingCount) }}</li>
  	<li class="list-group-item">Followers &nbsp;&nbsp; {{ link_to("users/profiles/followers/".Auth::user()->nickname, $followersCount) }}</li>
	@if ($errors->all())
	  	<li class="list-group-item">
	     	<div class="alert alert-danger" role="alert">
	            <ul>
					@foreach ($errors->all() as $error)
					    <p>{{ $error }}</p>
					@endforeach		      
	            </ul>
	        </div>
	  	</li>
  	@endif
  	{{ Form::open(['url' => 'tweet']) }}
	  	<li class="list-group-item list-group-item-success">{{ Form::text('tweet', $value = null, array('placeholder' => 'Compose new Tweet...', 'class'=> 'form-control', 'maxlength'=> '140', 'required'=> 'required')) }}</li>
	  	<li class="list-group-item list-group-item-success">{{ Form::submit('Tweet', array('class' => 'btn btn-success')) }}<div class="clear"></div></li>
	{{ Form::close() }}
@stop

@section('loop-title')
	Tweets
@stop

@section('loop-content')
	@if($posts->count())
	    @foreach($posts as $post)
        	<!-- <a href="{{ url('users/profiles/'.$post->author->nickname) }}" > -->
        	<div class="list-group-item">
    			<h5 class="list-group-item-heading"><b>{{ link_to("users/profiles/".$post->author->nickname, $post->author->name . '&nbsp;&nbsp;&nbsp;@' . $post->author->nickname) }}</b></h5>
    			<p class="list-group-item-text">{{ $post->tweet }}</p>
    		</div>
  			<!-- </a> -->
  		@endforeach
	@else
		<div class="list-group-item">
			<p>Unfortunately, there are no Posts to show.</p>
		</div>
	@endif
@stop
