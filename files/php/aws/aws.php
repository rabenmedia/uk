<?php
	function check_base64_image($base64) {
		$img = imagecreatefromstring(base64_decode($base64));
		if (!$img) {
			return false;
		}
		
		return true;
	}
	
	// include this file (provided on the standard include path)
	require_once('phpsec/_common/s3/S3ImageStore.php');
	
	// if (!array_key_exists('Filedata',$_FILES)) 
	// 	throw new Exception("Missing upload!");
	
	if( !isset($_POST['image']) )
		throw new Exception("Missing upload!");
	// $file=$_FILES['Filedata'];
	
	
	if( check_base64_image($_POST['image']) ) {
		$dataURL = $_POST['image'];
		
		$parts = explode(',', $dataURL);  
		$data = $parts[1]; 
		
		$filename = round(microtime(true)*100);
		
		// Decode base64 data, resulting in an image
		$data = base64_decode($data); 
		
		// change this 
		$envPrefix="FRANKEN_";
		
		$store=S3ImageStore::getNew($envPrefix);
		
		$url=$store->storeImageData($data, $filename);
		 
		if (!$url) 
			throw new Exception($store->getError());
		
		// do something
		echo json_encode(array('status'=>200, 'url'=>$url));
	} else {
		echo json_encode(array('status'=>404));
	}
	
?>