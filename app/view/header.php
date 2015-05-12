<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="fr"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="fr"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="fr"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="fr"> <!--<![endif]-->
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Great Page title</title>
	<meta name="description" content="">
	<meta name="AStien" content=" Retrogaming">
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- PT Sans -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

	<!-- Crete Roung -->
	<link href='http://fonts.googleapis.com/css?family=Crete+Round&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

	<!-- CSS
  ================================================== -->
  	<link rel="stylesheet" href="c<?php echo CSS ?>/reset.css">
	<link rel="stylesheet" href="<?php echo CSS ?>/base.css">
	<link rel="stylesheet" href="<?php echo CSS ?>/skeleton.css">
	<link rel="stylesheet" href="<?php echo CSS ?>/layout.css">
        <link href="<?php echo CSS ?>/style.css" rel="stylesheet" type="text/css" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
	<script type="text/javascript" src="<?php echo JS ?>/validate.js"></script>
	<script type="text/javascript" src="<?php echo JS ?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo JS ?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {
				$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
		});
	</script>

</head>

<body> 
	<header>			
		<nav>
			<div class='container'>
				<div class='five columns logo'>
					<a href='#'>Company Logo</a>
				</div>

				<div class='eleven columns'>
					<ul class='mainMenu'>
						<li><a href='index.html' title='Home'>Home</a></li>
						<li><a href='#' title='About us'>About us</a></li>
						<li><a href='#' title='Pricing'>Pricing</a></li>
						<li><a href='#' title='Blog'>Blog</a></li>
						<li><a href='#' title='Portfolio'>Portfolio</a></li>
						<li><a href='#' title='Contact'>Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>