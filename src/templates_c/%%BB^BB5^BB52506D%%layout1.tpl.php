<?php /* Smarty version 2.6.26, created on 2013-01-24 04:20:08
         compiled from layouts/layout1.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'layouts/layout1.tpl', 1, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['AppTheme'])) ? $this->_run_mod_handler('cat', true, $_tmp, "header.tpl") : smarty_modifier_cat($_tmp, "header.tpl")), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            </a>
            <a class="brand" href="<?php echo $this->_tpl_vars['CompanyURL']; ?>
"><?php echo $this->_tpl_vars['AppName']; ?>
</a>
            <div class="nav-collapse collapse pull-right">
                <ul class="nav ">
                    <li><a href="<?php echo '<?php'; ?>
 echo $cFormObj->createLinkUrl(array('f' => 'logout')); <?php echo '?>'; ?>
">Logout</a></li>
                    <li><a href="<?php echo '<?php'; ?>
 echo $cFormObj->createLinkUrl(array('f' => 'login')); <?php echo '?>'; ?>
">Login</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span3">
        <div class="well sidebar-nav">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['AppTheme'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'menu.tpl') : smarty_modifier_cat($_tmp, 'menu.tpl')), 'smarty_include_vars' => array('menu' => $this->_tpl_vars['content_details_array']['menu'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>
    <div class="span9">
        <h2><?php echo $this->_tpl_vars['content_details_array']['page']['heading']; ?>
</h2>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['content_details_array']['tplFileName'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['AppTheme'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'footer.tpl') : smarty_modifier_cat($_tmp, 'footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

