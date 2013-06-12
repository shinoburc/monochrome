<?php

/* $Id: MonoList.php 144 2006-02-12 12:40:36Z shinobu $ */

require_once 'MonoView.php';

class MonoList extends MonoView{
    public function genContent($key,$display = true,$ajax_only = false){
        $contents_config = MonoConfig::getConfig('config/contents.ini');
        $read_only = $contents_config->get_value($key . '_element','read_only');
        $this->smarty->assign('read_only',$read_only);
        $this->smarty->assign('ajax_only',$ajax_only);
        $this->smarty->assign('action','MonoRegister');
        $this->smarty->assign('contents',$key);
        $this->smarty->assign('engine',MonoUtil::genEngine());
        if(isset($this->mono_iterator[0])){
            $this->smarty->assign('count',$this->mono_iterator[0]->getOption('count'));
            $this->smarty->assign('limit',$this->mono_iterator[0]->getOption('limit'));
            $this->smarty->assign('offset',$this->mono_iterator[0]->getOption('offset'));
            $this->smarty->assign('sfd',$this->mono_iterator[0]->getOption('sfd'));
            $this->smarty->assign('sod',$this->mono_iterator[0]->getOption('sod'));
        }
        $this->smarty->assign_by_ref('mono_iterator',$this->mono_iterator);
        if($display){
            $this->smarty->display('MonoList.tpl');
        } else {
            return $this->smarty->fetch('MonoList.tpl');
        }
    }
}

?>
