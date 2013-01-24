<?php /* Smarty version 2.6.26, created on 2013-01-08 15:45:44
         compiled from themes/greenschoolerp/page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'themes/greenschoolerp/page.tpl', 20, false),)), $this); ?>
<div id="content">
    <div class="box">
        <div class="headlines">
            <h2><span><?php echo $this->_tpl_vars['content_details_array']['page']['title']; ?>
</span></h2>
            <a href="#help" class="help"></a>      </div>

        <div class="box-content" dir="<?php echo $this->_tpl_vars['AppTextDirection']; ?>
">

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'formelements/error.tpl', 'smarty_include_vars' => array('error' => $this->_tpl_vars['content_details_array']['lastaction']['error'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'formelements/info.tpl', 'smarty_include_vars' => array('info' => $this->_tpl_vars['content_details_array']['lastaction']['info'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'formelements/warning.tpl', 'smarty_include_vars' => array('warning' => $this->_tpl_vars['content_details_array']['lastaction']['warning'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'formelements/action_feedback.tpl', 'smarty_include_vars' => array('feedback' => $this->_tpl_vars['content_details_array']['lastaction']['feedback'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['content_details_array']['tplFileName'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>        </div>
    </div>
</div>
<!-- /#content -->
<!-- #sidebar -->
<div id="sidebar">
    <!-- mainmenu -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['AppTheme'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'menu.tpl') : smarty_modifier_cat($_tmp, 'menu.tpl')), 'smarty_include_vars' => array('menu' => $this->_tpl_vars['content_details_array']['menu'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!-- /mainmenu -->
    
</div>