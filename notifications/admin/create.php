<style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
    color: #333;
    line-height: 1.6;
}

h2 {
    text-align: center;
    margin-top: 20px;
    color: #5a5a5a;
}

form {
    max-width: 800px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

form input[type="text"],
form textarea,
form .datepicker {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

form textarea {
    resize: vertical;
}

form button {
    display: block;
    width: 100%;
    background-color: #007bff;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #0056b3;
}

.switch {
    display: inline-block;
    position: relative;
    width: 40px;
    height: 20px;
    margin-top: 5px;
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
    transition: 0.4s;
    border-radius: 20px;
}

.slider:before {
    position: absolute;
    content: '';
    height: 14px;
    width: 14px;
    border-radius: 50%;
    background-color: white;
    transition: 0.4s;
    top: 3px;
    left: 3px;
}

input:checked + .slider {
    background-color: #28a745;
}

input:checked + .slider:before {
    transform: translateX(20px);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #007bff;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #f1f1f1;
}

</style>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('db.php'); 
include('check_login.php'); 
?>
<?php
if (isset($_POST['submit'])) {
    
    $title = $_POST['title'];
     $og_title = $_POST['og_title'];
     $twitter_title = $_POST['twitter_title'];
     $description = addslashes($_POST['description']);
     $og_description = addslashes($_POST['og_description']);
     $twitter_description = addslashes($_POST['twitter_description']);
     $keywords = $_POST['keywords'];
     $og_url = $_POST['og_url'];
     $twitter_site = $_POST['twitter_site'];
  
    $main_heading = $_POST['main_heading'];
    $short_description = $_POST['short_description'];
    $main_description = addslashes($_POST['main_description']);
    $path = $_POST['path'];
    $pdf_link = $_POST['pdf_link'];
    $status = $_POST['status'];
    $publish_date = date('Y-m-d', strtotime($_POST['publish_date']));
   

    // $twitter_image = "";
    // if(  isset($_FILES['twitter_image']['name']) ){

    //     // banner upload code  
    //     $twitter_image= $_FILES['twitter_image']['name'];	
    //     $tmpp = $_FILES['twitter_image']['tmp_name'];
        
    //     if( $twitter_image ){
            
    //         $page_thumbimage = time().str_replace(" ","_",@basename($twitter_image));
    //         $target_path_original="uploads/";					
    //         $target_path_original = $target_path_original.$page_thumbimage;					
    //         move_uploaded_file($tmpp,$target_path_original);		
            
    //         $twitter_image = $page_thumbimage;
    //     }
    // }

    $sql = "INSERT INTO notifications (
        title, 
        keywords,
        description,
        og_url,
       
        og_title,
        og_description,
      
        twitter_site,
        twitter_title,
        twitter_description,
      
        main_heading,
        short_description,
        main_description,
        path,
        pdf_link,
        status,
        publish_date) VALUES (
        '$title', 
        '$keywords',
        '$description',
        '$og_url',
       
        '$og_title',
        '$og_description',
       
        '$twitter_site',
        '$twitter_title',
        '$twitter_description',
       
        '$main_heading',
        '$short_description',
        '$main_description',
        '$path',
        '$pdf_link',
        '$status',
        '$publish_date'
        )";

       // echo $sql;

    if ($conn->query($sql) === TRUE) {
        echo "New post created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Create Post</title>
    <!-- <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css"> -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- flatpickr CSS and javascript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--CKEditor CKFinder js-->
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
    <link href="/assets/css/main.css" rel="stylesheet">
</head>

<body>

    <h2>Create a New Post</h2>

    <form method="POST" enctype="multipart/form-data">
         <label for="title">Main Heading:</label>
        <input type="text" name="main_heading" required><br><br>
         <label for="title">Title:</label>
        <input type="text" name="title" ><br><br>
         <label for="title">OG Title:</label>
        <input type="text" name="og_title" ><br><br>
         <label for="title">Twitter Title:</label>
        <input type="text" name="twitter_title" ><br><br>
         <label for="title">Description:</label>
        <input type="text" name="description" ><br><br>
        <label for="title">OG Description:</label>
        <input type="text" name="og_description" ><br><br> 
          <label for="title">Twitter Description:</label>
        <input type="text" name="twitter_description" ><br><br>
        
        <label for="title">keywords:</label>
        <input type="text" name="keywords" ><br><br>
       
        <label for="title">Twitter Site:</label>
        <input type="text" name="twitter_site" ><br><br>
       
        <br>
        <label for="title">OG url:</label>
        <input type="text" name="og_url" ><br><br>
        
        
        
        <!-- <label for="title">Twitter Image:</label>
        <input type="file" name="twitter_image" accept=".png, .jpg, .jpeg .webp" required><br><br> -->
        
       
         <label for="title">Short Description:</label>
        <input type="text" name="short_description" ><br><br>
        <label for="title">Main Description:</label>
        <textarea name="main_description" id="main_description" rows="10" cols="50"></textarea>
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

        </script>
        <br><br>
        <label for="title">Path:</label>
        <input type="text" name="path" required><br><br>
        <label for="title">PDF Link:</label>
        <input type="text" name="pdf_link" required><br><br>
        <label for="title">status:</label>
        <label class="switch">
            <input checked  type="checkbox" name="status" value="1">
            <span class="slider round"></span>
        </label><br><br>  
        <label for="title">Publish Date:</label>
        <input type="text" class="datepicker" name="publish_date" required><br><br>    
        
        <br><br><button type="submit" name="submit">Create Post</button>
    </form>
    
<!-- A friendly reminder to run on a server, remove this during the integration. -->
<script>
window.onload = function() {
    if (window.location.protocol === "file:") {
        alert("This sample requires an HTTP server. Please serve this file with a web server.");
    }
};
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