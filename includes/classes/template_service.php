<?php

class TemplateService {
    
    private $template_dir;
    
    function __construct(){
        $INSTALL_PATH = dirname(__FILE__);
            if (empty($INSTALL_PATH)) {
                $INSTALL_PATH = './';
            } else {
                $INSTALL_PATH .= '/';
            }
        $this->template_dir = $INSTALL_PATH . '/../../templates/';
    }
    
    function display($file) {
        $template = $this;
        include($this->template_dir . $file);
    }
    
}

?>