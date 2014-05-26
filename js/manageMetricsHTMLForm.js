/**
 * Function called in the onload event of the body tag
 */
function init(){
	document.getElementById("itemActualId").value = 0;
	document.getElementById("metricIds").value = '';
}


/**
 * Add a metric in the page
 */
function addMetric(){
	
	// Add a new item in the left menu
	var numId = +document.getElementById("itemActualId").value;
	var itemsList = document.getElementById("items");
	
	var li = document.createElement("li");
	li.setAttribute("id", 'itemMenuM' + numId);

	var a1 = document.createElement("a");
	a1.setAttribute("href", '#top');
	a1.setAttribute("class", 'skel-panels-ignoreHref');
	a1.setAttribute("onclick", 'removeMetric(\'M' + numId + '\');');
	li.appendChild(a1);
	
	var span = document.createElement("span");
	span.setAttribute("class", 'fa fa-times-circle');
	a1.appendChild(span);
	
	var a2 = document.createElement("a");
	a2.setAttribute("href", '#M' + numId +'_Section');
	a2.setAttribute("id", 'M' + numId +'_ItemName');
	a2.innerHTML = 'M' + numId;
	li.appendChild(a2);
		
	itemsList.insertBefore(li, document.getElementById("insertItemTag"));
	
	
	document.getElementById("itemActualId").value = numId+1;
	
	// Add the corresponding section to the form
	
	var metricsForm = document.getElementById("metrics");
	
	var section = document.createElement("section");
	section.setAttribute("id", 'M' + numId +'_Section');
	section.setAttribute("class", 'metricSection');
	
	var div1 = document.createElement("div");
	div1.setAttribute("class", 'row half');
	section.appendChild(div1);
	
	var div2 = document.createElement("div");
	div2.setAttribute("class", '6u');
	div1.appendChild(div2);
	
	var div3 = document.createElement("div");
	div3.setAttribute("class", '6u');
	div1.appendChild(div3);
	
	var div4 = document.createElement("div");
	div4.setAttribute("class", '6u');
	div1.appendChild(div4);
	
	var name = document.createElement("input");
	name.setAttribute("type", 'text');
	name.setAttribute("class", 'text');
	name.setAttribute("id", 'M' + numId +'_Name');
	name.setAttribute("name", 'M' + numId +'_Name');
	name.setAttribute("value", 'M' + numId);
	name.setAttribute("placeholder", 'Name');
	name.setAttribute("onblur", 'renameMetric(\'M' + numId + '\');');
	name.setAttribute("required", 'required');
	div2.appendChild(name);	
	
	var description = document.createElement("input");
	description.setAttribute("type", 'text');
	description.setAttribute("class", 'text');
	description.setAttribute("id", 'M' + numId +'_Description');
	description.setAttribute("name", 'M' + numId +'_Description');
	description.setAttribute("placeholder", 'Description');
	description.setAttribute("required", 'required');
	div3.appendChild(description);	
			
	var unit = document.createElement("input");
	unit.setAttribute("type", 'text');
	unit.setAttribute("class", 'text');
	unit.setAttribute("id", 'M' + numId +'_Unit');
	unit.setAttribute("name", 'M' + numId +'_Unit');
	unit.setAttribute("placeholder", 'Unit');
	unit.setAttribute("required", 'required');
	div4.appendChild(unit);	
			
	metricsForm.insertBefore(section, document.getElementById("insertTag"));
	
	
	// Adding the new ID in the hidden field
	var metricsId = document.getElementById("metricIds");
	metricsId.value = metricsId.value+'M' + numId +';';
	
}


/**
 * Remove a metric in the page
 */
function removeMetric(metricId){
	// Remove the item in the left menu
	var item = document.getElementById('itemMenu'+metricId);
	item.parentNode.removeChild(item);
	
	// Remove the corresponding section from the form
	var element = document.getElementById(metricId+'_Section');
	element.parentNode.removeChild(element);
	
	// Removing the corresponding ID in the hidden field
	var metricsId = document.getElementById("metricIds");
	metricsId.value = metricsId.value.replace(metricId+';', '');
}


/**
 * Rename a metric in the page
 */
function renameMetric(metricId){
	// Remove the item in the left menu
	var itemName = document.getElementById(metricId+'_ItemName');
	itemName.innerHTML = document.getElementById(metricId+'_Name').value;

		// TODO Si le nom est déjà celui d'une autre metric, vider le champ et Try Again
}
