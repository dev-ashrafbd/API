<?php
header("content-type:applicatin/json");
$data=json_decode(file_get_contents("php://input"),true);
$del_id=$data['did'];

include("./db.php");
$sql = "DELETE FROM `data` WHERE id={$del_id}";
$query=mysqli_query($con,$sql);
if(query){
    echo "success";
}