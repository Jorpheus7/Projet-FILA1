<?php

	/*
	Balise "csla:penalty".
	*/

	class Penalty {

		private /* String */ $id ;
		private /* String */ $condition ;
		private /* String */ $actor ;

		private /* Constant */ $constant ;
		
		private /* int */ $tabsNumber ;
		private /* String */ $tabs ;
		
		/* 
		CONSTRUCTEUR
		Attend dans $id, $condition et $actor les chaînes de caractères correspondantes (attributs de la balise).
		Attend dans $constant un objet de type Constant (contenu de la balise).
		*/
		function __construct($id, $condition, $actor, $constant){
			$this->id = $id ;
			$this->condition = $condition ;
			$this->actor = $actor ;
			$this->constant = $constant ;
		}
		
		/*
		TOSTRING
		Permet de récupérer sous forme de chaîne de caractère les balises ouvrante et fermante ainsi que son contenu.
		Attend dans $tabsNumber le nombre de tabulations à insérer avant la chaîne.
		*/
		public function toString($tabsNumber){
			$this->tabs = "" ;
			$this->tabsNumber = $tabsNumber ;
			for($i=0; $i<$tabsNumber; $i++){
				$this->tabs .= "\t" ;
			}
			return $this->getFirstTag().$this->getContent().$this->getLastTag() ;
		}
		
		/*
		GETFIRSTTAG
		Permet de récupérer la balise ouvrante.
		*/
		private function getFirstTag(){
			return $this->tabs."<csla:penalty id=\"".$this->id."\" condition=\"".$this->condition."\" actor=\"".$this->actor."\">\n" ;
		}
		
		/*
		GETLASTTAG
		Permet de récupérer la balise fermante.
		*/
		private function getLastTag(){
			return $this->tabs."</csla:penalty>\n" ;
		}
		
		/*
		GETCONTENT
		Permet de récupérer le contenu se trouvant entre les balises ouvrante et fermante.
		*/ 
		private function getContent(){
			return $this->constant->toString($this->tabsNumber+1) ;
		}
	
	}

?>