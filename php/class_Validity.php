<?php

	/*
	Balise "csla:validity".
	*/

	class Validity {

		private /* String */ $effectiveFrom ;
		private /* String */ $effectiveUntil ;

		private /* String */ $tabs ;

		/* 
		CONSTRUCTEUR
		Attend dans $effectiveFrom et $effectiveUntil les cha�nes de caract�res correspondantes (attributs de la balise).
		*/
		function __construct($effectiveFrom, $effectiveUntil){
			$this->effectiveFrom = $effectiveFrom ;
			$this->effectiveUntil = $effectiveUntil ;
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
			return $this->tabs."<csla:validity effectiveFrom=\"".$this->effectiveFrom."\" effectiveUntil=\"".$this->effectiveUntil."\"/>\n" ;
		}

	}

?>