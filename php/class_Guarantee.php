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
		Attend dans $id, $actor et $priority les cha�nes de caract�res correspondantes (attributs de la balise).
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
		Permet de r�cup�rer sous forme de cha�ne de caract�re les balises ouvrante et fermante ainsi que son contenu.
		Attend dans $tabsNumber le nombre de tabulations � ins�rer avant la cha�ne.
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
		Permet de r�cup�rer la balise ouvrante.
		*/
		private function getFirstTag(){
			return $this->tabs."<csla:guarantee id=\"".$this->id."\" actor=\"".$this->actor."\" priority=\"".$this->priority."\">\n" ;
		}
		
		/*
		GETLASTTAG
		Permet de r�cup�rer la balise fermante.
		*/
		private function getLastTag(){
			return $this->tabs."</csla:guarantee>\n" ;
		}
		
		/*
		GETCONTENT
		Permet de r�cup�rer le contenu se trouvant entre les balises ouvrante et fermante.
		*/
		private function getContent(){
			return $this->objective->toString($this->tabsNumber+1).$this->penalty->toString($this->tabsNumber+1) ;
		}
		
	}

?>