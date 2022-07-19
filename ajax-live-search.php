<?php

$search = $_POST['search'];

$con = mysqli_connect('localhost', 'root', '', 'crud') or die('Connection fail');

$sql = "SELECT * FROM std WHERE student_name LIKE '%{$search}%' OR city LIKE '%{$search}%' OR age LIKE '%{$search}%' ";

$result = mysqli_query($con, $sql) or die('Query fail');

$output = "";

if (mysqli_num_rows($result) > 0) {
    $output .= '<table border="1" cellspacing="0" cellpadding="0" width="100%">
    <tr class="bg-warning">
        <th>Id</th>
        <th>Name</th>
        <th>City</th>
        <th>Age</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>';
    foreach ($result as $row) {
        $output .= "<tr>

    <td align='center'>{$row['id']}</td>
    <td>{$row['student_name']}</td>
    <td>{$row['city']}</td>
    <td>{$row['age']}</td>
    <td align='center'> <button class='edit-btn btn btn-primary' data-eid='{$row['id']}'> Edit </button> </td>
    <td align='center'> <button class='delete-btn btn btn-danger' data-id='{$row['id']}'> Delete </button> </td>

    </tr>";
    }
    $output .= "</table>";

    mysqli_close($con);
    echo $output;
} else {
    echo  "not found data";
}
