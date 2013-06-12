<?php /* Smarty version 2.6.12, created on 2008-02-24 14:20:04
         compiled from Header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Header.tpl', 3, false),)), $this); ?>
<html>
<head>
    <title><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</title>
    <META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
    <link rel="StyleSheet" type="text/css" href="view/css/mono.css">
    <script language="JavaScript" type="text/javascript" src="view/js/richtext.js"></script>
    <?php echo $this->_tpl_vars['ajaxHeader']; ?>

</head>
<body onload="JavaScript:updateMenuColor('<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');rich_text_init();">
<?php echo $this->_tpl_vars['ajaxBody']; ?>

<span style="color:#2F4F4F;font-size:25px;background-color:#bbaa77;"><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>