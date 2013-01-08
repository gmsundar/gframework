<?php /* Smarty version 2.6.26, created on 2013-01-08 15:45:44
         compiled from themes/greenschoolerp/layout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'themes/greenschoolerp/layout.tpl', 1, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['AppTheme'])) ? $this->_run_mod_handler('cat', true, $_tmp, "header.tpl") : smarty_modifier_cat($_tmp, "header.tpl")), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['AppTheme'])) ? $this->_run_mod_handler('cat', true, $_tmp, "page.tpl") : smarty_modifier_cat($_tmp, "page.tpl")), 'smarty_include_vars' => array('content_details_array' => $this->_tpl_vars['content_details_array'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['AppTheme'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'footer.tpl') : smarty_modifier_cat($_tmp, 'footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>