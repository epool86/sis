@extends('layouts.system')

@section('content')
<div class="card">
	<div class="card-header">
		View Student Details
	</div>
	<div class="card-body">
		
		<table class="table">
			<tr>
				<td>Name</td>
				<td>
					{{ $student->name }}
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					{{ $student->email }}
				</td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>
					{{ $student->phone }}
				</td>
			</tr>
		</table>

		<a href="{{ route('student.index') }}" class="btn btn-danger">Back</a>

	</div>
</div>
@endsection