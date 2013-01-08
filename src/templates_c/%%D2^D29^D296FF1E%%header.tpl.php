<?php /* Smarty version 2.6.26, created on 2013-01-08 16:26:19
         compiled from themes/greenschoolerp/header.tpl */ ?>
<html>
    <head>
        <title>
    <?php if ($this->_tpl_vars['content_details_array']['page']['heading']): ?><?php echo $this->_tpl_vars['content_details_array']['page']['heading']; ?>
<?php else: ?><?php echo $this->_tpl_vars['content_details_array']['page']['title']; ?>
<?php endif; ?>
</title>
<script>
    var AppImgURL = '<?php echo $this->_tpl_vars['AppImgURL']; ?>
';
    var AppURL = '<?php echo $this->_tpl_vars['AppURL']; ?>
';
    var AppJsURL = '<?php echo $this->_tpl_vars['AppJsURL']; ?>
';
    var AppCssURL = '<?php echo $this->_tpl_vars['AppCssURL']; ?>
';
    var AppScriptURL = '<?php echo $this->_tpl_vars['AppCssURL']; ?>
';
    var AppViewUploadsURL = '<?php echo $this->_tpl_vars['AppViewUploadsURL']; ?>
';


</script>
<link href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
TableTools.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
geotheme1.css" rel="stylesheet" type="text/css" media="screen" />


<link rel="stylesheet" href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
<?php echo $this->_tpl_vars['AppJqueryTheme']; ?>
/jquery-ui.css"  />

<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery.js"></script>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery-ui.js" ></script>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery.cookie.js" ></script>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
geo.base.js" ></script>

</head>
<body>
    <div id="header">
                <!-- /#logo -->
        <!-- #user -->
        <div id="user">
            <?php if ($_SESSION['user_id']): ?>
                <h2>Welcome <?php echo $_SESSION['first_name']; ?>
 <?php echo $_SESSION['middle_name']; ?>
 <?php echo $_SESSION['last_name']; ?>
</h2>
                <a href="index.php?file=logout">logout</a>
            <?php endif; ?>
        </div>
        <!-- /#user -->  </div>
