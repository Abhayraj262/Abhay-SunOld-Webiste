<?php
$megamenu_services_per_column = 10;
$megamenu_services_column_count = 3;
$megamenu_services = [
  ['href' => 'https://sunconsultants.co.in/cdsco-registration-certification', 'label' => 'CDSCO Registration'],
  ['href' => 'https://sunconsultants.co.in/fmcs-certification-consultants', 'label' => 'BIS Mark (ISI license) for Foreign Manufactures'],
  ['href' => 'https://sunconsultants.co.in/isi-mark-registration-certification', 'label' => 'ISI MARK (BIS) for Indian Manufacturers'],
  ['href' => 'https://sunconsultants.co.in/epr-certification-consultants', 'label' => 'EPR Registration'],
  ['href' => 'https://sunconsultants.co.in/epr-certification-consultants', 'label' => 'Battery Waste Management'],
  ['href' => 'https://sunconsultants.co.in/lmpc-certification-consultants', 'label' => 'LMPC Registration'],
  ['href' => 'https://sunconsultants.co.in/plastic-waste-management-registration', 'label' => 'Plastic Waste Management'],
  ['href' => 'https://sunconsultants.co.in/legal-metrology-certification-consultants', 'label' => 'LEGAL METROLOGY'],
  ['href' => 'https://sunconsultants.co.in/bis-registration-certification', 'label' => 'BIS Certification'],
  ['href' => 'https://sunconsultants.co.in/bis-crs-registration-for-electronic', 'label' => 'CRS Registration (BIS)'],
  ['href' => 'https://sunconsultants.co.in/peso-certification-consultants', 'label' => 'PESO APPROVAL'],
  ['href' => 'https://sunconsultants.co.in/tec-certification-consultants', 'label' => 'TEC'],
  ['href' => 'https://sunconsultants.co.in/bis-scheme-x-certification-india', 'label' => 'BIS Scheme X Certification'],
  ['href' => 'https://sunconsultants.co.in/rohs-certification-consultants', 'label' => 'ROHS'],
  ['href' => 'https://sunconsultants.co.in/bee-registration-certification', 'label' => 'BEE'],
  ['href' => 'https://sunconsultants.co.in/ce-certification-consultants', 'label' => 'CE CERTIFICATION'],
  ['href' => 'https://sunconsultants.co.in/emi-emc-certification-consultants', 'label' => 'EMI/EMC'],
  ['href' => 'https://sunconsultants.co.in/cb-certification-consultants', 'label' => 'CB CERTIFICATION'],
  ['href' => 'https://sunconsultants.co.in/eta-certification-consultants', 'label' => 'WPC ETA'],
  ['href' => 'https://sunconsultants.co.in/wpc-certification-consultants', 'label' => 'WPC'],
  ['href' => 'https://sunconsultants.co.in/icat-certificate-india', 'label' => 'ICAT Certificate in India'],
  ['href' => 'https://sunconsultants.co.in/stqc-certificate-india', 'label' => 'STQC Certificate'],
];
$megamenu_max_cells = $megamenu_services_per_column * $megamenu_services_column_count;
$megamenu_items = array_slice($megamenu_services, 0, $megamenu_max_cells);
$megamenu_chunks = array_values(array_chunk($megamenu_items, $megamenu_services_per_column));
while (count($megamenu_chunks) < $megamenu_services_column_count) {
  $megamenu_chunks[] = [];
}
$megamenu_chunks = array_slice($megamenu_chunks, 0, $megamenu_services_column_count);
foreach ($megamenu_chunks as &$megamenu_col) {
  while (count($megamenu_col) < $megamenu_services_per_column) {
    $megamenu_col[] = null;
  }
}
unset($megamenu_col);
?>
<head>

  <meta name="robots" content="noindex, nofollow">

  <!-- Favicon
================================================== -->
  <link rel="icon" type="https://sunconsultants.co.in/image/png" href="img/logo/ll.webp">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://sunconsultants.co.in/plugins/bootstrap/bootstrap.min.css">
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
  <link rel="stylesheet" href="https://sunconsultants.co.in/css/style.css">
  
  
   <link href="https://sunconsultants.co.in/assets/img/ll.webp" rel="icon">
  <link href="https://sunconsultants.co.in/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!-- Vendor CSS Files -->
   <link href="https://sunconsultants.co.in/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://sunconsultants.co.in/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="https://sunconsultants.co.in/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="https://sunconsultants.co.in/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="https://sunconsultants.co.in/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
   <link rel="icon" type="image/png" href="https://sunconsultants.co.in/img/logo/ll.webp">

  <!-- Template Main CSS File -->
   <link href="https://sunconsultants.co.in/assets/css/main.css" rel="stylesheet">
  </head>

<section id="topbar" class="topbar d-flex align-items-center">
  <div class="container d-flex justify-content-between">
    <div class="mail-list text-center w-100">
      <span class="contact-info">
        info@sunconsultants.co.in | Mob:+91-9315973373
      </span>
    </div>
    <div class="social-links d-flex align-items-center">
      <a href="https://api.whatsapp.com/send?phone=9315973373" class="whatsapp" aria-label="WhatsApp">
        <i class="bi bi-whatsapp"></i>
      </a>
      <a href="tel:9315973373" class="Phone" aria-label="Call">
        <i class="bi bi-telephone-forward-fill"></i>
      </a>
    </div>
  </div>
</section>

 <!--<section id="topbar" class="topbar d-flex align-items-center">-->
 <!--   <div class="container d-flex justify-content-center justify-content-md-between">-->
 <!--       <div class="mail-list text-center alloff"><span style="margin-inline:1px;color: rgb(255, 255, 255);">-->
 <!--           info@sunconsultants.co.in | Mob: +91-9315973373, 7303745057 </span>-->
 <!--       </div>-->
 <!--     <div class="social-links d-none d-md-flex align-items-center">-->
 <!--       <a href="https://api.whatsapp.com/send?phone=9315973373" class="whatsapp"><i class="bi bi-whatsapp"></i></i></a>-->
 <!--       <a href="tel:9315973373" class="Phone"><i class="bi bi-telephone-forward-fill"></i></a>-->
 <!--     </div>-->
 <!--   </div>-->
 <!-- </section>-->
  <!-- End Top Bar -->
 <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="https://sunconsultants.co.in" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
       <div class="logo">
        <!-- <h3 style="font-weight: 700;
        margin-top: 7px;
        font-size: 33px;">Sun Consultants</h3> -->

       
 
      <img src="https://sunconsultants.co.in/assets/img/suncons.png" alt="logo" style="    height: 92px !important;margin-top: 9px !important;">

        <!-- <img src="file:///C:/Users/Dell/Desktop/test/Sun%20consultant/assets/img/logo.svg" alt=""> -->
       </div>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="https://sunconsultants.co.in">Home</a></li>
          <li class="dropdown"><a href="#"><span>ABOUT US</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul style="width: 350px;">
              <!--<li><i class="fa fa-angle-right" style="font-size:20px; margin-left: 10px; " ></i><a href="https://sunconsultants.co.in/audits" style="margin-top: -35px;-->
              <!--  margin-left: 10px;">Audits</a></li>-->
                 <li><i class="fa fa-angle-right" style="font-size:20px; margin-left: 10px; " ></i><a href="https://sunconsultants.co.in/exhibitions-and-seminar" style="margin-top: -35px;
                margin-left: 10px;">Exhibitions and Seminars </a></li>
              <li><i class="fa fa-angle-right" style="font-size:20px; margin-left: 10px;"></i><a href="https://sunconsultants.co.in/our-clients" style="margin-top: -35px;
                margin-left: 10px;">OUR CLIENTS</a></li>
                
              </ul>
         </li>


          <li class="dropdown megamenu"><a href="#"><span>SERVICES</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul class="megamenu-panel">
              <?php foreach ($megamenu_chunks as $megamenu_col) : ?>
                <li class="megamenu-panel__column">
                  <ul class="megamenu-panel__col">
                    <?php foreach ($megamenu_col as $megamenu_entry) : ?>
                      <?php if ($megamenu_entry === null) : ?>
                        <li class="megamenu-panel__cell--empty"><span class="megamenu-panel__placeholder" aria-hidden="true"></span></li>
                      <?php else : ?>
                        <li>
                          <a class="megamenu-panel__link" href="<?php echo htmlspecialchars($megamenu_entry['href'], ENT_QUOTES, 'UTF-8'); ?>">
                            <i class="fa fa-angle-right megamenu-panel__icon" aria-hidden="true"></i>
                            <span class="megamenu-panel__label"><?php echo htmlspecialchars($megamenu_entry['label'], ENT_QUOTES, 'UTF-8'); ?></span>
                          </a>
                        </li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
                </li>
              <?php endforeach; ?>
            </ul>
          </li>
          

              <li class="dropdown"><a href="#"><span>UPDATES</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul style="width: 270px;">
                  <li><i class="fa fa-angle-right" style="font-size:20px; margin-left: 10px; margin-top: 8px;"></i><a href="https://sunconsultants.co.in/latest-notifications"style="margin-top: -34px;
                    margin-left: 10px;">Latest Notifications</a></li>
                  <!--<li><i class="fa fa-angle-right" style="font-size:20px; margin-left: 10px; margin-top: 8px;"></i><a href="https://sunconsultants.co.in/"style="margin-top: -34px;-->
                  <!--  margin-left: 10px;">News and Updates  </a></li>-->
                  <!--<li><i class="fa fa-angle-right" style="font-size:20px; margin-left: 10px; margin-top: 8px;"></i><a href="https://sunconsultants.co.in/"style="margin-top: -34px;-->
                  <!--  margin-left: 10px;">Blogs </a></li>-->
                  </ul>
                  </li>
          <li><a href="https://sunconsultants.co.in/contact-us">CONTACT US</a></li>

          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          
          
          <li class="dropdown" id="8"><a href="#"><span>FAQ'S</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul style="width: 270px;">
              <li><i class="fa fa-angle-right" style="font-size:20px; margin-left: 10px; margin-top: 8px;"></i><a href="https://sunconsultants.co.in/bis-registration-certification" style="margin-top: -34px;
                margin-left: 20px;">BIS Licence</a></li>
              <li><i class="fa fa-angle-right" style="font-size:20px; margin-left: 10px; margin-top: 8px;"></i><a href="https://sunconsultants.co.in/bis-crs-registration-for-electronic" style="margin-top: -34px;
                margin-left: 20px;">BIS Registration </a></li>
              <li><i class="fa fa-angle-right" style="font-size:20px; margin-left: 10px; margin-top: 8px;"></i><a href="https://sunconsultants.co.in/cdsco-registration-certification" style="margin-top: -34px;
                margin-left: 20px;">CDSCO Licence </a></li>
              <li><i class="fa fa-angle-right" style="font-size:20px; margin-left: 10px; margin-top: 8px;"></i><a href="https://sunconsultants.co.in/cdsco-registration-certification" style="margin-top: -34px;
                margin-left: 20px;">CDSCO Registration  </a></li>
              <li><i class="fa fa-angle-right" style="font-size:20px; margin-left: 10px; margin-top: 8px;"></i><a href="https://sunconsultants.co.in/fmcs-certification-consultants" style="margin-top: -34px;
                margin-left: 20px;">Foreign Manufacturer BIS  </a></li>
              </ul>
              </li>
          <!--<li class="dropdown"><a href="https://sunconsultants.co.in/"><span>PAY</span> </a>-->
            <!-- <ul>
              <li><a href="#"></a></li>
              </ul>
        </ul> -->
        </li>
        </ul>
        
      </nav>
      <!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>
