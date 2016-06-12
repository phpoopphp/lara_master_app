@extends('admin.admin')
@section('content')
    <h1 class="page-header"><strong>{{$user->name }}</strong> Edit</h1>

    <div class="row">
        <div class="col-sm-3">
            {{ Html::image($user->photo->file,null,['class'=>'img-responsive img-rounded']) }}
        </div>
        <div class="col-sm-9">
            @include('admin.includes.form_error')
            {!! Form::model($user,['route'=>['admin.users.update',$user->id],'files'=>true,'method'=>'PUT']) !!}
            <div class="form-group">
                {!! Form::label('name') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo') !!}
                {!! Form::file('photo') !!}
            </div>
            <div class="form-group">
                {!! Form::label('is_active','Status') !!}
                {!! Form::select('is_active',[0=>'Passiv',1=>'Active'],null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role_id','Role ') !!}
                {!! Form::select('role_id',['null'=>"Role secin"]+App\Role::lists('name','id')->toArray(),null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
