<?php
require_once __DIR__ . '/nav-services-helpers.php';

$nav_services_items = require __DIR__ . '/nav-services-data.php';
if (!is_array($nav_services_items)) {
    $nav_services_items = [];
}

$nav_services_items = array_values(array_filter($nav_services_items, static function ($row): bool {
    return is_array($row)
        && isset($row['slug'], $row['title'])
        && trim((string) $row['slug']) !== ''
        && trim((string) $row['title']) !== '';
}));
?>

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


          <li class="dropdown nav-services">
            <a href="#" class="nav-services-toggle" id="nav-services-trigger" aria-expanded="false" aria-haspopup="true" aria-controls="nav-services-panel" role="button">
              <span>SERVICES</span>
              <i class="bi bi-chevron-down dropdown-indicator" aria-hidden="true"></i>
            </a>
            <ul id="nav-services-panel" class="nav-services-panel" role="menu" aria-labelledby="nav-services-trigger">
              <?php foreach ($nav_services_items as $nav_service_row) :
                  $href = nav_services_resolve_href((string) ($nav_service_row['slug'] ?? ''));
                  $href_esc = htmlspecialchars($href, ENT_QUOTES, 'UTF-8');
                  $title_esc = htmlspecialchars((string) ($nav_service_row['title'] ?? ''), ENT_QUOTES, 'UTF-8');
                  ?>
                  <li role="none"><a role="menuitem" class="nav-services-panel__link" href="<?= $href_esc ?>"><?= $title_esc ?></a></li>
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
        </ul>
        
      </nav>
      <!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>
<script defer src="js/nav-services-dropdown.js"></script>
