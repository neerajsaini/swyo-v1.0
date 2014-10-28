<?php /* Smarty version Smarty-3.1.19, created on 2014-10-27 16:19:56
         compiled from "/Applications/AMPPS/www/stream/v1.0/frontend/tpl/smarty_t/register/register.html" */ ?>
<?php /*%%SmartyHeaderCode:1151924815544e629cb1a269-24801069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff58d5c861ed8064cafd74f1f9b01c8d1635234e' => 
    array (
      0 => '/Applications/AMPPS/www/stream/v1.0/frontend/tpl/smarty_t/register/register.html',
      1 => 1414422939,
      2 => 'file',
    ),
    '299805cb9dca5b4ec7b5fb34604fce86d367f6ea' => 
    array (
      0 => '/Applications/AMPPS/www/stream/v1.0/frontend/tpl/smarty_t/layout/master.html',
      1 => 1414416459,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1151924815544e629cb1a269-24801069',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_544e629cb91ec6_49054612',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544e629cb91ec6_49054612')) {function content_544e629cb91ec6_49054612($_smarty_tpl) {?><!DOCTYPE html>
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



     
<div id="pgContent" class="pgContent pgLogin">
	<div class="container">


		<section class="logRegBlock">

			<div class="border_frame">
				<img src="<?php echo images_url('register/border_frame.png');?>
">
			</div>

			<form method="post" id="formRegister">
				<div class="formHeader">
					<img class="icon" src="<?php echo images_url('icon/signup.png');?>
">
					<div class="title">Sign Up</div>
				</div>

				<?php if ($_smarty_tpl->tpl_vars['ci']->value->form_validation->error_count()>0) {?>
					<div class="validation_errors" style="color: pink;">
						<?php echo validation_errors();?>

					</div>
				<?php }?>

				<div class="fieldSet">
					<div class="fieldRow">
						<input class="fInput" type="text" name="playerName" value="<?php echo set_value('playerName');?>
" placeholder="player name">
					</div>

					<div class="fieldRow">
						<input class="fInput" type="password" name="password" value="" placeholder="password">
					</div>

					<div class="fieldRow">
						<input class="fInput" type="password" name="confirmPassword" value="" placeholder="confirm password">
					</div>

					<div class="fieldRow">
						<input class="fInput" type="email" name="email" value="<?php echo set_value('email');?>
" placeholder="email">
					</div>

					<div class="captcha">
						<img id="captcha" src="<?php echo $_smarty_tpl->tpl_vars['securimage_show_file_path']->value;?>
" alt="CAPTCHA Image"  style="opacity:0.7; border-radius: 5px;"/>
					</div>
					<div class="fieldRow">
						<input class="fInput" type="text" name="captcha_code" value="" placeholder="type above code">
					</div>

					<button type="submit" class="btn btnSignUp"> Sign Up</button>
				</div>
			</form>
		</section>

	</div> <!-- container -->
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



}); </script>

</body>
</html><?php }} ?>
