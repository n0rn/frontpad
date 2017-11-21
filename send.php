<?php

//Пример запроса статуса на php
$param['secret'] 	= ""; 	//ключ api
$param['order_id']	= ""; 	//id заказа, полученный из метода new_order

//подготовка запроса	
foreach ($param as $key => $value) { 
$data .= "&".$key."=".$value;
}

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://app.frontpad.ru/api/index.php?get_status"); 
curl_setopt($ch, CURLOPT_FAILONERROR, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_HEADER, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
$result = curl_exec($ch); 
curl_close($ch); 

//результат
echo $result; 