<?php
 include("Buku.php");
 $conn = new Buku(); 

 if(isset($_POST['submit'])){
	 $data_update=[
            "penulis"=>$_POST['penulis'],
            "judul"=>$_POST['judul'],
            "kota"=>$_POST['kota'],
            "penerbit"=>$_POST['penerbit'],
            "tahun"=>$_POST['tahun']
		];
		
	 $hasil=$conn->updateBukuBy($_POST['id'], $data_update);
	 if($hasil==TRUE){
		header('location:index.php');
	 }else{
		header('location:edit.php?_id='.$_GET['id'].'');
		 
	 }
	 
 }else{
	 $data = $conn->getBukuBy($_GET['id']);
 }
 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>
	<?php foreach($data as $buku ): ?>
    <form method="POST">
    <input type="text" name="id" value="<?=$buku['id'];?>" hidden/>
        <table>
            <tr>
                <td>Penulis</td>
                <td>:&nbsp;<input type="text" name="penulis" value="<?=$buku['penulis'];?>"/></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>:&nbsp;<input type="text" name="judul" value="<?=$buku['judul'];?>"/></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td>:&nbsp;<input type="text" name="kota" value="<?=$buku['kota'];?>"/></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:&nbsp;<input type="text" name="penerbit" value="<?=$buku['penerbit'];?>"/></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:&nbsp;<input type="text" name="tahun" value="<?=$buku['tahun'];?>"/></td>
            </tr>
        </table>
        <button name="submit" type="submit">Simpan</button>
    </form>
	<?php endforeach ?>
	
</body>
</html>
