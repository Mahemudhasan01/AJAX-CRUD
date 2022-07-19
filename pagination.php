<?php

$con = mysqli_connect('localhost', 'root', '', 'crud') or die('Connection fail');

$limit = 5;
$page = "";

if (isset($_POST['page_id'])) {
    $page = $_POST['page_id'];
} else {
    $page = 1;
}

$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM std LIMIT {$offset}, $limit";

$result = mysqli_query($con, $sql);

$output = "";

if (mysqli_num_rows($result) > 0) {
    $output .= '<table class="table mt-0" border="1px">
            <thead>
                <tr class="bg-warning">
                    <th>Id</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>';
    foreach ($result as $row) {

        $output .= "
                <tr>
                    <td> {$row['id']} </td> <td> {$row['student_name']} </td> <td> {$row['city']} </td>
                    
                    <td align='center'> <button id='btn-edit' class='btn btn-primary' value='{$row['id']}'> Edit </button> </td>
                    
                    <td align='center'> <button id='btn-delete' class='btn btn-danger' value='{$row['id']}'> Delete </button> </td>

                </tr>";
    }

    $output .= '</table>';

    //find total page
    $sql1 = "SELECT * FROM std";
    $result = mysqli_query($con, $sql1);
    $total_recored = mysqli_num_rows($result);
    $total_page = ceil($total_recored / $limit);


    $output .= '<div class="pagination justify-content-center">';

    for ($i = 1; $i <= $total_page; $i++) {
        if($i == $page) {
            $active = "active";
        }else{
            $active = "";
        }
        $output .= "<a class='{$active} btn btn-success ml-2' id=' {$i} '> {$i} </a>";
    }

    mysqli_close($con);
    echo $output;
} else {
    echo "No data found";
}
