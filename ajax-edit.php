<?php

$id = $_POST['id'];

$con = mysqli_connect('localhost', 'root', '', 'crud') or die('Connection fail');

$sql = "SELECT * FROM std WHERE id = '{$id}'";

$result = mysqli_query($con, $sql);

$output = "";

if (mysqli_num_rows($result) > 0) {

    foreach ($result as $row) {
        $output .= 
        "<tr>
           <td>First Name</td>
            <td><input type='hidden' id='edit-id' value='{$row["id"]}'>
                <input type='text' id='edit-fname' value='{$row["student_name"]}'>
            </td>
        </tr>
        <tr>
            <td>City</td>
            <td><input type='text' id='edit-city' value='{$row["city"]}'></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type='text' id='edit-age' value='{$row["age"]}'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' id='edit-submit' value='save'></td>
        </tr>
            ";
    }

    mysqli_close($con);
    echo $output;
}else{
    echo "No Data Found";
}
