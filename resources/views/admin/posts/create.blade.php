@extends('admin.admin')
@section('content')
    <div class="panel panel-primary">
    	  <div class="panel-heading">
    			<h3 class="panel-title">Add Posts Form</h3>
    	  </div>
    	  <div class="panel-body">
    			{!! Form::open(['route'=>'admin.posts.store','files'=>true]) !!}
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
                  {!! Form::submit('Add Post',['class'=>'btn btn-primary']) !!}
              </div>
                {!! Form::close() !!}
    	  </div>
    </div>
@endsection
