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
<body>
<div class="two"><h1>Кадастр</h1></div>
<?php 
//получаем идентификатор вызвавшей страницы
$PID = $_REQUEST['PID'];
require 'db_connect.php';
//в зависимости от идентификатора организуем удаление данных из соответствующей таблицы -
//получим значение первичного ключа, подключимся к базе с запросом на удаление
switch ($PID)
{
case 'clients':
$client = $_REQUEST['ID_CLIENT'];

$result = mysqli_query ($mysqli,"DELETE FROM clients WHERE ID_CLIENT = '$client'");
break;

case 'deals':
$KodS = $_REQUEST['ID_DEAL'];

$result = mysqli_query ($mysqli,"DELETE FROM deals WHERE ID_DEAL = '$KodS'");
break;

case 'services':
$Servic = $_REQUEST['ID_SERVICES'];

$result = mysqli_query ($mysqli,"DELETE FROM services WHERE ID_SERVICES  = '$Servic'");
break;
 }
if ($result) echo "<div >Данные удалены</div>";
if (!$result) echo "<div> Ошибка удаления данных</div>";
?>
</body>
</html>	
