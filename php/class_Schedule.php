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
		Attend dans $id, $start, $end et $reoccurance les cha�nes de caract�res correspondantes (attributs de la balise).
		*/
		function __construct($id, $start, $end, $reoccurance){
			$this->id = $id ;
			$this->start = $start ;
			$this->end = $end ;
			$this->reoccurance = $reoccurance ;
		}
		
		/*
		TOSTRING
		Permet de r�cup�rer sous forme de cha�ne de caract�re la balise.
		Attend dans $tabsNumber le nombre de tabulations � ins�rer avant la cha�ne.
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
		Permet de r�cup�rer sous forme de cha�ne de caract�re la balise.
		*/
		private function getSimpleTag(){
			return $this->tabs."<csla:schedule id=\"".$this->id."\" start=\"".$this->start."\" end=\"".$this->end."\" reoccurance=\"".$this->reoccurance."\"/>\n" ;
		}

	}

?>