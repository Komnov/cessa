<?php
/* Здесь проверяется существование переменных */
if (isset($_POST['order_number'])) {$orderNumber = $_POST['order_number'];}
if (isset($_POST['product_name'])) {$productName = $_POST['product_name'];}
if (isset($_POST['product_sku'])) {$productSku = $_POST['product_sku'];}
if (isset($_POST['product_size'])) {$productSize = $_POST['product_size'];}
if (isset($_POST['product_price'])) {$productPrice = $_POST['product_price'];}
if (isset($_POST['order_received_date'])) {$orderReceivedDate = $_POST['order_received_date'];}
if (isset($_POST['return_reason'])) {$returnReason = $_POST['return_reason'];}
if (isset($_POST['comment'])) {$comment = $_POST['comment'];}

if (isset($_POST['full_name'])) {$fullName = $_POST['full_name'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}

if (isset($_POST['city'])) {$city = $_POST['city'];}
if (isset($_POST['street'])) {$street = $_POST['street'];}
if (isset($_POST['house'])) {$house = $_POST['house'];}
if (isset($_POST['apartment'])) {$apartment = $_POST['apartment'];}
if (isset($_POST['postcode'])) {$postcode = $_POST['postcode'];}

if (isset($_POST['bank_name'])) {$bankName = $_POST['bank_name'];}
if (isset($_POST['bank_bic'])) {$bankBic = $_POST['bank_bic'];}
if (isset($_POST['bank_correspondent_account'])) {$bankCorrespondentAccount = $_POST['bank_correspondent_account'];}
if (isset($_POST['bank_account'])) {$bankAccount = $_POST['bank_account'];}

 
/* mail куда будет отправлено */
$myaddres  = "mar.eka07@yandex.ru"; // кому отправляем

// Получаем информацию о вложенном файле
$attachment = $_FILES['attachment'];
$attachmentName = $attachment['name']; // Имя файла
$attachmentTmpName = $attachment['tmp_name']; // Временное имя файла
$attachmentSize = $attachment['size']; // Размер файла

// Папка, в которой будут сохраняться вложенные файлы
$uploadDirectory = "return_photo/";

// Генерируем уникальное имя файла для сохранения
$attachmentPath = $uploadDirectory . uniqid() . "_" . $attachmentName;

// Перемещаем вложенный файл в папку uploads
move_uploaded_file($attachmentTmpName, $attachmentPath);
 
/* текст сообщения */

$mes = "Тема: Заказ обратного звонка!\n
Номер заказа: $orderNumber\n
Название товара: $productName\n
Артикул товара: $productSku\n
Размер товара: $productSize\n
Цена товара: $productPrice\n
Дата получения заказа: $orderReceivedDate\n
Причина возврата: $returnReason\n
Комментарий: $comment\n\n

Полное имя: $fullName\n
Телефон: $phone\n
Email: $email\n\n

Город: $city\n
Улица: $street\n
Дом: $house\n
Квартира: $apartment\n
Почтовый индекс: $postcode\n\n

Название банка: $bankName\n
БИК банка: $bankBic\n
Корреспондентский счет банка: $bankCorrespondentAccount\n
Банковский счет: $bankAccount\n";
$mes .= "\nСсылка на вложение: https://" . $_SERVER['HTTP_HOST'] . "/catalog/controller/information/" . ltrim($attachmentPath, "/");


/* ф-ция отправки письма на email */
$sub='Return form'; //сабж
$email='Сообщение с формы возврата'; // от кого
$send = mail ($myaddres,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");

ini_set('short_open_tag', 'On');
header('Refresh: 3; URL=index.html');

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="3; url=index.html">
<title>Спасибо! Мы свяжемся с вами!</title>
<meta name="generator">
<script type="text/javascript">
setTimeout('location.replace("https://cessa-shoes.ru/")', 3000);
/*Изменить текущий адрес страницы через 3 секунды (3000 миллисекунд)*/
</script> 
</head>
<body>
<h1>Спасибо! Мы свяжемся с вами!</h1>
</body>
</html>
