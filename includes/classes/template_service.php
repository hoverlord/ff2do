<?php

class TemplateService {
    
    private $template_dir;
    
    function __construct(){
        $this->template_dir = '/Library/Webserver/Documents/dev_2do/templates/';
    }
    
    function display($file) {
        $template = $this;
        include($this->template_dir . $file);
    }
    
}

?>