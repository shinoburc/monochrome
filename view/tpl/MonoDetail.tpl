<div align="right"><a href="JavaScript:closeSubcontent()"><img src="images/close.gif" border=0 alt="close" title="close"></a></div>
<div style="color:#2F4F4F;font-size:8px;background-color:#bbaaaa;">&nbsp;</div>
<span style="color:#2F4F4F;font-size:25px;background-color:#bb8877;">Detail</span>
<form method="POST" action="index.php?contents={$contents}&action={$action|escape}">
{foreach item=mono from=$mono_iterator}
    <table border=0 cellspacing=1>
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
        {elseif $element->type eq "rich_text"}
            {* TODO *}
            <tr>
                <td class="htd">{$element->name|escape}</td>
                <td class="vtd">{$element->value}</td>
            </tr>
        {elseif $element->type eq "blob" or $element->type eq "file"}
            <tr>
                <td class="htd">{$element->name|escape}</td>
                {if $element->path eq ""}
                    <td class="vtd">no data</td>
                {else}
                    {* FIXME : image size config *}
                    {if $element->view_type eq "image"}
                        <td class="vtd"><img src="{$element->path|escape}" border="0"  width="50%"></td>
                    {else}
                        <td class="vtd"><img src="images/clip.gif"><a href="{$element->path|escape}">{$element->file_name|escape}({$element->file_size_view})</a></td>
                    {/if}
                {/if}
            </tr>
        {else}
            <tr>
                <td class="htd">{$element->name|escape}</td>
                <td class="vtd">{$element->value|escape}</td>
            </tr>
        {/if}
    {/foreach}
    </table>
{foreachelse}
NO ITEMS
{/foreach}
{* <input type="submit" value="戻る"> *}
</form>
