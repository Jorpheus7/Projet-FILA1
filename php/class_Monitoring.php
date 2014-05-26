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
		Attend dans $id, $aggregateFunction et $interval les cha�nes de caract�res correspondantes (attributs de la balise).
		*/
		function __construct($id, $aggregateFunction, $interval){
			$this->id = $id ;
			$this->aggregateFunction = $aggregateFunction ;
			$this->interval = $interval ;
		}
		
		/*
		TOSTRING
		Permet de r�cup�rer sous forme de cha�ne de caract�re la balise.
		Attend dans $tabsNumber le nombre de tabulations � ins�rer avant la cha�ne.
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
		Permet de r�cup�rer sous forme de cha�ne de caract�re la balise.
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