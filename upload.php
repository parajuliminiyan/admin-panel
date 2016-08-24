<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "uploads";
$connection = mysqli_connect($host,$user,$password,$database);


if(isset($_POST['btn-upload']))
{

    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="uploads/";

    $upload = move_uploaded_file($file_loc,$folder.$file);
    $sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
    mysqli_query($connection,$sql);
    if($upload==true){
        header('loaction:Sprofile.php');
    }else{
        echo"file not uploaded";
    }
}
?>