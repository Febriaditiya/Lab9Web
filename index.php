<?php
include("koneksi.php");
// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
    <style>
        .container {
            background: #F0FFF0;
        }
        table {
            background: #FAFAD2;
        }
        body {
            background: #D2B48C;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php require('header.php'); ?>
        <h1>Data Barang</h1>
        <a href="tambah.php" class="tambah">Tambah Barang</a>
        <div class="main">
            <table>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php if($result): ?>
            <?php $i = 1; ?>
            <?php while($row = mysqli_fetch_array($result)):  ?>
            <tr>
                <td><?= $i; ?></td>
                <td><img src="gambar/<?= $row['gambar'];?>" alt="<?= $row['nama'];?>" width="80">
                </td>
                <td><?= $row['nama'];?></td>
                <td><?= $row['kategori'];?></td>
                <td><?= $row['harga_beli'];?></td>
                 <td><?= $row['harga_jual'];?></td>
                <td><?= $row['stok'];?></td>
                <td>
                <a class="ubah" href="ubah.php?id_barang=<?php echo $row['id_barang']; ?>">Ubah</a>
                <a class="hapus" href="hapus.php?id_barang=<?php echo $row['id_barang']; ?>">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endwhile; else: ?>
            <tr>
                <td colspan="7">Belum ada data</td>
            </tr>
            <?php endif; ?>
      </table>
    </div>
    <?php require('footer.php'); ?>
  </div>
</body>
</html>