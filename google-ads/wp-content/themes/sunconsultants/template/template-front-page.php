<?php
/**
* Template Name: Landing Page
*
* @package sunconsultants
*/
?>
<div class="wrapper">
    <div class="main-container">

        <!-- header part -->
        <?php
			get_header('landingpage');
		 ?>

        <!-- main part -->
        <div class="main-content">
			<section class="landing-page-banner-section">
				<div class="bg-image-slider">
					<div class="bg-img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/landing-page-banner.jpg" alt="Landing Page Banner"/>
					</div>
				</div>
				<div class="container">
					<div class="landing-page-banner-row">
						<div class="landing-page-banner-content">
							<div class="landing-page-banner-slider">
								<div class="banner-item">
									<h1 class="h1">India's <span> #1 CDSCO</span> Registration Consultants</h1>
									<div class="sub-title">
										<p>100% Assistance With Dependable CDSCO Registration For Medical Device Fraternity</p>
									</div>
									<div class="small-title">
										Not just CDSCO, we assist you with:
										<p>Certification & Licensing under the various Schemes under Govt. of India</p>
									</div>
									<div class="btn-wrapper">
										<a id="cdsco-whatsup-number" href="https://wa.me/7303745057" target="_blank" class="btn" title="Let's Talk">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.svg" alt="Whatsapp">
											+91-73037 45057 
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="landing-page-banner-form">
							<div class="form-wrapper">
								<div class="form-detail">
									<h2 class="h2">Looking For A CDSCO Consultant? Let’s Talk.
									</h2>
									<p>Please Fill Out The Form Below To Get Started
									</p>
								</div>
								<?php echo do_shortcode('[contact-form-7 id="8" title="CDSCO Consultant"]'); ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="certification-section section-padding">
				<div class="icon-svg">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-vector.svg" alt="icon-svg">
				</div>
				<div class="certification-block">
					<h2 class="h2">Hassle-Free CDSCO Certification for All Medical Device Importers & Manufacturers</h2>
					<div class="medical-devices-block">
						<div class="left-part">
							<p> Sun Consultants is a trusted medical devices consultant offering research, regulatory, communication and product development services, with over a decade of experience. </p>
						<p><strong> Get Expert Medical Device Consultation From Sun Consultants Today! </strong></p>
						<p>Our Medical Device consulting services are ideal for all types and all classes of medical devices<br>
							( Class A,B,C and D )</p>
						</div>
						<div class="devices-block treatment-block">
							<div class="block">
								<div class="image-part">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/img-1.jpg" alt="Syringe">
								</div>
								<h6 class="h6">Syringe</h6>
							</div>
							<div class="block">
								<div class="image-part">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/img-2.jpg" alt="Blood Pressure Monitor">
								</div>
								<h6 class="h6">blood pressure monitor</h6>
							</div>
							<div class="block">
								<div class="image-part">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/img-3.jpg" alt="Blood glucose meter">
								</div>
								<h6 class="h6">Blood glucose meter</h6>
							</div>
							<div class="block">
								<div class="image-part">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/img-1.jpg" alt="Syringe">
								</div>
								<h6 class="h6">Syringe</h6>
							</div>
							<div class="block">
								<div class="image-part">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/img-3.jpg" alt="Blood glucose meter">
								</div>
								<h6 class="h6">Blood glucose meter</h6>
							</div>
						</div>    
					</div>        
				</div>
			</section>
			<section class="medical-device-section section-padding">
				<div class="container">
					<div class="title-text-wrap">
						<h2 class="h2">Medical Device Registration Is Now Easier Than You Thought!</h2>
						<p>From medical device registration to obtaining a CDSCO certificate, our holistic medical device
							consultancy services ensure you meet all the regulatory requirements and secure necessary licences &
							certifications for a swift launch.</p>
					</div>
					<div class="image-text-wrap">
						<div class="image-wrap">
							<img class="demo-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/img-vector.png" alt="Sub Image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/medical-device-banner.jpg" alt="Medical Device Banner">
						</div>
						<div class="listing-wrap">
							<p>With Us, You Get</p>
							<ul>
								<li>Dedicated & Compassionate Technical Experts</li>
								<li>Fluency In Regulatory Requirements</li>
								<li>Coherent Implementation Skills</li>
								<li>Serve Clients Around The World</li>
							</ul>
							<p>Why Choose Us</p>
							<ul>
								<li>Safeguard Regulatory Compliance For Your Medical Devices.</li>
								<li>Launch Your Medical Device With Confidence</li>
								<li>Manufacture Cost-Effective Products</li>
								<li>Meet Technology & Regulatory Compliance Challenges</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<section class="licence-process-section section-padding">
				<div class="container">
					<div class="title-wrapper">
						<h2 class="h2 text-center">
							How Sun Consultants helps you with CDSCO Licence
						</h2>
					</div>
					<div class="licence-process-row">
						<div class="licence-process-col yellow-circle">
							<div class="licence-process-col-inner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/briefing-documents.svg)">
								<div class="img-block">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/briefing-documents-ic.svg" alt="Briefing of requisite documents">
								</div>
								<div class="process-title">Briefing of requisite documents</div>
							</div>
						</div>
						<div class="licence-process-col red-circle">
							<div class="licence-process-col-inner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/documents-screening.svg)">
								<div class="img-block">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/documents-screening-ic.svg" alt="Documents Screening & Vetting">
								</div>
								<div class="process-title">Documents Screening & Vetting</div>
							</div>
						</div>
						<div class="licence-process-col yellow-circle">
							<div class="licence-process-col-inner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/application-submission.svg)">
								<div class="img-block">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/application-submission-ic.svg" alt="Application submission">
								</div>
								<div class="process-title">Application submission</div>
							</div>
						</div>
						<div class="licence-process-col red-circle">
							<div class="licence-process-col-inner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/query-clarification.svg)">
								<div class="img-block">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/query-clarification-ic.svg" alt="Query Clarification (if any)">
								</div>
								<div class="process-title">Query Clarification (if any)</div>
							</div>
						</div>
						<div class="licence-process-col yellow-circle">
							<div class="licence-process-col-inner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/grant-licence.svg)">
								<div class="img-block">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/grant-licence-ic.svg" alt="Grant of licence">
								</div>
								<div class="process-title">Grant of licence</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="client-testimonials section-padding">
				<div class="container">
					<h2 class="h2 text-center">Client Testimonials</h2>
					<div class="testimonial-row">
						<div class="testimonial-box-wrap">
							<div class="testimonial-box">
								<p>With the help of Sun Consultants, we were able to secure a CDSCO licence for our dialysis machine. They were knowledgeable, compassionate, and prompt throughout the entire process of licence acquisition.</p>
								<h3 class="h4">~ Sam Sebastien</h3>
								<span class="t-position"><b>Regional Head </b>(Giant Surgicals Pvt. Ltd)</span>
								<div class="testimonial-quote"><span></span></div>
							</div>
						</div>
						<div class="testimonial-box-wrap">
							<div class="testimonial-box">
								<p>We have been involved with Sun Consultants for a while now. Their team of CDSCO experts know what they are doing and are proficient in acquiring legal documents. We look forward to continuing working with them! Earlier, for BIS registration services and CDSCO certification of our glucose monitor.</p>
								<h3 class="h4">~ Kajal Raheja</h3>
								<span class="t-position"><b>Director </b>(Jiva Cosmetics)</span>
								<div class="testimonial-quote"><span></span></div>
							</div>
						</div>
						<div class="testimonial-box-wrap">
							<div class="testimonial-box">
								<p>We highly recommend Sun Consultants for all your medical device registration needs. They have an excellent grasp of CDSCO online registration and certificate acquisition. They have a team of CDSCO experts who communicate and coordinate promptly and keep things transparent.</p>
								<h3 class="h4">~ Pratik Lodha</h3>
								<span class="t-position"><b>Vice President </b>(Pesca Pharmaceuticals)</span>
								<div class="testimonial-quote"><span></span></div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="faq-sectoion section-padding">
				<div class="container">
					<h2 class="h2 text-center">Frequently Asked Questions</h2>
					<div class="faq-accordion">
						<ul class="accordion">
							<li>
								<div class="accord-question">
									<h3 class="h3">Why is CDSCO registration required?</h3>
								</div>
								<div class="accord-answer">
									<p>Through Medical Device Rules 2017, all types of medical devices are regulated, either being manufacturer in India or being imported. Therefore, all manufacturers and importers have to adhere to the guidelines and take licence or registration whichever is applicable as per the class distinction of their products.</p>
								</div>
							</li>
							<li>
								<div class="accord-question">
									<h3 class="h3">How do I register my medical device on CDSCO?</h3>
								</div>
								<div class="accord-answer">
									<p>You can register your medical device using the online CDSCO portal. Remember that registration is only applicable to medical devices classified under class A (non-measuring and non-sterilized). However, if you have a product under class A that measures something or is sterilised; you will need to obtain a licence, and all types of medical devices under class B,C and D also require licence.</p>
								</div>
							</li>
							<li>
								<div class="accord-question">
									<h3 class="h3">How do I get a CDSCO certificate?</h3>
								</div>
								<div class="accord-answer">
									<p>We begin by determining the class (A, B, C, or D) that your product falls under and the requisite documents to obtain CDSCO certification. The next step is to fill out the application and resolve queries (if any). If you are an Indian manufacturer, you may need to audit the firm before obtaining a CDSCO certificate.</p>
								</div>
							</li>
							<li>
								<div class="accord-question">
									<h3 class="h3">How Sun Consultants will help you acquire CDSCO certification?</h3>
								</div>
								<div class="accord-answer">
									<p>We provide complete hand holding right from the start of the certification process till the licence is granted, this includes, classification of products, preparation of documents, filing of application, clearing of queries and grant of licence. </p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</section>
        </div>
    </div>
	<?php
		get_footer('landingpage');
	?>
</div>

