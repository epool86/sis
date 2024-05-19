@extends('layouts.system')

@section('content')
<div class="card">
	<div class="card-header">
		Choose Course
	</div>
	<div class="card-body">

		@if($enrollment->id)
			@php($method = 'PUT')
			@php($action = route('student.enrollment.update', $enrollment->id))
		@else
			@php($method = 'POST')
			@php($action = route('student.enrollment.store'))
		@endif

		<form method="POST" action="{{ $action }}">
			<input type="hidden" name="_method" value="{{ $method }}">
			@csrf
			
			<table class="table">
				<tr>
					<td>Course Name</td>
					<td>
						<select class="form-control" name="course_id">
							@foreach($courses as $course)
							<option value="{{ $course->id }}">{{ $course->name }}</option>
							@endforeach
						</select>
						@error('course_id')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</td>
				</tr>
			</table>

			<a href="{{ route('student.enrollment.index') }}" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Register Course</button>

		</form>
	</div>
</div>
@endsection