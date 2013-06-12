<form method="POST" action="index.php?contents={$contents}&action={$action|escape}" NAME="{$action|escape}" ENCTYPE="multipart/form-data" onSubmit="JavaScript:rich_text_pack();">
<table border="1">

{assign var="primary_key" value=false}
{foreach item=mono from=$mono_iterator}
    {foreach key=element_name item=element from=$mono->getIterator()}
        {if $element->type eq "primary_key"}
            {assign var="primary_key" value=$element_name}
            {assign var="primary_key_value" value=$element->value}
        {elseif $element->type eq "int"}
            <tr>
                <td>{$element->name|escape}</td>
                <td>{include file="InputTypeTextForm.tpl"}</td>
            </tr>
        {elseif $element->type eq "float"}
            <tr>
                <td>{$element->name|escape}</td>
                <td>{include file="InputTypeTextForm.tpl"}</td>
            </tr>
        {elseif $element->type eq "timestamp"}
            {if $element->auto_insert eq "true"}
                <input type="hidden" name="{$element_name|escape}" value="auto_insert">
            {elseif $element->auto_update eq "true"}
                <input type="hidden" name="{$element_name|escape}" value="auto_update">
            {else}
            <tr>
                <td>{$element_name|escape}</td>
                <td>
                    {html_select_date_j prefix="$element_name" time=$time start_year="-5" end_year="+1" }
                    {html_select_time prefix="$element_name" use_24_hours=true hour_extra="hour"}
                </td>
            </tr>
            {/if}
        {elseif $element->type eq "clob"}
            <tr>
                <td>{$element->name|escape}</td>
                <td>{include file="InputTypeTextForm.tpl"}</td>
            </tr>
        {elseif $element->type eq "blob" or $element->type eq "file"}
            <tr>
                <td>{$element->name|escape}</td>
                <td>{include file="InputTypeFileForm.tpl"}</td>
            </tr>
        {elseif $element->type eq "alias"}
        {elseif $element->type eq "rich_text"}
            <tr>
                <td>{$element->name|escape}</td>
                <td>{include file="InputTypeRichText.tpl"}</td>
            </tr>
        {elseif $element->type eq "text"}
            <tr>
                <td>{$element->name|escape}</td>
                <td>{include file="InputTypeTextForm.tpl"}</td>
            </tr>
        {else}
            <tr>
                <td>{$element->name|escape}</td>
                <td>{include file="InputTypeTextForm.tpl"}</td>
            </tr>
        {/if}
    {/foreach}
{/foreach}
</table>
{if $primary_key ne false}
<input type="hidden" name="{$primary_key|escape}" value="{$primary_key_value|escape}">
{/if}
<input type="submit" value="登録">
</form>
