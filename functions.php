<?php 

$conn = mysqli_connect('localhost', 'root', '', 'absensi');

function query($query) {
	global $conn;

	$result = mysqli_query($conn, $query);
	$rows = [];

	while ($row = mysqli_fetch_assoc(($result))) {
		$rows[] = $row;
	}

	return $rows;

}

function tambah($post) {
	global $conn;

	$matakuliah = htmlspecialchars($post['matkul']);

	$dataTambah = "INSERT INTO jumlahabsen ( matakuliah, jumlahabsensi ) VALUES ('$matakuliah', '0')";
	mysqli_query($conn, $dataTambah);

	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;

	$dataHapus = "DELETE FROM jumlahabsen WHERE id=$id";
	mysqli_query($conn, $dataHapus);

	return mysqli_affected_rows($conn);
}

function ubah($post) {
	global $conn;

	$id = $post['id'];
	$matakuliah = htmlspecialchars($post['matkul']);
	$jumlahabsen = htmlspecialchars($post['jumlahabsen']);

	$dataTambah = "UPDATE  jumlahabsen SET matakuliah = '$matakuliah', jumlahabsensi = '$jumlahabsen' WHERE id = $id";

	mysqli_query($conn, $dataTambah);

	return mysqli_affected_rows($conn);
}

 ?>