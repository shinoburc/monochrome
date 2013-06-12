<?php /* Smarty version 2.6.12, created on 2008-02-24 14:20:07
         compiled from MonoPager.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'MonoPager.tpl', 5, false),array('function', 'math', 'MonoPager.tpl', 10, false),)), $this); ?>
<?php if ($this->_tpl_vars['limit'] > 0): ?>
    <?php if ($this->_tpl_vars['ajax_only']): ?>
        <?php if (( $this->_tpl_vars['offset'] - $this->_tpl_vars['limit'] ) >= 0): ?>
            <a style="color:#bbaaaa;" href="javascript:
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 = new Object();
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['key'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['sfd'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['sfd'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['sod'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['sod'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['limit'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['offset'] = '<?php echo smarty_function_math(array('equation' => "offset - limit",'offset' => $this->_tpl_vars['offset'],'limit' => $this->_tpl_vars['limit'],'format' => "%d"), $this);?>
';
                            genList(options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
);"><img src="images/left.gif" border="0"></a>
        <?php else: ?>
            <img src="images/left_grey.gif" border="0">
        <?php endif; ?>
    
        <?php unset($this->_sections['page']);
$this->_sections['page']['name'] = 'page';
$this->_sections['page']['step'] = ((int)$this->_tpl_vars['limit']) == 0 ? 1 : (int)$this->_tpl_vars['limit'];
$this->_sections['page']['loop'] = is_array($_loop=$this->_tpl_vars['count']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['page']['show'] = true;
$this->_sections['page']['max'] = $this->_sections['page']['loop'];
$this->_sections['page']['start'] = $this->_sections['page']['step'] > 0 ? 0 : $this->_sections['page']['loop']-1;
if ($this->_sections['page']['show']) {
    $this->_sections['page']['total'] = min(ceil(($this->_sections['page']['step'] > 0 ? $this->_sections['page']['loop'] - $this->_sections['page']['start'] : $this->_sections['page']['start']+1)/abs($this->_sections['page']['step'])), $this->_sections['page']['max']);
    if ($this->_sections['page']['total'] == 0)
        $this->_sections['page']['show'] = false;
} else
    $this->_sections['page']['total'] = 0;
if ($this->_sections['page']['show']):

            for ($this->_sections['page']['index'] = $this->_sections['page']['start'], $this->_sections['page']['iteration'] = 1;
                 $this->_sections['page']['iteration'] <= $this->_sections['page']['total'];
                 $this->_sections['page']['index'] += $this->_sections['page']['step'], $this->_sections['page']['iteration']++):
$this->_sections['page']['rownum'] = $this->_sections['page']['iteration'];
$this->_sections['page']['index_prev'] = $this->_sections['page']['index'] - $this->_sections['page']['step'];
$this->_sections['page']['index_next'] = $this->_sections['page']['index'] + $this->_sections['page']['step'];
$this->_sections['page']['first']      = ($this->_sections['page']['iteration'] == 1);
$this->_sections['page']['last']       = ($this->_sections['page']['iteration'] == $this->_sections['page']['total']);
?>
            <?php if ($this->_sections['page']['index'] == $this->_tpl_vars['offset']): ?>
                <span style="background-color:pink;"><?php echo $this->_sections['page']['iteration']; ?>
</span>
            <?php else: ?>
                <a style="color:brown;" href="javascript:
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 = new Object();
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['key'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['sfd'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['sfd'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['sod'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['sod'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['limit'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['offset'] = <?php echo $this->_sections['page']['index']; ?>
;
                            genList(options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
);"><?php echo $this->_sections['page']['iteration']; ?>
</a>
            <?php endif; ?>
        <?php endfor; endif; ?>
                     
                     
        <?php if (( $this->_tpl_vars['offset'] + $this->_tpl_vars['limit'] ) < $this->_tpl_vars['count']): ?>
            <a style="color:#bbaaaa;" href="javascript:
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 = new Object();
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['key'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['sfd'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['sfd'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['sod'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['sod'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['limit'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['offset'] = '<?php echo smarty_function_math(array('equation' => "offset + limit",'offset' => $this->_tpl_vars['offset'],'limit' => $this->_tpl_vars['limit'],'format' => "%d"), $this);?>
';
                            genList(options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
);"><img src="images/right.gif" border="0"></a>
        <?php else: ?>
            <img src="images/right_grey.gif" border="0">
        <?php endif; ?>
        <?php else: ?>         <script type="text/javascript">
        <?php if (( $this->_tpl_vars['offset'] - $this->_tpl_vars['limit'] ) >= 0): ?>
            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_left = new Object();
            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_left['key'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_left['sfd'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['sfd'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_left['sod'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['sod'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_left['limit'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_left['offset'] = '<?php echo smarty_function_math(array('equation' => "offset - limit",'offset' => $this->_tpl_vars['offset'],'limit' => $this->_tpl_vars['limit'],'format' => "%d"), $this);?>
';
            document.write("<a style=\"color:#bbaaa;\" href=\"javascript:genList(options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_left)\"><img src=\"images/left.gif\" border=\"0\"></a>");
        <?php else: ?>
            document.write("<img src=\"images/left_grey.gif\" border=\"0\">");
        <?php endif; ?>

        <?php unset($this->_sections['page']);
$this->_sections['page']['name'] = 'page';
$this->_sections['page']['step'] = ((int)$this->_tpl_vars['limit']) == 0 ? 1 : (int)$this->_tpl_vars['limit'];
$this->_sections['page']['loop'] = is_array($_loop=$this->_tpl_vars['count']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['page']['show'] = true;
$this->_sections['page']['max'] = $this->_sections['page']['loop'];
$this->_sections['page']['start'] = $this->_sections['page']['step'] > 0 ? 0 : $this->_sections['page']['loop']-1;
if ($this->_sections['page']['show']) {
    $this->_sections['page']['total'] = min(ceil(($this->_sections['page']['step'] > 0 ? $this->_sections['page']['loop'] - $this->_sections['page']['start'] : $this->_sections['page']['start']+1)/abs($this->_sections['page']['step'])), $this->_sections['page']['max']);
    if ($this->_sections['page']['total'] == 0)
        $this->_sections['page']['show'] = false;
} else
    $this->_sections['page']['total'] = 0;
if ($this->_sections['page']['show']):

            for ($this->_sections['page']['index'] = $this->_sections['page']['start'], $this->_sections['page']['iteration'] = 1;
                 $this->_sections['page']['iteration'] <= $this->_sections['page']['total'];
                 $this->_sections['page']['index'] += $this->_sections['page']['step'], $this->_sections['page']['iteration']++):
$this->_sections['page']['rownum'] = $this->_sections['page']['iteration'];
$this->_sections['page']['index_prev'] = $this->_sections['page']['index'] - $this->_sections['page']['step'];
$this->_sections['page']['index_next'] = $this->_sections['page']['index'] + $this->_sections['page']['step'];
$this->_sections['page']['first']      = ($this->_sections['page']['iteration'] == 1);
$this->_sections['page']['last']       = ($this->_sections['page']['iteration'] == $this->_sections['page']['total']);
?>
            options_<?php echo $this->_sections['page']['index']; ?>
 = new Object();
            options_<?php echo $this->_sections['page']['index']; ?>
['key'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
            options_<?php echo $this->_sections['page']['index']; ?>
['sfd'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['sfd'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
            options_<?php echo $this->_sections['page']['index']; ?>
['sod'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['sod'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
            options_<?php echo $this->_sections['page']['index']; ?>
['limit'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
            options_<?php echo $this->_sections['page']['index']; ?>
['offset'] = <?php echo $this->_sections['page']['index']; ?>
;
            <?php if ($this->_sections['page']['index'] == $this->_tpl_vars['offset']): ?>
                document.write(" <span style=\"background-color:pink;\"><?php echo $this->_sections['page']['iteration']; ?>
</span> ");
            <?php else: ?>
                document.write(" <a style=\"color:brown;\" href=\"javascript:genList(options_<?php echo $this->_sections['page']['index']; ?>
);\"><?php echo $this->_sections['page']['iteration']; ?>
</a> ");
            <?php endif; ?>
        <?php endfor; endif; ?>

        <?php if (( $this->_tpl_vars['offset'] + $this->_tpl_vars['limit'] ) < $this->_tpl_vars['count']): ?>
            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_right = new Object();
            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_right['key'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_right['sfd'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['sfd'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_right['sod'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['sod'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_right['limit'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_right['offset'] = '<?php echo smarty_function_math(array('equation' => "offset + limit",'offset' => $this->_tpl_vars['offset'],'limit' => $this->_tpl_vars['limit'],'format' => "%d"), $this);?>
';
            document.write("<a style=\"color:#bbaaa;\" href=\"javascript:genList(options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_right)\"><img src=\"images/right.gif\" border=\"0\"></a>");
        <?php else: ?>
            document.write("<img src=\"images/right_grey.gif\" border=\"0\">");
        <?php endif; ?>
        </script>
        <noscript>
        <?php if (( $this->_tpl_vars['offset'] - $this->_tpl_vars['limit'] ) >= 0): ?>
            <a href="index.php?contents=<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&action=MonoList&sfd=<?php echo ((is_array($_tmp=$this->_tpl_vars['sfd'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&sod=<?php echo ((is_array($_tmp=$this->_tpl_vars['sod'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&limit=<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&offset=<?php echo smarty_function_math(array('equation' => "offset - limit",'offset' => $this->_tpl_vars['offset'],'limit' => $this->_tpl_vars['limit'],'format' => "%d"), $this);?>
"><img src="images/left.gif" border="0"></a>
        <?php else: ?>
            <img src="images/left_grey.gif" border="0">
        <?php endif; ?>

        <?php unset($this->_sections['page']);
$this->_sections['page']['name'] = 'page';
$this->_sections['page']['step'] = ((int)$this->_tpl_vars['limit']) == 0 ? 1 : (int)$this->_tpl_vars['limit'];
$this->_sections['page']['loop'] = is_array($_loop=$this->_tpl_vars['count']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['page']['show'] = true;
$this->_sections['page']['max'] = $this->_sections['page']['loop'];
$this->_sections['page']['start'] = $this->_sections['page']['step'] > 0 ? 0 : $this->_sections['page']['loop']-1;
if ($this->_sections['page']['show']) {
    $this->_sections['page']['total'] = min(ceil(($this->_sections['page']['step'] > 0 ? $this->_sections['page']['loop'] - $this->_sections['page']['start'] : $this->_sections['page']['start']+1)/abs($this->_sections['page']['step'])), $this->_sections['page']['max']);
    if ($this->_sections['page']['total'] == 0)
        $this->_sections['page']['show'] = false;
} else
    $this->_sections['page']['total'] = 0;
if ($this->_sections['page']['show']):

            for ($this->_sections['page']['index'] = $this->_sections['page']['start'], $this->_sections['page']['iteration'] = 1;
                 $this->_sections['page']['iteration'] <= $this->_sections['page']['total'];
                 $this->_sections['page']['index'] += $this->_sections['page']['step'], $this->_sections['page']['iteration']++):
$this->_sections['page']['rownum'] = $this->_sections['page']['iteration'];
$this->_sections['page']['index_prev'] = $this->_sections['page']['index'] - $this->_sections['page']['step'];
$this->_sections['page']['index_next'] = $this->_sections['page']['index'] + $this->_sections['page']['step'];
$this->_sections['page']['first']      = ($this->_sections['page']['iteration'] == 1);
$this->_sections['page']['last']       = ($this->_sections['page']['iteration'] == $this->_sections['page']['total']);
?>
            <?php if ($this->_sections['page']['index'] == $this->_tpl_vars['offset']): ?>
                <span style=\"background-color:pink;\"><b><?php echo $this->_sections['page']['iteration']; ?>
</b></span>
            <?php else: ?>
                <a href="index.php?contents=<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&action=MonoList&sfd=<?php echo ((is_array($_tmp=$this->_tpl_vars['sfd'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&sod=<?php echo ((is_array($_tmp=$this->_tpl_vars['sod'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&limit=<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&offset=<?php echo $this->_sections['page']['index']; ?>
"><?php echo $this->_sections['page']['iteration']; ?>
</a>
            <?php endif; ?>
        <?php endfor; endif; ?>

        <?php if (( $this->_tpl_vars['offset'] + $this->_tpl_vars['limit'] ) < $this->_tpl_vars['count']): ?>
            <a href="index.php?contents=<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&action=MonoList&sfd=<?php echo ((is_array($_tmp=$this->_tpl_vars['sfd'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&sod=<?php echo ((is_array($_tmp=$this->_tpl_vars['sod'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&limit=<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&offset=<?php echo smarty_function_math(array('equation' => "offset + limit",'offset' => $this->_tpl_vars['offset'],'limit' => $this->_tpl_vars['limit'],'format' => "%d"), $this);?>
"><img src="images/right.gif" border="0"></a>
        <?php else: ?>
            <img src="images/right_grey.gif" border="0">
        <?php endif; ?>
        </noscript>
    <?php endif;  endif; ?>