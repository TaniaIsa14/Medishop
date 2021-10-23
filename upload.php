<?php
session_start();

include "body.php";

if (isset($_POST['submit'])){
	$file=$_FILRS['file'];
	$fileName=$_FILRS['file']['name'];
	$fileTmpName=$_FILRS['file']['tmp_name'];
	$fileSize =$_FILRS['file']['size'];
	$fileError=$_FILRS['file']['error'];
	$fileType=$_FILRS['file']['type'];
	$fileExt=explode('.',$fileName);
	$fileActualExt=(strtolower(end($fileExt));
	$allowed=array ('jpg','jpeg','png','pdf');
	if(in_array($fileActualExt,$allowed)){
		if($fileError===0){
			if($filesize<1000000){
				$fileNameNew=uniquid('',true).".".$fileActualExt;
				$fileDestination='uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName,$fileDestination);
				header("Location:body.php?upload success");
	}else{
		echo "Your files is too big!";
	}
	else{
		echo"there was an error uploading your files!";
	}
	else{
		echo"You cannot upload files of this type!";
	}
}