<?php

	/*
	Balise "csla:CSLA".
	*/

	class Csla {

		private /* String */ $id ;
		private /* String */ $templateName ;
		private /* String */ $agreedAt ;

		public /* Validity */ $validity ;
		public /* Template */ $template ;
		
		/* 
		CONSTRUCTEUR
		Attend dans $id, $templateName et $agreedAt les cha�nes de caract�res correspondantes (attributs de la balise).
		Attend dans $validity un objet de type Validity et dans $template un objet de type Template (contenu de la balise).
		*/
		function __construct($id, $templateName, $agreedAt, $validity, $template){
			$this->id = $id ;
			$this->templateName = $templateName ;
			$this->agreedAt = $agreedAt ;
			$this->validity = $validity ;
			$this->template = $template ;
		}
		
		/*
		TOSTRING
		Permet de r�cup�rer sous forme de cha�ne de caract�re les balises ouvrante et fermante ainsi que son contenu.
		Attend dans $tabsNumber le nombre de tabulations � ins�rer avant la cha�ne.
		*/
		public function toString(){
			return $this->getFirstTag().$this->getContent().$this->getLastTag() ;
		}
		
		/*
		GETFIRSTTAG
		Permet de r�cup�rer la balise ouvrante.
		*/
		private function getFirstTag(){
			return "<csla:CSLA id=\"".$this->id."\" template=\"gold\" agreedAt=\"".$this->agreedAt."\" xmlns:csla=\"http://www.emn.fr/cslamodel\">\n" ;
		}
		
		/*
		GETLASTTAG
		Permet de r�cup�rer la balise fermante.
		*/
		private function getLastTag(){
			return "</csla:CSLA>\n" ;
		}
		
		/*
		GETCONTENT
		Permet de r�cup�rer le contenu se trouvant entre les balises ouvrante et fermante.
		*/
		private function getContent(){
			return $this->validity->toString(1).$this->template->toString(1) ;
		}
	
	}

?>