@extends('layouts.system')

@section('content')
<table class="table table-bordered">

	<tr>
		<td>No</td>
		<td>Course Name</td>
		<td>Student Name</td>
		<td>Email</td>
	</tr>

	@php($i = 0)
	@foreach($enrollments as $enrollment)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $enrollment->course->name }}</td>
		<td>{{ $enrollment->user->name }}</td>
		<td>{{ $enrollment->user->email }}</td>
	</tr>
	@endforeach

</table>
@endsection