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
<!-- End Top Bar -->

<header id="header" class="header d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="index.php" class="logo d-flex align-items-center">
      <img src="assets/img/suncons.png" alt="Sun Consultants logo" class="navbar-logo-img">
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="index.php">Home</a></li>

        <li class="dropdown">
          <a href="#"><span>ABOUT US</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="exhibitions-and-seminar.php"><i class="bi bi-chevron-right"></i> Exhibitions and Seminars</a></li>
            <li><a href="our-clients.php"><i class="bi bi-chevron-right"></i> Our Clients</a></li>
          </ul>
        </li>

        <li class="dropdown nav-services">
          <a href="#" class="nav-services-toggle" id="nav-services-trigger" aria-expanded="false" aria-haspopup="true" aria-controls="nav-services-panel" role="button">
            <span>SERVICES</span>
            <i class="bi bi-chevron-down dropdown-indicator" aria-hidden="true"></i>
          </a>
          <ul id="nav-services-panel" class="nav-services-panel" role="menu" aria-labelledby="nav-services-trigger">
            <?php foreach ($nav_services_items as $nav_service_row) :
                $slug = (string) ($nav_service_row['slug'] ?? '');
                $custom_url = trim((string) ($nav_service_row['url'] ?? ''));
                if ($custom_url !== '') {
                    $href = $custom_url;
                } else {
                    $href = nav_services_resolve_href($slug);
                }
                $href_esc = htmlspecialchars($href, ENT_QUOTES, 'UTF-8');
                $title_esc = htmlspecialchars((string) ($nav_service_row['title'] ?? ''), ENT_QUOTES, 'UTF-8');
                ?>
                <li role="none"><a role="menuitem" class="nav-services-panel__link" href="<?= $href_esc ?>"><?= $title_esc ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#"><span>UPDATES</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="latest-notifications.php"><i class="bi bi-chevron-right"></i> Latest Notifications</a></li>
          </ul>
        </li>

        <li><a href="contact-us.php">CONTACT US</a></li>

        <li class="dropdown">
          <a href="#"><span>FAQ'S</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="bis-registration-certification.php"><i class="bi bi-chevron-right"></i> BIS Licence</a></li>
            <li><a href="bis-crs-registration-for-electronic.php"><i class="bi bi-chevron-right"></i> BIS Registration</a></li>
            <li><a href="cdsco-registration-certification.php"><i class="bi bi-chevron-right"></i> CDSCO Licence</a></li>
            <li><a href="cdsco-registration-certification.php"><i class="bi bi-chevron-right"></i> CDSCO Registration</a></li>
            <li><a href="fmcs-certification-consultants.php"><i class="bi bi-chevron-right"></i> Foreign Manufacturer BIS</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- .navbar -->

    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
  </div>
</header>
<script defer src="js/nav-services-dropdown.js"></script>
