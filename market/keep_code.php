<?php
include_once('../includes/head.php');
$sql=mysqli_query($conn, "SELECT * FROM sms_api");
$get_api=mysqli_fetch_assoc($sql);
$token="2ma_PpvoXLy3CmfOfQgeV9OdhRi5T55ymPuiBdGrF0MjqyxthFB8_zG0SRvIGbKE";
$url = $get_api['api_url'];

// SMSPoh Authorization Token


// Prepare data for POST request
$data = [
    "to"        =>      "09975662429",
    "message"   =>      "Hello SMSPoh",
    "sender"    =>      "Info",
    "schedule"	=>		"2020-06-05 16:44:00"
];


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    ]);

$result = curl_exec($ch);

echo $result;

?>