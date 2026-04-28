<?php include('db.php');

function limit_words($string, $word_limit)
	{
		$words = explode(" ",$string);
		return implode(" ",array_splice($words,0,$word_limit));
	}

// Number of records per page
$limit = 25;

// Get the current page number from the request (default is 1)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for SQL query
$offset = ($page - 1) * $limit;

// Fetch data from the database
$sql = "SELECT * FROM notifications order by publish_date DESC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
            <div class="col-sm-12 col-lg-6">
                <div class="pdf-place">
                    <?php if( $row['pdf_link'] ){?>
                    <iframe class="embed-pdf-viewer pdf-hide-desk" src="<?php echo $row['pdf_link'];?>" frameborder="0"
                        style="width:100%;height:280px;" title="Acrylonitrilete"></iframe>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="pb-4 pt-4">
                    <div class="text-uppercase" style="color:#042d6a"><span><b>Published Date</b></span></div>
                    <div class="m-t5 l-n-span-line">
                        <span><?php echo date('d F Y', strtotime($row['publish_date']));?></span>
                    </div>
                </div>
                <a href="notifications/<?php echo $row['path'];?>">
                    <h5><?php echo $row['main_heading'];?></h5>
                </a>
                <div class="mb-2"><?php echo $row['short_description'];?></div>
                <div class=" justify-content-center" style="">
                    <a href="notifications/<?php echo $row['path'];?>">
                        <button class="l-r-btn btn-sm btn btn-primary text-capitalize">Read more <i
                                class="r-arrow fa fa-long-arrow-right" aria-hidden="true"></i></button> </a>
                </div>
            </div>
            <hr>

<?php  
    }
} else {
    // Return empty response if there is no more data
    echo '';
}

$conn->close();
?>