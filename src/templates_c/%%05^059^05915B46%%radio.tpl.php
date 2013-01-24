<?php /* Smarty version 2.6.26, created on 2013-01-22 10:46:07
         compiled from formelements/radio.tpl */ ?>
<div class="input-prepend input-append">
<?php if ($this->_tpl_vars['inputDetails']['prepend'] != ''): ?>    <span class="add-on"><?php echo $this->_tpl_vars['inputDetails']['prepend']; ?>
</span><?php endif; ?>
<input type=radio
       name="<?php echo $this->_tpl_vars['inputDetails']['name']; ?>
"
       id="<?php echo $this->_tpl_vars['inputDetails']['id']; ?>
"
       value="<?php echo $this->_tpl_vars['currentselectvalue']; ?>
"
       class="<?php echo $this->_tpl_vars['inputDetails']['class']; ?>
"
       style="<?php echo $this->_tpl_vars['inputDetails']['style']; ?>
"
<?php if ($this->_tpl_vars['inputDetails']['mandatory'] != ''): ?> required <?php endif; ?>
/>
<?php if ($this->_tpl_vars['inputDetails']['append'] != ''): ?>  <span class="add-on"><?php echo $this->_tpl_vars['inputDetails']['append']; ?>
</span><?php endif; ?>
</div>