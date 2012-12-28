<?php /* Smarty version 2.6.26, created on 2012-12-19 16:53:12
         compiled from formelements/input.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'formelements/input.tpl', 10, false),)), $this); ?>
<?php echo $this->_tpl_vars['inputDetails']['preappend']; ?>


<input 
    type="<?php if ($this->_tpl_vars['inputDetails']['type'] != '' && $this->_tpl_vars['inputDetails']['type'] != 'date'): ?><?php echo $this->_tpl_vars['inputDetails']['type']; ?>
<?php else: ?>text<?php endif; ?>" 
    class="<?php if ($this->_tpl_vars['inputDetails']['class'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['class']; ?>
<?php else: ?>input<?php endif; ?>" 
    style="<?php echo $this->_tpl_vars['inputDetails']['style']; ?>
"
    name="<?php if ($this->_tpl_vars['inputDetails']['name'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['name']; ?>
<?php if ($this->_tpl_vars['inputDetails']['type'] == 'date'): ?>_date<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['inputDetails']['id']; ?>
<?php endif; ?>" 
    id=<?php if ($this->_tpl_vars['inputDetails']['id'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['id']; ?>
<?php if ($this->_tpl_vars['inputDetails']['type'] == 'date'): ?>_date<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['inputDetails']['name']; ?>
<?php endif; ?> 
    <?php if ($this->_tpl_vars['inputDetails']['pattern'] != ''): ?>pattern="<?php echo $this->_tpl_vars['inputDetails']['pattern']; ?>
"<?php endif; ?> 
    <?php if ($this->_tpl_vars['inputDetails']['value'] != ''): ?> value='<?php if ($this->_tpl_vars['inputDetails']['type'] == 'date' && $this->_tpl_vars['inputDetails']['value'] != ''): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['inputDetails']['value'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['AppDateFormatTpl']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['AppDateFormatTpl'])); ?>
<?php else: ?><?php echo $this->_tpl_vars['inputDetails']['value']; ?>
<?php endif; ?>'<?php endif; ?> 
    <?php if ($this->_tpl_vars['inputDetails']['readonly'] != ''): ?> readonly="readonly"<?php endif; ?> 
    <?php echo $this->_tpl_vars['inputDetails']['required']; ?>

    <?php if ($this->_tpl_vars['inputDetails']['checked'] != '' || $this->_tpl_vars['inputDetails']['value'] != ''): ?> checked <?php endif; ?> 
    <?php echo $this->_tpl_vars['inputDetails']['readonly']; ?>

    <?php if ($this->_tpl_vars['inputDetails']['data'] != ''): ?> list="<?php if ($this->_tpl_vars['inputDetails']['name'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['inputDetails']['id']; ?>
<?php endif; ?>_data" <?php endif; ?> 
    <?php echo $this->_tpl_vars['inputDetails']['event']; ?>

    <?php if ($this->_tpl_vars['inputDetails']['placeholder'] != ''): ?>placeholder="<?php echo $this->_tpl_vars['inputDetails']['placeholder']; ?>
"<?php endif; ?>
    <?php if ($this->_tpl_vars['inputDetails']['size'] != ''): ?>size="<?php echo $this->_tpl_vars['inputDetails']['size']; ?>
"<?php endif; ?>

    />
    <?php if ($this->_tpl_vars['inputDetails']['type'] == 'date'): ?>
    <input name="<?php echo $this->_tpl_vars['inputDetails']['name']; ?>
" id="<?php echo $this->_tpl_vars['inputDetails']['id']; ?>
"  type="hidden" value="<?php echo $this->_tpl_vars['inputDetails']['value']; ?>
" />
<?php endif; ?>
<span id="<?php echo $this->_tpl_vars['inputDetails']['id']; ?>
_error" style="display: inline"></span>
<?php if ($this->_tpl_vars['inputDetails']['data'] != ''): ?> 
<datalist id="<?php if ($this->_tpl_vars['inputDetails']['name'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['inputDetails']['id']; ?>
<?php endif; ?>_data">
    <?php $_from = $this->_tpl_vars['inputDetails']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['selectbox'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['selectbox']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['currentselectvalue']):
        $this->_foreach['selectbox']['iteration']++;
?>
    <option value="<?php echo $this->_tpl_vars['currentselectvalue']; ?>
"></option>

    <?php endforeach; endif; unset($_from); ?>
</datalist>

<?php endif; ?> 
<?php echo $this->_tpl_vars['inputDetails']['append']; ?>
