<div align="right"><a href="JavaScript:closeContent()"><img src="images/close.gif" border=0 alt="close" title="close"></a></div>
<div style="color:#2F4F4F;font-size:8px;background-color:#bbaaaa;">&nbsp;</div>
<form method="POST" action="index.php?contents={$contents|escape}&action={$action|escape}">
<span style="color:#2F4F4F;font-size:25px;background-color:#bb8877;">List - {$contents|escape}</span>
<!-- <table border=4 cellspacing=0 bordercolor="#bbaaaa">  -->
{include file="MonoPager.tpl"}
{if $read_only eq "true"}
<br><span style="color:pink;font-size:10px;background-color:#bb8877;">(read only mode)</span>
{/if}
<table border=0 cellspacing=1>
{foreach item=mono from=$mono_iterator}
    {if $display_header ne "true"}

        <tr class="htr">
        {foreach key=element_name item=element from=$mono->getIterator()}
            {if $element->type eq "primary_key"}
            {else}
                {if $element->sortable eq "false"}
                    <td>{$element->name|escape}</td>
                {else}
                    <td>
                    {if $ajax_only}
                        <a style="color:white;" href="javascript:
                            options_{$element_name|escape} = new Object();
                            options_{$element_name|escape}['key'] = '{$contents|escape}';
                            options_{$element_name|escape}['sfd'] = '{$element_name|escape}';
                            options_{$element_name|escape}['limit'] = '{$limit|escape}';
                            options_{$element_name|escape}['offset'] = '{$offset|escape}';
                            {if $element->sort eq "true"}
                                {if $element->order eq "desc"}
                                    options_{$element_name|escape}['sod'] = 'asc';
                                {else}
                                    options_{$element_name|escape}['sod'] = 'desc';
                                {/if}
                            {else}
                                options_{$element_name|escape}['sod'] = 'desc';
                            {/if}
                            genList(options_{$element_name|escape});">{$element->name|escape}</a>
                    {else}
                        <script type="text/javascript">
                            options_{$element_name|escape} = new Object();
                            options_{$element_name|escape}["key"] = "{$contents|escape}";
                            options_{$element_name|escape}["sfd"] = "{$element_name|escape}";
                            options_{$element_name|escape}["limit"] = "{$limit|escape}";
                            options_{$element_name|escape}["offset"] = "{$offset|escape}";
                            {if $element->sort eq "true"}
                                {if $element->order eq "desc"}
                                    options_{$element_name|escape}["sod"] = "asc";
                                {else}
                                    options_{$element_name|escape}["sod"] = "desc";
                                {/if}
                            {else}
                                options_{$element_name|escape}["sod"] = "desc";
                            {/if}
                            document.write("<a style=\"color:white;\" href=\"javascript:genList(options_{$element_name|escape})\">{$element->name|escape}</a>");
                        </script>
                        <noscript>
                            {if $element->sort eq "true"}
                                {if $element->order eq "desc"}
                                    <a href="index.php?contents={$contents|escape}&action=MonoList&sfd={$element_name|escape}&sod=asc&limit={$limit|escape}&offset={$offset|escape}">{$element->name|escape}</a>
                                {else}
                                    <a href="index.php?contents={$contents|escape}&action=MonoList&sfd={$element_name|escape}&sod=desc&limit={$limit|escape}&offset={$offset|escape}">{$element->name|escape}</a>
                                {/if}
                            {else}
                                <a href="index.php?contents={$contents|escape}&action=MonoList&sfd={$element_name|escape}&sod=desc&limit={$limit|escape}&offset={$offset|escape}">{$element->name|escape}</a>
                            {/if}
                        </noscript>
                    {/if}
                    {if $element->sort eq "true"}
                        {if $element->order eq "desc"}
                            <img src="images/up.gif">
                        {else}
                            <img src="images/down.gif">
                        {/if}
                    {/if}
                    </td>
                {/if}
            {/if}
        {/foreach}
            {* Modify Delete *}
            <td>&nbsp;</td><td>&nbsp;</td>
        </tr>
        {assign var="display_header" value="true"}
    {/if}

    <tr class="vtr">
    {foreach key=element_name item=element from=$mono->getIterator()}
        <!-- TODO -->
        {if $element->type eq "primary_key"}
        {*
        {elseif $element->type eq "int"}
        {elseif $element->type eq "float"}
        {elseif $element->type eq "timestamp"}
        {elseif $element->type eq "clob"}
        {elseif $element->type eq "alias"}
        {elseif $element->type eq "text"}
        *}
        {elseif $element->type eq "blob" or $element->type eq "file"}
            {if $element->path eq ""}
                <td>
                {if $element->detail_link eq "true"}
                    {if $ajax_only}
                        <a href="javascript:
                                options_{$mono->getPrimaryKey()} = new Object();
                                options_{$mono->getPrimaryKey()}['key'] = '{$contents|escape}';
                                options_{$mono->getPrimaryKey()}['id'] = '{$mono->getPrimaryKey()}';
                                genDetail(options_{$mono->getPrimaryKey()});">no data</a>
                    {else}
                        <script type="text/javascript">
                            options_{$mono->getPrimaryKey()|escape} = new Object();
                            options_{$mono->getPrimaryKey()|escape}["key"] = "{$contents|escape}";
                            options_{$mono->getPrimaryKey()|escape}["id"] = "{$mono->getPrimaryKey()|escape}";
                            document.write("<a href=\"javascript:genDetail(options_{$mono->getPrimaryKey()|escape})\">no data</a>");
                        </script>
                        <noscript>
                            <a href="index.php?contents={$contents}&action=MonoDetail&id={$mono->getPrimaryKey()}">no data</a>
                        </noscript>
                    {/if}
                {else}
                    no data
                {/if}
                </td>
            {else}
                <td>
                {if $element->detail_link eq "true"}
                    {if $element->view_type eq "image"}
                        {if $ajax_only}
                            <a href="javascript:
                                    options_{$mono->getPrimaryKey()} = new Object();
                                    options_{$mono->getPrimaryKey()}['key'] = '{$contents|escape}';
                                    options_{$mono->getPrimaryKey()}['id'] = '{$mono->getPrimaryKey()}';
                                    genDetail(options_{$mono->getPrimaryKey()});"><img src="{$element->path|escape}" border="0"  width="20%"></a>
                        {else}
                            <script type="text/javascript">
                                options_{$mono->getPrimaryKey()} = new Object();
                                options_{$mono->getPrimaryKey()}["key"] = "{$contents|escape}";
                                options_{$mono->getPrimaryKey()}["id"]  = "{$mono->getPrimaryKey()|escape}";
                                document.write("<a href=\"javascript:genDetail(options_{$mono->getPrimaryKey()})\"><img src=\"{$element->path|escape}\" border=\"0\"  width=\"20%\"></a>");
                            </script>
                            <noscript>
                                <a href="index.php?contents={$contents}&action=MonoDetail&id={$mono->getPrimaryKey()}"><img src="{$element->path|escape}" border="0"  width="20%"></a>
                            </noscript>
                        {/if}
                    {else}
                        <a href="{$element->path|escape}">{$element->file_name|escape}({$element->file_size_view})</a>
                    {/if}
                {else}
                    {if $element->view_type eq "image"}
                        <img src="{$element->path|escape}" border="0"  width="20%">
                    {else}
                        <a href="{$element->path|escape}">{$element->file_name|escape}({$element->file_size_view})</a>
                    {/if}
                {/if}
                </td>
            {/if}
        {elseif $element->type eq "rich_text"}
            <td>{$element->value}</td>
        {else}
            {if $element->detail_link eq "true"}
                <td>
                    {if $ajax_only}
                       <a href="javascript:
                                    options_{$mono->getPrimaryKey()} = new Object();
                                    options_{$mono->getPrimaryKey()}['key'] = '{$contents|escape}';
                                    options_{$mono->getPrimaryKey()}['id'] = '{$mono->getPrimaryKey()}';
                                    genDetail(options_{$mono->getPrimaryKey()});">{$element->value|escape}</a>
                    {else}
                        <script type="text/javascript">
                            options_{$mono->getPrimaryKey()} = new Object();
                            options_{$mono->getPrimaryKey()}["key"] = "{$contents|escape}";
                            options_{$mono->getPrimaryKey()}["id"]  = "{$mono->getPrimaryKey()|escape}";
                            document.write("<a href=\"javascript:genDetail(options_{$mono->getPrimaryKey()})\">{$element->value|escape}</a>");
                        </script>
                        <noscript>
                            <a href="index.php?contents={$contents}&action=MonoDetail&id={$mono->getPrimaryKey()}">{$element->value|escape}</a>
                        </noscript>
                    {/if}
                </td>
            {else}
                <td>{$element->value|escape}</td>
            {/if}
        {/if}
    {/foreach}
        <td>
            {if $ajax_only}
                {if $read_only eq "true"}
                    <span style="color:lightgrey;">Edit</span>
                {else}
                    <a href="index.php?contents={$contents}&action=MonoModify&id={$mono->getPrimaryKey()}">Edit</a>
                {/if}
            {else}
                <script type="text/javascript">
                    {if $read_only eq "true"}
                        document.write("<span style=\"color:lightgrey;\">Edit</span>");
                    {else}
                        document.write("<a href=\"index.php?contents={$contents}&action=MonoModify&id={$mono->getPrimaryKey()}\">Edit</a>");
                    {/if}
                </script>
                <noscript>
                    {if $read_only eq "true"}
                        <span style="color:lightgrey;">Edit</span>
                    {else}
                        <a href="index.php?contents={$contents}&action=MonoModify&id={$mono->getPrimaryKey()}">Edit</a>
                    {/if}
                </noscript>
            {/if}
        </td>
        <td>
            {if $ajax_only}
                {if $read_only eq "true"}
                    <span style="color:lightgrey;">Destroy</span>
                {else}
                    <a href="index.php?contents={$contents}&action=MonoDelete&id={$mono->getPrimaryKey()}">Destroy</a>
                {/if}
            {else}
                <script type="text/javascript">
                {if $read_only eq "true"}
                    document.write("<span style=\"color:lightgrey;\">Destroy</span>");
                {else}
                    document.write("<a href=\"index.php?contents={$contents}&action=MonoDelete&id={$mono->getPrimaryKey()}\">Destroy</a>");
                {/if}
                </script>
                <noscript>
                    {if $read_only eq "true"}
                        <span style="color:lightgrey;">Destroy</span>
                    {else}
                        <a href="index.php?contents={$contents}&action=MonoDelete&id={$mono->getPrimaryKey()}">Destroy</a>
                    {/if}
                </noscript>
            {/if}
        </td>
    </tr>
{foreachelse}
<tr class="vtr">
<td>
NO ITEMS
</td>
</tr>
{/foreach}
</table>
{if $read_only eq "true"}
    <span style="color:lightgrey;">create {$contents|escape}</span>
{else}
    <a href="index.php?contents={$contents|escape}&action={$action|escape}">create {$contents|escape}</a>
{/if}
</form>
