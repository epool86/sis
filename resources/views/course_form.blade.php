@extends('layouts.system')

@section('content')
<div class="card">
	<div class="card-header">
		Course Information
	</div>
	<div class="card-body">

		@if($course->id)
			@php($method = 'PUT')
			@php($action = route('admin.course.update', $course->id))
		@else
			@php($method = 'POST')
			@php($action = route('admin.course.store'))
		@endif

		<form method="POST" action="{{ $action }}">
			<input type="hidden" name="_method" value="{{ $method }}">
			@csrf
			
			<table class="table">
				<tr>
					<td>Course Name</td>
					<td>
						<input type="text" class="form-control" name="name" value="{{ old('name', $course->name) }}">
						@error('name')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>
						<textarea class="form-control" name="description" rows="5">{{ old('description', $course->description) }}</textarea>
						@error('description')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</td>
				</tr>
			</table>

			<a href="{{ route('admin.course.index') }}" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Save</button>

		</form>
	</div>
</div>
@endsection