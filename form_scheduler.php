<!DOCTYPE html>
<html>
<head>
<!--script + css timepicker -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

<script type="text/javascript" src="js/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />

<script type="text/javascript" src="lib/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css" />

<script type="text/javascript" src="lib/site.js"></script>
<link rel="stylesheet" type="text/css" href="lib/site.css" />

<!-- script + css multiselect -->
<script src="js/jquery-ui-1.10.4.custom.js"></script>
<script src="js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="js/jquery-multiselect-src.js"></script>
<script src="js/jquery-multiselect.js"></script>
<link rel="stylesheet" href="css/cupertino/jquery-ui-1.10.4.custom.css">
<link rel="stylesheet" href="css/multi-select.css">

<!-- script + css range slider -->


</head>

<div style="margin-left:10px">
<br><br><br>           
        Start :
        <input id="start" type="text" class="time" />
    <script>
        $(function() {
            $('#start').timepicker({ 'step': 30, 'forceRoundTime': true });
        });
    </script>
end :<input id="end" type="text" class="time" />
    <script>
        $(function() {
            $('#end').timepicker({ 'step': 30, 'forceRoundTime': true });
        });
    </script>      
cron :
<select id="cron" name="cron[]" multiple="multiple">
<option value="1">Monday</option>
<option value="2">Tuesday</option>
<option value="3">Wednesday</option>
<option value="4">Thursday</option>
<option value="5">Friday</option>
<option value="4">Saturday</option>
<option value="5">Sunday</option>
</select>
<script>
$(document).ready(function(){
   $("#cron").multiselect();
});
</script>
<br><br>
Interval length : <br>
<input type="text" id="intervalLength" name="intervalLength">
unit :
<select>
<option>hour</option>
<option>minute</option>
<option>second</option>
</select>


<br><br>
<div style="border: 1px solid black; width:530px;">
<?php
/*
// On récupère les identifiants des zone de texte du formulaire
$metrics = explode($_POST['metricIds'], ";") ;

// On récupère les données saisies par l'utilisateur
for($i=0;$i<count($metrics);i++){
 $_SESSION['metrics'][i]['name'] = $_POST[$metrics[i]."_Name"] ;
 $_SESSION['metrics'][i]['description'] = $_POST[$metrics[i]."_Description"] ;
}
*/
$metric['metric1']="description metric 1";
$metric['metric2']="description metric 2";
$metric['metric3']="description metric 3";
$nbMetric = 3;
$counter = 0;
foreach($metric as $id => $description){
	print('<div style="margin-left:10px; margin-top:10px;">'.$id.' : '.$description.'');
	print('<br>');
	print('fuzziness : ');
	print('<input type="text" id="fuzziness'.$id.'" name="fuzziness'.$id.'">');
	print('<select>
			<option>hour</option>
			<option>minute</option>
			<option>second</option>
			</select>');
	print('<br>');
	print('% confidence : ');
	print('<input type="text" id="confidence'.$id.'" name="confidence'.$id.'">%');
	print('<br>');	
	print('% fuzziness : ');
	print('<input type="text" id="fuzziness'.$id.'" name="fuzziness'.$id.'">%');	
	print('</div>');
	print('<hr style="width:250px">');
}
?>
</div>
</div>
</html>
