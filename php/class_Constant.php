<?php

	/* 
	Balise "csla:constant".
	*/

	class Constant {

		private /* String */ $value ;
		private /* String */ $unit ;

		private /* String */ $tabs ;

		/* 
		CONSTRUCTEUR
		Attend dans $value la valeur de la constant et dans $unit son unité (attributs de la balise).
		*/
		function __construct($value, $unit){
			$this->value = $value ;
			$this->unit = $unit ;
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
			return $this->tabs."<csla:constant value=\"".$this->value."\" unit=\"".$this->unit."\"/>\n" ;
		}

	}

?>