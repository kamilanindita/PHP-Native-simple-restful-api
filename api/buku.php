<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include("../Data.php");
$conn = new Data(); 
 

$method=$_SERVER['REQUEST_METHOD'];
$data_reciver = json_decode(file_get_contents("php://input"));
 
	//request get
	if($method=="GET"){ 
		//jika ada parameter id yang diterima
		if(isset($_GET['id'])){ 
			$data=$conn->getBukuBy($_GET['id']);
			//jika ada id yang ditemukan
			if($data[0]['id']){ 
				echo json_encode(array("success" =>True,"message" => "Data found","data"=>$data));
			}
			//id tidak ditemukan
			else{ 
				echo json_encode(array("success" =>False,"message" => "Data not found","data"=>[]));
			}
		}
		//bila request get tidak ada parameter
		else{ 
			$data=$conn->getBuku();
			echo json_encode(array("success" =>True,"message" => "Data found","data"=>$data));
		}
	}
	
	//request post
	else if($method=="POST"){
		$data=[
            "penulis"=>$data_reciver->penulis,
            "judul"=>$data_reciver->judul,
            "kota"=>$data_reciver->kota,
            "penerbit"=>$data_reciver->penerbit,
            "tahun"=>$data_reciver->tahun
		];
		
		$hasil=$conn->addBuku($data);
		
		if($hasil==TRUE){
			echo json_encode(array("success" =>True,"message" => "Data was created","data"=>$data));
		}else{
			echo json_encode(array("success" =>False,"message" => "Data not created","data"=>[])); 
		}
	}
	
	//request put
	else if($method=="PUT"){
		$data_update=[
			"id"=>$data_reciver->id,
			"penulis"=>$data_reciver->penulis,
            "judul"=>$data_reciver->judul,
            "kota"=>$data_reciver->kota,
            "penerbit"=>$data_reciver->penerbit,
            "tahun"=>$data_reciver->tahun
		];
		
		$hasil=$conn->updateBukuBy($data_update);
		
		if($hasil==TRUE){
			echo json_encode(array("success" =>True,"message" => "Data has been updated","data"=>$data_update));
		}else{
			echo json_encode(array("success" =>False,"message" => "Data not updated","data"=>[]));  
		}
	}
	
	//request delete
	else if($method=="DELETE"){
		$hasil=$conn->deleteBukuBy($data_reciver->id);
		if($hasil==TRUE){
			echo json_encode(array("success" =>True,"message" => "Data has been Deleted","data"=>array("id"=>$data_reciver->id)));
		}else{
			echo json_encode(array("success" =>False,"message" => "Data not deleted","data"=>[]));  
		}
	}
	
	else{
		 
	}


 ?>
