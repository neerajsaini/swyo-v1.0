<?php /* Smarty version Smarty-3.1.19, created on 2014-10-28 20:34:27
         compiled from "/Applications/AMPPS/www/stream/v1.0/backend/tpl/smarty_t/home/home.html" */ ?>
<?php /*%%SmartyHeaderCode:517659529544fefc3378973-06776221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3cde4d15350369f205a38b70726e12811a1577f' => 
    array (
      0 => '/Applications/AMPPS/www/stream/v1.0/backend/tpl/smarty_t/home/home.html',
      1 => 1414491258,
      2 => 'file',
    ),
    '7916fe2f3076f55f20b5495a9d916966063d67fb' => 
    array (
      0 => '/Applications/AMPPS/www/stream/v1.0/backend/tpl/smarty_t/layout/master.html',
      1 => 1414487532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '517659529544fefc3378973-06776221',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ci' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_544fefc34534a4_09382673',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544fefc34534a4_09382673')) {function content_544fefc34534a4_09382673($_smarty_tpl) {?><!DOCTYPE html>
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

     
<div class="pgContent">
	<div class="container">
		

		<!-- ### Server Params ### -->

		<div class="row">
			<div class="col-sm-4">
				<h2>Server Params</h2>
				<table class="table">
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['systemParam']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["sysParam"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["sysParam"]['index']++;
?>
						<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['sysParam']['index']==0) {?> 
						<tr>
							<th>KEY</th>
							<th>VAL</th>
						</tr>
						<?php }?>
						<tr>
							<td> <?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 </td>
							<td> <b><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</b> </td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<div class="col-sm-push-4 col-sm-4">
				<h2>Counter Params</h2>
				<table class="table">
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['counterParam']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cntParam"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cntParam"]['index']++;
?>
						<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['cntParam']['index']==0) {?> 
						<tr>
							<th>KEY</th>
							<th>VAL</th>
						</tr>
						<?php }?>
						<tr>
							<td> <?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 </td>
							<td> <b><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</b> </td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>

		
		<!-- ### Session Players ### -->
	
		<div class="row">
			<div class="col-sm-12">
				<h2>Session Players</h2>
				<table class="table">
					<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sessionData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["sessData"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["sessData"]['index']++;
?>
						<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['sessData']['index']==0) {?> 
						<tr>
							<?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['col']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value) {
$_smarty_tpl->tpl_vars['col']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['col']->key;
?>
							<th><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</th>
							<?php } ?>
						</tr>
						<?php }?>
						<tr>
							<?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['col']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value) {
$_smarty_tpl->tpl_vars['col']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['col']->key;
?>
							<td> <?php echo $_smarty_tpl->tpl_vars['col']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['key']->value=='playerID') {?>  ::  <?php echo $_smarty_tpl->tpl_vars['playerData']->value[$_smarty_tpl->tpl_vars['col']->value]['playerName'];?>
 <?php }?>  </td>
							<?php } ?>
						</tr>
					<?php }
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
						<tr>
							<td> NO DATA </td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>

		

	</div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo vendor_url('bootstrap/3.2.0/js/bootstrap.min.js');?>
"></script>

     
</body>
</html><?php }} ?>
