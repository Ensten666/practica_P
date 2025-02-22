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
{ echo'                  <td>Код клиента</td>
            <td ><input name="ID_CLIENT">
            </td></tr>
          <tr><td>ФИО</td>
            <td>              <input name="FIO">
            </td>          </tr>          <tr>
            <td>Тип услуги</td>            <td>
              <input name="TYPE_SERVICE">
            </td>          </tr>          <tr>
            <td>Адресс</td>            <td>
              <input  name="ADRESS">
			    </td>          </tr>          <tr>
		<td>Телефон</td>            <td>
              <input  name="PHONE_NUMBER">
            </td>          </tr>
                    <tr>'   ;
}
function deals()
{ echo'
                  <td>Код сделки</td>
            <td ><input name="ID_DEAL">
            </td></tr>
          <tr><td>Сумма</td>
            <td>              <input name="SUM">
            </td>          </tr>          <tr>
            <td>Описание сделки</td>            <td>
              <input name="ABOUT_DEAL">            </td>
          </tr>          <tr>            <td>Код клиента</td>
            <td>              <input  name="clients_ID_CLIENT">
            </td>          </tr>          <tr>
            <td>Код услуги</td>
            <td><input   name="services_ID_SERVICES"></td>
          </tr>
          <tr>'  ;
}
function services()
{ echo'
<td>Код услуги</td>
            <td ><input name="ID_SERVICES">
            </td></tr>          <tr><td>Наименование услуги</td>
            <td>              <input name="NAME_SERVICES">
            </td>          </tr>		  <tr>            <td>Тип услуги</td>
            <td><input name="ABOUT_SERVICES"></td>          </tr>          <tr>
          <tr>'   ;
}
?>
		<form action="processadd.php" method="post"> 
     <br>  <table >        <tbody>          <tr>
<?php 
$PID = $_REQUEST['PID'];
//получаем идентификатор вызвавшей страницы
//вызываем соответствующую функцию 
switch ($PID)
{  case 'clients':
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
 </tr>              <br>
 <?php 
 //идентификатор страницы передаем дальше - файлу обработки формы добавления processadd.php
 echo'<tr>
            <td><input type="hidden" name="PID" value="'.$PID.'"></td>';   
?>
      <td> <input value="Добавить" type="submit"> </td></tr>
    </tbody>      </table>	  </form>
</div>		
</body>
</html>