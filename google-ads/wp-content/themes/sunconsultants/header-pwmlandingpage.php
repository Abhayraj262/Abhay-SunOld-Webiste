<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sunconsultants
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MX63X9G');</script>
	<!-- End Google Tag Manager -->
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11171968373"></script>

	<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11171968373');
</script>
<script>
  if (window.location.pathname === "/google-ads/epr-certification/") { 
    document.addEventListener('click', function(e) {
      if (e.target.matches('a[href*="https://wa.me/9315973373"]')) {
        gtag('event', 'conversion', {
          'send_to': 'AW-11171968373/EhiaCJGbutMZEPXqms8p'
        });
      }
    });
  }
</script>
</head>

<body <?php body_class(); ?>>
  
<script>
  window.addEventListener('load', function() {

    if (window.location.href.includes('/bis-certification-consultants')) {
      jQuery('body').on('mousedown', '[href*="tel:"]', function() {
        gtag('event', 'conversion', {
          'send_to': 'AW-11171968373/JXwBCIverdEZEPXqms8p'
        });
      })
    }

    if (window.location.href.includes('/bis-certification-consultants')) {
      jQuery('body').on('mousedown', '[href*="mailto:"]', function() {
        gtag('event', 'conversion', {
          'send_to': 'AW-11171968373/_EMZCJHerdEZEPXqms8p'
        });
      })
    }

    if (window.location.href.includes('/epr-certification')) {
      jQuery('body').on('mousedown', '[href*="tel:"]', function() {
        gtag('event', 'conversion', {
          'send_to': 'AW-11171968373/3Vb4CI7erdEZEPXqms8p'
        });
      })
    }

    if (window.location.href.includes('/epr-certification')) {
      jQuery('body').on('mousedown', '[href*="mailto:"]', function() {
        gtag('event', 'conversion', {
          'send_to': 'AW-11171968373/XGIUCJTerdEZEPXqms8p'
        });
      })
    }

  });

</script>	
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MX63X9G"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="header-wrap">
				<div class="logo-wrap">
					<a href="https://sunconsultants.co.in" title="Sun Consultants"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sun-header-logo.svg" alt="Sun Consultants"></a>
				</div>
				<div class="right-part-section">
					<div class="icon-text-section">
						<div class="icon-wrap">
							<a id="lmpc-header-mobile-ic" href="tel:+919315973373" title="+91-9315973373">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mob-icon.png" alt="mob-icon">
							</a>	
						</div>
						<div class="text-wrap">
							<p>Have a question?</p>
							<a id="lmpc-header-mobile" href="tel:+919315973373" title="+91-9315973373">+91-9315973373</a>
						</div>
					</div>
					<div class="icon-text-section">
						<div class="icon-wrap">
							<a id="lmpc-header-email-ic" href="mailto:info@sunconsultants.co.in" title="info@sunconsultants.co.in">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mail-icon.png" alt="mail-icon">
						</a>
						</div>
						<div class="text-wrap">
							<p>Contact us at</p>
							<a id="lmpc-header-email" href="mailto:info@sunconsultants.co.in" title="info@sunconsultants.co.in">info@sunconsultants.co.in</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
