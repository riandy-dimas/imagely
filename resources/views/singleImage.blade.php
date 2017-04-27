@extends('layouts.app')

@section('content')
<div class="container"> 
      <div class="col-md-6 col-md-offset-3">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="panel panel-default panel-img">
            <div class="panel-heading">{{ $image->user->name }}
            @if ($image->user->id === Auth::user()->id)
                <span class="pull-right">
                    <form action="{{ route('imageDelete') }}" method="post">
                    {{ csrf_field() }}
                        <input type="hidden" name="image_id" value="{{ $image->id }}" />
                        <input type="hidden" name="image_name" value="{{ $image->image_name }}" />
                        <button type="submit" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </form>
                </span>
                @endif
            </div>
            <div class="panel-img">
                <img src="{{ asset('images/' . $image->image_name) }}" alt="" class="img-responsive" width="600" height="600">
            </div>
            <div class="panel-body">
                <a href="">
                    <i class="fa fa-share fa-lg"></i>
                </a>
                <div class="panel-comments">

                  @foreach ($comments as $comment)
                  <p><b>{{ $comment->user->name }}</b>: {{ $comment->statement }}</p>
                  @endforeach  
                  
                  <form class="form" action="{{ route('postComment') }}" method="POST">

                    <div class="row">
                      <div class="col-xs-10">
                      {{ csrf_field() }}
                        <input type="text" class="form-control" name="statement" placeholder="Enter your comment..">
                      </div>
                      <input type="hidden" name="image_id" value="{{ $image->id }}">
                      <div class="col-xs-2">
                         <button type="submit" class="btn btn-default pull-right"> <i class="fa fa-send"> </i> Send</button>
                      </div>
                    </div>
                    
                  </form>
                  </div>
                  
                </div>
            </div>
      </div>
</div>
@endsection