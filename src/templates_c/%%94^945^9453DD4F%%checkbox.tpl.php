<?php /* Smarty version 2.6.26, created on 2013-01-08 15:45:50
         compiled from formelements/checkbox.tpl */ ?>
<?php echo $this->_tpl_vars['inputDetails']['preappend']; ?>

<input
    type="checkbox"
    class="<?php echo $this->_tpl_vars['inputDetails']['class']; ?>
"
    style="<?php echo $this->_tpl_vars['inputDetails']['style']; ?>
"
    name="<?php echo $this->_tpl_vars['inputDetails']['name']; ?>
"
    id="<?php echo $this->_tpl_vars['inputDetails']['id']; ?>
"
    value="<?php echo $this->_tpl_vars['inputDetails']['value']; ?>
"
<?php if ($this->_tpl_vars['inputDetails']['checked'] != ''): ?> checked <?php endif; ?>
<?php if ($this->_tpl_vars['inputDetails']['readonly'] != ''): ?> readonly<?php endif; ?>
<?php echo $this->_tpl_vars['inputDetails']['mandatory']; ?>

<?php echo $this->_tpl_vars['inputDetails']['event']; ?>

/>
<?php echo $this->_tpl_vars['inputDetails']['append']; ?>
