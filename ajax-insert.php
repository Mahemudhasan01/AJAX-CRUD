<?php

$fname = $_POST['name'];
$city = $_POST['city'];
$age = $_POST['age'];

$con = mysqli_connect('localhost', 'root', '', 'crud') or die('Connection fail');

$sql = "INSERT INTO std (student_name, city, age) VALUES ('{$fname}', '{$city}', '{$age}') ";

if(mysqli_query($con, $sql)){
    echo 1;
}else{
    echo 0;
}

