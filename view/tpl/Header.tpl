<html>
<head>
    <title>{$title|escape}</title>
    <META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
    <link rel="StyleSheet" type="text/css" href="view/css/mono.css">
    <script language="JavaScript" type="text/javascript" src="view/js/richtext.js"></script>
    {$ajaxHeader}
</head>
<body onload="JavaScript:updateMenuColor('{$contents|escape}');rich_text_init();">
{$ajaxBody}
<span style="color:#2F4F4F;font-size:25px;background-color:#bbaa77;">{$title|escape}</span>
