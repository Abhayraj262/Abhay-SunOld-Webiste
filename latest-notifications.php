<?php include('db.php'); ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* $servername = "localhost";
$username = "sungovind";
$password = "o=~wV+C4Zjl]"; // Enter your MySQL password
$dbname = "notification_sunconsultants";//"notification_sunconsultants";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} */


?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="https://schema.org/WebPage">

<head>

	<!-- SEO Meta Codes ================================================== -->
	<meta charSet="utf-8" />
	<title itemprop="name">Latest Notifications - Sunconsultants</title>
	<meta name="description" itemprop="description"
		content="PESO is established by the Government of India under Department for the Promotion of Industry and Internal Trade under the Ministry of Commerce and Industry." />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="author" content="Sun Consultants & Engineers" />
	<meta property="og:url" content="/latest-notifications" />
	<meta property="og:site_name" content="Sun Consultants &amp; Engineers" />
	<meta property="og:title" content="Sun Consultants & Engineers" />
	<meta property="og:description" content="Your Complete Certification partner" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="#" />
	<meta property="og:locale" content="en_IN" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@ConsultantsSun" />
	<meta name="twitter:title" content="Sun Consultants & Engineers" />
	<meta name="twitter:description" content="BIS ISI certification consultants in Delhi India" />
	<meta name="twitter:image" content="#" />
	<meta name="twitter:image:alt" content="Sun Consultants & Engineers" />


	<!-- Canonical Tag ====================================================-->
	<link rel="canonical" href="https://sunconsultants.co.in/latest-notifications" />
<<<<<<< HEAD
	<meta name="robots" content="index, follow">
=======
	<meta name="robots" content="noindex, nofollow">
>>>>>>> 41ce8a4de55d6ef8d16e7739310d8780e7467105
	<!-- Favicon ================================================== -->
	<link rel="icon" type="image/png" href="/assets/img/favicon.png">

	<!-- CSS ================================================== -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="plugins/animate-css/animate.css">
	<!-- slick Carousel -->
	<link rel="stylesheet" href="plugins/slick/slick.css">
	<link rel="stylesheet" href="plugins/slick/slick-theme.css">
	<!-- Colorbox -->
	<link rel="stylesheet" href="plugins/colorbox/colorbox.css">
	<!-- Template styles-->
	<link rel="stylesheet" href="css/style.css">
	<!-- stylefro.css -->
	<link rel="stylesheet" href="css/stylefro.css">
	<!--resposive  -->
	<link rel="stylesheet" href="resposive.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<script src="assets/js/main.js"></script>

	<!-- Google tag (gtag.js) Google Analytics tracking-->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163953232-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-163953232-1');
	</script>
	<style>
		/*.search-container {*/
		/*	margin-bottom: 20px;*/
		/*	width: 600px;*/
		/*	float: inline-end;*/
		/*}*/

	

		/*#searchBar {*/
		/*	width: 100%;*/
		/*	padding: 10px;*/
		/*	font-size: 16px;*/
		/*	border: 1px solid #ccc;*/
		/*	border-radius: 4px;*/
		/*}*/

		.list-group-item {
			font-size: 1rem;
		}

		.content-container {
			display: flex;
			flex-direction: column;
			gap: 10px;
		}

		#listGroup {
			position: absolute;
			z-index: 999;
		}

		h4 {
			font-size: 1.3rem;
		}

		.mb-2 {
			font-size: 17px !important;
		}

		.data_more_less_inner {
			overflow: hidden;
			margin-bottom: 20px;
			position: relative;
			/*max-height: 300px;*/
			/* Initial max height */
		}

		.action_less {
			display: none;
		}

		.less_active .action_less {
			display: inline-block;
		}

		.less_active .action_more {
			display: none;
		}

		.data_more_less:not(.less_active):not(.action_disabled) .data_more_less_inner::after {
			content: '';
			display: block;
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			height: 80px;
			background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
		}

		.data_more_less.action_disabled .more_less_action {
			display: none;
		}

		.btn:hover {
			background: #444;
			color: #fff;
		}

		.read_more {
			display: inline-block;
			margin-top: 10px;
			padding: 10px 20px;
			font-size: 17px;
			color: #fff;
			background-color: #007BFF;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		.btn:hover {
			background-color: #0056b3;
		}
		.l-n-search-d {
    padding: 15px 30px;
    width: 100%;
    outline: none;
    position: relative;
    border-radius: 100px;
    border: 1.3px solid #00796b;
    background: #f7f9fb;
    /* border: none; */
    box-shadow: 0 2px 5px 1px #cfcfcf63;
    /* box-shadow: 0 2px 8px 1px rgb(64 60 67 / 24%); */
    transition: .4s ease-in-out;
}
.l-search-icon {
    color: #fff;
    position: absolute;
    top: 0px;
    right: 21px;
    background: #00796b;
    width: 45px;
    height: 45px;
    text-align: center;
    border-radius: 50%;
    line-height: 45px;
    font-size: 20px;
    opacity: .7;
    transition: .4s ease-in-out;
    cursor: pointer;
    padding:14px 1px 0px 1px;
}
	</style>
</head>

<body>
	<div class="body-inner">
		<!--/ Topbar end -->
		<!-- Header start -->

		<div class="include-file">
			<?php include('include/nenu.php'); ?>
		</div>
		<!--/ Header end -->
		<div class="container-fluid">
			<div class="col-md-12 pt-3">
				<ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
					<li class="wow fadeInUp" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a
							itemprop="item" itemprop="name" href="/">
							<span itemprop="name">Home</span>
						</a>
						<meta itemprop="position" content="1" />
					</li>
					<li class="wow fadeInUp" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">/
						<span itemprop="name"> Latest Notifications </span>
						<meta itemprop="position" content="2" />
					</li>
				</ul>
			</div>
			<div class="data_more_less">
				<div class="data_more_less_inner" data-height="2300" data-increase-by="3000">
					<div class="data_more_less_body">
						<h1 class="h7 pt-4 text-center"> DRAFT QCO NOTIFICATION FOR MANDATORY BIS CERTIFICATION</h1>
						<div class="row">
							<div class="col-lg-12  col-sm-12 col-md-9 text-justify">
								<div class="imgpesa text-center"><img
										src="img/blog-notifi-/latest-entrance-exam-notifications.jpg"
										alt="Explosive Safety Organization" class="img-fluid"></div>
								<div class="border3d">

								</div>
							</div>
							<br>
							<!--<div class="col-sm-12 col-lg-12 pt-3">-->
							<!--	<div class="search-container">-->
							<!--		<input type="text" id="searchInput" placeholder="Search for QCO Notification.. " >-->
								
							<!--	</div>-->

							<!--</div>					-->
							
							<div class="col-md-7 m-auto mt-4">

								<input class="l-n-search-d" id="searchInput" type="text" placeholder="Search for Government Notification/QCO Updates" onkeypress="searchNotification();">
								<i class="l-search-icon fa fa-search"></i>
							</div>

							<div id="data-container" class="row mt-4">
								<!-- loading data -->
							</div>
							
							
						</div>
					</div>
				</div>

				<div class="col-sm-12 text-center">
				<button id="load-more" data-page="2">Load More</button>
				<!-- class="action_more more_less_action read_more" -->
				</div>			

			</div>
		</div>

	</div>
	<br>
	<!-------------footer id start on this  ----------------------------------->

	<div class="footer">
		<?php include('include/footer.php'); ?>
	</div>
	<!-- whatapps -->

	<!-- end -->
	<!-- Javascript Files
  ================================================== -->

	<!-- initialize jQuery Library -->
	<script src="/plugins/jQuery/jquery.min.js"></script>
	<!-- Bootstrap jQuery -->
	<script src="/plugins/bootstrap/bootstrap.min.js" defer></script>
	<!-- Slick Carousel -->
	<script src="/plugins/slick/slick.min.js"></script>
	<script src="/plugins/slick/slick-animation.min.js"></script>
	<!-- Color box -->
	<script src="/plugins/colorbox/jquery.colorbox.js"></script>
	<!-- shuffle -->
	<!--<script src="/plugins/shuffle/shuffle.min.js" defer></script>-->


	<!-- Google Map API Key-->
	<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>-->

	<!-- Google Map Plugin-->
	<!--<script src="plugins/google-map/map.js" defer></script>-->

	<script>
		let question = document.querySelectorAll(".question");

		question.forEach(question => {
			question.addEventListener("click", event => {
				const active = document.querySelector(".question.active");
				if (active && active !== question) {
					active.classList.toggle("active");
					active.nextElementSibling.style.maxHeight = 0;
				}
				question.classList.toggle("active");
				const answer = question.nextElementSibling;
				if (question.classList.contains("active")) {
					answer.style.maxHeight = answer.scrollHeight + "px";
				} else {
					answer.style.maxHeight = 0;
				}
			})
		})
	</script>
	<!-- --------from------------- -->
	<!-- Vendor JS Files -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>

		function actionMoreLess11() {
			var boxOuter = ".data_more_less",
				boxInner = ".data_more_less_inner",
				boxBody = ".data_more_less_body",
				showMore = $(".action_more"),
				showLess = $(".action_less");

			$(boxInner).each(function() {
				var $this = $(this),
					bodyDataH = $this.find(boxBody).height();
				$this.css("max-height", $this.data("height"));
				var $thisH = $this.height();

				if (bodyDataH > $thisH) {
					$this.closest(boxOuter).removeClass("action_disabled");
				} else {
					$this.closest(boxOuter).addClass("action_disabled");
				}
			});

			showMore.click(function(e) {
				e.preventDefault();
				var $this = $(this),
					boxInnerH = $this.closest(boxOuter).find(boxInner).height(),
					boxInnerUpdate = boxInnerH + $this.closest(boxOuter).find(boxInner).data("increase-by"),
					boxBodyH = $this.closest(boxOuter).find(boxBody).height();

				setTimeout(function() {
					if (boxBodyH > boxInnerUpdate) {
						$this.closest(boxOuter).removeClass("less_active").find(boxInner).css("max-height", boxInnerUpdate);
					} else {
						$this.closest(boxOuter).addClass("less_active").find(boxInner).css("max-height", "none");
					}
				}, 10);
			});

			showLess.click(function(e) {
				e.preventDefault();
				$(this).closest(boxOuter).removeClass("less_active").find(boxInner).css("max-height", $(this).closest(boxOuter).find(boxInner).data("height"));
			});
		}

		//actionMoreLess();
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", () => {
			// Call the display function to show only the first 4 items initially
			displayLimitedItems();
		});

		function displayLimitedItems() {
			const items = document.querySelectorAll("#listGroup li");

			// Initially hide all items
			items.forEach((item, index) => {
				if (index < 0) {
					item.style.display = "";
				} else {
					item.style.display = "none";
				}
			});
		}

		function filterItems() {
			const input = document.getElementById('searchInput').value.toLowerCase();
			const items = document.querySelectorAll('#listGroup li');
			let visibleCount = 0;

			items.forEach(item => {
				let text = item.textContent.toLowerCase();

				// If there's a match, show the item, otherwise hide it
				if (text.includes(input)) {
					item.style.display = "";
					visibleCount++;
				} else {
					item.style.display = "none";
				}
			});

			// If no search input, display the first 4 items
			if (input === "") {
				displayLimitedItems();
			}
		}

      
		$(document).ready(function() {

            // Load the first 10 records on page load
            loadData(1);

            // Load more data when the button is clicked
            $('#load-more').click(function() {
                var page = $(this).data('page'); // Get the current page number
                loadData(page); // Load data for the next page
                $(this).data('page', page + 1); // Increment the page number
            });

            function loadData(page) {
                $.ajax({
                    url: 'load-more', // PHP script to fetch data
                    type: 'GET',
                    data: { page: page }, // Pass the page number to the PHP file
                    success: function(response) {
                        if (response.trim() != "") {
                            $('#data-container').append(response); // Append the new data
                        } else {
                            $('#load-more').text("No more records").prop("disabled", true); // Disable button when no more data
                        }
                    }
                });
            }
        });	


	</script>

	<!-- Template custom -->
	<!--<script src="js/script.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
	</div><!-- Body inner end -->
	<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<!--  autocomplete search -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>	
<script>
		//autocomplete search
		$(document).on('keyup','#searchInput',function(){

			$.ajax({
                    url: 'search-data', // PHP script to fetch data
                    type: 'POST',
                    data: { search: $(this).val() }, // Pass the page number to the PHP file
                    success: function(response) {
                        if (response != "") {
							//console.log(response);
							var src = JSON.parse(response);

							$("#searchInput").autocomplete({
								//source: availableTags
								source: src,
								select: function( event, ui ) { 
									window.location.href = ui.item.value;
								}
							});	
                        } 
                    }
                });
		});
</script>
</body>

</html>