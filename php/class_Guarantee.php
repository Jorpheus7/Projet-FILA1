<?php

	/*
	Balise "csla:guarantee".
	*/

	class Guarantee {

		private /* String */ $id ;
		private /* String */ $actor ;
		private /* String */ $priority ;

		private /* Objective */ $objective ;
		private /* Penalty */ $penalty ;

		private /* int */ $tabsNumber ;
		private /* String */ $tabs ;	
		
		/* 
		CONSTRUCTEUR
		Attend dans $id, $actor et $priority les chaînes de caractères correspondantes (attributs de la balise).
		Attend dans $objective un objet de type Objective et dans $penalty un objet de type Penalty (contenu de la balise).
		*/
		function __construct($id, $actor, $priority, $objective, $penalty){
			$this->id = $id ;
			$this->actor = $actor ;
			$this->priority = $priority ;
			$this->objective = $objective ;
			$this->penalty = $penalty ;
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
			return $this->tabs."<csla:guarantee id=\"".$this->id."\" actor=\"".$this->actor."\" priority=\"".$this->priority."\">\n" ;
		}
		
		/*
		GETLASTTAG
		Permet de récupérer la balise fermante.
		*/
		private function getLastTag(){
			return $this->tabs."</csla:guarantee>\n" ;
		}
		
		/*
		GETCONTENT
		Permet de récupérer le contenu se trouvant entre les balises ouvrante et fermante.
		*/
		private function getContent(){
			return $this->objective->toString($this->tabsNumber+1).$this->penalty->toString($this->tabsNumber+1) ;
		}
		
	}

?>