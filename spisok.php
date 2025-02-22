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
function clients()
{
	$mysqli=mysqli_connect('localhost', 'root', '', 'bti_kurs');
	$query="SELECT * FROM clients";
 $result= mysqli_query($mysqli,($query));
	$numresult=mysqli_num_rows($result);
	
echo '<table border = "1" bordercolor = "black" >';
echo '<tr><th>Код клиента</th>';
 echo '<th>ФИО</th>';
echo '<th>Тип услуги</th>';
echo '<th>Адресс</th>';
echo '<th>Телефон</th>';
echo '<th></th>';
echo '<th><form action="formadd.php" method="post">';
echo'<input type="hidden" name="ID_CLIENT" value="'.$row['ID_CLIENT'].'">';
echo'<input type="hidden" name="PID" value="clients">';
echo '<input type="submit" value="Добавить">';
echo '</form>'; 
echo '</th>';
for ($i=0;$i<$numresult;$i++)
{
$row=mysqli_fetch_array($result);

echo '<tr><td>'.$row['ID_CLIENT']; echo '</td>';  
 echo '<td>'.$row['FIO'];echo '</td>';
 echo '<td>'.$row['TYPE_SERVICE'];echo '</td>';
 echo '<td>'.$row['ADRESS'];echo '</td>';
  echo '<td>'.$row['PHONE_NUMBER'];echo '</td>';
echo '<td>';
echo '<form action="del.php" method="post">';
echo'<input type="hidden" name="ID_CLIENT" value="'.$row['ID_CLIENT'].'">';
echo'<input type="hidden" name="PID" value="clients">';
echo '<input type="submit" value="Удалить">';
echo '</form>'; echo '</td><td>';
echo '<form action="formedit.php" method="post">';
echo'<input type="hidden" name="ID_CLIENT" value="'.$row['ID_CLIENT'].'">';
echo'<input type="hidden" name="PID" value="clients">';
echo '<input type="submit" value="Изменить">';
echo '</form>';
}
echo '</table>';
}
function deals()
{ 
	$mysqli=mysqli_connect('localhost', 'root', '', 'bti_kurs');
 $result = mysqli_query($mysqli,"SELECT * FROM deals" );
	$numresult=mysqli_num_rows($result);
echo '<table border = "1" bordercolor = "black" >';
echo '<tr><th>Код сделки</th>';
 echo '<th>Сумма</th>';
 echo '<th>Описание сделки</th>';
 echo '<th>Код клиента</th>';
  echo '<th>Код услуги</th>';
 echo '<th></th>';
echo '<th><form action="formadd.php" method="post">';
echo'<input type="hidden" name="ID_DEAL" value="'.$row['ID_DEAL'].'">';
echo'<input type="hidden" name="PID" value="deals">';
echo '<input type="submit" value="Добавить">';
echo '</form>'; 
echo '</th>';
for ($i=0;$i<$numresult;$i++)
{
$row=mysqli_fetch_array($result);
echo '<tr><td>'.$row['ID_DEAL']; echo '</td>';  
 echo '<td>'.$row['SUM'];echo '</td>';
 echo '<td>'.$row['ABOUT_DEAL'];echo '</td>';
  echo '<td>'.$row['clients_ID_CLIENT'];echo '</td>';
  echo '<td>'.$row['services_ID_SERVICES'];echo '</td>';
echo '<td>';
echo '<form action="del.php" method="post">';
echo'<input type="hidden" name="ID_DEAL" value="'.$row['ID_DEAL'].'">';
echo'<input type="hidden" name="PID" value="deals">';
echo '<input type="submit" value="Удалить">';
echo '</form>'; echo '</td><td>';
echo '<form action="formedit.php" method="post">';
echo'<input type="hidden" name="ID_DEAL" value="'.$row['ID_DEAL'].'">';
echo'<input type="hidden" name="PID" value="deals">';
echo '<input type="submit" value="Изменить">';
echo '</form>';
}
echo '</table>';	  	  
}
function services()
{     
	$mysqli=mysqli_connect('localhost', 'root', '', 'bti_kurs');
 $result = mysqli_query($mysqli,"SELECT * FROM services" );
	$numresult=mysqli_num_rows($result);
echo '<table border = "1" bordercolor = "black" >';
echo '<tr><th>Код услуги</th>';
 echo '<th>Наименование услуги</th>';
 echo '<th>Описание услуги</th>';
echo '<th><form action="formadd.php" method="post">';
echo'<input type="hidden" name="ID_SERVICES" value="'.$row['ID_SERVICES'].'">';
echo'<input type="hidden" name="PID" value="services">';
echo '<input type="submit" value="Добавить">';
echo '</form>'; 
echo '</th>';
for ($i=0;$i<$numresult;$i++)
{
$row=mysqli_fetch_array($result);
echo '<tr><td>'.$row['ID_SERVICES']; echo '</td>';  
 echo '<td>'.$row['NAME_SERVICES'];echo '</td>';
 echo '<td>'.$row['ABOUT_SERVICES'];echo '</td>';
echo '<td>';
echo '<form action="del.php" method="post">';
echo'<input type="hidden" name="ID_SERVICES" value="'.$row['ID_SERVICES'].'">';
echo'<input type="hidden" name="PID" value="services">';
echo '<input type="submit" value="Удалить">';
echo '</form>'; echo '</td><td>';
echo '<form action="formedit.php" method="post">';
echo'<input type="hidden" name="ID_SERVICES" value="'.$row['ID_SERVICES'].'">';
echo'<input type="hidden" name="PID" value="services">';
echo '<input type="submit" value="Изменить">';
echo '</form>';
}
echo '</table>';	 
}
echo '</table>';
$PID = $_REQUEST['PID'];
//получаем идентификатор вызвавшей страницы
//вызываем соответствующую функцию 
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
 </body>
</html>