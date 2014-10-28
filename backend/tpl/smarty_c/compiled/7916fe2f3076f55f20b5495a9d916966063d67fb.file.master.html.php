<?php /* Smarty version Smarty-3.1.19, created on 2014-10-28 10:40:55
         compiled from "/Applications/AMPPS/www/stream/v1.0/backend/tpl/smarty_t/layout/master.html" */ ?>
<?php /*%%SmartyHeaderCode:1812988401544f64a7898f83-38623183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7916fe2f3076f55f20b5495a9d916966063d67fb' => 
    array (
      0 => '/Applications/AMPPS/www/stream/v1.0/backend/tpl/smarty_t/layout/master.html',
      1 => 1414487532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1812988401544f64a7898f83-38623183',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ci' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_544f64a78f3bd7_28374153',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544f64a78f3bd7_28374153')) {function content_544f64a78f3bd7_28374153($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SWYO Backend</title>

    <!-- Bootstrap -->
    <link href="<?php echo vendor_url('bootstrap/3.2.0/css/bootstrap.min.css');?>
" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <header id="pgHeader" class="pgHeader">
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> 
                        SWYO Backend
                    </a>
                </div>
                 
                <!-- navbar-collapse -->
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="<?php if ($_smarty_tpl->tpl_vars['ci']->value->uri->segment(2)=='') {?> active <?php }?>"><a href="<?php echo site_url('home');?>
">home</a></li>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['ci']->value->uri->segment(2)=='reset_all') {?> active <?php }?>"><a href="<?php echo site_url('home/reset_all');?>
">reset_all</a></li>
                    </ul>
                </div>
                
            </div>
        </div>
    </header>

     

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo vendor_url('bootstrap/3.2.0/js/bootstrap.min.js');?>
"></script>

     
</body>
</html><?php }} ?>
