<?php include('db.php');

$title = $_POST['search'];

// Fetch data from the database
$sql = "SELECT * FROM notifications where main_heading like '%".$title."%' order by publish_date DESC";
$result = $conn->query($sql);

$arr = [];
if ($result->num_rows > 0) {
    $i = 0;
    while ($row = $result->fetch_assoc()) { 

        $arr[$i]['value'] = "notifications/".$row['path'];
        $arr[$i]['label'] = $row['main_heading'];
        $i++;
    }

    echo json_encode($arr);

} else {
    
    echo '';
}

$conn->close();
?>