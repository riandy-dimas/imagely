@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-6 col-md-offset-3">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input:
                    @foreach ($errors->all() as $error)
                        {{ $error }}.
                    @endforeach
            </div>
        @endif

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif

        @foreach ($images as $image)
            <div class="panel panel-default panel-single-img">
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
                 <a href="{{ route('singleImage', ['id' => $image->id])}}">
                    <img src="{{ asset('images/' . $image->image_name) }}" alt="" class="img-responsive" width="600" height="600">
                    </a>
                </div>
                <div class="panel-body">
                    <a href="{{ route('singleImage', ['id' => $image->id])}}">
                        <i class="fa fa-comments fa-lg"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-share fa-lg"></i>
                    </a>
                </div>
            </div>   
        @endforeach


    <div class="end-of-page">
        <h3 class="text-center">-- no image to be shown anymore --</h3>
    </div>

    
</div>
@endsection
