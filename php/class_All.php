<?php

	/* 
	csla:all
	*/

	class All {

		private /* All, Any, Guarantee */ $content ;

		private /* int */ $tabsNumber ;
		private /* String */ $tabs ;	
		
		/* 
		CONSTRUCTEUR
		Attend dans $content le contenu de la balise "csla:all" de type :
			> All
			> Any
			> Guarantee
		*/
		function __construct($content){
			$this->content = $content ;
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
			return $this->tabs."<csla:all>\n" ;
		}
		
		/*
		GETLASTTAG
		Permet de récupérer la balise fermante.
		*/
		private function getLastTag(){
			return $this->tabs."</csla:all>\n" ;
		}
		
		/*
		GETCONTENT
		Permet de récupérer le contenu se trouvant entre les balises ouvrante et fermante.
		*/
		private function getContent(){
			$content = "" ;
			for ($i=0; $i<count($this->content); $i++){
				$content .= $this->content[$i]->toString($this->tabsNumber+1) ;
			}
			return $content ;
		}
		
	}

?>