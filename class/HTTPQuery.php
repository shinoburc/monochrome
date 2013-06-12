<?php
/**
 * HTTPQuery specified Monochrome
 * @package Monochrome
 * @subpackage MonochromeClass
 * @authors MIYAZATO Shinobu <shinobu@users.sourceforge.jp>
 * @version $Id: HTTPQuery.php 144 2006-02-12 12:40:36Z shinobu $
 */
class HTTPQuery{
    private $htmlspecialchars_GET  = array();
    private $htmlspecialchars_POST = array();
    private $sd = array();
    private $id;
    private $url;
    private $pathinfo = array();

    /**
     * Constructor
     * set htmlspecialchars $_GET and $_POST
     * @param  void
     * @return  void
     */
    function __construct(){
        if(isset($_SERVER['PATH_INFO'])){
            $this->setPathInfo($_SERVER['PATH_INFO']);
        }
        if(isset($_GET)){
            $this->htmlspecialchars_GET  = $this->htmlspecialchars_all($_GET);
        }
        if(isset($_POST)){
            $this->htmlspecialchars_POST = $this->htmlspecialchars_all($_POST);
        }
        $this->setSd();
        $this->setURL();
    }

    /**
     * set PATH_INFO
     * @param   array   $_SERVER['PATH_INFO']
     */
    public function setPathInfo($pathinfo){
        $this->pathinfo = explode("/",$pathinfo);
        array_shift($this->pathinfo);
    }
    
    /**
     * get PATH_INFO
     * @param   int     PATH_INFO array index
     * @return  string  PATH_INFO array value
     */
    public function getPathInfo($index = null){
        if(is_null($index)){
            return $this->pathinfo;
        }
        if(isset($this->pathinfo[$index])){
            $rtn = $this->pathinfo[$index];
            return $rtn;
        } else {
            return null;
        }
    }

    /**
     * get htmlspecialchars PATH_INFO
     * @param   int     PATH_INFO array index
     * @return  string  PATH_INFO array value
     */
    public function getSafePathInfo($index = null){
        return htmlspecialchars($this->getPathInfo($index));
    }

    /**
     * get htmlspecialchars $_GET["id"]
     * @param  void
     * @return  string  htmlspecialchars($_GET["id"]);
     */
    public function getId(){
        /*
        $id = $this->getSafeGet("id");
        if($id == ""){
            $id = NULL;
        }
        return $id;
        */
        return $this->getSafePathInfo(0);
    }

    /**
     * set sd($_GET["sd"] : serialize data) array
     * @param  void
     * @return  string  htmlspecialchars($_GET["id"]);
     */
    private function setSd(){
        /*
        $sd = $this->getSafeGet("sd");
        */
        $sd = $this->getSafePathInfo(1);
        if(!is_null($sd)){
            $this->sd = explode("::",$sd);
        }
    }
    
    /**
     * get sd($_GET["sd"] : serialize data)
     * $target = $HTTPQuery->getSd(0);
     * $command = $HTTPQuery->getSd(1);
     * $key = $HTTPQuery->getSd(2);
     * 
     * @param  integer  offset
     * @return  string  htmlspecialchars($_GET["sd"][offset]);
     */
    public function getSd($offset = NULL){
        if(is_null($offset)){
            return $this->getSafePathInfo(1);
        }

        if(isset($this->sd[$offset])){
            return $this->sd[$offset];
        } else {
            return NULL;
        }
    }

    /**
     * set url of ChulaBlog
     * if $url given ,set $url.
     * if no $url given , set $url using $_SERVER information.
     *
     * @param   string  url
     * @return  void
     */
    public function setURL($url = NULL){
        if(is_null($url)){
            if(isset($_SERVER['SERVER_PROTOCOL']) and preg_match("/https/i",$_SERVER['SERVER_PROTOCOL'])){
                $protocol = "https";
            } else {
                $protocol = "http";
            }
            if(isset($_SERVER['HTTP_HOST'])){
                $url = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
            }
        }
        $this->url = $url;
    }

    /**
     * get url of ChulaBlog
     * @return  string  url
     */
    public function getURL(){
        return $this->url;
    }

    /**
     * get htmlspecialchars $_GET
     * @param  string   index of $_GET
     * @return  string  htmlspecialchars($_GET[$name]);
     */
    public function getSafeGet($name = NULL){
        if(is_null($name)){
            return($this->htmlspecialchars_GET);
        } else {
            if(isset($this->htmlspecialchars_GET[$name])){
                return($this->htmlspecialchars_GET[$name]);
            } else {
                return NULL;
            }
        }
    }

    /**
     * get $_GET
     * @param  string   index of $_GET
     * @return  string  $_GET[$name];
     */
    public function getGet($name = NULL){
        if(is_null($name)){
            return($_GET);
        } else {
            if(isset($_GET[$name])){
                return($_GET[$name]);
            } else {
                return NULL;
            }
        }
    }

    /**
     * get htmlspecialchars $_POST
     * @param  string   index of $_POST
     * @return  string  htmlspecialchars($_POST[$name]);
     */
    public function getSafePost($name = NULL){
        if(is_null($name)){
            return($this->htmlspecialchars_POST);
        } else {
            if(isset($this->htmlspecialchars_POST[$name])){
                return($this->htmlspecialchars_POST[$name]);
            } else {
                return NULL;
            }
        }
    }

    /**
     * get $_POST
     * @param  string   index of $_POST
     * @return  string  $_POST[$name];
     */
    public function getPost($name = NULL){
        if(is_null($name)){
            return($_POST);
        } else {
            if(isset($_POST[$name])){
                return($_POST[$name]);
            } else {
                return NULL;
            }
        }
    }

    /**
     * htmlspecialchars $_GET and $_POST
     * @param  mixed    index of $_GET or $_POST
     * @return  mixed   htmlspecialchars($_GET[$dest]); or htmlspecialchars($_POST[$dest]);
     */
    private function htmlspecialchars_all($dest){
        if(is_int($dest) or is_float($dest)){
            return $dest;
        } else if(is_string($dest)){
            return htmlspecialchars($dest);
        } else if(is_array($dest)){
            $return_array = array();
            foreach($dest as $name => $value){
                $return_array[$this->htmlspecialchars_all($name)] = $this->htmlspecialchars_all($value);
            }
            return $return_array;
        } else if(is_object($dest)){
            return $dest;
       }
    }

    /**
     * generateURI using id and sd
     * if id is null, return "index.php"
     * if id is not null and sd is null, return "index.php/id"
     * if id is not null and sd is not null, return "index.php/id/sd"
     * @param   string  id(target id)
     * @param   string  sd(seriarized command)
     * @return  string  uri
     */
    public function genURI($id = null,$sd = null){
        if(is_null($id)){
            return $this->getURL();
        }
        if(empty($id)){
            $id = $this->guest_user_id;
        }

        if(is_null($sd)){
            /*
            return "index.php?id=" . $id;
            */
            return $this->getURL() . "/" . $id;
        } else {
            /*
            return "index.php?id=" . $id . "&sd=" . $sd;
            */
            return $this->getURL() . "/" . $id . "/" . $sd;
        }
    }
}
?>
