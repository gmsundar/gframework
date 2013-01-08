<?php /* Smarty version 2.6.26, created on 2013-01-08 16:22:02
         compiled from layouts/layout1.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'layouts/layout1.tpl', 1, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['AppTheme'])) ? $this->_run_mod_handler('cat', true, $_tmp, "header.tpl") : smarty_modifier_cat($_tmp, "header.tpl")), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="box">
    <div class="headlines">
        <h2>
            <span><?php echo $this->_tpl_vars['content_details_array']['page']['title']; ?>
</span>
        </h2>
    </div>
    <div class="box-content" dir="<?php echo $this->_tpl_vars['AppTextDirection']; ?>
">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['content_details_array']['tplFileName'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</div>
<div id="sidebar">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['AppTheme'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'menu.tpl') : smarty_modifier_cat($_tmp, 'menu.tpl')), 'smarty_include_vars' => array('menu' => $this->_tpl_vars['content_details_array']['menu'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['AppTheme'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'footer.tpl') : smarty_modifier_cat($_tmp, 'footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>