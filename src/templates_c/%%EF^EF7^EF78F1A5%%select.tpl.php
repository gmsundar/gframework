<?php /* Smarty version 2.6.26, created on 2013-01-22 10:46:08
         compiled from formelements/select.tpl */ ?>
<div class="input-prepend input-append">
<?php if ($this->_tpl_vars['inputDetails']['prepend'] != ''): ?>    <span class="add-on"><?php echo $this->_tpl_vars['inputDetails']['prepend']; ?>
</span><?php endif; ?>
<select
    class="<?php echo $this->_tpl_vars['inputDetails']['class']; ?>
"
    style="<?php echo $this->_tpl_vars['inputDetails']['style']; ?>
"
    name="<?php echo $this->_tpl_vars['inputDetails']['name']; ?>
"
    id="<?php echo $this->_tpl_vars['inputDetails']['id']; ?>
"
<?php if ($this->_tpl_vars['inputDetails']['readonly'] != ''): ?> readonly <?php endif; ?>
<?php if ($this->_tpl_vars['inputDetails']['mandatory'] != ''): ?> required <?php endif; ?>
<?php if ($this->_tpl_vars['inputDetails']['multiple'] != ''): ?> multiple <?php endif; ?>

>
<?php if ($this->_tpl_vars['inputDetails']['nodefaulttext'] != 'true'): ?><option value="" ><?php if ($this->_tpl_vars['inputDetails']['selecttext'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['selecttext']; ?>
 <?php else: ?>--Select--<?php endif; ?></option><?php endif; ?>
<?php $_from = $this->_tpl_vars['inputDetails']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['selectbox'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['selectbox']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['currentselectvalue']):
        $this->_foreach['selectbox']['iteration']++;
?>
    <option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['inputDetails']['value']): ?>selected=true<?php endif; ?> ><?php echo $this->_tpl_vars['currentselectvalue']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>

<?php if ($this->_tpl_vars['inputDetails']['append'] != ''): ?>  <span class="add-on"><?php echo $this->_tpl_vars['inputDetails']['append']; ?>
</span><?php endif; ?>
</div>
<br>
<?php echo $this->_tpl_vars['inputDetails']['placeholder']; ?>



