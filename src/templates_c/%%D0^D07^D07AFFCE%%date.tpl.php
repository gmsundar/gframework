<?php /* Smarty version 2.6.26, created on 2013-01-08 16:31:32
         compiled from formelements/date.tpl */ ?>
<input
    type="<?php if ($this->_tpl_vars['inputDetails']['type'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['type']; ?>
<?php else: ?>text<?php endif; ?>"
    class="<?php if ($this->_tpl_vars['inputDetails']['class'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['class']; ?>
<?php else: ?>inp-form<?php endif; ?>"
    style="<?php echo $this->_tpl_vars['inputDetails']['style']; ?>
"
    name="<?php if ($this->_tpl_vars['inputDetails']['name'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['inputDetails']['id']; ?>
<?php endif; ?>"
    id="datepicker" />
<img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
calendar.png"   alt="" />