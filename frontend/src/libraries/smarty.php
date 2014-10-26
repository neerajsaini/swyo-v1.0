<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(VENDOR_PATH . 'smarty/libs_3.1.19/Smarty.class.php');
 
class CI_Smarty extends Smarty 
{
    function __construct()
    {
        parent::__construct();

        // DIRECTORY
        //------------------------------------------------------
        $this->setTemplateDir(rtrim(SMARTY_T_PATH,'/'));
        $this->setCompileDir(SMARTY_C_PATH.'/compiled');
        $this->setConfigDir(SMARTY_C_PATH.'/config');
        $this->setCacheDir(SMARTY_C_PATH.'/cache');
 
        // SETTING
        //------------------------------------------------------
        //$this-> debugging = 1;
        $this-> force_compile = 1;
        $this-> compile_check = 0;
        
        $this-> error_reporting = E_ALL;
        $this-> left_delimiter = "{{"; 
        $this-> right_delimiter = "}}";

        // ASSIGN
        //------------------------------------------------------
        $this->assign( 'APPPATH', APPPATH );
        $this->assign( 'BASEPATH', BASEPATH );
        
        if ( method_exists( $this, 'assignByRef') ) 
        {
            $ci =& get_instance();
            $this->assignByRef("ci", $ci);
        }
    }

    function view($tpl, $data=array())
    {
        $ext = '.html';
        $this->assign($data);
        $this->display($tpl.$ext);
    }
}