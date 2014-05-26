<?php

	/*
	Balise "csla:objective".
	*/
	
	class Objective {
	
		private /* String */ $evaluationType ;
		private /* String */ $metric ;
		private /* String */ $comparator ;
		private /* String */ $threshhold ;
		private /* String */ $schedule ;
		private /* String */ $monitoring ;
		private /* String */ $confidence ;
		private /* String */ $fuzzinessValue ;
		private /* String */ $fuzzinessPercentage ;
		private /* String */ $evaluationWindow ;
		
		private /* String */ $tabs ;
	
		/* 
		CONSTRUCTEUR
		Attend les chaînes de caractères correspondantes aux attributs de la balise.
		*/
		function __construct($evaluationType, $metric, $comparator, $threshhold, $schedule, $monitoring, $confidence, $fuzzinessValue, $fuzzinessPercentage, $evaluationWindow){
			$this->evaluationType = $evaluationType ;
			$this->metric = $metric ;
			$this->comparator = $comparator ;
			$this->threshhold = $threshhold ;
			$this->schedule = $schedule ;
			$this->monitoring = $monitoring ;
			$this->confidence = $confidence ;
			$this->fuzzinessValue = $fuzzinessValue ;
			$this->fuzzinessPercentage = $fuzzinessPercentage ;
			$this->evaluationWindow = $evaluationWindow ;
		}
		
		/*
		TOSTRING
		Permet de récupérer sous forme de chaîne de caractère la balise.
		Attend dans $tabsNumber le nombre de tabulations à insérer avant la chaîne.
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
		Permet de récupérer sous forme de chaîne de caractère la balise.
		*/
		private function getSimpleTag(){
			return $this->tabs."<csla:objective evaluation-type=\"".$this->evaluationType."\" metric=\"".$this->metric."\" comparator=\"".$this->comparator."\" threshhold=\"".$this->threshhold."\" schedule=\"".$this->schedule."\" monitoring=\"".$this->monitoring."\" confidence=\"".$this->confidence."\" fuzzinessValue=\"".$this->fuzzinessValue."\" fuzzinessPercentage=\"".$this->fuzzinessPercentage."\" evaluationWindow=\"".$this->evaluationWindow."\"/>\n" ;
		}
	
	}

?>