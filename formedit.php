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
//выводим нужный для ввода данных код html
function clients()
{	$ID_CLIENT = $_REQUEST['ID_CLIENT'];
require 'db_connect.php';
echo '<input type="hidden" name="ID_CLIENT" value="'.$ID_CLIENT.'">';
echo $ID_CLIENT;
$result = mysqli_query($mysqli,"SELECT * FROM clients WHERE ID_CLIENT='$ID_CLIENT'");
$row=mysqli_fetch_array($result);
	 echo'                  <td>Код клиента</td>
            <td ><input name="ID_CLIENT" value="'.htmlspecialchars($row['ID_CLIENT']).'">
            </td></tr>          <tr><td>ФИО</td>            <td>
              <input name="FIO" value="'.htmlspecialchars($row['FIO']).'">            </td>          </tr>          <tr>
            <td>Тип услуги</td>            <td>
              <input name="TYPE_SERVICE" value="'.htmlspecialchars($row['TYPE_SERVICE']).'">            </td>          </tr>
          <tr>            <td>Адресс</td>            <td>
              <input  name="ADRESS" value="'.htmlspecialchars($row['ADRESS']).'">            </td>          </tr>
			            <tr>            <td>Телефон</td>            <td>
              <input  name="PHONE_NUMBER" value="'.htmlspecialchars($row['PHONE_NUMBER']).'">            </td>          </tr>
                    <tr>'   ;
}

function deals()
{	$ID_DEAL = $_REQUEST['ID_DEAL'];
require 'db_connect.php';
echo '<input type="hidden" name="ID_DEAL" value="'.$ID_DEAL.'">';
$result = mysqli_query($mysqli,"SELECT * FROM deal WHERE ID_DEAL='$ID_DEAL'");
$row=mysqli_fetch_array($result);
 echo'
                  <td>Код сделки</td>
            <td ><input name="ID_DEAL" value="'.htmlspecialchars($row['ID_DEAL']).'">
          <tr>            <td>Сумма</td>            <td>
              <input name="SUM" value="'.htmlspecialchars($row['SUM']).'">            </td>          </tr>
			       <tr>            <td>Описание сделки</td>            <td>
              <input name="ABOUT_DEAL" value="'.htmlspecialchars($row['ABOUT_DEAL']).'">            </td>          </tr>
          <tr>            <td>Код клиента</td>            <td>
              <input  name="clients_ID_CLIENT" value="'.htmlspecialchars($row['clients_ID_CLIENT']).'">
            </td>          </tr>          <tr>            <td>Код услуги</td>
            <td><input   name="services_ID_SERVICES" value="'.htmlspecialchars($row['services_ID_SERVICES']).'"></td>          </tr>
          <tr>'   ;
}

function services()
{	$ID_SERVICES = $_REQUEST['ID_SERVICES'];
require 'db_connect.php';
echo '<input type="hidden" name="ID_SERVICES" value="'.$ID_SERVICES.'">';
$result = mysqli_query($mysqli,"SELECT * FROM services WHERE ID_SERVICES='$ID_SERVICES'");
$row=mysqli_fetch_array($result);
 echo'
<td>Код услуги</td>
            <td ><input name="ID_SERVICES" value="'.htmlspecialchars($row['ID_SERVICES']).'">
            </td></tr>          <tr><td>Наименование услуги</td>            <td>
              <input name="NAME_SERVICES" value="'.htmlspecialchars($row['NAME_SERVICES']).'">
            </td>          </tr>		  <tr>            <td>Описание услуги</td>
            <td><input   name="ABOUT_SERVICES" value="'.htmlspecialchars($row['ABOUT_SERVICES']).'"></td>          </tr>          <tr>
<tr>' ;
}
?>
	<form action="processedit.php" method="post"> 
     <br>  <table >        <tbody>          <tr>
<?php 

$PID = $_REQUEST['PID'];
//получаем идентификатор вызвавшей страницы
//вызываем соответствующую функцию 
switch ($PID)
{case 'clients':
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
 </tr>             <br>
 <?php 
 //идентификатор страницы передаем дальше - файлу обработки формы 
//добавления processadd.php
 echo'<tr>
            <td><input type="hidden" name="PID" value="'.$PID.'"></td>';    ?>
      <td> <input value="Изменить" type="submit"> </td></tr>
    </tbody>      </table>	  </form></div>
		</body>
</html>
