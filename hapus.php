<?php 

require 'functions.php';

$id = $_GET['id'];

if(hapus($id) > 0) {
    header('Location: /jumlahabsensi');
} else {
    header('Location: /jumlahabsensi');
}

?>