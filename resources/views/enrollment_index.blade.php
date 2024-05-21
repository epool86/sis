@extends('layouts.system')

@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-3">
				<select class="form-control" id="course_id" onchange="filter()">
					<option value="ALL" @if($course_id == "ALL") selected @endif>All Courses</option>
					@foreach($courses as $course)
					<option value="{{ $course->id }}" @if($course_id == $course->id) selected @endif>{{ $course->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-3">
				<input type="text" class="form-control" id="search" value="{{ $search }}" onkeyup="handleKeyPress(event)">
			</div>
			<div class="col-md-3">
				Total records: {{ $total }}
			</div>
			<div class="col-md-3">
				<a href="{{ route('admin.enrollment.pdf') }}" class="btn btn-primary">Export PDF</a>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<table class="table table-bordered">

			<tr>
				<td>No</td>
				<td>Course Name</td>
				<td>Student Name</td>
				<td>Email</td>
			</tr>

			@php($i = ($enrollments->currentPage() - 1) * $enrollments->perPage())
			@foreach($enrollments as $enrollment)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $enrollment->course->name }}</td>
				<td>{{ $enrollment->user->name }}</td>
				<td>{{ $enrollment->user->email }}</td>
			</tr>
			@endforeach

		</table>

		{!! $enrollments->appends($_GET)->render() !!}

	</div>
</div>
@endsection

@section('bottom_script')
<script type="text/javascript">
	
	function filter(){
		var e = document.getElementById("course_id");
		var course_id = e.options[e.selectedIndex].value;
		var search = document.getElementById("search").value;
		location.href = "{{ route('admin.enrollment.index') }}?course_id=" + course_id + "&search=" + search;
	}

	function handleKeyPress(e)
	{
		var key=e.keyCode || e.which;
		if (key==13)
		{
			var e = document.getElementById("course_id");
			var course_id = e.options[e.selectedIndex].value;
			var search = document.getElementById("search").value;
			location.href = "{{ route('admin.enrollment.index') }}?course_id=" + course_id + "&search=" + search;
		}
	}

</script>
@endsection