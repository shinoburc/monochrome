<?php

/* $Id: MonoRegister.php 144 2006-02-12 12:40:36Z shinobu $ */

require_once 'MonoView.php';

class MonoRegister extends MonoView{
    public function genContent($key,$display = true,$ajax_only = false){
        $this->smarty->assign('ajax_only',$ajax_only);
        $this->smarty->assign('action','MonoInsert');
        $this->smarty->assign('contents',$key);
        $this->smarty->assign('primary_key_value',md5(uniqid(rand(),1)));
        $this->smarty->assign_by_ref('mono_iterator',$this->mono_iterator);
        $this->smarty->assign('engine',MonoUtil::genEngine());
        $this->smarty->display('MonoRegister.tpl');
    }
}

?>
