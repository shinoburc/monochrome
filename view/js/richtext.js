var busy = false;
var doc;
var ua;
var isGecko;

function execCmdButton(obj,name,event, command, param1, param2){
    //toggleButtonBorder(obj);
    execute(name,event, command, param1, param2);
}

function execCmdSelectBox(obj,name,event, command, param1){
    //toggleButtonBorder(obj);
    execute(name,event, command, param1, obj.options[obj.options.selectedIndex].value);
}

function toggleButtonBorder(obj){
    if(obj.style.borderBottomStyle == 'dotted'){
        obj.style.border = 'none';
    } else {
        obj.style.border = 'dotted';
    }
}

function execute(name,event, command, param1, param2)
{
    if (!busy)
    {
        busy = true;
        try {
            if (isGecko) {
                iframe = document.getElementById(name);
                ic = iframe.contentDocument;
            } else {
                iframe = frames[name]; 
                ic = iframe.document;
            }
        } catch (e) {alert('error')}

        if(command == 'BackColor'){
            /* TODO */
            //range = iframe.contentWindow.document.body.ownerDocument.createRange();
            //iframe.contentWindow.document.body.ownerDocument.focus();
            //range = iframe.document.selection.createRange();
            //range.execCommand(command, param1, param2);
        } else {
            iframe.focus();
            ic.execCommand(command, param1, param2);
            iframe.focus();
                     
            if(event.preventDefault){
                event.preventDefault();
            }
            event.returnValue = false;
        }
        busy = false;
    }
    return false;
}

function init(iframe_names)
{
    user_agent = navigator.userAgent.toLowerCase();
    isGecko = (user_agent.indexOf('gecko') != -1 && user_agent.indexOf('safari') == -1);
    for (i=0; i<iframe_names.length; i++) {
        try {
            if (isGecko) {
                iframe = document.getElementById(iframe_names[i]);
                if(iframe){
                    ic = iframe.contentDocument;
                    ic.designMode = "on";
                }
            } else {
                //iframe = document.getElementById(iframe_names[i]);
                //iframe.document.designMode = "On";
                frames[iframe_names[i]].document.designMode = "On";
            }
        } catch (e) {alert('error')}
                                               
    }
}

function rich_text_init()
{
    var rich_text_fields = Array();
    for (i=0; i<frames.length; i++) {
        rich_text_fields[i] = frames[i].name;
    }
    init(rich_text_fields);
}

function rich_text_pack(){
    var pos = -1;
    var iframe_name;
    var hidden_name;
    for (i=0; i<frames.length; i++) {
        iframe_name = frames[i].name;
        pos = iframe_name.indexOf('_mono_rich_text_dummy',0);
        if(pos != -1){
            hidden_name = iframe_name.substring(0,pos);
            document.getElementById(hidden_name).value = frames[i].document.body.innerHTML;
        }
    }
}

function genTable(name,rows,cols){
    var table;

    table = '<table border=1>';
    for (i=0; i<rows; i++) {
        table += '<tr>';
        for (j=0; j<cols; j++) {
            table += '<td>' + i + '-' + j + '</td>';
        }
        table += '</tr>';
    }
    table += '</table><br>';
    frames[name].document.body.innerHTML += table;
}
