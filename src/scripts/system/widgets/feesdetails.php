<?php

include_once AppRoot . AppController . "system/c__widgetController.php";


$widgetObj = new c__widgetController();



$widgetObj->column=  array("ft.fees_type","fees_amount","paid","due_date");
$widgetObj->table = "fees_dues fd";
$widgetObj->join_condition="join fees_type ft on ft.id=fd.fees_type_id";

//$widgetObj->debug=true;
$data=$widgetObj->addWhereCondition("fd.student_id=".$_GET['id'])->addOrderBy(array("fees_priority"))->select()->executeRead();

print_r($data);

$html="<table>";
$html.="<tr><td valign='top'><img src=".$data[0]['photo']."></td><td><h1>".$data[0]['first_name']." ".$data[0]['middle_name']." ".$data[0]['last_name']."</h1>";
$html.="<br/>
<table>
<tr>
<td colspan=2><h5>Demographics</h5></td>
</tr>
<tr>
<td>DOB</td>
<td>".date(AppDateFormatPhp,strtotime($data[0]['date_of_birth']))."</td>
</tr>
<tr>
<td>Current Age</td>
<td>".(date("Y",time()-strtotime($data[0]['date_of_birth']))-1970)."</td>
</tr>
<tr>
<td>Gender</td>
<td>".$data[0]['sex']."</td>
</tr>
<tr>
<td>Mother tounge</td>
<td>".$data[0]['mother_tongue']."</td>
</tr>
<tr>
<td>Blood Group</td>
<td>".$data[0]['blood_group']."</td>
</tr>
<tr>
<td>Height</td>
<td>".$data[0]['height']."</td>
</tr>
<tr>
<td>Weight</td>
<td>".$data[0]['weight']."</td>
</tr>

</table>    


</td></tr>";
$html.="<table>";

echo $html;
//echo createHTMLTable()

?>
