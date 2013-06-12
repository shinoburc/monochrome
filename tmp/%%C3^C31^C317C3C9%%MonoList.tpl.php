<?php /* Smarty version 2.6.12, created on 2008-02-24 14:20:06
         compiled from MonoList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'MonoList.tpl', 3, false),)), $this); ?>
<div align="right"><a href="JavaScript:closeContent()"><img src="images/close.gif" border=0 alt="close" title="close"></a></div>
<div style="color:#2F4F4F;font-size:8px;background-color:#bbaaaa;">&nbsp;</div>
<form method="POST" action="index.php?contents=<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&action=<?php echo ((is_array($_tmp=$this->_tpl_vars['action'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<span style="color:#2F4F4F;font-size:25px;background-color:#bb8877;">List - <?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>
<!-- <table border=4 cellspacing=0 bordercolor="#bbaaaa">  -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "MonoPager.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  if ($this->_tpl_vars['read_only'] == 'true'): ?>
<br><span style="color:pink;font-size:10px;background-color:#bb8877;">(read only mode)</span>
<?php endif; ?>
<table border=0 cellspacing=1>
<?php $_from = $this->_tpl_vars['mono_iterator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mono']):
?>
    <?php if ($this->_tpl_vars['display_header'] != 'true'): ?>

        <tr class="htr">
        <?php $_from = $this->_tpl_vars['mono']->getIterator(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element_name'] => $this->_tpl_vars['element']):
?>
            <?php if ($this->_tpl_vars['element']->type == 'primary_key'): ?>
            <?php else: ?>
                <?php if ($this->_tpl_vars['element']->sortable == 'false'): ?>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
                <?php else: ?>
                    <td>
                    <?php if ($this->_tpl_vars['ajax_only']): ?>
                        <a style="color:white;" href="javascript:
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 = new Object();
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['key'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['sfd'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['limit'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['offset'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['offset'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                            <?php if ($this->_tpl_vars['element']->sort == 'true'): ?>
                                <?php if ($this->_tpl_vars['element']->order == 'desc'): ?>
                                    options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['sod'] = 'asc';
                                <?php else: ?>
                                    options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['sod'] = 'desc';
                                <?php endif; ?>
                            <?php else: ?>
                                options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
['sod'] = 'desc';
                            <?php endif; ?>
                            genList(options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
);"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
                    <?php else: ?>
                        <script type="text/javascript">
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 = new Object();
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
["key"] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
";
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
["sfd"] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
";
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
["limit"] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
";
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
["offset"] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['offset'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
";
                            <?php if ($this->_tpl_vars['element']->sort == 'true'): ?>
                                <?php if ($this->_tpl_vars['element']->order == 'desc'): ?>
                                    options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
["sod"] = "asc";
                                <?php else: ?>
                                    options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
["sod"] = "desc";
                                <?php endif; ?>
                            <?php else: ?>
                                options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
["sod"] = "desc";
                            <?php endif; ?>
                            document.write("<a style=\"color:white;\" href=\"javascript:genList(options_<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)\"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>");
                        </script>
                        <noscript>
                            <?php if ($this->_tpl_vars['element']->sort == 'true'): ?>
                                <?php if ($this->_tpl_vars['element']->order == 'desc'): ?>
                                    <a href="index.php?contents=<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&action=MonoList&sfd=<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&sod=asc&limit=<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&offset=<?php echo ((is_array($_tmp=$this->_tpl_vars['offset'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
                                <?php else: ?>
                                    <a href="index.php?contents=<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&action=MonoList&sfd=<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&sod=desc&limit=<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&offset=<?php echo ((is_array($_tmp=$this->_tpl_vars['offset'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="index.php?contents=<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&action=MonoList&sfd=<?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&sod=desc&limit=<?php echo ((is_array($_tmp=$this->_tpl_vars['limit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&offset=<?php echo ((is_array($_tmp=$this->_tpl_vars['offset'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
                            <?php endif; ?>
                        </noscript>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['element']->sort == 'true'): ?>
                        <?php if ($this->_tpl_vars['element']->order == 'desc'): ?>
                            <img src="images/up.gif">
                        <?php else: ?>
                            <img src="images/down.gif">
                        <?php endif; ?>
                    <?php endif; ?>
                    </td>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
                        <td>&nbsp;</td><td>&nbsp;</td>
        </tr>
        <?php $this->assign('display_header', 'true'); ?>
    <?php endif; ?>

    <tr class="vtr">
    <?php $_from = $this->_tpl_vars['mono']->getIterator(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element_name'] => $this->_tpl_vars['element']):
?>
        <!-- TODO -->
        <?php if ($this->_tpl_vars['element']->type == 'primary_key'): ?>
                <?php elseif ($this->_tpl_vars['element']->type == 'blob' || $this->_tpl_vars['element']->type == 'file'): ?>
            <?php if ($this->_tpl_vars['element']->path == ""): ?>
                <td>
                <?php if ($this->_tpl_vars['element']->detail_link == 'true'): ?>
                    <?php if ($this->_tpl_vars['ajax_only']): ?>
                        <a href="javascript:
                                options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
 = new Object();
                                options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
['key'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                                options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
['id'] = '<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
';
                                genDetail(options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
);">no data</a>
                    <?php else: ?>
                        <script type="text/javascript">
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['mono']->getPrimaryKey())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 = new Object();
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['mono']->getPrimaryKey())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
["key"] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
";
                            options_<?php echo ((is_array($_tmp=$this->_tpl_vars['mono']->getPrimaryKey())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
["id"] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['mono']->getPrimaryKey())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
";
                            document.write("<a href=\"javascript:genDetail(options_<?php echo ((is_array($_tmp=$this->_tpl_vars['mono']->getPrimaryKey())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)\">no data</a>");
                        </script>
                        <noscript>
                            <a href="index.php?contents=<?php echo $this->_tpl_vars['contents']; ?>
&action=MonoDetail&id=<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
">no data</a>
                        </noscript>
                    <?php endif; ?>
                <?php else: ?>
                    no data
                <?php endif; ?>
                </td>
            <?php else: ?>
                <td>
                <?php if ($this->_tpl_vars['element']->detail_link == 'true'): ?>
                    <?php if ($this->_tpl_vars['element']->view_type == 'image'): ?>
                        <?php if ($this->_tpl_vars['ajax_only']): ?>
                            <a href="javascript:
                                    options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
 = new Object();
                                    options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
['key'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                                    options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
['id'] = '<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
';
                                    genDetail(options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
);"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['element']->path)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" border="0"  width="20%"></a>
                        <?php else: ?>
                            <script type="text/javascript">
                                options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
 = new Object();
                                options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
["key"] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
";
                                options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
["id"]  = "<?php echo ((is_array($_tmp=$this->_tpl_vars['mono']->getPrimaryKey())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
";
                                document.write("<a href=\"javascript:genDetail(options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
)\"><img src=\"<?php echo ((is_array($_tmp=$this->_tpl_vars['element']->path)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
\" border=\"0\"  width=\"20%\"></a>");
                            </script>
                            <noscript>
                                <a href="index.php?contents=<?php echo $this->_tpl_vars['contents']; ?>
&action=MonoDetail&id=<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['element']->path)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" border="0"  width="20%"></a>
                            </noscript>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['element']->path)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->file_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
(<?php echo $this->_tpl_vars['element']->file_size_view; ?>
)</a>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if ($this->_tpl_vars['element']->view_type == 'image'): ?>
                        <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['element']->path)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" border="0"  width="20%">
                    <?php else: ?>
                        <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['element']->path)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->file_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
(<?php echo $this->_tpl_vars['element']->file_size_view; ?>
)</a>
                    <?php endif; ?>
                <?php endif; ?>
                </td>
            <?php endif; ?>
        <?php elseif ($this->_tpl_vars['element']->type == 'rich_text'): ?>
            <td><?php echo $this->_tpl_vars['element']->value; ?>
</td>
        <?php else: ?>
            <?php if ($this->_tpl_vars['element']->detail_link == 'true'): ?>
                <td>
                    <?php if ($this->_tpl_vars['ajax_only']): ?>
                       <a href="javascript:
                                    options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
 = new Object();
                                    options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
['key'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
                                    options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
['id'] = '<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
';
                                    genDetail(options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
);"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->value)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
                    <?php else: ?>
                        <script type="text/javascript">
                            options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
 = new Object();
                            options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
["key"] = "<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
";
                            options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
["id"]  = "<?php echo ((is_array($_tmp=$this->_tpl_vars['mono']->getPrimaryKey())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
";
                            document.write("<a href=\"javascript:genDetail(options_<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
)\"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->value)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>");
                        </script>
                        <noscript>
                            <a href="index.php?contents=<?php echo $this->_tpl_vars['contents']; ?>
&action=MonoDetail&id=<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->value)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
                        </noscript>
                    <?php endif; ?>
                </td>
            <?php else: ?>
                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['element']->value)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
        <td>
            <?php if ($this->_tpl_vars['ajax_only']): ?>
                <?php if ($this->_tpl_vars['read_only'] == 'true'): ?>
                    <span style="color:lightgrey;">Edit</span>
                <?php else: ?>
                    <a href="index.php?contents=<?php echo $this->_tpl_vars['contents']; ?>
&action=MonoModify&id=<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
">Edit</a>
                <?php endif; ?>
            <?php else: ?>
                <script type="text/javascript">
                    <?php if ($this->_tpl_vars['read_only'] == 'true'): ?>
                        document.write("<span style=\"color:lightgrey;\">Edit</span>");
                    <?php else: ?>
                        document.write("<a href=\"index.php?contents=<?php echo $this->_tpl_vars['contents']; ?>
&action=MonoModify&id=<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
\">Edit</a>");
                    <?php endif; ?>
                </script>
                <noscript>
                    <?php if ($this->_tpl_vars['read_only'] == 'true'): ?>
                        <span style="color:lightgrey;">Edit</span>
                    <?php else: ?>
                        <a href="index.php?contents=<?php echo $this->_tpl_vars['contents']; ?>
&action=MonoModify&id=<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
">Edit</a>
                    <?php endif; ?>
                </noscript>
            <?php endif; ?>
        </td>
        <td>
            <?php if ($this->_tpl_vars['ajax_only']): ?>
                <?php if ($this->_tpl_vars['read_only'] == 'true'): ?>
                    <span style="color:lightgrey;">Destroy</span>
                <?php else: ?>
                    <a href="index.php?contents=<?php echo $this->_tpl_vars['contents']; ?>
&action=MonoDelete&id=<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
">Destroy</a>
                <?php endif; ?>
            <?php else: ?>
                <script type="text/javascript">
                <?php if ($this->_tpl_vars['read_only'] == 'true'): ?>
                    document.write("<span style=\"color:lightgrey;\">Destroy</span>");
                <?php else: ?>
                    document.write("<a href=\"index.php?contents=<?php echo $this->_tpl_vars['contents']; ?>
&action=MonoDelete&id=<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
\">Destroy</a>");
                <?php endif; ?>
                </script>
                <noscript>
                    <?php if ($this->_tpl_vars['read_only'] == 'true'): ?>
                        <span style="color:lightgrey;">Destroy</span>
                    <?php else: ?>
                        <a href="index.php?contents=<?php echo $this->_tpl_vars['contents']; ?>
&action=MonoDelete&id=<?php echo $this->_tpl_vars['mono']->getPrimaryKey(); ?>
">Destroy</a>
                    <?php endif; ?>
                </noscript>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; else: ?>
<tr class="vtr">
<td>
NO ITEMS
</td>
</tr>
<?php endif; unset($_from); ?>
</table>
<?php if ($this->_tpl_vars['read_only'] == 'true'): ?>
    <span style="color:lightgrey;">create <?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>
<?php else: ?>
    <a href="index.php?contents=<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&action=<?php echo ((is_array($_tmp=$this->_tpl_vars['action'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">create <?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
<?php endif; ?>
</form>