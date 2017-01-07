<?php
/*
	Question2Answer by Gideon Greenspan and contributors
	http://www.question2answer.org/

	File: qa-plugin/selection-search/qa-selection-search-layer.php
	Description: Theme layer class for mouseover layer plugin


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

class qa_html_theme_layer extends qa_html_theme_base
{
	public function head_script() 
    { 
		if (!isset($this->content['script'])) { 
			$this->content['script'] = array(); 
		}             
		 
                     
        $this->content['script'][]='<SCRIPT src="'.
		qa_html(QA_HTML_THEME_LAYER_URLTOROOT.'selection-search.js').
            '" TYPE="text/javascript"></SCRIPT>';
            
        parent::head_script(); 
    }
	
	public function head_css() 
    { 
		if (!isset($this->content['css_src'])) { 
			$this->content['css_src'] = array(); 
		}             
		 
                     
        $this->content['css_src'][]= qa_html(QA_HTML_THEME_LAYER_URLTOROOT.'selection-search.css');
            
        parent::head_css(); 
    }     
	
	public function body_suffix()
	{
		$this->output('<div id="searchpopup">search</div>');
		parent::body_suffix();
	}
}
