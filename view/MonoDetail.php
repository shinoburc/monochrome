<?php

/* $Id: MonoDetail.php 144 2006-02-12 12:40:36Z shinobu $ */

require_once 'MonoView.php';

class MonoDetail extends MonoView{
    public function genContent($key,$display = true,$ajax_only = false){
        $this->smarty->assign('ajax_only',$ajax_only);
        $this->smarty->assign('action','MonoList');
        $this->smarty->assign('contents',$key);
        $this->smarty->assign('engine',MonoUtil::genEngine());
        $this->smarty->assign_by_ref('mono_iterator',$this->mono_iterator);
        if($display){
            $this->smarty->display('MonoDetail.tpl');
        } else {
            return $this->smarty->fetch('MonoDetail.tpl');
        }
    }
}

?>
