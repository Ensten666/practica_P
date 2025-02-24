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
<div class=""><h1>Кадастровые работы</h1></div>
<table >  <tbody>    <tr><td >
		<form action="spisok.php" method="post">
		<input type="hidden" name="PID" value="clients">
		<input type="submit" value="Клиенты">
		</form>		</td></tr>
 
<tr><td >		<form action="spisok.php" method="post">
		<input type="hidden" name="PID" value="deals">
		<input type="submit" value="Сделки">
		</form>		</td></tr>
<tr><td >		<form action="spisok.php" method="post">
		<input type="hidden" name="PID" value="services">
		<input type="submit" value="Услуги">
				</form>		</td></tr>
</body>
</html>