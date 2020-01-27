 <?php
 include("Buku.php");
 $conn = new Buku(); 
 $hasil=$conn->deleteBukuBy($_GET['id']);
 
	if($hasil==TRUE){
		header('location:index.php');

	}else{
		echo "gagal hapus";
	}


?>