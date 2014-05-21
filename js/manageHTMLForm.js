/**
 * Add a metric in the page
 */
function addMetric(){
	// Add a new item in the left menu
	var numId = +document.getElementById("itemActualId").value;
	var itemsList = document.getElementById("items");
	var oldItemsList = itemsList.innerHTML;
	itemsList.innerHTML = oldItemsList + '<li><a href="#top" id="itemMenuM' + numId +'" class="skel-panels-ignoreHref" onclick="removeMetric(\'M' + numId + '\');"><span class="fa fa-times-circle">M' + numId +'</span></a></li>';
	// FIXME itemsList.innerHTML = oldItemsList + '<li><a href="#top" id="itemMenuM' + numId +'" class="skel-panels-ignoreHref" onclick="removeMetric(\'M' + numId + '\');"><span class="fa fa-times-circle"></span></a><a href="#M' + numId +'_Section">M' + numId +'</a></li>';
	document.getElementById("itemActualId").value = numId+1;
	
	// Add the corresponding section to the form
	var section = '<section id="M' + numId +'_Section" class="metricSection">\n' 
+ '	<div class="row half">\n'
+ '		<div class="6u"><input type="text" class="text" name="M' + numId +'_Name" placeholder="Name" /></div>\n'
+ '		<div class="6u"><input type="text" class="text" name="M' + numId +'_Description" placeholder="Description" /></div>\n'
+ '	</div>\n'
+ '</section>';
	
	var metricsForm = document.getElementById("metricsForm");
	var oldMetricsForm = metricsForm.innerHTML;
	metricsForm.innerHTML = oldMetricsForm + '\n' + section;
}

/**
 * Remove a metric in the page
 */
function removeMetric(metricId){
	// Remove the item in the left menu
	var element = document.getElementById('itemMenu'+metricId);
	element.parentNode.removeChild(element);
	
	// TODO Remove the corresponding section from the form
}