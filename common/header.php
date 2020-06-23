
<!DOCTYPE html>

<!--the header code that's loaded into every page-->
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>" xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  if (isset($title)) {
      $titleParts[] = strip_formatting($title);
  }
  $titleParts[] = option('site_title');
  ?>
  <title><?php echo implode(' &middot; ', $titleParts); ?></title>
	<meta charset="utf-8">
  <?php if ($description = option('description')): ?>
  <meta name="description" content="<?php echo $description; ?>" />
  <?php endif; ?>		<meta name="keywords" content="archives,collections,library,libraries,research tools, youth for climate, fridays for future, jeunes climat">

<!-- Custom CSS -->
  <?php echo auto_discovery_link_tags(); ?>

  <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>
  
  <link rel="stylesheet" type="text/css" href="/themes/omeka_theme/css/fonts.css" />
  <link rel="stylesheet" type="text/css" href="/themes/omeka_theme/css/cms4.0.min.css" />

<!-- Stylesheets -->
  <?php
  queue_css_file(array('iconfonts','style'));

  echo head_css();
  ?>


  <!-- JavaScripts -->
  <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
  <?php queue_js_file('vendor/respond'); ?>
  <?php queue_js_file('vendor/jquery-accessibleMegaMenu'); ?>
  <?php queue_js_file('berlin'); ?>
  <?php queue_js_file('globals'); ?>
  <?php echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>

<a href="#page-content" class="sr-only">Skip to main content</a>

<link href="/themes/omeka_theme/css/header.css" rel="stylesheet" type="text/css">
 
<div id="gvsu-cf_header" class="responsive" role="banner">
	<div id="gvsu-cf_header-inner">
       		<div id="gvsu-cf_header-logo">

           	<a href="/"><img src="https://youthforclimate.fr/wp-content/uploads/2019/06/Logo-Vert-Simple.png" alt="Logo Youth for Climate France"></a>

       		</div>
       
     	</div>
</div>
<!--Topmost navigation items-->
<div id="cms-header-wrapper" role="header">
<div id="cms-header">
		<div id="cms-header-inner">

		<a id="cms-navigation-toggle" href="cms-siteindex-index.htm" onclick="return cmsToggleMenu(document.getElementById('cms-navigation'))">

   		<h1><?php echo link_to_home_page(theme_logo()); ?></h1>
         	<div id="cms-navigation" class="cms-navigation" role="navigation">
             	<?php echo public_nav_main(); ?>
         	</div>

         	<div id="mobile-nav" role="navigation" aria-label="<?php echo __('Mobile Navigation'); ?>">
             	<?php echo public_nav_main(); ?>
         	</div>

        	<div id="gvsu-cf_header-search" role="search">
         	<!--the simple search form. --> 
           <?php echo search_form(); ?>

 
       		</div>
   			
   	</div>
   </div>
</div>
<!--Begin page body-->
<a name="page-content"></a>
	<div id="cms-body-wrapper">
		<div id="cms-body" role="main">
			<div id="cms-body-inner">
				<div id="cms-body-table">
					<div id="cms-content">

          
         <div class="cms-clear"></div>
