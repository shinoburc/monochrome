<?php

/* $Id: MonoView.php 144 2006-02-12 12:40:36Z shinobu $ */

require_once 'Smarty/Smarty.class.php';
require_once 'HTML/AJAX/Server.php';

abstract class MonoView{
    protected $mono_iterator;
    protected $smarty;

    public function __construct($mono_iterator){
        $this->mono_iterator = $mono_iterator;
        $this->smarty = new Smarty();
        $this->smarty->template_dir = 'view/tpl';
        $this->smarty->compile_dir = 'tmp';
    }
    
    public function display($key){
        $this->genHeader($key);

        echo '<div id="ajax_message_stage">';
        echo '</div>';

        echo '<div id="ajax_menu_stage">';
        $this->genMonoMenu($key);
        echo '</div>';

        echo '<div id="ajax_content_stage">';
        $this->genContent($key);
        echo '</div>';

        echo '<div id="ajax_subcontent_stage"></div>';
        $this->genFooter($key);
    }

    protected function genHeader($key){
        $this->smarty->assign('title','Monochrome');
        $this->smarty->assign('contents',$key);
        $this->smarty->assign('ajaxHeader',$this->genAjaxHeader($key));
        $this->smarty->assign('ajaxBody',$this->genAjaxBody($key));
        $this->smarty->assign('engine',MonoUtil::genEngine());
        $this->smarty->display('Header.tpl');
    }

    protected function genEngine(){
        if(stristr($_SERVER['HTTP_USER_AGENT'],'safari')){
            return 'khtml';
        } else if(stristr($_SERVER['HTTP_USER_AGENT'],'firefox')){
            return 'gecko';
        } else if(stristr($_SERVER['HTTP_USER_AGENT'],'w3m')){
            return 'w3m';
        } else {
            return 'gecko';
        }
    }

    protected function genAjaxHeader($key){
        return '<script type="text/javascript" src="ajax.php?client=Util,main,dispatcher,httpclient,request,json,loading"></script>'
             . '<script type="text/javascript" src="ajax.php?stub=ajax"></script>'
             . '<script type="text/javascript">'
             . 'function callback() {}'
             . '    callback.prototype = {'
             . '        genDetail: function(result) {'
             . '            document.getElementById("ajax_subcontent_stage").innerHTML = result;'
             . '        },'
             . '        genList: function(result) {'
             . '            document.getElementById("ajax_content_stage").innerHTML = result;'
             . '        },'
             . '        genDeleteAndList: function(result) {'
             . '            document.getElementById("ajax_content_stage").innerHTML = result;'
             . '        }'
             . '    }'
             . '</script>';
    }

    protected function genAjaxBody($key){
        $contents_config = MonoConfig::getConfig('config/contents.ini');
        $keys = $contents_config->get_value('common_contents');

        foreach($keys as $key_name => $keys_value){
            $js_keys_tmp[] = '"' . $key_name . '"';
        }
        $js_keys = 'var keys = new Array(' . implode(',',$js_keys_tmp) . ');';
                        
        return '<script type="text/javascript">
                    var proxy = new ajax(new callback());'
                  . $js_keys . '
                    function genDetail(options) {
                        proxy.genDetail(options);
                    }
                    function genList(options) {
                        proxy.genList(options);
                        updateMenuColor(options["key"]);
                    }
                    function genDeleteAndList(key,id) {
                        proxy.genDeleteAndList(key,id);
                    }
                    function closeMessage() {
                        document.getElementById("ajax_message_stage").innerHTML = "";
                    }
                    function closeMenu() {
                        document.getElementById("ajax_menu_stage").innerHTML = "";
                    }
                    function closeContent() {
                        document.getElementById("ajax_content_stage").innerHTML = "";
                    }
                    function closeSubcontent() {
                        document.getElementById("ajax_subcontent_stage").innerHTML = "";
                    }
                    function updateMenuColor(key){
                        for (i=0; i<keys.length; i++) {
                            if (keys[i] == key) {
                                document.getElementById("menu_" + keys[i]).style.backgroundColor= "pink";
                            } else {
                                document.getElementById("menu_" + keys[i]).style.backgroundColor= "white";
                            }
                        }
                    }
                </script>';
                                                                     
    }

    protected function genMonoMenu($key){
        $this->smarty->assign('contents',$key);
        $this->smarty->assign('engine',MonoUtil::genEngine());
        $contents_config = MonoConfig::getConfig('config/contents.ini');
        $this->smarty->assign('menus',$contents_config->get_value('common_contents'));
        $this->smarty->display('MonoMenu.tpl');
    }

    abstract public function genContent($key,$display = true,$ajax_only = false);

    protected function genFooter($key){
        $this->smarty->display('Footer.tpl');
    }
}

?>
