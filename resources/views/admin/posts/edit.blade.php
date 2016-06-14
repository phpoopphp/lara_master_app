@extends('admin.admin')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Edit post : {{$post->title}}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="thumb">
                        <a class="thumbnail" href="#">
                            <img class="img-responsive" src="{{ asset($post->photo->file) }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    {!! Form::model($post,['route'=>['admin.posts.update',$post->id],'method'=>'put','files'=>true]) !!}
                    <div class="form-group">
                        {!! Form::label('title') !!}
                        {!! Form::text('title',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_id','Category') !!}
                        {!! Form::select('category_id',(\App\Category::lists('name','id')->toArray()),null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('photo') !!}
                        {!! Form::file('photo') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('body') !!}
                        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Edit Post',['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
