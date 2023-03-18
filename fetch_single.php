<?php
header("content-type:applicatin/json");
$data=json_decode(file_get_contents("php://input"),true);
$student_id=$data['sid'];

include("./db.php");
$sql = "SELECT * FROM `data` WHERE id={$student_id}";
$query=mysqli_query($con,$sql);
if(mysqli_num_rows($query)> 0){
    $output=mysqli_fetch_assoc($query);

    echo json_encode($output);
}