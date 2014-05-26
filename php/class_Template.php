<?php

	/*
	Balise "csla:template".
	*/

	class Template {

		private /* String */ $name ;
		private /* String */ $version ;

		private /* Parameters */ $parameters ;
		private /* Guarantees */ $guarantees ;
		
		private /* int */ $tabsNumber ;
		private /* String */ $tabs ;
		
		/* 
		CONSTRUCTEUR
		Attend dans $name et $version les chaînes de caractères correspondantes (attributs de la balise).
		Attend dans $parameters un objet de type Parameters et dans $guarantees un objet de type Guarantee (contenu de la balise).
		*/
		function __construct($name, $version, $parameters, $guarantees){
			$this->name = $name ;
			$this->version = $version ;
			$this->parameters = $parameters ;
			$this->guarantees = $guarantees ;
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
			return $this->tabs."<csla:template name=\"".$this->name."\" version=\"".$this->version."\">\n" ;
		}
		
		/*
		GETLASTTAG
		Permet de récupérer la balise fermante.
		*/
		private function getLastTag(){
			return $this->tabs."</csla:template>\n" ;
		}
		
		/*
		GETCONTENT
		Permet de récupérer le contenu se trouvant entre les balises ouvrante et fermante.
		*/
		private function getContent(){
			return $this->parameters->toString($this->tabsNumber+1).$this->guarantees->toString($this->tabsNumber+1) ;
		}
	
	}

?>