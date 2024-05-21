<table style="width:100%;" border="1" cellpadding="2" cellspacing="1">
	<tr>
		<td><b>No</b></td>
		<td><b>Course Name</b></td>
		<td><b>Student Name</b></td>
		<td><b>Email</b></td>
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

	