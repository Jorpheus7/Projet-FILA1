<?php

	/*
	Balise "csla:parameters".
	*/

	class Parameters {

		private /* Metric[] */ $metrics ;
		private /* Monitoring[] */ $monitorings ;
		private /* Schedules[] */ $schedules ;
		
		private /* int */ $tabsNumber ;
		private /* String */ $tabs ;
		
		/* 
		CONSTRUCTEUR
		Attend dans $metrics un tableau de Metric, $monitorings un tableau de Monitoring et $schedules un tableau de Schedule (contenu de la balise).
		*/
		function __construct($metrics, $monitorings, $schedules){
			$this->metrics = $metrics ;
			$this->monitorings = $monitorings ;
			$this->schedules = $schedules ;
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
			return $this->tabs."<csla:parameters>\n" ;
		}
		
		/*
		GETLASTTAG
		Permet de récupérer la balise fermante.
		*/
		private function getLastTag(){
			return $this->tabs."</csla:parameters>\n" ;
		}
		
		/*
		GETCONTENT
		Permet de récupérer le contenu se trouvant entre les balises ouvrante et fermante.
		*/
		private function getContent(){
			$content = "" ;
			for($i=0; $i<count($this->metrics); $i++){
				$content .= $this->metrics[$i]->toString($this->tabsNumber+1) ;
			}
			for($i=0; $i<count($this->monitorings); $i++){
				$content .= $this->monitorings[$i]->toString($this->tabsNumber+1) ;
			}
			for($i=0; $i<count($this->schedules); $i++){
				$content .= $this->schedules[$i]->toString($this->tabsNumber+1) ;
			}			
			return $content ;
		}
		
	}

?>