<?php
$url="https://www.mohfw.gov.in/";
$html=file_get_contents($url);
$dom=new domDocument;
@$dom->loadHTML($html);
$tables=$dom->getElementsByTagName('table');
$rows=$tables->item(0)->getElementsByTagName('tr');
echo "<table id='grid'>";
echo "<tr><th>S. No.</th><th>Name of State / UT</th><th>Total Confirmed cases</th><th>Cured/Discharged/
</th><th>Death</th></tr>";
$total='';
$discharged='';
$death='';
foreach($rows as $row){
	$cols=$row->getElementsByTagName('td');
	if(isset($cols->item(0)->nodeValue) && isset($cols->item(1)->nodeValue) && isset($cols->item(2)->nodeValue) && isset($cols->item(3)->nodeValue) && isset($cols->item(4)->nodeValue)){
		echo "<tr><td>".$cols->item(0)->nodeValue."</td><td>".$cols->item(1)->nodeValue."</td><td>".$cols->item(2)->nodeValue."</td><td>".$cols->item(3)->nodeValue."</td><td>".$cols->item(4)->nodeValue."</td></tr>";
		$total=$total+$cols->item(2)->nodeValue;
		$discharged=$discharged+$cols->item(3)->nodeValue;
		$death=$death+$cols->item(4)->nodeValue;
	}
}
echo "<tr><td colspan='2'><strong>Total number of confirmed cases in India</strong></td><td><strong>$total</strong></td><td><strong>$discharged</strong></td><td><strong>$death</strong></td></tr>";
echo "</table>";
?>