<?php
// koneksi database
include 'koneksi.php';
//memproses data saat form di submit
if(isset($_POST["nim"]) && !empty($_POST["nim"])){
//menangkap data yang di kirim dari form
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jns_kelamin = $_POST['jns_kelamin'];
$jurusan = $_POST['jurusan'];
$kelas = $_POST['kelas'];
$ekstensi_diperbolehkan = array('png','jpg');
$photo = $_FILES['file']['name'];
$x = explode('.', $photo);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];
$namafile = 'img_'.$nim.'.jpg'; 
if(empty($file_tmp)){
$update=mysqli_query($koneksi,"UPDATE mahasiswa SET
nama='$nama',jns_kelamin='$jns_kelamin',kelas='$kelas',jurusan='$jurusan' WHERE
nim='$nim'")or die(mysql_error()); 
if($update){
echo "<script>alert('DATA BERHASIL DI 
UPDATE');window.location='index.php';</script>";
}else{
echo "<script>alert('UPDATE 
GAGAL');window.location='index.php';</script>";
}
}else{
if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
if($ukuran < 1044070){
if(move_uploaded_file($file_tmp, 'file/'.$namafile)){
$update=mysqli_query($koneksi,"UPDATE mahasiswa SET
nama='$nama',jns_kelamin='$jns_kelamin',kelas='$kelas',jurusan='$jurusan',photo='$namafile'
 WHERE nim='$nim'")or die(mysql_error());
if($update){
echo "<script>alert('DATA BERHASIL DI 
UPDATE');window.location='index.php';</script>";
}else{
echo "<script>alert('DATA GAGAL DI 
UPDATE');window.location='index.php';</script>";
}
}
else{
echo "<script>alert('GAGAL MENGUPLOAD 
GAMBAR');window.location='index.php';</script>";
}
}else{
echo "<script>alert('UKURAN FILE TERLALU 
BESAR');window.location='tambahdata.php';</script>";
}
}else{
echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI 
PERBOLEHKAN');window.location='edit_datamahasiswa.php?id=$nim';</script>";
}
}
}
?>