@extends('admin.admin')
@section('content')
    <h1 class="page-header">Posts Lists</h1>
    @if($posts->isEmpty())
        <div class="alert alert-info">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<strong>Melumat!</strong> Posts listesi bosdur
        </div>
    @else
        
        <table class="table table-bordered table-hover">
        	<thead>
        		<tr>
        			<th>Id</th>
        			<th>User</th>
        			<th>Category</th>
        			<th>Photo</th>
        			<th>Title</th>
        			<th>Created</th>
        			<th>Uptaded</th>
        			<th>Action</th>
        		</tr>
        	</thead>
        	<tbody>
            @foreach($posts as $post)
        		<tr>
        			<td>{{$post->id}}</td>
        			<td>{{$post->user->name}}</td>
        			<td>{{$post->category->name}}</td>
        			<td>{!! Html::image($post->photo->file?$post->photo->file:'http://lorempixel.com/400/200',null,['class'=>'img-rounded','width'=>150]) !!}</td>
        			<td>{{$post->title}}</td>
        			<td>{{$post->created_at->diffforHumans()}}</td>
        			<td>{{$post->updated_at->diffforHumans()}}</td>
        			<td>
						<a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-warning btn-xs">Edit</a>
						{!! Form::open(['route'=>['admin.posts.destroy',$post->id],'method'=>'delete','style'=>'display:inline-block;']) !!}
							{!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs']) !!}
						{!! Form::close() !!}
					</td>
        		</tr>
            @endforeach
        	</tbody>
        </table>
    
    @endif
@endsection
