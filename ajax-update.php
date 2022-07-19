<?php

$id = $_POST['id'];
$name = $_POST['name'];
$city = $_POST['city'];
$age = $_POST['age'];

$con = mysqli_connect('localhost', 'root', '', 'crud') or die('Connection fail');

$sql = "UPDATE std SET student_name = '{$name}', city = '{$city}', age = '{$age}' WHERE id = '{$id}' ";

if(mysqli_query($con, $sql)){
    echo 1;
}else{
    echo 0;
}

