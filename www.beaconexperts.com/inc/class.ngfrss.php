<?php

/*
*	Name:			ngfRSS
*	Purpose:		A lightweight platform to display a given number of entries of a given RSS feed.
*	Developer:		Nic Ross
*	Created: 		February 17, 2011
*	Last Revision:	March 8, 2011
*	Revision #:		5
*/

/*
*	Sample Usage:
*
*	include 'class.ngfrss.php';
*	$rss = new ngfRSS;
*	$rss->feed = 'http://www.path.to/rss/feed.php';
*	$rss->entries = 3;
*	$rss->fetch();
*	$rss->render();
*	$rss->display();
*/

/*
*	Parameters:
*
*	feed 				-	The URL of the RSS feed.
*	entries				-	The number of entries to display.
*	container_element	-	Determines what HTML element the entire RSS feed is wrapped inside. Can be blank. Default: ul
*	container_cssClass	-	The CSS class of the container element. Can be blank. Default: ngfrss
*	item_element		-	Determines what HTML element each RSS item is wrapped inside. Cannot be blank. Default: li
*	item_cssClass		-	The CSS class of the item element. Can be blank. Default: ngfrss
*	showdate			-	Displays the date of the post. Default: ngfrss
*/

class ngfRSS {

	public $feed;
	public $entries;
	public $showdate = true;
	public $container_element = 'ul';
	public $container_cssClass = 'ngfrss';
	public $item_element = 'li';
	public $item_cssClass = 'ngfrss';
	private $_xml;
	private $_items;
	private $_htmlout;
	
	public function fetch() {
		if ($this->parseXML()) {return true;}
		else {return false;}
	}
	
	public function render() {
		if ($this->createHTML()) {return true;}
		else {return false;}
	}
	
	public function display() {
		if ($this->_htmlout != '') {
			if ($this->render()) {
				Print $this->_htmlout;
				return true;
			}
			else {return false;}
		}
		else {return false;}
	}
	
	private function parseXML() {
		if ($this->feed != '') {
			$load = simplexml_load_file($this->feed);
			if ($load) {
				$this->_xml = $load;
				$this->_items = $this->_xml->channel[0]->item;
				return true;
			}
			else {return false;}
		}
		else {return false;}
	}
	
	private function createHTML() {
		if (!empty($this->_items)) {
			$buffer = '';
			if ($this->container_element != '') {$buffer .= '<'.$this->container_element.' class="'.$this->container_cssClass.'">';}
			for ($x = 0; $x < $this->entries; $x++) {
				if ($this->_items[$x]) {
					$buffer .= '<'.$this->item_element.' class="'.$this->item_cssClass.'">';
						$buffer .= '<a class="title" href="'.$this->_items[$x]->link.'" target="_blank">'.$this->_items[$x]->title.'</a>';
						if ($this->showdate) {$buffer .= '<span class="date">'.date('F j, Y',strtotime($this->_items[$x]->pubDate)).'</span>';}
					$buffer .= '</'.$this->item_element.'>';
				} else {break;}
			}
			if ($this->container_element != '') {$buffer .= '</'.$this->container_element.'>';}
			$this->_htmlout = $buffer;
			return true;
		}
		else {return false;}
	}
	
	function __destruct() {
		unset($this->_xml);
		unset($this->_items);
		unset($this->_htmlout);
	}
	
}
?>