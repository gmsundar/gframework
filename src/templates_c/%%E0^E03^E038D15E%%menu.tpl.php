<?php /* Smarty version 2.6.26, created on 2013-01-08 15:45:44
         compiled from themes/greenschoolerp/menu.tpl */ ?>
<ul id="floatMenu" class="mainmenu">
    <?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu_array']):
?>
        <li id="menu_container_<?php echo $this->_tpl_vars['menu_array']['0']; ?>
"><a id="menu_<?php echo $this->_tpl_vars['menu_array']['0']; ?>
" href="<?php echo $this->_tpl_vars['AppURL']; ?>
<?php echo $this->_tpl_vars['menu_array']['2']; ?>
"><?php echo $this->_tpl_vars['menu_array']['1']; ?>
</a>
            <ul class="submenu">
                <?php $_from = $this->_tpl_vars['menu_array']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child_menu1_array']):
?>
                    <li><a id="menu_<?php echo $this->_tpl_vars['child_menu1_array']['0']; ?>
" href="<?php echo $this->_tpl_vars['AppURL']; ?>
<?php echo $this->_tpl_vars['child_menu1_array']['2']; ?>
"><?php echo $this->_tpl_vars['child_menu1_array']['1']; ?>
</a></li>          
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>