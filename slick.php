<?php
error_reporting(E_ALL & ~E_NOTICE);

define("BR","<br />");
define("SC","SELF_CLOSING_TAG");
define("NI","NON_INDENTING_TAG");

$css = [];
$scripts = [];
$requests = [];
$errors = [];
$messages = [];

function prt($s) {
	global $printString;
	$printString .= t().$s."\n";
}

function prtTag($tagname,$attr,$content="") {
	prt("<".$tagname.(empty($attr)?"":" ".$attr).($content==SC?" />":">".$content."</".$tagname.">"));
}

function openTag($tagname,$attr="") {
	if ($attr != NI) {
		prt("<".$tagname.(empty($attr)?"":" ".$attr).">");
		indent(1);
	} else {
		prt("<".$tagname.">");
	}
}

function closeTag($tagname,$comment="") {
	if ($comment != NI) {
		indent(-1);
		prt("</".$tagname.">".(empty($comment)?"":"<!--".$comment."-->"));
	} else {
		prt("</".$tagname.">");
	}
}

function display() {
	global $printString;
	echo $printString;
	$printString = "";
}

function indent($i) {
	global $tabcount;
	$tabcount += $i;
	if ($tabcount < 0) $tabcount = 0;
}

function t() {
	global $tabcount;
	$s = "";
	for ($t = 0; $t < $tabcount; $t++) $s .= "\t";
	return $s;
}

function setError($err) {
	global $errorMessage;
	$errorMessage = $err;
}

function setMessage($msg) {
	global $infoMessage;
	$infoMessage = $msg;
}

function addError($err) {
	global $errors;
	$errors[] = $err;
}

function printErrors() {
	global $errors;
	foreach ($errors as $error) {
		prtTag("div","class=\"errordiv\"",$error);
	}
}

function addMessage($msg) {
	global $messages;
	$messages[] = $msg;
}


function printMessages() {
	global $messages;
	foreach ($messages as $message) {
		prtTag("div","class=\"errordiv\"",$message);
	}
}


function addCSS($s, $full=FALSE) {
	global $css;
	$css[] = ($full?$s:"/css/".$s.".css");
}

function printCSS() {
	global $css;
	foreach ($css as $csspath) {
		prtTag("link","rel=\"stylesheet\" type=\"text/css\" href=\"".$csspath."\"",SC);
	}
}


function addScript($s) {
	global $scripts;
	$scripts[] = $s;
}

function printScripts() {
	global $scripts;
	foreach ($scripts as $script) {
		prtTag("script","src=\"".$script."\"",null);
	}
}

function addRequest($key, $value="") {
	global $requests;
	$requests[] = array($key => $value);
}

function getRequests() {
	global $requests;
	$r = "";
	if (!is_null($requests)) {
		$delim = "?";
		foreach ($requests as $key => $value) {
			print_r($key);
			print_r($value);
			$r .= $delim.$key;
			if (!is_null($value)) {
				$r .= $value;
			}
			$delim = "&";
		}
	}
	return $r;
}

?>
