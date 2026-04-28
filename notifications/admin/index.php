<?php include('db.php'); 
include('check_login.php'); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Posts List</title>
</head>
<body>

<h2>Posts</h2>
<h2 style="float:right;"><a href="https://sunconsultants.co.in/notifications/admin/log_out">Logout</a></h2>

<a href="create.php">Create New Post </a><br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Title  </th>
        <th>Kkeywords  </th>
        <th>Description  </th>
        <th>OG url </th>
        <th>OG title </th>
        <th>OG description </th>
        <th>Twitter site </th>
        <th>Twitter title </th>
        <th>Twitter description </th>
        <th>Main heading </th>
        <th>Main description </th>
        <th>Path  </th>
        <th>Pdf link </th>
        <th>Date  </th>
        <th>Status  </th>
        <th>Acton</th>
    </tr>

    <?php
    $sql = "SELECT * FROM notifications";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['keywords'];?></td>
            <td><?php echo $row['description'];?></td>
            <td><?php echo $row['og_url'];?></td>
            <td><?php echo $row['og_title'];?></td>
            <td><?php echo $row['og_description'];?></td>
            <td><?php echo $row['twitter_site'];?></td>
            <td><?php echo $row['twitter_title'];?></td>
            <td><?php echo $row['twitter_description'];?></td>
            <td><?php echo $row['main_heading'];?></td>
            <td><?php echo $row['main_description'];?></td>
            <td><?php echo $row['path'];?></td>
            <td><?php echo $row['pdf_link'];?></td>
            <td><?php echo date('d-m-Y', strtotime($row['publish_date']));?></td>
            <td><?php echo $row['status'] ? "Active" : "InActive";?></td>
        <td><a href='edit.php?id=<?php echo $row['id'];?>'>Edit</a> | <a onclick="return confirm('Are you sure you want to delete this?')" href='delete.php?id=<?php echo $row['id'];?>'>Delete</a></td>
     </tr>
        <?php
    }
    ?>
</table>

</body>
</html>