@extends('layouts.system')

@section('content')
<a href="{{ route('student.create') }}" class="btn btn-primary">Add New Student</a>

<hr>

<table class="table table-bordered">

	<tr>
		<td>No</td>
		<td>Student Name</td>
		<td>Phone No</td>
		<td>Address</td>
		<td>Email</td>
		<td>Action</td>
	</tr>

	@php($i = 0)
	@foreach($users as $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->phone }}</td>
		<td>{{ $user->address_1 }} {{ $user->address_2 }} <br>{{ $user->city }} {{ $user->postcode }} {{ $user->state }}</td>
		<td>{{ $user->email }}</td>
		<td>
			<form method="POST" action="{{ route('student.destroy', $user->id) }}">
				<input type="hidden" name="_method" value="DELETE">
				@csrf
				<a href="{{ route('student.show', $user->id) }}" class="btn btn-info">View</a>
				<a href="{{ route('student.edit', $user->id) }}" class="btn btn-primary">Edit</a>
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</td>
	</tr>
	@endforeach

</table>
@endsection