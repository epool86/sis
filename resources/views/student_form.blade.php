@extends('layouts.system')

@section('content')
<div class="card">
	<div class="card-header">
		Add New Student
	</div>
	<div class="card-body">

		@if($student->id)
			@php($method = 'PUT')
			@php($action = route('admin.student.update', $student->id))
		@else
			@php($method = 'POST')
			@php($action = route('admin.student.store'))
		@endif

		<form method="POST" action="{{ $action }}">
			<input type="hidden" name="_method" value="{{ $method }}">
			@csrf
			
			<table class="table">
				<tr>
					<td>Name</td>
					<td>
						<input type="text" class="form-control" name="name" value="{{ old('name', $student->name) }}">
						@error('name')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>
						<input type="text" class="form-control" name="email" value="{{ old('email', $student->email) }}">
						@error('email')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>
						<input type="text" class="form-control" name="phone" value="{{ old('phone', $student->phone) }}">
						@error('phone')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>
						<input type="password" class="form-control" name="password" value="{{ old('password') }}">
						@error('password')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</td>
				</tr>
			</table>

			<a href="{{ route('admin.student.index') }}" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Save</button>

		</form>
	</div>
</div>
@endsection