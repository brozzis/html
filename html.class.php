<?php


/**
 * 
 * @author stefanobrozzi
 *
 */
class HTML {
	
	var $title;
	/*
	var $jsscripts = <<<EOF
<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/js/jquery.blockUI.js"></script>
<script type="text/javascript" src="/js/flexigrid.js"></script>
<script type="text/javascript" src="/js/updater.js"></script>
EOF;

	var $css = <<<EOF
<link rel="stylesheet" type="text/css" href="/css/spip.css" />
<link rel="stylesheet" type="text/css" href="/css/local.css" />
<link rel="stylesheet" type="text/css" href="/css/debug.css" />
<link rel="stylesheet" type="text/css" href="/css/navcontainer.css" />
EOF;
*/
	var $extra_header;
	/*
	var $header = <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
EOF;
*/

	/*
$this->jsscripts
$this->css
$this->extra_header
<title>$this->title</title>
*/
	
	/**
	 * 
	 * @param $title
	 * @param $header
	 * @return unknown_type
	 */
	public function __construct($mytitle=NULL, $myheader=NULL) {
		$this->extra_header = $myheader;
		$this->title = $mytitle;
		
		echo $this->start_html();
		echo $this->body();
		// echo $this->header();
	}
	
	
	/**
	 * 
	 */
	public function start_html() {

		return <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/jquery.blockUI.js"></script>


 $this->extra_header

 <title>$this->title</title>
</head>
EOF;

	}
	
	
	/**
	 * 
	 */
	private function body() {
		return "<body>";
	}
	
	
	/**
	 * 
	 */
	private function header() {
		return "";	
	}

	
	/**
	 * 
	 */
	protected function footer($extra=NULL) {

		echo <<<EOF
$extra
EOF;
		
	}
	/**
	 * 
	 */
	public function __destruct() {
		$this->footer();
		echo <<<EOF
		</body>
</html>
EOF;
	}
	
	/**
	 * 
	 *
	 */
	protected function tagger($tag, $internal) {
		return "<$tag>$internal</$tag>";
	}
	

	/**
	 * 
	 */
	public function table($rows, $class=NULL) {
		$retstr="";
		if ($class) {
			$retstr.= "<table class='".$class."'>";
		} else {
			$retstr.=  "<table>";
		}
		foreach ($rows as $r) {
			$retstr.=  "<tr><td>".join("</td><td>", $r)."</td></tr>";
		}
		$retstr.=  "</table>";
		return $retstr;
	}
    
	
}



?>
