<?php /* Smarty version Smarty-3.1.19, created on 2014-10-28 21:28:48
         compiled from "/Applications/AMPPS/www/stream/v1.0/frontend/tpl/smarty_t/home/home.html" */ ?>
<?php /*%%SmartyHeaderCode:566300778544ffc802e2e97-81109089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db51cbd79b6e20e0def309e828da926ceffb79a1' => 
    array (
      0 => '/Applications/AMPPS/www/stream/v1.0/frontend/tpl/smarty_t/home/home.html',
      1 => 1414528124,
      2 => 'file',
    ),
    '299805cb9dca5b4ec7b5fb34604fce86d367f6ea' => 
    array (
      0 => '/Applications/AMPPS/www/stream/v1.0/frontend/tpl/smarty_t/layout/master.html',
      1 => 1414416459,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '566300778544ffc802e2e97-81109089',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_544ffc8036c896_85789028',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ffc8036c896_85789028')) {function content_544ffc8036c896_85789028($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SWYO | PC Game @ Browser</title>

    <!-- ### BOOTSTRAP ### -->
    <link href="<?php echo vendor_url('bootstrap/3.2.0/css/bootstrap.min.css');?>
" rel="stylesheet">
    
    <!-- ### FONTS ### -->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>

    <!-- ### VJS ### -->
    <link href="//vjs.zencdn.net/4.9/video-js.css" rel="stylesheet">
    <script src="//vjs.zencdn.net/4.9/video.js"></script>

    <!-- ### HTML5 ### -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- ### CSS ### -->
    <link href="<?php echo assets_url('css/main.css');?>
?<?php echo time();?>
" rel="stylesheet">
</head>
<body>



     
<div id="pgContent" class="pgContent pgHome">
	
	<!-- ### bannerHeader ### -->
	<section class="bannerHeader">
		<img class="logo" src="<?php echo images_url('logo/swyo_big.png');?>
" >
		<div class="slogan">
			Experiment to bring your favourite PC content 
			<br> in one place, on any screen
		</div>
		<div class="mainBtnGroup">
			<a class="btn btnTryOut "href="<?php echo site_url('login');?>
"> Try it out </a>
			<a class="btn btnSignUp" href="<?php echo site_url('register');?>
"> Sign up </a>
		</div>
	</section>

	<!-- ### prototypeVideoBlock ### -->
	<section id="prototypeVideoBlock" class="prototypeVideoBlock" >
		<!-- ### prototypeVideo ### -->
		<video id="prototypeVideo" class="video-js vjs-default-skin" style="background:#111;" loop>
			<source src="<?php echo videos_url('BannerVideo.mp4');?>
" type="video/mp4">
			<source src="<?php echo videos_url('BannerVideo.webm');?>
" type="video/webm">
			<source src="<?php echo videos_url('BannerVideo.ogg');?>
" type="video/ogg">
			Your browser does not support the video tag.
		</video>
		<!-- ### videoOverlayBlock ### -->
		<div class="videoOverlayBlock">
			<div class="txtBlock">
				<div class="txtSmall">Let's experience PC gaming on the </div>
				<div class="txtBig">Browser</div>
			</div>
			<div class="mainBtnGroup">
				<a class="btn btnTryOut" href="<?php echo site_url('login');?>
"> Try it out </a>
				<a class="btn btnSignUp" href="<?php echo site_url('register');?>
"> Sign up </a>
			</div>
		</div>
		<!-- ### videoControlButtons ### -->
		<div id="videoControlButtons" class="videoControlButtons">
			<a class="btnPlay" role="button"> Play </a>
			<a class="btnPause" role="button"> Pause </a>
		</div>
	</section>


	<section class="about">
		<img src="<?php echo images_url('about.png');?>
" width="100%">
	</section>


	<!-- ### feedbackBlock ### -->
	<section class="feedbackBlock">
		<div class="container">
			<div class="heading"> We value your feedback! </div>
			<p class="desc"> Like the experiment? Help us spread the word out! </p>
			<ul class="iconSet">
				<span class='st_facebook_large' displayText='Facebook'></span>	
				<span class='st_googleplus_large' displayText='Google +'></span>
				<span class='st_twitter_large' displayText='Tweet'> </span>
			</ul>
		</div>
	</section>

	<!-- ### statBlock ### -->
	<section class="statBlock">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 text-center">
					<a class="stat noTesters" href="http://www.twitch.tv/swyoexp">
						<span class="val"> 
							<span class=" glyphicon glyphicon-globe "></span>
						</span> 
						<br>
						<span class="lab">Testers</span>
					</a>
				</div>
				<div class="col-sm-4 text-center">
					<a class="stat noHomePC" href="http://www.twitch.tv/swyoexp">
						<span class="val">03</span>
						<br>
						<span class="lab">Home PCs</span>
					</a>
				</div>
				<div class="col-sm-4 text-center">
					<a class="stat noFAQ" href="http://www.twitch.tv/swyoexp">
						<span class="val"> &infin; </span>
						<br>
						<span class="lab"> #FAQ </span>
					</a>
				</div>
			</div>
		</div>
	</section>


	


	<!-- ### rights ### -->
	<div class="rights">
		<div class="container">
			© 2014 All Rights Reserved – <span class="hlight">SevenRE UG</span> | Contact
		</div>
	</div>

</div>
 






    <!-- ### JQUERY ### -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- ### PLACEHOLDER ### -->
    <script src="<?php echo vendor_url('placeholder/jquery.placeholder.js');?>
"></script>
    <!-- ### BOOTSTRAP ### -->
    <script src="<?php echo vendor_url('bootstrap/3.2.0/js/bootstrap.min.js');?>
"></script>
    <!-- SOCIAL SHARE -->
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <!-- ### GLOBAL ### -->
    <script>
        $('input, textarea').placeholder();
        stLight.options({publisher: "5b799276-10c5-427d-80a2-db25a94b676b", doNotHash: false, doNotCopy: false, hashAddressBar: false});
    </script>
    <!-- ### PAGE ### -->
     
<script> $(document).ready(function() {

	//***************************************************************

	setBannerHeaderSize();
	$( window ).resize(function() {
		setBannerHeaderSize();
	});
	function setBannerHeaderSize(){
		var wHeight = $(window).height() - 140 ;
		var eHeight = $(".bannerHeader").height();
		var diffHeight = wHeight - eHeight ;
		if(diffHeight < 60) { diffHeight = 60; }

		$(".bannerHeader").css("padding-top",diffHeight/2);
		$(".bannerHeader").css("padding-bottom",diffHeight/2);
	}

	//***************************************************************

	videojs("prototypeVideo").ready(function() 
	{
		var prototypeVideo = this;
		// prototypeVideo.play();

		setVideoSize();
		$( window ).resize(function() {
			setVideoSize();
		});

		$(".btnPause").css("display","block");
		$(".btnPlay").click(function(){ prototypeVideo.play(); 	$(this).hide(); $(".btnPause").show(); });
		$(".btnPause").click(function(){ prototypeVideo.pause(); $(this).hide(); $(".btnPlay").show(); });

		function setVideoSize() {
			var vWidth = $("#prototypeVideoBlock").outerWidth();
			var vHeight = vWidth/1.75;
			vHeight = vHeight > 240 ? vHeight : 240 ;
			prototypeVideo.width(vWidth);
			prototypeVideo.height(vHeight);
		}
	});

	//***************************************************************

}); </script>

</body>
</html><?php }} ?>
