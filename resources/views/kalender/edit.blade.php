<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Wijzig user.</title>
</head>
<body>

	@if ($errors->any()) 

		<ul>
			@foreach($errors->all() as $error)
			
			<li> {{ $error }}</li>

			@endforeach
		</ul>

	@endif

	<form action="" method="POST">

		{{ csrf_field() }}

		<input type="text" name="name" value="{{ $birthday->person }}">
		<input type="date" name="date" value="<?php 
			echo date("Y-m-d", mktime(0, 0, 0, $birthday->month, $birthday->day, $birthday->year));
		?>">
		<input type="submit">
	</form>
	
</body>
</html>