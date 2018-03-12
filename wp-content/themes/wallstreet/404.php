<?php get_header(); ?>
<!-- Page Title Section -->
<div class="page-mycarousel">
	<div class="page-title-col">
		<div class="container">
			<div class="row">
				<div class="page-header-title">
					<h1><?php _e('Error 404', 'wallstreet'); ?></h1>		
				</div>
			</div>	
		</div>
		<?php get_template_part('index', 'breadcrumb'); ?>
	</div>	
</div>
<!-- /Page Title Section -->
<div class="container">
	<div class="row">	
		<div class="col-md-12">
			<div class="error_404">
				<h2><?php _e('Error 404','wallstreet'); ?></h2>
				<h4><?php _e('Oops! Page not found','wallstreet'); ?></h4>
				<p><?php _e('We are sorry, but the page you are looking for does not exist.','wallstreet'); ?></p>
				<p><a href="<?php echo esc_url(site_url());?>" id="blogdetail_btn"><?php _e('Go Back','wallstreet'); ?></a></p>
			</div>
		</div>
	</div>
</div>
<!-- 404 Error Section -->
<?php get_footer(); ?>