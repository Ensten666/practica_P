<?php
/*
функции внесения в базу данных введенных в formadd.php
значений полей
получаем введенные данные, проверяем их наличие и организуем запрос на вставку в нужную таблицу
*/
function clients()
{
require 'db_connect.php';	
$ID_CLIENT = $_REQUEST['ID_CLIENT'];
$FIO = $_REQUEST['FIO'];
$TYPE_SERVICE = $_REQUEST['TYPE_SERVICE'];
$ADRESS = $_REQUEST['ADRESS'];
$PHONE_NUMBER = $_REQUEST['PHONE_NUMBER'];
echo $ID_CLIENT;
if ((!isset($ID_CLIENT))||(!isset($FIO))
||(!isset($TYPE_SERVICE))
||(!isset($ADRESS))
||(!isset($PHONE_NUMBER)))
{
echo '<div class="my">Вы не указали все данные. Повторите ввод.</div>'; 
exit;
}
$result = mysqli_query ($mysqli,"INSERT INTO clients
(ID_CLIENT,FIO, TYPE_SERVICE,ADRESS,PHONE_NUMBER) VALUES ('$ID_CLIENT','$FIO','$TYPE_SERVICE','$ADRESS','$PHONE_NUMBER')");
if ($result) echo "<div class='my'>Данные  сохранены</div>";
if (!$result) echo "<div class='my'>Ошибка сохранения данных </div>";

}
function deals()
{
 require 'db_connect.php';	
$ID_DEAL = $_REQUEST['ID_DEAL'];
$SUM = $_REQUEST['SUM'];
$ABOUT_DEAL = $_REQUEST['ABOUT_DEAL'];
$clients_ID_CLIENT = $_REQUEST['clients_ID_CLIENT'];
$services_ID_SERVICES = $_REQUEST['services_ID_SERVICES'];
if ((!isset($ID_DEAL))
||(!isset($SUM))||(!isset($clients_ID_CLIENT))
||(!isset($services_ID_SERVICES)))
{
echo '<div class="my">Вы не указали все данные. Повторите ввод.</div>'; 
exit;
}
$result = mysqli_query ($mysqli,"INSERT INTO deals (ID_DEAL, SUM, ABOUT_DEAL, clients_ID_CLIENT, services_ID_SERVICES)VALUES('$ID_DEAL','$SUM','$ABOUT_DEAL','$clients_ID_CLIENT','$services_ID_SERVICES')");
if ($result) echo "<div class='my'>Данные сохранены</div>";
if (!$result) echo "<div class='my'>Ошибка сохранения данных</div>";   
}
function services()
{
require 'db_connect.php';	
$ID_SERVICES = $_REQUEST['ID_SERVICES'];
$NAME_SERVICES = $_REQUEST['NAME_SERVICES'];
$ABOUT_SERVICES = $_REQUEST['ABOUT_SERVICES'];
if ((!isset($ID_SERVICES))||(!isset($NAME_SERVICES))
||(!isset($ABOUT_SERVICES)))
{
echo '<div class="my">Вы не указали все данные. Повторите ввод.</div>'; 
exit;
}
$result = mysqli_query ($mysqli,"INSERT INTO services (ID_SERVICES,NAME_SERVICES, ABOUT_SERVICES) VALUES ('$ID_SERVICES','$NAME_SERVICES','$ABOUT_SERVICES')");
if ($result) echo "<div class='my'>Данные  сохранены</div>";
if (!$result) echo "<div class='my'>Ошибка сохранения данных </div>";

}
?>
<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
<link rel="stylesheet" href="style.css" type="text/css">
  <title>Кадастровые работы</title></head>
  <style>
body {
	background-color: #3a75c4;
}
</style>
<body >
<div class="two"><h1>Кадастр</h1></div>
		<?php
/*
получаем идентификатор, указывающий с какой таблицей работать
и вызываем нужную функцию
*/		
$PID = $_REQUEST['PID'];
//echo $PID;
switch ($PID)
{
case 'clients':
 clients();
break;
case 'deals':
deals();
break;
case 'services':
 services();
break;
}	
?>
<form action="main.php" method="post">
			<input type="submit" value="Список таблиц">
		</form>		</body>
</html>
