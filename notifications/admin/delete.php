<?php include('db.php'); 
include('check_login.php'); 

$id = $_GET['id'];
$sql = "DELETE FROM notifications WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Post deleted successfully.";
} else {
    echo "Error deleting post: " . $conn->error;
}

header("Location: index.php");
exit();
?>
