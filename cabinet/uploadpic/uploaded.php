<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/assets/bootloader.php');
// $o=new auth();
// session_name('visit_en_data');
// session_start();
$upload_dir = "profile_pic"; 				// The directory for the images to be saved in
$upload_path = $upload_dir."/";				// The path to where the image will be saved
$large_image_prefix = "r_"; 			// The prefix name to large image
$thumb_image_prefix = "t_";					//prefix for thumbnail
$large_image_c_prefix="c_";	
$small_image_prefix="p_";			
$large_image_name=$_SESSION['user_global_id'].time()."_".rand(26050000,99999999);
$thumb_image_name=$large_image_name;
$small_image_name=$large_image_name;
$max_width="900";
$max_height="550";
$max_file = "2";
$thumb_width = "265";						// Width of thumbnail image
$thumb_height = "265";						// Height of thumbnail image
$allowed_image_types = array('image/pjpeg'=>"jpg",'image/jpeg'=>"jpg",'image/jpg'=>"jpg");
$allowed_image_ext = array_unique($allowed_image_types); 
// do not change this
$image_ext = "";	// initialise variable, do not change this.
foreach ($allowed_image_ext as $mime_type => $ext) {
    $image_ext.= strtoupper($ext)." ";
}
function getHeight($image) {
	$size = getimagesize($image);
	$height = $size[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$size = getimagesize($image);
	$width = $size[0];
	return $width;
}
function resizeImage($image,$width,$height,$scale) {

	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
	
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$image); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$image,90); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$image);  
			break;
    }
	
	chmod($image, 0777);
	return $image;
}
if (isset($_FILES["image"])) { 
	//Get the file information
	$userfile_name = $_FILES['image']['name'];
	$userfile_tmp = $_FILES['image']['tmp_name'];
	$userfile_size = $_FILES['image']['size'];
	$userfile_type = $_FILES['image']['type'];
	$filename = basename($_FILES['image']['name']);
	$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
	
	//Only process if the file is a JPG, PNG or GIF and below the allowed limit
	if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
		
		foreach ($allowed_image_types as $mime_type => $ext) {
			//loop through the specified image types and if they match the extension then break out
			//everything is ok so go and check file size
			if($file_ext==$ext && $userfile_type==$mime_type){
				$error = "";
				break;
			}else{
				$error = "Only <strong>".$image_ext."</strong> images accepted for upload<br />";
			}
		}
		//check if the file size is above the allowed limit
		if ($userfile_size > ($max_file*1048576)) {
			$error.= "Images must be under ".$max_file."MB in size";
		}
		
	}else{
		$error= "Select an image for upload";
	}
	$large_image_location = $upload_path.$large_image_prefix.$large_image_name;
	$large_image_location_c = $upload_path.$large_image_c_prefix.$large_image_name;
	$thumb_image_location=$upload_path.$thumb_image_prefix.$thumb_image_name;
	$small_image_location=$upload_path.$small_image_prefix.$small_image_name;
	if(!is_dir($upload_dir)){
	mkdir($upload_dir, 0777);
	chmod($upload_dir, 0777);
	}
	//Everything is ok, so we can upload the image.
	if (strlen($error)==0){
		
		if (isset($_FILES['image']['name'])){
			//this file could now has an unknown file extension (we hope it's one of the ones set above!)
			$large_image_location = $large_image_location.".".$file_ext;
			$large_image_location1 = $large_image_location_c.".".$file_ext;
			$thumb_image_location = $thumb_image_location.".".$file_ext;
			$small_image_location = $small_image_location.".".$file_ext;
			
			//put the file ext in the session so we know what file to look for once its uploaded
			

			move_uploaded_file($userfile_tmp, $large_image_location);
			if(!copy($large_image_location, $large_image_location1)){
				echo "fail";
			}
			chmod($large_image_location, 0777);
			
			$width = getWidth($large_image_location);
			$height = getHeight($large_image_location);
			//Scale the image if it is greater than the width set above
			if ($width > $max_width && $max_height>$height){
				$scale = $max_width/$width;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}
			else if($height>$max_height && $width<$max_width){
				$scale=1;
				$use_height=$height;
				for ($i=0;$height>550;$i++ ) {
					$height=$use_height; 
					$height=$scale*$height;
					$scale=$scale-0.01;
				}
				$uploaded = resizeImage($large_image_location,$width,$use_height,$scale);
			}
			else if($width>$max_width && $height>$max_height){
				$scale=$max_width/$width;
				$uploaded=resizeImage($large_image_location,$width,$height,$scale);
			}
			else{
				$scale = 1;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}
			$x1 = $_POST["x1"];
			$y1 = $_POST["y1"];
			$x2 = $_POST["w"];
			$y2 = $_POST["h"];
			$w = $_POST["w"];
			$h = $_POST["h"];
			$h_x = $_POST["h_x"];
			$w_x = $_POST["w_x"];
			$scale_cut=$width/$w_x;
			$x1=$x1*$scale_cut;
			$y1=$y1*$scale_cut;
			$w=$w*$scale_cut;
			$h=$h*$scale_cut;
			$scale = $thumb_width/$w;
			$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location1,$w,$h,$x1,$y1,$scale);
			$small=resizeSmallImage($small_image_location,$thumb_image_location,45,45,0,0,1);
			$user=$_SESSION['tourist'];
			$query="UPDATE `profile_pic` SET `pic_id`='$large_image_name' WHERE `username`='$user'";
			// if($o->query_norreturn($query)){
			// 	$ko["msg"]="success";
			// 	$ko["img"]=$thumb_image_location;
			// 	$_SESSION["user_pic"]=$large_image_name;
			// 	echo json_encode($ko);
			// }
			// else{
			// 	$ko["msg"]="fail";
			// 	echo json_encode($ko);
			// }
		}
		//Refresh the page to show the new uploaded image
		//header("location:".$_SERVER["PHP_SELF"]);
		//exit();
		$ko["msg"]="success";
		$ko["img"]=$thumb_image_location;
		$_SESSION["user_pic"]=$large_image_name;
		echo json_encode($ko);
	}}
function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	// $width
	$newImageWidth =ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$thumb_image_name); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$thumb_image_name,90); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$thumb_image_name);  
			break;
    }
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}
function resizeSmallImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	// $width
	$newImageWidth =ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$width=$height=265;
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$thumb_image_name); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$thumb_image_name,90); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$thumb_image_name);  
			break;
    }
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}

?>