<?php

$id = $_POST['id'];

$con = mysqli_connect('localhost', 'root', '', 'crud') or die('Connection fail');

$sql = "DELETE FROM std WHERE id = {$id}";

if (mysqli_query($con, $sql)) {
    echo 1;
} else {
    echo 0;
}
