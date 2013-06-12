<iframe name="{$element_name}_mono_rich_text_dummy" width="{$element->view_width}" height="{$element->view_height}" src="{$element->path}" id="{$element_name}_mono_rich_text_dummy" frameborder="1"></iframe><br/>
<input type="hidden" name="{$element_name}" id="{$element_name}" value="">

<button type="button" title="bold" style="background-color:white;" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'Bold',false,null);">
&nbsp;<b>B</b>&nbsp;
</button>

&nbsp;

<button type="button" title="italic" style="background-color:white;" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'Italic',false,null);">
&nbsp;<i>I</i>&nbsp;&nbsp;
</button>

&nbsp;

<button type="button" title="underline" style="background-color:white;" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'Underline',false,null);">
&nbsp;<u>U</u>&nbsp;
</button>

&nbsp;|&nbsp;

<button type="button" title="sub script" style="background-color:white;" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'subscript',false,null);">
&nbsp;f<span style="vertical-align:sub;"><b>F</b></span>&nbsp;
</button>

&nbsp;

<button type="button" title="super script" style="background-color:white;" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'superscript',false,null);">
&nbsp;f<span style="vertical-align:super;"><b>F</b></span>&nbsp;
</button>

&nbsp;|&nbsp;

<button type="button" title="horizontal rule" style="background-color:white;" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'inserthorizontalrule',false,null);">
&nbsp;<b>hr</b>&nbsp;
</button>

&nbsp;|&nbsp;

<button type="button" title="indent" style="background-color:white;" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'indent',false,null);">
&nbsp;<b>i</b>&nbsp;
</button>

<button type="button" title="ordered list" style="background-color:white;" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'insertorderedlist',false,null);">
&nbsp;<b>ol</b>&nbsp;
</button>

<button type="button" title="unordered list" style="background-color:white;" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'insertunorderedlist',false,null);">
&nbsp;<b>ul</b>&nbsp;
</button>

&nbsp;|&nbsp;

<button type="button" style="background-color:white; text-align:left;" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'justifyleft',false,'');">
<b>left</b>&nbsp;&nbsp;
</button>
<button type="button" style="background-color:white; text-align:center" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'JustifyCenter',false,'');">
&nbsp;<b>center</b>&nbsp;
</button>
<button type="button" style="background-color:white; text-align:right" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'justifyright',false,'');">
&nbsp;&nbsp;<b>right</b>
</button>
<button type="button" style="background-color:white; text-align:full" onMouseDown="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'justifyfull',false,'');">
<b>full</b>
</button>

<br>

<select unselectable="on" onChange="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'fontsize',false, this.options[this.options.selectedIndex].value);">
    <option value="font-size">font-size
    <option value="1">1
    <option value="2">2
    <option value="3">3
    <option value="4">4
    <option value="5">5
    <option value="6">6
    <option value="7">7
</select>

{*
<select>
    <option value="font-size">font-size
    <option value="1px" onMouseDown="JavaScript:document.getElementById('{$element_name}_mono_rich_text_dummy').contentWindow.focus();execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'fontsize',false,'1px');">1px
    <option value="2px" onMouseDown="document.getElementById('{$element_name}_mono_rich_text_dummy').contentWindow.focus();JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'fontsize',false,'2px');">2px
    <option value="3px" onMouseDown="document.getElementById('{$element_name}_mono_rich_text_dummy').contentWindow.focus();JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'fontsize',false,'3px');">3px
    <option value="4px" onMouseDown="document.getElementById('{$element_name}_mono_rich_text_dummy').contentWindow.focus();JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'fontsize',false,'4px');">4px
    <option value="5px" onMouseDown="document.getElementById('{$element_name}_mono_rich_text_dummy').contentWindow.focus();JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'fontsize',false,'5px');">5px
    <option value="6px" onMouseDown="document.getElementById('{$element_name}_mono_rich_text_dummy').contentWindow.focus();JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'fontsize',false,'6px');">6px
    <option value="7px" onMouseDown="document.getElementById('{$element_name}_mono_rich_text_dummy').contentWindow.focus();JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'fontsize',false,'7px');">7px
</select>
*}

<select unselectable="on" onChange="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'forecolor',false, this.options[this.options.selectedIndex].value);">
    <option value="font-color">font-color
    <option value="white" style="color: grey; background-color:white;">white
    <option value="black" style="color: white; background-color:black;">black
    <option value="red" style="color: grey; background-color:red;">red
    <option value="orange" style="color: grey; background-color:orange;">orange
    <option value="yellow" style="color: grey; background-color:yellow;">yellow
    <option value="green" style="color: grey; background-color:green;">green
    <option value="cyan" style="color: grey; background-color:cyan;">cyan
    <option value="blue" style="color: white; background-color:blue;">blue
    <option value="magenta" style="color: grey; background-color:magenta;">magenta
    <option value="gray" style="color: white; background-color:gray;">gray
    <option value="darkGray" style="color: grey; background-color:darkGray;">darkGray
    <option value="lightGray" style="color: grey; background-color:lightGray;">lightGray
    <option value="pink" style="color: grey; background-color:pink;">pink
</select>

<select unselectable="on" onChange="JavaScript:execCmdButton(this,'{$element_name}_mono_rich_text_dummy',event,'fontname',false, this.options[this.options.selectedIndex].value);">
    <option value="font-famiry">font-famiry
    <option value="Osaka" style="font-size:8pt;font-family: Osaka;">Osaka
    <option value="arial" style="font-size:8pt;font-family: Arial;">arial
    <option value="Arial Black" style="font-size:8pt;font-family: Arial Black;">Arial Black
    <option value="helvetica" style="font-size:8pt;font-family: Helvetica;">helvetica
    <option value="Times New Roman" style="font-size:8pt;font-family: Times New Roman;">Times New Roman
    <option value="Times" style="font-size:8pt;font-family: Times;">Times
    <option value="serif" style="font-size:8pt;font-family: serif;">serif
    <option value="sans-serif" style="font-size:8pt;font-family: sans-serif;">sans-serif
    <option value="cursive" style="font-size:8pt;font-family: cursive;">cursive
    <option value="fantasy" style="font-size:8pt;font-family: fantasy;">fantasy
    <option value="Papyrus" style="font-size:8pt;font-family: Papyrus;">Papyrus
    <option value="monospace" style="font-size:8pt;font-family: monospace;">monospace
    <option value="Courier New" style="font-size:8pt;font-family: Courier New;">Courier New
    <option value="Comic Sans MS" style="font-size:8pt;font-family: Comic Sans MS;">Comic Sans MS
    <option value="Impact" style="font-size:8pt;font-family: Impact;">Impact
    <option value="Lucida Console" style="font-size:8pt;font-family: Lucida Console;">Lucida Console
    <option value="Marlett" style="font-size:8pt;font-family: Marlett;">Marlett
    <option value="Symbol" style="font-size:8pt;font-family: Symbol;">Symbol
    <option value="Tahoma" style="font-size:8pt;font-family: Tahoma;">Tahoma
    <option value="Verdana" style="font-size:8pt;font-family: Verdana;">Verdana
    <option value="Webdings">Webdings
    <option value="Wingdings">Wingdings
</select>

<p>

<!-- <button type="button" style="background-color:white;" onMouseDown="JavaScript:frames['{$element_name}_mono_rich_text_dummy'].document.body.innerHTML += '<table border=1><tr><td>1-1</td><td>1-2</td></tr><tr><td>2-1</td><td>2-2</td></tr></table><br>';">-->
<button type="button" title="create table" style="background-color:white;" onMouseDown="JavaScript:genTable('{$element_name}_mono_rich_text_dummy',document.getElementById('{$element_name}_table_rows').value,document.getElementById('{$element_name}_table_cols').value);">
&nbsp;<b>Table</b>&nbsp;
</button>

rows<input id="{$element_name}_table_rows" type="text" size="2" maxlength="2" value="2">
cols<input id="{$element_name}_table_cols" type="text" size="2" maxlength="2" value="2"> 
