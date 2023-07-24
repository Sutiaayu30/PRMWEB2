<?php
include('koneksi.php');
if(isset($_GET['id'])){
$nim=$_GET['id'];
$namafile = 'img_'.$nim.'.jpg'; 
// Cek apakah file fotonya ada di folder images
if(is_file("file/".$namafile)){ 
unlink("file/".$namafile);}
$del=mysqli_query($koneksi,"DELETE FROM mahasiswa WHERE
nim='$nim'");
if($del){
echo'Data mahasiswa berhasil dihapus! ';
echo'<a href="index.php">Kembali</a>';
}else{
echo'Gagal menghapus data! ';
echo'<a href="index.php">Kembali</a>';
}
}
?>