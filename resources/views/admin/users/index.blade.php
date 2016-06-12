@extends('admin.admin')
@section('content')
  <h1 class="page-header">
	  Users lists
  </h1>

	{{--Table--}}
  	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<thead>
			<tr>
				<th>No : </th>
				<th>Photo</th>
				<th>Firstname</th>
				<th>Role</th>
				<th>Active</th>
				<th>Email</th>
				<th>Created at</th>
				<th>Updated at</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>
							@if(count($user->photo))
								{{ Html::image($user->photo->file,null,['class'=>'img-responsive','width'=>150]) }}
							@else
								Yoxdur
							@endif
						</td>
						<td>{{$user->name}}</td>
						<td>{{$user->roles->name}}</td>
						<td>
							<label  class="label label-{{$user->is_active?'success':'danger'}}">
								{{$user->is_active?'Active':'Passive'}}
							</label>
						</td>
						<td>{{$user->email}}</td>
						<td>{{$user->created_at->diffForHumans()}}</td>
						<td>{{$user->updated_at->diffForHumans()}}</td>
						<td>
							<a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-warning btn-xs">Edit</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
  	</div>
	{{--/Table--}}
@endsection
