<?php /* Smarty version 2.6.26, created on 2013-01-10 16:47:09
         compiled from formelements/input.tpl */ ?>

<div class="<?php if ($this->_tpl_vars['inputDetails']['prepend'] != ''): ?>input-prepend<?php endif; ?> <?php if ($this->_tpl_vars['inputDetails']['append'] != ''): ?>input-append<?php endif; ?>">
<?php if ($this->_tpl_vars['inputDetails']['prepend'] != ''): ?> <span class="add-on"><?php echo $this->_tpl_vars['inputDetails']['prepend']; ?>
</span><?php endif; ?>
<input
    type="<?php echo $this->_tpl_vars['inputDetails']['type']; ?>
"
    class="<?php echo $this->_tpl_vars['inputDetails']['class']; ?>
"
    style="<?php echo $this->_tpl_vars['inputDetails']['style']; ?>
"
    name="<?php echo $this->_tpl_vars['inputDetails']['name']; ?>
"
    id="<?php echo $this->_tpl_vars['inputDetails']['id']; ?>
"
<?php if ($this->_tpl_vars['inputDetails']['pattern'] != ''): ?>pattern="<?php echo $this->_tpl_vars['inputDetails']['pattern']; ?>
"<?php endif; ?>
<?php if ($this->_tpl_vars['inputDetails']['value'] != ''): ?> value="<?php echo $this->_tpl_vars['inputDetails']['value']; ?>
"<?php endif; ?>
<?php if ($this->_tpl_vars['inputDetails']['placeholder'] != ''): ?>placeholder="<?php echo $this->_tpl_vars['inputDetails']['placeholder']; ?>
"<?php endif; ?>
<?php if ($this->_tpl_vars['inputDetails']['size'] != ''): ?>size="<?php echo $this->_tpl_vars['inputDetails']['size']; ?>
"<?php endif; ?>
<?php if ($this->_tpl_vars['inputDetails']['readonly'] != ''): ?> readonly <?php endif; ?>
<?php if ($this->_tpl_vars['inputDetails']['mandatory'] != ''): ?> required <?php endif; ?>
/>
<?php if ($this->_tpl_vars['inputDetails']['append'] != ''): ?>  <span class="add-on"><?php echo $this->_tpl_vars['inputDetails']['append']; ?>
</span><?php endif; ?>
</div>