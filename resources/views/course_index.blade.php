@extends('layouts.system')

@section('content')
<a href="{{ route('admin.course.create') }}" class="btn btn-primary">Add New Course</a>

<hr>

<table class="table table-bordered">

	<tr>
		<td>No</td>
		<td>Course Name</td>
		<td>Description</td>
		<td>Action</td>
	</tr>

	@php($i = 0)
	@foreach($courses as $course)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $course->name }}</td>
		<td>{{ $course->description }}</td>
		<td>
			<form method="POST" action="{{ route('admin.course.destroy', $course->id) }}">
				<input type="hidden" name="_method" value="DELETE">
				@csrf
				<a href="{{ route('admin.course.edit', $course->id) }}" class="btn btn-primary">Edit</a>
				@if($course->deleted_at)
				<a href="{{ route('admin.course.restore.post', $course->id) }}" class="btn btn-warning">Restore</a>
				@else
				<button type="submit" class="btn btn-danger">Delete</button>
				@endif
			</form>
		</td>
	</tr>
	@endforeach

</table>
@endsection