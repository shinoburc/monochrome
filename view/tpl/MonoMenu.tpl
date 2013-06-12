<div align="right"><a href="JavaScript:closeMenu()"><img src="images/close.gif" border=0 alt="close" title="close"></a></div>
<div style="color:#2F4F4F;font-size:8px;background-color:#bbaaaa;">&nbsp;</div>
<span style="color:#2F4F4F;font-size:25px;background-color:#bb8877;">Menu</span>
<table border=0 cellspacing=1>
<tr>
{foreach key=key item=name from=$menus}
    <td id="menu_{$key}">
        {if $ajax_only}
            <a href="javascript:genList('{$key|escape}');">{$name|escape}</a>
        {else}
            <script type="text/javascript">
                options_{$key|escape} = new Object();
                options_{$key|escape}["key"] = "{$key|escape}";
                document.write("<a href=\"javascript:genList(options_{$key|escape});\">{$name|escape}</a>");
            </script>
            <noscript>
                <a href="index.php?contents={$key|escape}">{$name|escape}</a>
            </noscript>
        {/if}
    </td>
{/foreach}
</tr>
</table>
