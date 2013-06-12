<?php
/**
 * Config
 * @package ChulaBlog
 * @subpackage ChulaClass
 * @author MIYAZATO Shinobu <shinobu@users.sourceforge.jp>
 * @version $Id: Config.php 30 2006-01-22 01:44:58Z shinobu $
 */
class Config{

    private $ini_file;
    private $ini_file_array;

    /**
     * Constractor
     * Run from plugin configurator when plug in.
     * @param  string   ini file
     * @return  $this
     */
    function __construct( $ini_file = NULL ){
        if( is_null($ini_file)){
            $this->set_ini_file(NULL);
            $this->ini_file_array = NULL;
        } else {
            if( file_exists( $ini_file )){
                $this->set_ini_file( $ini_file );
                $this->parse();
            } else {
                $this->set_ini_file(NULL);
                $this->ini_file_array = NULL;
            }
        }
    }

    /**
     * Ini file setter.
     * @param  string   ini file
     * @return  void
     */
    public function set_ini_file( $ini_file ){
        $this->ini_file = $ini_file;
    }

    /**
     * Ini file parser.
     * @param  boolean  parse_ini_file() param.
     * @return  void
     * @see parse_ini_fil
     */
    public function parse( $parse_flag = TRUE){
        $this->ini_file_array = parse_ini_file( $this->ini_file, $parse_flag);
    }

    /**
     * Ini file getter.
     * @param   void
     * @return  string  ini file name.
     */
    public function get_ini_file(){
        return $this->ini_file;
    }

    /**
     * get config value using 
     *
     * $Config->get_value("INDEX"); // return $ini_file_array;
     * $Config->get_value("INDEX"); // return $ini_file_array["INDEX"];
     * $Config->get_value("INDEX","ITEM"); // return $ini_file_array["INDEX"]["ITEM"];
     *
     * @param   string  index of config array
     * @param   string  item
     * @return  mixed   config value.
     */
    public function get_value($index = NULL,$item = NULL){
        if(is_null($index)){
            return $this->ini_file_array;
        } else if(is_null($item)){
            if(array_key_exists($index,$this->ini_file_array)){
                return $this->ini_file_array["$index"];
            } else {
                return NULL;
            }
        } else {
            if(isset($this->ini_file_array["$index"]["$item"])){
                return $this->ini_file_array["$index"]["$item"];
            } else {
                return NULL;
            }
        }
    }

    /**
     * return states for ChulaView.
     * @param  void
     * @return  array  state array. state_name => description
     */
    public function set_value($set_value = NULL,$index = NULL,$item = NULL){
        if(is_null($index)){
            $this->ini_file_array = $set_value;
        } else if(is_null($item)){
            $this->ini_file_array["$index"] = $set_value;
        } else {
            $this->ini_file_array["$index"]["$item"] = $set_value;
        }
    }

    /**
     * write ini file using $this->ini_file_array;
     * @param  void
     * @return  void
     */
    public function flush(){
    }
}
?>
