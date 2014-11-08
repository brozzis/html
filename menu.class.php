<?php

/*
<script type="text/javascript">
<!--

jQuery().ready(function(){
	// simple accordion
		jQuery('#list1a').accordion({ active: "a.default", header: "a.accordion-label" });
	jQuery('#list1b').accordion({
		autoheight: false
	});
});

//-->
</script>

<style type="text/css">
@IMPORT url("/css/accordion.basic.css");
</style>
*/

class menu {
	
	var $items;
	var $accordion = 0; // 
	
	function __construct() {
		$this->items = array ();
	}
	
	/**
	 * 
	 * @param $link
	 * @param $desc
	 * @param $long
	 * @return unknown_type
	 */
	function addItem($link, $desc, $long = NULL) {
		$this->items [] = array ("link"=>$link, "desc"=>$desc, "long"=>$long );
	}
	
	
	
	function newAccordion() {

		echo '<div id="accordion">';
		foreach ($this->items as $i) {
		$link = $i['link'];
		$desc = $i['desc'];
		echo <<<EOF
	<h3><a href="#">$link</a></h3>
	<div>
	<p>$desc</p>
	</div>
EOF;
		}
		echo "</div>";

		// event: "mouseover"
		echo <<<EOF
	
	<script type="text/javascript">
	$(function() {
		$("#accordion").accordion({
			autoHeight: false,
			navigation: true
		});
	});
	</script>

EOF;
	}
	

	
	function aeroButton($classname="aerobuttonmenu") {
		print "<div id='".$classname."'>";
		foreach ($this->items as $i) {
			printf ("<a href='%s'><span>%s</span></a>",$i['link'],$i['desc']);
		}
		print "</div>";
	}
	
	
	function accordion($id_name="list") {

		if (!$this->accordion) {
		echo <<<EOF

<style type="text/css">
@IMPORT url("/css/accordion.basic.css");
</style>

EOF;
		$this->accordion=1;
		}
		print '<div class="basic" style="float:left;"  id="'.$id_name.'">';
		
		foreach ( $this->items as $item ) {
			$dsc = $item ["desc"];
			$lng = $item ["long"];
			$lnk = $item ['link']; 
			echo <<<EOF
			<a class='accordion-label'>$dsc</a>
			<div>
			<p>$lng</p>
			<p class='righty'><a href="$lnk">vai alla pagina <img src='/img/next.gif'></a></p>
			</div>
EOF;
			// 			$s = sprintf("<img src='/img/next.gif'>",$item['link']);
		}
		print "\n</div>";

		echo <<<EOF
<script type="text/javascript">
<!--
jQuery().ready(function(){
		jQuery('#$id_name').accordion({ autoheight: true, active: "a.default", header: "a.accordion-label" });
});
//-->
</script>
		
EOF;
		
	}
	
	
	function standard() {
		print '<ul class="menu">';
		foreach ( $i as $v ) {
			printf ( "<li><a href='%s'>%s</a></li>", $v ["link"], $v ["desc"] );
		}
		print "</ul>";
	}

}

?>