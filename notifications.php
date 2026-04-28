<?php
include('notifications/admin/db.php');
$path = $_GET['path'];
$sql = "SELECT * FROM notifications WHERE path = '".$path."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 //echo "<pre>";
 //print_r($row);
 if(empty($row)) {
     
     header('Location:https://sunconsultants.co.in/404');
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- SEO Meta Codes ================================================== -->
  <meta charSet="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title itemprop="name"><?php echo $row['title'];?></title>
  <meta name="description" itemprop="description" content="<?php echo $row['description'];?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Sun Consultants & Engineers" />
  <meta property="og:url" content="https://sunconsultants.co.in/notifications/<?php echo $row['path'];?>" />
  <meta property="og:site_name" content="<?php echo $row['og_site_name'];?>" />
  <meta property="og:title" content="<?php echo $row['og_title'];?>"/>
  <meta property="og:description" content="<?php echo $row['og_description'];?>" />
  <meta property="og:type" content="Article" />
  <meta property="og:image" content="https://sunconsultants.co.in/<?php echo $row['pdf_link'];?>" />
  <meta property="og:locale" content="en_IN" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@ConsultantsSun" />
  <meta name="twitter:title" content="<?php echo $row['twitter_title'];?>" />
  <meta name="twitter:description" content="<?php echo $row['twitter_description'];?>" />
  <meta name="twitter:image" content="https://sunconsultants.co.in/<?php echo $row['pdf_link'];?>" />
  <meta name="twitter:image:alt" content="https://sunconsultants.co.in/<?php echo $row['pdf_link'];?>" />
  <meta name="keywords" content="<?php echo $row['keywords'];?>" />


  <!-- Canonical Tag ====================================================-->
  <link rel="canonical" href="https://sunconsultants.co.in/notifications/<?php echo $row['path'];?>" />
 <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
  
  <!-- Favicon ================================================== -->
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">

  <!-- CSS ================================================== -->

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/plugins/bootstrap/bootstrap.min.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://sunconsultants.co.in/plugins/fontawesome/css/all.min.css">
  <!-- Animation -->
  <link rel="stylesheet" href="https://sunconsultants.co.in/plugins/animate-css/animate.css">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="https://sunconsultants.co.in/plugins/slick/slick.css">
  <link rel="stylesheet" href="https://sunconsultants.co.in/plugins/slick/slick-theme.css">
  <!-- Colorbox -->
  <link rel="stylesheet" href="https://sunconsultants.co.in/plugins/colorbox/colorbox.css">
  <!-- Template styles-->
  <link rel="stylesheet" href="/css/style.css">
  <!-- stylefro.css -->
  <link rel="stylesheet" href="https://sunconsultants.co.in/css/stylefro.css">
  <!--resposive  -->
  <link rel="stylesheet" href="/resposive.css">
      <!-- Google tag (gtag.js) Google Analytics tracking-->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163953232-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-163953232-1');
</script>
<style>  

 h1{font-weight: 600!important;
    font-size: 1.7rem!important}
    
    strong {
    font-weight: 600!important}
}
body{font-family: arial;}
  .border3d  ul li{list-style-type:none;}
  span {
    display: inline !important;
    text-decoration: none;
    color: inherit;
    font-size: 16px!important;
    line-height: 1.42857143!important;
}
.form-bg {
    position: fixed;
    margin-top: 0%!important;
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
    <!---body---------------------------------------------->
    <div class="container-fluid">
    
   <div class="row">
        <div class="col-lg-9  col-sm-12 col-md-9  pt-4">
        <div class="col-md-6 pt-4">
          <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
            <!-- First Breadcrumb Item -->
            <li class="wow fadeInUp" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <a itemprop="item" href="/">
                <span itemprop="name">Home</span> <!-- Define the name here -->
              </a>
              <meta itemprop="position" content="1" />
            </li>
        
            <!-- Second Breadcrumb Item -->
            <li class="wow fadeInUp" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name">Notification</span> <!-- Define the name here -->
              <meta itemprop="position" content="2" />
            </li>
          </ul>
        </div>
          <div class="border3d">
            <div class="date-time text-center">
              <h1><?php echo $row['main_heading'];?></h1>
             
               <p style="border-bottom: inset;">  <b>  Date:</b> <?php echo date('d F Y', strtotime($row['publish_date']));?> <span><b>Place:</b>  New Delhi </span> </p>
            </div>
            <p class="h7 text-center"> REGULATORY COMPLIANCE</p>
            <p>
            <?php echo $row['main_description'];?>
		       </p>
		         
		  <div class="pdf-place">
		<iframe class="embed-pdf-viewer pdf-hide-desk"
		src="https://sunconsultants.co.in/<?php echo $row['pdf_link'];?>" 
		frameborder="0" style="width:100%;height:500px;" title="Acrylonitrilete"></iframe>
		  </div>
      <p>
       
      </p>
          </div>
        </div>
     
        <!-- secand-pdf -->
 
     <?php include('notifications/include/form_side.php'); ?>
      
      </div>
    </div>  
  <!-------------footer id start on this  ----------------------------------->
  
  
  
   <!-------------footer id start on this  ------------------>

   <div class="footer">
      <?php include('include/footer.php'); ?>
    </div>
    <!-- whatapps -->

    <div class="whatsapps">
      <?php include('include/whatsapps.php'); ?>
    </div>
    <!-- popup -->
    <div class="popup">
      <?php include('include/popup.php'); ?>
    </div>
    <!-- end -->
    <!-- Footer end -->
  <!-- <script src="https://sunconsultants.co.in/assets/vendor/purecounter/purecounter_vanilla.js"></script>-->
  <!--<script src="https://sunconsultants.co.in/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
  <!--<script src="https://sunconsultants.co.in/assets/vendor/glightbox/js/glightbox.min.js"></script>-->
  <!--<script src="https://sunconsultants.co.in/assets/vendor/swiper/swiper-bundle.min.js"></script>-->
  <!--<script src="https://sunconsultants.co.in/assets/vendor/php-email-form/validate.js"></script>-->
  <!--<script src="https://sunconsultants.co.in/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>-->
 <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>


  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <!--<script src="https://sunconsultants.co.in/plugins/jQuery/jquery.min.js"></script>-->
  <!-- Bootstrap jQuery -->
  <script src="https://sunconsultants.co.in/plugins/bootstrap/bootstrap.min.js" defer></script>
  <!-- Slick Carousel -->
  <!--<script src="https://sunconsultants.co.in/plugins/slick/slick.min.js"></script>-->
  <!--<script src="https://sunconsultants.co.in/plugins/slick/slick-animation.min.js"></script>-->
  <!-- Color box -->
  <!--<script src="https://sunconsultants.co.in/plugins/colorbox/jquery.colorbox.js"></script>-->
  <!-- shuffle -->
  <!--<script src="https://sunconsultants.co.in/plugins/shuffle/shuffle.min.js" defer></script>-->


  <!-- Google Map API Key-->
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>-->

  <!-- Google Map Plugin-->
  <!--<script src="/https://sunconsultants.co.in/plugins/google-map/map.js" defer></script>-->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://sunconsultants.co.in/assets/js/main.js"></script>

 <script>
    $(document).ready(function () {
      $(window).bind('scroll', function () {
        var navHeight = $(window).height() - 300;
        if ($(window).scrollTop() > navHeight) {
          $('scroll').addClass('fixed1');
        }
        else {
          $('scroll').removeClass('fixed1');
        }
      });
    });
  </script>
  <script>let question = document.querySelectorAll(".question");

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
  <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "ItemList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1
      // Missing name or item.name
    },
    {
      "@type": "ListItem",
      "position": 2
      // Missing name or item.name
    }
  ]
}
</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "ItemList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Item 1"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Item 2"
    }
  ]
}
</script>


 
  <!-- --------from------------- -->


  <!-- Template custom -->
  <!--<script src="https://sunconsultants.co.in/js/script.js"></script>-->

  </div><!-- Body inner end -->

</body>

</html>