<?php 
include"conn.php";
//receive file and save
$image=$_FILES['demoimage']['name'];
//move_uploaded_file($_FILES['demoimage']['tmp_name'], images/.$_FILES['demoimage']['name']);

 $imagename=date("YmdHis");
 $target_dir = "images/".$imagename;
 
 $target_file = $target_dir . basename($_FILES["demoimage"]["name"]);
 move_uploaded_file( $_FILES['demoimage']['tmp_name'], "$target_dir".$image);

 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("jpg","jpeg","png");

 // Check extension
 if( in_array($imageFileType,$extensions_arr) ){
$s=$target_dir.$image;
  // Upload file
  move_uploaded_file($_FILES['demoimage']['tmp_name'],$target_dir.$image);
  $data123 = mysqli_query($conn,"INSERT INTO safe(image)values('$s')");
echo "<script> alert('YOU ARE REGISTERD');</script>";

 } 
	


?>