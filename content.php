<?php
include_once("slick.php");

addCSS("normalize");

addCSS("bootstrap");

addCSS("main");

function printPageHeader() {
	global $errorMessage;
	global $infoMessage;
	global $scripts;
	prt("<!DOCTYPE html>");
	openTag("html",NI);
	openTag("head");
	prt("<meta charset=\"utf-8\">");
	prtTag("title",null,"UCSF/ESCU");
	printCSS();
	printScripts();
	closeTag("head");
	openTag("body");
	openTag("div","id=\"pagewrap\" class=\"container\"");
}

function printHeader() {
	openTag("header","id=\"header\"");
	openTag("div", "id=\"nav\" class=\"row\"");
	
	openTag("a","title=\"Home\" class=\"us\" href=\"/\"");
	prtTag("img","src=\"/images/buglogo.png\" alt=\"USCF logo\" class=\"homebutton\" height=\"75px\"");
	closeTag("a");
}

function printMenu() {
	openTag("ul");

	openTag("li");
	prtTag("a","title=\"Students\" href=\"/students/\"","Students");
	closeTag("li");

	openTag("li");
	prtTag("a","title=\"Teachers\" href=\"/teachers/\"","Teachers");
	closeTag("li");

	openTag("li");
	prtTag("a","title=\"Parents\" href=\"/parents/\"","Parents");
	closeTag("li");

	openTag("li");
	prtTag("a","title=\"Judges\" href=\"/judges/\"","Judges");
	closeTag("li");

	openTag("li");
	prtTag("a","title=\"Info\" href=\"/info/\"","Info");
	closeTag("li");
	
	closeTag("ul");
	closeTag("div","nav");
	closeTag("header","header");
}

function printContent() {
	openTag("section");
	openTag("div", "id=\"contentdiv\"");
	prtTag("h3","","United Counties Science Fair");
	prtTag("p","class=\"content\"","Regional science fair for Eastern Ontario");
	closeTag("div","contentdiv");
	closeTag("section");
	addError("this is an error message");
	addError("this is another error message that should be on the top of the page");
	addMessage("this is an informational message that should also be on the top of the page");
}

function printFooter() {
	openTag("footer","id=\"footer\"");
	openTag("div","class=\"grid-unit\"");
	
	openTag("span","class=\"twitter\"");
	openTag("a","href=\"http://twitter.com/ucsfair\"");
	openTag("svg","title=\"twitter icon\"");
	prtTag("use","xlink:href=\"#icon-twitter\"");
	closeTag("svg");
	prt("Follow us on Twitter");
	closeTag("a");
	closeTag("span","twitter");
	
	closeTag("div","grid-unit");
	closeTag("footer");
}


function printPageFooter() {
	closeTag("div", "pagewrap");
	closeTag("body");
	closeTag("html",NI);
}

?>
