<?php /* Smarty version 2.6.12, created on 2008-02-24 14:20:04
         compiled from MonoMenu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'MonoMenu.tpl', 9, false),)), $this); ?>
<div align="right"><a href="JavaScript:closeMenu()"><img src="images/close.gif" border=0 alt="close" title="close"></a></div>
<div style="color:#2F4F4F;font-size:8px;background-color:#bbaaaa;">&nbsp;</div>
<span style="color:#2F4F4F;font-size:25px;background-color:#bb8877;">Menu</span>
<table border=0 cellspacing=1>
<tr>
<?php $_from = $this->_tpl_vars['menus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['name']):
?>
    <td id="menu_<?php echo $this->_tpl_vars['key']; ?>
">
        <?php if ($this->_tpl_vars['ajax_only']): ?>
            <a href="javascript:genList('<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');"><?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
        <?php else: ?>
            <script type="text/javascript">
                options_<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 = new Object();
                options_<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
["key"] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
";
                document.write("<a href=\"javascript:genList(options_<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
);\"><?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>");
            </script>
            <noscript>
                <a href="index.php?contents=<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
            </noscript>
        <?php endif; ?>
    </td>
<?php endforeach; endif; unset($_from); ?>
</tr>
</table>