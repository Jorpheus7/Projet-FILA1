/**
 * Add a metric in the page
 */
/*function addMetric(){
	// Add a new item in the left menu
	var numId = +document.getElementById("itemActualId").value;
	var itemsList = document.getElementById("items");
	var oldItemsList = itemsList.innerHTML;
	// FIXME itemsList.innerHTML = oldItemsList + '<li><a href="#top" id="itemMenuM' + numId +'" class="skel-panels-ignoreHref" onclick="removeMetric(\'M' + numId + '\');"><span class="fa fa-times-circle">M' + numId +'</span></a></li>';
	itemsList.innerHTML = oldItemsList + '<li id="itemMenuM' + numId +'"><a href="#top" class="skel-panels-ignoreHref" onclick="removeMetric(\'M' + numId + '\');"><span class="fa fa-times-circle"></span></a><a href="#M' + numId +'_Section" id="M' + numId +'_ItemName">M' + numId +'</a></li>';
	document.getElementById("itemActualId").value = numId+1;
	
	// Add the corresponding section to the form
	var section = '<section id="M' + numId +'_Section" class="metricSection">\n' 
+ '	<div class="row half">\n'
+ '		<div class="6u"><input type="text" class="text" id="M' + numId +'_Name" name="M' + numId +'_Name" value="M' + numId +'" placeholder="Name" onblur="renameMetric(\'M' + numId + '\');" /></div>\n'
+ '		<div class="6u"><input type="text" class="text" id="M' + numId +'_Description" name="M' + numId +'_Description" placeholder="Description" /></div>\n'
+ '		<hr/>\n'
+ '	</div>\n'
+ '</section>';
	
	var metricsForm = document.getElementById("metrics");
	var oldMetricsForm = metricsForm.;
	//var oldMetricsForm = getInnerHtml("metrics");
	metricsForm.innerHTML = oldMetricsForm + '\n' + section;
	//metricsForm.innerHTML.replace('<!-- Auto-generated sections -->', section+'\n<!-- Auto-generated sections -->');
}*/

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
			
	metricsForm.insertBefore(section, document.getElementById("insertTag"));
	
}


/**
 * Remove a metric in the page
 */
function removeMetric(metricId){
	// Remove the item in the left menu
	var item = document.getElementById('itemMenu'+metricId);
	item.parentNode.removeChild(item);
	
	// TODO Remove the corresponding section from the form
	var element = document.getElementById(metricId+'_Section');
	element.parentNode.removeChild(element);
}


/**
 * Rename a metric in the page
 */
function renameMetric(metricId){
	// Remove the item in the left menu
	var itemName = document.getElementById(metricId+'_ItemName');
	itemName.innerHTML = document.getElementById(metricId+'_Name').value;
	
}

function getInnerHtml(tagId) {
    var div = document.getElementById(tagId);
    var childNodes = div.childNodes;
    var innerHtml = "";
    for (var i = 0; i < childNodes.length; i++) {
        var node = childNodes[i];
        if (node.nodeType == 1) {
            if (node.getAttribute("type") == "text") {
                if (node.value != "") {  
                    //! This will change the original outerHTML of the textbox
                    //If you don't want to change it, you can get outerHTML first, and replace it with "value='your_value'" 
                    node.setAttribute("value", node.value);
                }
                innerHtml += node.outerHTML;
            } else if (node.getAttribute("type") == "radio") {
                innerHtml += node.outerHTML;
            }
        }
    }
} 
