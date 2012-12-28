<?php /* Smarty version 2.6.26, created on 2012-12-19 16:53:12
         compiled from themes/greenschoolerp/login.tpl */ ?>
<div id="login-holder">
	<!-- start logo -->
	<div id="logo-login">
			<!-- <a href="index.html"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>-->
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
        <form method="POST" action="index.php?file=login">
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username</th>
			<td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['username'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['password'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input name="remember_password" type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="submit-login" value="Login" /></td>
		</tr>
		</table>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">Forgot Password?</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->
</form>
</div>
<!-- End: login-holder -->