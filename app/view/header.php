<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="fr"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="fr"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="fr"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="fr"> <!--<![endif]-->
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php echo $PageTitle; ?></title>
	<meta name="description" content="">
	<meta name="Astien" content=" Retrogaming">
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- PT Sans -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

	<!-- Crete Roung -->
	<link href='http://fonts.googleapis.com/css?family=Crete+Round&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo BASE ?>/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo BASE ?>/favicon.ico" type="image/x-icon">
        
	<!-- CSS
  ================================================== -->
  	<link rel="stylesheet" href="<?php echo CSS ?>/reset.css" type="text/css">
	<link rel="stylesheet" href="<?php echo CSS ?>/base.css" type="text/css">
	<link rel="stylesheet" href="<?php echo CSS ?>/skeleton.css" type="text/css">
	<link rel="stylesheet" href="<?php echo CSS ?>/layout.css" type="text/css">
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

<body <?php if(isset($error404)){echo 'class="error404_body"';} ?>> 
	<header>			
		<nav>
			<div class='container'>
				<div class='seven columns logo'>
                                    <a href='<?php echo BASE ?>'>
                                        <img id="logo_header" src="<?php echo IMG ?>/header/MegaPika.gif" alt="MegaRetrogaming"/>
                                        <img id="title_header" src="<?php echo IMG ?>/header/title.png" alt="MegaRetrogaming"/>
                                    </a>
				</div>

				<div id='menu_header' class='nine columns'>
					<ul class='mainMenu'>
						<li><a href='<?php echo BASE ?>' title='Accueil'>Accueil</a></li>
						<li><a href='<?php echo BASE ?>consulter-les-annonces' title='Consulter les annonces'>Consulter les annonces</a></li>
						<li><a href='<?php echo BASE ?>deposer-une-annonce' title='Déposer une annonce'>Déposer une annonce</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
        	<div class='container'>