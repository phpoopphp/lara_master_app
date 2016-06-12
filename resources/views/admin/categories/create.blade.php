@extends('admin.admin')
@section('content')
    <h1>User Create</h1>

    <div class="row">
        <div class="col-sm-6">
            @include('admin.includes.form_error')
            {!! Form::open(['route'=>'admin.users.store','files'=>true]) !!}
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
                {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
