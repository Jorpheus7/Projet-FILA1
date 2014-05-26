<?php

	/*
	Balise "csla:monitoring".
	*/

	class Monitoring {

		private /* String */ $id ;
		private /* String */ $aggregateFunction ;
		private /* String */ $interval ;
		
		private /* int */ $tabsNumber ;
		private /* String */ $tabs ;

		/* 
		CONSTRUCTEUR
		Attend dans $id, $aggregateFunction et $interval les chaînes de caractères correspondantes (attributs de la balise).
		*/
		function __construct($id, $aggregateFunction, $interval){
			$this->id = $id ;
			$this->aggregateFunction = $aggregateFunction ;
			$this->interval = $interval ;
		}
		
		/*
		TOSTRING
		Permet de récupérer sous forme de chaîne de caractère la balise.
		Attend dans $tabsNumber le nombre de tabulations à insérer avant la chaîne.
		*/
		public function toString($tabsNumber){
			$this->tabs = "" ;
			$this->tabsNumber = $tabsNumber ;
			for($i=0; $i<$tabsNumber; $i++){
				$this->tabs .= "\t" ;
			}
			return $this->getSimpleTag() ;
		}
		
		/*
		GETSIMPLETAG
		Permet de récupérer sous forme de chaîne de caractère la balise.
		*/
		private function getSimpleTag(){
			$content = $this->tabs."<csla:monitoring id=\"".$this->id."\" aggregate-function=\"".$this->aggregateFunction."\"" ;
			if ($this->interval != "") {
				$content .= " interval=\"".$this->interval."\"" ;
			}
			$content .= "/>\n" ;
			return $content ;
		}

	}

?>