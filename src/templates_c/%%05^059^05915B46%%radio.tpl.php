<?php /* Smarty version 2.6.26, created on 2013-01-08 15:45:50
         compiled from formelements/radio.tpl */ ?>
<?php echo $this->_tpl_vars['inputDetails']['preappend']; ?>

<?php $_from = $this->_tpl_vars['inputDetails']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['checkboxbox'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['checkboxbox']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['currentselectvalue']):
        $this->_foreach['checkboxbox']['iteration']++;
?>
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
           />
    <label for=<?php echo $this->_tpl_vars['currentselectvalue']; ?>
><?php echo $this->_tpl_vars['key']; ?>
</label>
<?php endforeach; endif; unset($_from); ?>
<?php echo $this->_tpl_vars['inputDetails']['append']; ?>