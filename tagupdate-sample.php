<?php

require_once('breeze/breeze.php');

#Enter API KEY
$breeze = new Breeze('xxxxxxxxxxxxxxxxxxxxxxxxxxx');

cho "Start Tag Update for " . date("Y/m/d h:i:s a") . "\n";

#Set Filters for Selection--can test selection by looking at URL when filtering

	#Status Field
	$filter['456'] = '1-2-4'; #Member, regular attendar, staff
	#Hide from Directory Field
	$filter['123'] = '90-Unassigned'; #Hide from Directory 
	#Directory Tag not Active
	$filter['tag_does_not_contain'] = 'n_4562'; #Hide from Directory 
	
	
	$filter_json = json_encode($filter);
	$people = $breeze->url("https://subdomain.breezechms.com/api/people?details=0&filter_json=$filter_json");
	$result = json_decode($people, true);

	foreach ($result as $value) {
	   #UpdateTag --could use unassign to remove as well
	   $tags = $breeze->url('https://subdomain.breezechms.com/api/tags/assign?person_id='.$value['id'].'&tag_id=347085');
	   if ($tags == true)
	   {

	   	#People Update
	   	$view_db1 .= $value['first_name'].' '.$value['last_name']." Update Add Success-".$tags."<br/>";
	   	unset($tags);
	   }else{
	   	#Update Failed
	   	$view_db1 .= $value['first_name'].' '.$value['last_name']." Update Add Failed-".$tags."<br/>";

	   }
	}
if ($view_db1 <> '')
{
	$MSG = $view_db1;
}else{

	$MSG ='No changes';
}

	print 'Changes: '.$MSG;

	
#Email what Changed
$headers = 'From: Website Monkey <admin@yourchurchdomain.org>' . "\r\n" .
    'Reply-To: admin@yourchurchdomain.org.org' . "\r\n" .
    'Content-type: text/html; '. "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail('admin@yourchurchdomain.org', 'Directory Tag Update', $MSG,$headers);  

#Send End to Cron Log
echo "\n";
echo "Stop Tag Update for " . date("Y/m/d h:i:s a") . "\n";

 ?>
