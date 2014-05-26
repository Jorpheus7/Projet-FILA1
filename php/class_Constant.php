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
		Attend dans $value la valeur de la constant et dans $unit son unit� (attributs de la balise).
		*/
		function __construct($value, $unit){
			$this->value = $value ;
			$this->unit = $unit ;
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
			return $this->tabs."<csla:constant value=\"".$this->value."\" unit=\"".$this->unit."\"/>\n" ;
		}

	}

?>