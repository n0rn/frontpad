<?php
//артикулы товаров
$product[0] = "10000";	//Пицца
$product[1] = "10001";	//Добавка к пицце - сыр
$product[2] = "10002";	//Добавка к пицце - бекон
$product[3] = "10003";	//Сок
 
//количество товаров
$product_kol[0] = "1";
$product_kol[1] = "1";
$product_kol[2] = "1";
$product_kol[3] = "1";
 
//модификаторы, если есть 
$product_mod[1] = "0";  //товар с ключом 1 является модификатором товара с ключом 0
$product_mod[2] = "0";  //товар с ключом 2 является модификатором товара с ключом 0
           	 
//детали заказа в кодировке utf-8
$param['secret'] = "";			//ключ api
$param['street']  = "Мира";		//улица
$param['home']	= "17"; 			//дом
$param['apart']	= "6";	 		//квартира
$param['phone'] = "79000000001";	//телефон
$param['descr']	= "Быстрее!"; 		//комментарий
$param['name']	= "Иван"; 		//имя клиента

//подготовка запроса				
foreach ($param as $key => $value) { 
$data .= "&".$key."=".$value;
}
 
//содержимое заказа
foreach ($product as $key => $value){ 
$data .= "&product[".$key."]=".$value."";
$data .= "&product_kol[".$key."]=".$product_kol[$key].""; 
if(isset($product_mod[$key])) { 
$data .= "&product_mod[".$key."]=".$product_mod[$key].""; 
} 
} 

//отправка
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://app.frontpad.ru/api/index.php?new_order");
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec($ch);
curl_close($ch);
 
//результат
echo $result;

