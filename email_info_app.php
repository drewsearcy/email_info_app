<?php
$input = file_get_contents("php://input");

preg_match('/(To): (.*)/', $input, $output_to);
preg_match('/(From): (.*)/', $input, $output_from);
preg_match('/(Date): (.*)/', $input, $output_date);
preg_match('/(Subject): (.*)/', $input, $output_subject);
preg_match('/(Message-ID): (.*)/', $input, $output_message_id);

$myObj->To = $output_to[2];
$myObj->From = $output_from[2];
$myObj->Date = $output_date[2];
$myObj->Subject =  $output_subject[2];
$myObj->MessageID = $output_message_id[2];

$response = json_encode($myObj);

echo $response;
?>
