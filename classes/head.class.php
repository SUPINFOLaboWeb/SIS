<?php

	// Foo !

	class head {
		
		private $_head;
		private $_title;
		private $_linkTags;

		function __construct() {
			$this->_head = '<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="shortcut icon" href="../../assets/ico/favicon.ico">';
		}

		public function setTitle($title) {
			$this->_title = '<title>' . $title . '</title>';
		}

		public function addStyleSheet($uris) {
			if (is_array($uris))
				foreach ($uris as $uri)
					$this->_linkTags .= '<link href="' . $uri . '" rel="stylesheet">' . "\n";
			else
				$this->_linkTags .= '<link href="' . $uris . '" rel="stylesheet">' . "\n";
		}

		public function printHead() {
			echo $this->_head;
			echo $this->_title;
			echo $this->_linkTags;
			echo '</head><body>';
		}
	}
?>