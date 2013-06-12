{if $limit > 0}
    {if $ajax_only}
        {if ($offset - $limit) >= 0}
            <a style="color:#bbaaaa;" href="javascript:
                            options_{$element_name|escape} = new Object();
                            options_{$element_name|escape}['key'] = '{$contents|escape}';
                            options_{$element_name|escape}['sfd'] = '{$sfd|escape}';
                            options_{$element_name|escape}['sod'] = '{$sod|escape}';
                            options_{$element_name|escape}['limit'] = '{$limit|escape}';
                            options_{$element_name|escape}['offset'] = '{math equation="offset - limit" offset=$offset limit=$limit format="%d"}';
                            genList(options_{$element_name|escape});"><img src="images/left.gif" border="0"></a>
        {else}
            <img src="images/left_grey.gif" border="0">
        {/if}
    
        {section name=page step=$limit loop=$count}
            {if $smarty.section.page.index eq $offset}
                <span style="background-color:pink;">{$smarty.section.page.iteration}</span>
            {else}
                <a style="color:brown;" href="javascript:
                            options_{$element_name|escape} = new Object();
                            options_{$element_name|escape}['key'] = '{$contents|escape}';
                            options_{$element_name|escape}['sfd'] = '{$sfd|escape}';
                            options_{$element_name|escape}['sod'] = '{$sod|escape}';
                            options_{$element_name|escape}['limit'] = '{$limit|escape}';
                            options_{$element_name|escape}['offset'] = {$smarty.section.page.index};
                            genList(options_{$element_name|escape});">{$smarty.section.page.iteration}</a>
            {/if}
        {/section}
                     
                     
        {if ($offset + $limit) < $count}
            <a style="color:#bbaaaa;" href="javascript:
                            options_{$element_name|escape} = new Object();
                            options_{$element_name|escape}['key'] = '{$contents|escape}';
                            options_{$element_name|escape}['sfd'] = '{$sfd|escape}';
                            options_{$element_name|escape}['sod'] = '{$sod|escape}';
                            options_{$element_name|escape}['limit'] = '{$limit|escape}';
                            options_{$element_name|escape}['offset'] = '{math equation="offset + limit" offset=$offset limit=$limit format="%d"}';
                            genList(options_{$element_name|escape});"><img src="images/right.gif" border="0"></a>
        {else}
            <img src="images/right_grey.gif" border="0">
        {/if}
    {* end ajax_only *}
    {else} {* end ajax_only *}
        <script type="text/javascript">
        {if ($offset - $limit) >= 0}
            options_{$element_name|escape}_left = new Object();
            options_{$element_name|escape}_left['key'] = '{$contents|escape}';
            options_{$element_name|escape}_left['sfd'] = '{$sfd|escape}';
            options_{$element_name|escape}_left['sod'] = '{$sod|escape}';
            options_{$element_name|escape}_left['limit'] = '{$limit|escape}';
            options_{$element_name|escape}_left['offset'] = '{math equation="offset - limit" offset=$offset limit=$limit format="%d"}';
            document.write("<a style=\"color:#bbaaa;\" href=\"javascript:genList(options_{$element_name|escape}_left)\"><img src=\"images/left.gif\" border=\"0\"></a>");
        {else}
            document.write("<img src=\"images/left_grey.gif\" border=\"0\">");
        {/if}

        {section name=page step=$limit loop=$count}
            options_{$smarty.section.page.index} = new Object();
            options_{$smarty.section.page.index}['key'] = '{$contents|escape}';
            options_{$smarty.section.page.index}['sfd'] = '{$sfd|escape}';
            options_{$smarty.section.page.index}['sod'] = '{$sod|escape}';
            options_{$smarty.section.page.index}['limit'] = '{$limit|escape}';
            options_{$smarty.section.page.index}['offset'] = {$smarty.section.page.index};
            {if $smarty.section.page.index eq $offset}
                document.write(" <span style=\"background-color:pink;\">{$smarty.section.page.iteration}</span> ");
            {else}
                document.write(" <a style=\"color:brown;\" href=\"javascript:genList(options_{$smarty.section.page.index});\">{$smarty.section.page.iteration}</a> ");
            {/if}
        {/section}

        {if ($offset + $limit) < $count}
            options_{$element_name|escape}_right = new Object();
            options_{$element_name|escape}_right['key'] = '{$contents|escape}';
            options_{$element_name|escape}_right['sfd'] = '{$sfd|escape}';
            options_{$element_name|escape}_right['sod'] = '{$sod|escape}';
            options_{$element_name|escape}_right['limit'] = '{$limit|escape}';
            options_{$element_name|escape}_right['offset'] = '{math equation="offset + limit" offset=$offset limit=$limit format="%d"}';
            document.write("<a style=\"color:#bbaaa;\" href=\"javascript:genList(options_{$element_name|escape}_right)\"><img src=\"images/right.gif\" border=\"0\"></a>");
        {else}
            document.write("<img src=\"images/right_grey.gif\" border=\"0\">");
        {/if}
        </script>
        <noscript>
        {if ($offset - $limit) >= 0}
            <a href="index.php?contents={$contents|escape}&action=MonoList&sfd={$sfd|escape}&sod={$sod|escape}&limit={$limit|escape}&offset={math equation="offset - limit" offset=$offset limit=$limit format="%d"}"><img src="images/left.gif" border="0"></a>
        {else}
            <img src="images/left_grey.gif" border="0">
        {/if}

        {section name=page step=$limit loop=$count}
            {if $smarty.section.page.index eq $offset}
                <span style=\"background-color:pink;\"><b>{$smarty.section.page.iteration}</b></span>
            {else}
                <a href="index.php?contents={$contents|escape}&action=MonoList&sfd={$sfd|escape}&sod={$sod|escape}&limit={$limit|escape}&offset={$smarty.section.page.index}">{$smarty.section.page.iteration}</a>
            {/if}
        {/section}

        {if ($offset + $limit) < $count}
            <a href="index.php?contents={$contents|escape}&action=MonoList&sfd={$sfd|escape}&sod={$sod|escape}&limit={$limit|escape}&offset={math equation="offset + limit" offset=$offset limit=$limit format="%d"}"><img src="images/right.gif" border="0"></a>
        {else}
            <img src="images/right_grey.gif" border="0">
        {/if}
        </noscript>
    {/if}
{/if}
