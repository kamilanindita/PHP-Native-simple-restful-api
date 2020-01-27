<?php
 include("Buku.php");
 $conn = new Buku(); 
 $data = $conn->getBuku();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Buku</title>
</head>
<body>
    <h3><a href="tambah.php">Tambah Buku</a>
    <br>
    <table>
        <tr>
            <th>Penulis</th>
            <th>Judul</th>            
            <th>Kota</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Action</th>
        </tr>
    <?php foreach($data as $buku ): ?>
        <tr>
            <td><?=$buku['penulis'];?></td>
            <td><?=$buku['judul'];?></td>
            <td><?=$buku['kota'];?></td>
            <td><?=$buku['penerbit'];?></td>
            <td><?=$buku['tahun'];?></td>
            <td>
                <a href="edit.php?id=<?=$buku['id'];?>">Edit</a> 
                |
                <a href="hapus.php?id=<?=$buku['id'];?>">Hapus</a>
            </td>
        </tr>
    <?php endforeach ?>
    </table>

</body>
</html>
