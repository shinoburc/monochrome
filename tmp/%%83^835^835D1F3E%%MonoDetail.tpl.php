<?php /* Smarty version 2.6.12, created on 2008-02-24 14:20:13
         compiled from MonoDetail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'MonoDetail.tpl', 4, false),)), $this); ?>
<div align="right"><a href="JavaScript:closeSubcontent()"><img src="images/close.gif" border=0 alt="close" title="close"></a></div>
<div style="color:#2F4F4F;font-size:8px;background-color:#bbaaaa;">&nbsp;</div>
<span style="color:#2F4F4F;font-size:25px;background-color:#bb8877;">Detail</span>
<form method="POST" action="index.php?contents=<?php echo $this->_tpl_vars['contents']; ?>
&action=<?php echo ((is_array($_tmp=$this->_tpl_vars['action'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<?php $_from = $this->_tpl_vars['mono_iterator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mono']):
?>
    <table border=0 cellspacing=1>
    <?php $_from = $this->_tpl_vars['mono']->getIterator(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element_name'] => $this->_tpl_vars['element']):
?>
        <!-- TODO -->
        <?php if ($this->_tpl_vars['element']->type == 'primary_key'): ?>
                <?php elseif ($this->_tpl_vars['element']->type == 'rich_text'): ?>
                        <tr>
                <td class="htd"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
                <td class="vtd"><?php echo $this->_tpl_vars['element']->value; ?>
</td>
            </tr>
        <?php elseif ($this->_tpl_vars['element']->type == 'blob' || $this->_tpl_vars['element']->type == 'file'): ?>
            <tr>
                <td class="htd"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
                <?php if ($this->_tpl_vars['element']->path == ""): ?>
                    <td class="vtd">no data</td>
                <?php else: ?>
                                        <?php if ($this->_tpl_vars['element']->view_type == 'image'): ?>
                        <td class="vtd"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['element']->path)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" border="0"  width="50%"></td>
                    <?php else: ?>
                        <td class="vtd"><img src="images/clip.gif"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['element']->path)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->file_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
(<?php echo $this->_tpl_vars['element']->file_size_view; ?>
)</a></td>
                    <?php endif; ?>
                <?php endif; ?>
            </tr>
        <?php else: ?>
            <tr>
                <td class="htd"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
                <td class="vtd"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->value)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
            </tr>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    </table>
<?php endforeach; else: ?>
NO ITEMS
<?php endif; unset($_from); ?>
</form>