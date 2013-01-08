<?php /* Smarty version 2.6.26, created on 2013-01-08 15:45:50
         compiled from formelements/select.tpl */ ?>

<?php echo $this->_tpl_vars['inputDetails']['preappend']; ?>


<select  
    class="<?php if ($this->_tpl_vars['inputDetails']['class'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['class']; ?>
<?php else: ?>select<?php endif; ?>" 
         style="<?php echo $this->_tpl_vars['inputDetails']['style']; ?>
"
         name="<?php if ($this->_tpl_vars['inputDetails']['name'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['name']; ?>
<?php if ($this->_tpl_vars['inputDetails']['multiple'] != ''): ?>[]<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['inputDetails']['id']; ?>
<?php endif; ?>" 
         id=<?php if ($this->_tpl_vars['inputDetails']['id'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['inputDetails']['name']; ?>
<?php endif; ?> 
         <?php echo $this->_tpl_vars['inputDetails']['required']; ?>
 
<?php if ($this->_tpl_vars['inputDetails']['readonly'] != ''): ?> disabled <?php endif; ?>
<?php if ($this->_tpl_vars['inputDetails']['multiple'] != ''): ?> multiple <?php endif; ?>
 <?php echo $this->_tpl_vars['inputDetails']['event']; ?>

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

<?php echo $this->_tpl_vars['inputDetails']['append']; ?>
   
<br>
<?php echo $this->_tpl_vars['inputDetails']['placeholder']; ?>



