<?php

	/*
	Balise "csla:metric".
	*/

	class Metric {

		private /* String */ $id ;
		private /* String */ $name ;
		private /* String */ $unit ;
		private /* String */ $frequency ;
		
		private /* int */ $tabsNumber ;
		private /* String */ $tabs ;
		
		/* 
		CONSTRUCTEUR
		Attend dans $id, $name, $unit et $frequency les cha�nes de caract�res correspondantes (attributs de la balise).
		*/
		function __construct($id, $name, $unit, $frequency){
			$this->id = $id ;
			$this->name = $name ;
			$this->unit = $unit ;
			$this->frequency = $frequency ;
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
			$content = $this->tabs."<csla:metric id=\"".$this->id."\" name=\"".$this->name."\" unit=\"".$this->unit."\"" ;
			if ($this->interval = "") {
				$content .= " frequency=\"".$this->frequency."\"" ;
			}
			$content .= ">\n" ;			
			return $content ;
		}
		
		/*
		GETLASTTAG
		Permet de r�cup�rer la balise fermante.
		*/
		private function getLastTag(){
			return $this->tabs."</csla:metric>\n" ;
		}
		
		/*
		GETCONTENT
		Permet de r�cup�rer le contenu se trouvant entre les balises ouvrante et fermante.
		*/
		private function getContent(){
			return $this->tabs."\t<csla:description/>\n" ;
		}
	}

?>
