<?php

//Vars
$company_tel_opt = get_field('company_tel_opt', 'option');
$company_email_opt = get_field('company_email_opt', 'option');
$company_addr_opt = get_field('company_addr_opt', 'option');

?>
<section class="section">
	<div class="container">
		<div class="row">
			
			<div class="contact_box_wrapper col-3 wow fadeInUp">
				<h2><i class="fa fa-phone"> </i></h2>
				<a href="tel:<?php echo $company_tel_opt; ?>"><?php echo $company_tel_opt; ?></a>
			</div>
			<div class="contact_box_wrapper col-3 wow fadeInUp" data-wow-delay=".2s">
				<h2><i class="fa fa-map"> </i></h2>
				<?php echo $company_addr_opt; ?>
			</div>
			<div class="contact_box_wrapper col-3 wow fadeInUp" data-wow-delay=".4s">
				<h2><i class="fa fa-envelope"> </i></h2>
				<a href="mailto:<?php echo $company_email_opt; ?>"><?php echo $company_email_opt; ?></a>
			</div>

		</div>
	</div>
</section>