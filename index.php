<?php 

require 'functions.php';

$info = query("SELECT * FROM jumlahabsen");

if(isset($_POST['submit'])) {
	if(tambah($_POST) > 0) {
        $error = false;
        header('Location: /jumlahabsensi');
    } else {
        $error = true;
    }
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Absen Mata Kuliah</title>
</head>
<body>
    <header>
        <h1>Absen Mata Kuliah</h1>
       
        <?php if(isset($error)) : ?>
            <p class="gagal">Gagal</p>

        <?Php endif; ?>
    </header>

    <section>
    	<div id="tambah">
    		<form action="" method="post">
                <p class="x" onclick="tutup()">&times;</p>
				<label for="matkul">Mata Kuliah</label>
				<input type="matkul" name="matkul" id="matkul" required autocomplete="off">
				<button type="submit" name="submit">Tambahkan</button>
			</form>
    	</div>
    	<button onclick="fungsiTambah()">Add</button>
        <table cellpadding="4" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Mata Kuliah</th>
                <th>Jumlah Absensi</th>
                <th></th>
            </tr>

            <?php $x = 1 ?>
            <?php foreach ($info as $row) : ?>

            <tr>
                <td><?= $x; ?></td>
                <td><?= $row['matakuliah']; ?></td>
                <td><?= $row['jumlahabsensi'];  ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>">edit</a>
                    <span>|</span>
                    <a href="hapus.php?id=<?= $row['id']; ?>" onclick="confirm('Ingin menghapus data?')">hapus</a>
                </td>
            </tr>

            <?php $x++; ?>
       		<?php endforeach; ?>

        </table>
    </section>
    <script>
    	const tambah = document.getElementById('tambah')
        
        function fungsiTambah() {
            tambah.style.display = 'flex'
        }

        function tutup() {
            tambah.style.display = 'none'
        }
    </script>
</body>
</html>