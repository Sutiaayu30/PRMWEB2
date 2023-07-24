<!DOCTYPE html>
<html>
<head>
<title>Tambah Data </title>
</head>
<body>
<h1>Tambah Data Mahasiswa</h1>
<?php
include 'koneksi.php';
?>
<br/>
<a href="tambahdata.php">Tambah Data</a>
<br/><br/>
<table border="1" cellpadding="10">
<tr>
<th>No</th>
<th>NPM</th>
<th>Nama</th>
<th>Jenis Kelamin</th>
<th>Jurusan</th>
<th>Kelas</th>
<th>Photo</th>
<th>Action</th>
</tr>
<?php
$no = 1;
$data = mysqli_query($koneksi,"select * from mahasiswa");
while($d = mysqli_fetch_array($data)){
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $d['nim']; ?></td>
<td><?php echo $d['nama']; ?></td>
<td>
<?php
if($d['jns_kelamin']=='L') echo 'Laki-laki';
elseif($d['jns_kelamin']=='P') echo 'Perempuan';
?>
</td>
<td><?php echo $d['jurusan']; ?></td>
<td><?php echo $d['kelas']; ?></td>
<td>
<img src="<?php echo "file/".$d['photo']; ?>" width="100"
height="130" >
</td>
<td>
<a href="edit_datamahasiswa.php?id=<?php echo $d['nim']; 
?>">Edit</a> |
<a href="proses_hapus.php?id=<?php echo $d['nim']; ?>"
onclick="return confirm('Anda yakin akan menghapus data ini? \n<?php echo $d['nim']; ?>')">Hapus</a>
</td>
</tr>
<?php } ?>
</table>
<br/>
<?php
echo "Total data : ". mysqli_num_rows($data)." Mahasiswa";
?>
</body>
</html>
