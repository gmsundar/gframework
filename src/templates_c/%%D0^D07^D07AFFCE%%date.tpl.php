<?php /* Smarty version 2.6.26, created on 2013-01-24 03:33:17
         compiled from formelements/date.tpl */ ?>
<div class="input-append date" >
    <input
        size="16"
        type="text"
        readonly
        name="<?php echo $this->_tpl_vars['inputDetails']['name']; ?>
_display_date"
        id="<?php echo $this->_tpl_vars['inputDetails']['id']; ?>
_display_date"
        value="<?php echo $this->_tpl_vars['inputDetails']['value']; ?>
"
    <?php if ($this->_tpl_vars['inputDetails']['mandatory'] != ''): ?> required <?php endif; ?>
    >
<span class="add-on"><i class="icon-th"></i></span>
<input
    type="hidden"
    name="<?php echo $this->_tpl_vars['inputDetails']['name']; ?>
"
    id="<?php echo $this->_tpl_vars['inputDetails']['id']; ?>
"
    value="<?php echo $this->_tpl_vars['inputDetails']['value']; ?>
"
    >
</div>