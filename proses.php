<?php
error_reporting(1);
include "Client.php";

if ($_POST['aksi']=='tambah')
{   $data = array("id_jurusan"=>$_POST['id_jurusan'],
                    "nama_jurusan"=>$_POST['nama_jurusan'],
                    "akreditasi"=>$_POST['akreditasi'],
                    "fakultas"=>$_POST['fakultas']);
    $abc->tambah_data($data);
    header('location:index.php?page=daftar-data');    
}else if ($_POST['aksi']=='ubah')
{   $data = array("id_jurusan"=>$_POST['id_jurusan'],
                "nama_jurusan"=>$_POST['nama_jurusan'],
                "akreditasi"=>$_POST['akreditasi'],
                "fakultas"=>$_POST['fakultas']);
    $abc->ubah_data($data);
    header('location:index.php?page=daftar-data');
} else if ($_GET['aksi']=='hapus')
{   $abc->hapus_data($_GET['id_jurusan']);
    header('location:index.php?page=daftar-data');
}
?>