<?php

/* $Id: Mock.php 144 2006-02-12 12:40:36Z shinobu $ */

class Mock{
    public function genMono(){
        return array(
                    array('one'=>'1'
                         ,'two'=>'2'
                         ,'three'=>'3'
                         ,'four'=>'4'
                    ),
                    array('jan'=>'1'
                         ,'feb'=>'2'
                         ,'march'=>'3'
                         ,'april'=>'4'
                   ),
                    array('��Τ'=>'Ǧ'
                         ,'dandy'=>'dot'
                         ,'�磻��'=>'333'
                         ,'�ƥ˥�'=>'����ץ饹'
                   )
               );
    }
}

?>
