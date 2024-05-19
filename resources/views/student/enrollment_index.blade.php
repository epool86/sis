@extends('layouts.system')

@section('content')
<a href="{{ route('student.enrollment.create') }}" class="btn btn-primary">Register New Course</a>

<hr>

<table class="table table-bordered">

	<tr>
		<td>No</td>
		<td>Course Name</td>
		<td>Description</td>
		<td>Action</td>
	</tr>

	@php($i = 0)
	@foreach($enrollments as $enrollment)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $enrollment->course->name }}</td>
		<td>{{ $enrollment->course->description }}</td>
		<td>
			<form method="POST" action="{{ route('student.enrollment.destroy', $enrollment->course->id) }}">
				<input type="hidden" name="_method" value="DELETE">
				@csrf
				<button type="submit" class="btn btn-danger">Drop</button>
			</form>
		</td>
	</tr>
	@endforeach

</table>
@endsection