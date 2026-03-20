<style>
    
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
}

form {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: auto;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
textarea {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s;
}

input[type="text"]:focus,
textarea:focus {
    border-color: #007BFF;
    outline: none;
}

textarea {
    resize: vertical;
}

.switch {
    display: inline-block;
    position: relative;
    width: 50px;
    height: 24px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    border-radius: 24px;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    border-radius: 50%;
    transition: .4s;
}

input:checked + .slider {
    background-color: #007BFF;
}

input:checked + .slider:before {
    transform: translateX(26px);
}

button {
    background-color: #007BFF;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

</style>
<?php include('db.php'); 
include('check_login.php'); 

if( isset($_GET['id']) ){

    $id = $_GET['id'];

}else{

    header("location:index.php");
    exit;
}

if (isset($_POST['update'])) {
    
    $title = $_POST['title'];
    $keywords = $_POST['keywords'];
    $description = addslashes($_POST['description']);
    $og_url = $_POST['og_url'];
    $og_site_name = $_POST['og_site_name'];
    $og_title = $_POST['og_title'];
    $og_description = addslashes($_POST['og_description']);
    $twitter_card = $_POST['twitter_card'];
    $twitter_site = $_POST['twitter_site'];
    $twitter_title = $_POST['twitter_title'];
    $twitter_description = addslashes($_POST['twitter_description']);    
    $main_heading = $_POST['main_heading'];
    $short_description = addslashes($_POST['short_description']);
    $main_description = addslashes($_POST['main_description']);
    $path = $_POST['path'];
    $pdf_link = $_POST['pdf_link'];
    $status = $_POST['status'];
    $publish_date = date('Y-m-d', strtotime($_POST['publish_date']));

    $qry = "";
    if(  isset($_FILES['twitter_image']['name']) ){

        // banner upload code  
        $twitter_image= $_FILES['twitter_image']['name'];	
        $tmpp = $_FILES['twitter_image']['tmp_name'];
        
        if( $twitter_image ){
            
            $page_thumbimage = time().str_replace(" ","_",@basename($twitter_image));
            $target_path_original="uploads/";					
            $target_path_original = $target_path_original.$page_thumbimage;					
            move_uploaded_file($tmpp,$target_path_original);		
            
            $twitter_image = $page_thumbimage;
            $qry = "twitter_image='$twitter_image',";
        }
    }

    $sql = "update notifications set
        title='$title', 
        keywords='$keywords',
        description='$description',
        og_url='$og_url',
        og_site_name='$og_site_name',
        og_title='$og_title',
        og_description='$og_description',
        twitter_card='$twitter_card',
        twitter_site='$twitter_site',
        twitter_title='$twitter_title',
        twitter_description='$twitter_description',
        $qry
        main_heading='$main_heading',
        main_description='$main_description',
        short_description='$short_description',
        path='$path',
        pdf_link='$pdf_link',
        status='$status',
        publish_date='$publish_date' where id=$id";

        //echo $sql;

    if ($conn->query($sql) === TRUE) {
        echo "Post updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM notifications WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// echo "<pre>";
// print_r($row);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link href="css/custom.css" rel="stylesheet">

    <!-- flatpickr CSS and javascript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--CKEditor CKFinder js-->
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body>

<h2>Edit Post</h2>

<form method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $row['title'];?>" value=" <?php echo $row['title'];?>" required><br><br>
        <label for="title">keywords:</label>
        <input type="text" name="keywords" value="<?php echo $row['keywords'];?>" required><br><br>
        <label for="title">Description:</label>
        <input type="text" name="description" value="<?php echo $row['description'];?>" required>
        <br><br>
        <label for="title">OG url:</label>
        <input type="text" name="og_url" value="<?php echo $row['og_url'];?>" required><br><br>
        <label for="title">OG Site Name:</label>
        <input type="text" name="og_site_name" value="<?php echo $row['og_site_name'];?>" required><br><br>
        <label for="title">OG Title:</label>
        <input type="text" name="og_title" value="<?php echo $row['og_title'];?>" required><br><br>
        <label for="title">OG Description:</label>
        <textarea name="og_description" id="og_description"><?php echo stripslashes($row['og_description']);?></textarea>
       <br>
       
        <label for="title">Twitter Site:</label>
        <input type="text" name="twitter_site" value="<?php echo $row['twitter_site'];?>" required><br><br>
        <label for="title">Twitter Title:</label>
        <input type="text" name="twitter_title" value="<?php echo $row['twitter_title'];?>" required><br><br>
        <label for="title">Twitter Description:</label>
        <textarea name="twitter_description" id="twitter_description"><?php echo stripslashes($row['twitter_description']);?></textarea>
     
        <label for="title">Main Heading:</label>
        <input type="text" name="main_heading" value="<?php echo $row['main_heading'];?>" required><br><br>
        <label for="title">Short description</label>
        <input type="text" name="short_description" value="<?php echo $row['short_description'];?>" required><br><br>
        <label for="title">Main Description:</label>
        <textarea name="main_description" id="main_description" rows="10" cols="50"><?php echo stripslashes($row['main_description']);?></textarea>
        <script type="text/javascript">
            var editor = CKEDITOR.replace( 'main_description', {

                filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

            });

            CKFinder.setupCKEditor( editor, '../' );

        </script><br><br>
        <label for="title">Path:</label>
        <input type="text" name="path" value="<?php echo $row['path'];?>" required><br><br>
        <label for="title">PDF Link:</label>
        <input type="text" name="pdf_link" value="<?php echo $row['pdf_link'];?>" required><br><br>
        <label for="title">status:</label>
        <label class="switch">
            <input <?php if( $row['status'] == 1 ) {echo "checked"; echo ' value="1"';}?> type="checkbox" name="status" >
            <span class="slider round"></span>
        </label><br><br>  
        <label for="title">Publish Date:</label>
        <input type="text" class="datepicker" name="publish_date" value="<?php echo date('d-m-Y', strtotime($row['publish_date']));?>" required><br><br>    
        
        <br><br><button type="submit" name="update">Update Post</button>
    </form>

<script>
$(function(){
       //publish/unpublish
       jQuery(".slider.round").click(function() {

            if (jQuery("input[name='status']").is(":checked") == true) {

                jQuery("input[name='status']").val(0);
            } else {

                jQuery("input[name='status']").val(1);
            }
        }); 

        flatpickr('.datepicker', {						
            // put options here if your don't want to add them via data- attributes
                //enableTime: true,
                dateFormat: "d-m-Y"				
		});


});
</script>
</body>
</html>
