<?php 

require 'functions.php';
$id = $_GET['id'];

$data = query("SELECT * FROM jumlahabsen WHERE id = $id")[0];

if(isset($_POST['submit'])) {
	if(ubah($_POST) > 0 ) {
		header("Location: /jumlahabsensi");
	} else {
		header("Location: /jumlahabsensi");
	}
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/edit.css">
	<title>Edit</title>
</head>
<body>
	<div class="edit">
		<form action="" method="post">
			<input type="hidden" name="id" value=<?= $data['id']; ?>>

			<label for="matkul">Mata Kuliah:</label>
			<input type="text" name="matkul" id="matkul" autocomplete="off" value="<?= $data['matakuliah']; ?>">

			<label for="jumlahabsen">Jumlah Absen:</label>
			<input type="number" name="jumlahabsen" id="jumlahabsen" autocomplete="off" value=<?= $data['jumlahabsensi']; ?>>
			<button type="submit" name="submit">Edit</button>
		</form>
	</div>
	
</body>
</html>