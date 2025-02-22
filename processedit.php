
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
$result = mysqli_query ($mysqli,
"UPDATE clients SET  FIO='$FIO', TYPE_SERVICE='$TYPE_SERVICE', ADRESS='$ADRESS', PHONE_NUMBER='$PHONE_NUMBER' WHERE ID_CLIENT='$ID_CLIENT'");


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
||(!isset($SUM))||(!isset($ABOUT_DEAL))
||(!isset($clients_ID_CLIENT))||(!isset($services_ID_SERVICES)))
{
echo '<div class="my">Вы не указали все данные. Повторите ввод.</div>'; 
exit;
}
$result = mysqli_query ($mysqli,"UPDATE deals SET SUM='$SUM', ABOUT_DEAL='$ABOUT_DEAL', clients_ID_CLIENT='$clients_ID_CLIENT', services_ID_SERVICES='$services_ID_SERVICES' WHERE ID_DEAL='$ID_DEAL'");
if ($result) echo "<div class='my'>Данные сохранены</div>";
if (!$result) echo "<div class='my'>Ошибка сохранения данных</div>";   
}
function services()
{
require 'db_connect.php';	
$ID_SERVICES = $_REQUEST['ID_SERVICES'];
echo $ID_SERVICES; 
echo '</br>';
$NAME_SERVICES = $_REQUEST['NAME_SERVICES'];
echo $NAME_SERVICES; 
echo '</br>';
$ABOUT_SERVICES = $_REQUEST['ABOUT_SERVICES'];
echo $ABOUT_SERVICES; 
if ((!isset($ID_SERVICES))||(!isset($NAME_SERVICES))
||(!isset($ABOUT_SERVICES)))
{
echo '<div class="my">Вы не указали все данные. Повторите ввод.</div>'; 
exit;
}
$result = mysqli_query ($mysqli,
"UPDATE services SET 
ID_SERVICES='$ID_SERVICES', 
NAME_SERVICES='$NAME_SERVICES',
ABOUT_SERVICES='$ABOUT_SERVICES'
WHERE ID_SERVICES='$ID_SERVICES'");
if ($result) echo "<div class='my'>Данные  сохранены</div>";
if (!$result) echo "<div class='my'>Ошибка сохранения данных </div>";
}
?>
<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
<link rel="stylesheet" href="style.css" type="text/css">
  <title>Кадастровые работы</title>
</head>
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
		</form>		</body></html>
