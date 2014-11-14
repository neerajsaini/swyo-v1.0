<?php /* Smarty version Smarty-3.1.19, created on 2014-11-14 14:21:05
         compiled from "/Applications/AMPPS/www/stream/v1.0/frontend/tpl/smarty_t/wait/wait.html" */ ?>
<?php /*%%SmartyHeaderCode:1019450894546601c14f1992-16998883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '644470443d17a59648f935e184e1877ba4a3d1da' => 
    array (
      0 => '/Applications/AMPPS/www/stream/v1.0/frontend/tpl/smarty_t/wait/wait.html',
      1 => 1415006190,
      2 => 'file',
    ),
    '299805cb9dca5b4ec7b5fb34604fce86d367f6ea' => 
    array (
      0 => '/Applications/AMPPS/www/stream/v1.0/frontend/tpl/smarty_t/layout/master.html',
      1 => 1415804573,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1019450894546601c14f1992-16998883',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_546601c15754b5_64310647',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546601c15754b5_64310647')) {function content_546601c15754b5_64310647($_smarty_tpl) {?><!DOCTYPE html>
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



     
<a id="btnLogout"  href="<?php echo site_url('logout');?>
">
	<img src="<?php echo images_url('icon/logout.png');?>
" width="100%">
</a>

<a id="btnHome"  href="<?php echo site_url('home');?>
">
	<div class="glyphicon glyphicon-home" style="font-size:32px;"></div>
</a>

<div id="pgContent" class="pgContent pgWait">

	<div class="container text-center">

		<!-- ### welcomeBlock ### -->
		<section class="welcomeBlock">
			<div class="heading">
				<div class="title"> Welcome <span class="txtBlue playerName"> <?php echo $_smarty_tpl->tpl_vars['ci']->value->session->userdata('playerName');?>
 </span>  </div>
				<div class="subtitle"> <?php if ($_smarty_tpl->tpl_vars['player']->value['isPremium']) {?> PREMIUM ACCOUNT <?php }?> </div>
			</div>
			<div class="message">
				Games hosted on SWYO perfoms best on 
				<br> <span class="txtRed browser">Chrome</span> & <span class="txtRed browser">Firefox</span>
			</div>
		</section>


		<!-- ### line ### -->
		<img src="<?php echo images_url('wait/line.png');?>
" alt="">


		<!-- ### queueBlock ### -->
		<section class="queueBlock">
			<p class="inQueue"> 
				<span > You are in queue  </span>
				<span class="qIndex" style="display:none;"> 
					<span> at position  </span>
					<span class="qpos txtBlue"></span> 
				</span> 
			</p>
			<p> 
				<span> Keep this browser  </span>
				<span class="txtBlue"> tab </span> 
				<span class="txtRed"> open </span> 
				<span> to stay in the </span>
				<span class="">queue</span> 
			</p>
		</section>
	</div>


	<!-- ### pingBlock ### -->
	<section class="pingBlock">
		<div class="container text-center">
			<p>
				Consider that the distance from you to our server affects the delay
			</p>
			<br>
			<img src="<?php echo images_url('wait/latency_animated.gif');?>
" class="latency">
		</div>   
	</section>  


	<!-- ### twitchTV ### -->
	<section class="twitchTV">
		<div class="container text-center">
			<a class="title" href="http://www.twitch.tv/swyoexp"> watch SWYO @ twitch.tv </a>
			<!-- <iframe src="http://www.twitch.tv/swyoexp/embed" frameborder="0" scrolling="no" height="378" width="620"></iframe> -->
		</div>   
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

	check_status(true , 20*1000);
	
	function check_status(run_loop , pulse_rate) {
		$.ajax({
			type: "GET",
			url: '<?php echo site_url("wait/ajx_checkStatus");?>
',
		  	dataType: 'json',
			success: function(response) { 
				// console.log(response); 
				if(response.redirect != false) {
					window.location.href = "<?php echo site_url('"+response.redirect+"');?>
" ;
				}
				else if(response.inPQueue == 1) { 
					$(".qpos").text('#'+response.qpos);
					$(".qIndex").show();
				}
				else if(response.isPremium == 1) { 
					$(".qpos").text('#'+response.qpos);
					$(".qIndex").show();
				}

				if(run_loop==true){
					setTimeout(function() { 
						check_status(run_loop, pulse_rate);
					}, pulse_rate);
				}
			}
		});
	}

}); </script>


    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-53090236-3', 'auto');
      ga('send', 'pageview');
    </script>
</body>
</html><?php }} ?>
