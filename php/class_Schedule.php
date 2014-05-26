<?php

	/*
	Balise "csla:schedule".
	*/

	class Schedule {

		private /* String */ $id ;
		private /* String */ $start ;
		private /* String */ $end ;
		private /* String */ $reoccurance ;

		private /* String */ $tabs ;

		/* 
		CONSTRUCTEUR
		Attend dans $id, $start, $end et $reoccurance les chaînes de caractères correspondantes (attributs de la balise).
		*/
		function __construct($id, $start, $end, $reoccurance){
			$this->id = $id ;
			$this->start = $start ;
			$this->end = $end ;
			$this->reoccurance = $reoccurance ;
		}
		
		/*
		TOSTRING
		Permet de récupérer sous forme de chaîne de caractère la balise.
		Attend dans $tabsNumber le nombre de tabulations à insérer avant la chaîne.
		*/
		public function toString($tabsNumber){
			$this->tabs = "" ;
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
			return $this->tabs."<csla:schedule id=\"".$this->id."\" start=\"".$this->start."\" end=\"".$this->end."\" reoccurance=\"".$this->reoccurance."\"/>\n" ;
		}

	}

?>