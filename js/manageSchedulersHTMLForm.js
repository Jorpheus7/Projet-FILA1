/**
 * Function called in the onload event of the body tag
 */
function init(){
	document.getElementById("itemActualId").value = 0;
	document.getElementById("schedulersIds").value = '';
}


/**
 * Add a metric in the page
 */
function addScheduler(mode){
	
	// Add a new item in the left menu
	var numId = +document.getElementById("itemActualId").value;
	var itemsList = document.getElementById("items");
	
	var li = document.createElement("li");
	li.setAttribute("id", 'itemMenuS' + numId);

	var a1 = document.createElement("a");
	a1.setAttribute("href", '#top');
	a1.setAttribute("class", 'skel-panels-ignoreHref');
	a1.setAttribute("onclick", 'removeScheduler(\'S' + numId + '\');');
	li.appendChild(a1);
	
	var span = document.createElement("span");
	span.setAttribute("class", 'fa fa-times-circle');
	a1.appendChild(span);
	
	var a2 = document.createElement("a");
	a2.setAttribute("href", '#S' + numId +'_Section');
	a2.setAttribute("id", 'S' + numId +'_ItemName');
	a2.innerHTML = 'Sheduler number ' + numId;
	li.appendChild(a2);
		
	itemsList.insertBefore(li, document.getElementById("insertItemTag"));
	
	
	document.getElementById("itemActualId").value = numId+1;
	
	// Add the corresponding section to the form
	
	var schedulers = document.getElementById("schedulers");

	// General info about the scheduler
	
	var section = document.createElement("section");
	section.setAttribute("id", 'S' + numId +'_Section');
	section.setAttribute("class", 'schedulerSection');

	var start = document.createElement("input");
	start.setAttribute("id", 'S' + numId +'_Start');
	start.setAttribute("name", 'S' + numId +'_Start');
	start.setAttribute("type", "text");
	start.setAttribute("class", "time");
	start.setAttribute("placeholder", "Start time");
	start.setAttribute("required", 'required');
	section.appendChild(start);

	var script1 = document.createElement("script");
	script1.innerHTML = "$(function() {$('#start').timepicker({ 'step': 30, 'forceRoundTime': true });	});";
	section.appendChild(script1);

	var end = document.createElement("input");
	end.setAttribute("id", 'S' + numId +'_End');
	end.setAttribute("name", 'S' + numId +'_End');
	end.setAttribute("type", "text");
	end.setAttribute("class", "time");
	end.setAttribute("placeholder", "End time");
	end.setAttribute("required", 'required');
	section.appendChild(end);

	var script2 = document.createElement("script");
	script2.innerHTML = "$(function() {$('#end').timepicker({ 'step': 30, 'forceRoundTime': true });});";
	section.appendChild(script2);

	var label = document.createElement("label");
	label.innerHTML = "Cron : ";

	var select = document.createElement("select");
	select.setAttribute("id", 'S' + numId +'_Cron');
	select.setAttribute("name", 'S' + numId +'_Cron');
	select.setAttribute("multiple", "multiple");

	var option1 = document.createElement("option");
	option1.setAttribute("value", "1");
	option1.innerHTML = "Monday";
	select.appendChild(option1);

	var option2 = document.createElement("option");
	option2.setAttribute("value", "2");
	option2.innerHTML = "Tuesday";
	select.appendChild(option2);

	var option3 = document.createElement("option");
	option3.setAttribute("value", "3");
	option3.innerHTML = "Wednesday";
	select.appendChild(option3);

	var option4 = document.createElement("option");
	option4.setAttribute("value", "4");
	option4.innerHTML = "Thursday";
	select.appendChild(option4);

	var option5 = document.createElement("option");
	option5.setAttribute("value", "5");
	option5.innerHTML = "Friday";
	select.appendChild(option5);

	var option6 = document.createElement("option");
	option6.setAttribute("value", "6");
	option6.innerHTML = "Saturday";
	select.appendChild(option6);

	var option7 = document.createElement("option");
	option7.setAttribute("value", "7");
	option7.innerHTML = "Sunday";
	select.appendChild(option7);

	label.appendChild(select);

	section.appendChild(label);

	/*var script3 = document.createElement("script");
	script3.innerHTML = '$(document).ready(function(){ $(\"#cron\").multiselect();});');
	section.appendChild(script3);*/

	// Info about each metric
	var metrics = getMetrics();
	for(i = 0; i < metrics.length; i++) {

		var div = document.createElement("div");
		var checkbox = document.createElement("input");
		checkbox.setAttribute("type", "checkbox");
		checkbox.setAttribute("id", 'S' + numId +'_'+metrics[i]['id']+'_Checkbox');
		checkbox.setAttribute("checked", 'true');
		checkbox.setAttribute("name", 'S' + numId +'_'+metrics[i]['id']+'_Checkbox');
		checkbox.setAttribute("onClick", 'enableOrDisableMetric("S' + numId +'_'+ metrics[i]['id'] + '")');
		div.appendChild(checkbox);

		var metricName = document.createElement("strong");
		metricName.innerHTML = metrics[i]['name']+" ("+metrics[i]['description']+") : ";
		div.appendChild(metricName);
		div.appendChild(document.createElement("br"));

		var fuzzinessLabel = document.createTextNode("fuzziness : ");
		div.appendChild(fuzzinessLabel);
		var fuzziness = document.createElement("input");
		fuzziness.setAttribute("type", "text");
		fuzziness.setAttribute("id", 'S' + numId +'_'+metrics[i]['id']+'_Fuzziness');
		fuzziness.setAttribute("name", 'S' + numId +'_'+metrics[i]['id']+'_Fuzziness');
		fuzziness.setAttribute("required", 'required');
		div.appendChild(fuzziness);
		var unitText = document.createTextNode(' ('+metrics[i]['unit']+')\n');
		div.appendChild(unitText);
		div.appendChild(document.createElement("br"));

		var percentageConfidenceLabel = document.createTextNode("% confidence : ");
		div.appendChild(percentageConfidenceLabel);
		var percentageConfidence = document.createElement("input");
		percentageConfidence.setAttribute("type", "text");
		percentageConfidence.setAttribute("id", 'S' + numId +'_'+metrics[i]['id']+'_PercentageConfidence');
		percentageConfidence.setAttribute("name", 'S' + numId +'_'+metrics[i]['id']+'_PercentageConfidence');
		percentageConfidence.setAttribute("required", 'required');
		div.appendChild(percentageConfidence);
		div.appendChild(document.createElement("br"));

		var percentageFuzzinessLabel = document.createTextNode("% fuzziness : ");
		div.appendChild(percentageFuzzinessLabel);
		var percentageFuzziness = document.createElement("input");
		percentageFuzziness.setAttribute("type", "text");
		percentageFuzziness.setAttribute("id", 'S' + numId +'_'+metrics[i]['id']+'_PercentageFuzziness');
		percentageFuzziness.setAttribute("name", 'S' + numId +'_'+metrics[i]['id']+'_PercentageFuzziness');
		percentageFuzziness.setAttribute("required", 'required');
		div.appendChild(percentageFuzziness);

		section.appendChild(div);
	}
	
	section.appendChild(document.createElement("br"));
	section.appendChild(document.createElement("hr"));
	section.appendChild(document.createElement("br"));
	schedulers.insertBefore(section, document.getElementById("insertTag"));
	
	
	// Adding the new ID in the hidden field
	var schedulersId = document.getElementById("schedulersIds");
	schedulersId.value = schedulersId.value+'S' + numId +';';
	
}


/**
 * Remove a metric in the page
 */
function removeScheduler(schedulerId){
	// Remove the item in the left menu
	var item = document.getElementById('itemMenu'+schedulerId);
	item.parentNode.removeChild(item);
	
	// Remove the corresponding section from the form
	var element = document.getElementById(schedulerId+'_Section');
	element.parentNode.removeChild(element);
	
	// Removing the corresponding ID in the hidden field
	var schedulersId = document.getElementById("schedulerIds");
	schedulersId.value = schedulersId.value.replace(schedulerId+';', '');
}


/**
 * Rename a metric in the page
 */
function renameScheduler(schedulerId){
	// Remove the item in the left menu
	var itemName = document.getElementById(schedulerId+'_ItemName');
	itemName.innerHTML = document.getElementById(schedulerId+'_Name').value;
	
	// TODO Si le nom est déjà celui d'un autre scheduler, vider le champ et Try Again
}

function enableOrDisableMetric(id){
	// Getting the corresponding checkbox
	var checkbox = document.getElementById(id +'_Checkbox');
	// Enable or disable fields
	if(checkbox.checked == false){
		document.getElementById(id +'_Fuzziness').disabled = true;
		document.getElementById(id +'_PercentageConfidence').disabled = true;
		document.getElementById(id +'_PercentageFuzziness').disabled = true;
	}else{
		document.getElementById(id +'_Fuzziness').disabled = false;
		document.getElementById(id +'_PercentageConfidence').disabled = false;
		document.getElementById(id +'_PercentageFuzziness').disabled = false;
	}
}

/**
 * Return the array of metrics
 */
function getMetrics(){
	var metricsHiddenField = document.getElementById("hiddenMetrics").value;
	var stringMetricArray = metricsHiddenField.split("::");
	var metrics = [];
	for (i = 0; i < stringMetricArray.length-1; i++) {
		var array = stringMetricArray[i].split(";");
		var literalArray = {
			id: array[0],
			name: array[1],
			description: array[2],
			unit: array[3],
		};
		metrics.push(literalArray);
	}
	return metrics;
}
