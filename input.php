<html>
<style>
body {
	background-color: #3a75c4;
}
</style>
<?php

if(isset($_POST['parol'])&&($_POST['login']) )
{
   
    $parol =htmlentities ($_POST['parol']);
    $login =htmlentities ($_POST['login']);
	
   if (($parol=="admin")&&($login=="admin"))
   { header( 'Location:main.php');}
   
else   
{   
    echo '
	
	<html>
<head>

  <meta content="text/html; charset=utf-8" http-equiv="content-type">

<link rel="stylesheet" href="style.css" type="text/css">
  <title>Кадастровые работы</title>


</head>


<body>
<div class="two"><h1>Кадастровые работы</h1></div>
<table >
  <tbody>
    
    <tr>
	
      <td style="vertical-align: top;">
	
	<p> Неверный логин или пароль </p>
	</br>
	<a href="index.php">Вернуться</a>
	  </td>
    </tr>
  </tbody>
</table>

	
	</body>
</html>
	
	
	
	
	
	';
}
}

else
{   
    echo '<html>
<head>

  <meta content="text/html; charset=utf-8" http-equiv="content-type">

<link rel="stylesheet" href="style.css" type="text/css">
  <title>Кадастровые работы</title>


</head>


<body>
<div class="two"><h1>Кадастровые работы</h1></div>
<table >
  <tbody>
    
    <tr>
	
      <td style="vertical-align: top;">
	
	<p> Проверьте заполнение данных </p>
	</br>
	<a href="index.php">Вернуться</a>
	  </td>
    </tr>
  </tbody>
</table>

	
	
	
</body>
</html>	
	
	
	
	';
}

?>