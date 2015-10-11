<?php include_once "header.php"; ?>
<?php include_once "functions.php"; ?>

<html>
<head> 
<title> Main Page  </title>
<style type="text/css">
   #container {
    width: 900px; /* Ширина слоя */
	/*height: 500px;*/
    margin: 0 auto; /* Выравнивание по центру */
   }
   #superHeader {
	margin-left: 15px;
	margin-right: 15px;
    text-align: left
	color: white;
   }
   #header {
    font-size: 2.2em; /* Размер текста */
    text-align: center; /* Выравнивание по центру */
    padding: 5px; /* Отступы вокруг текста */
    background: #8fa09b; /* Цвет фона шапки */
    color: #ffe; /* Цвет текста */
   }
   #sidebar {
    margin-top: 10px; 
    width: 170px; /* Ширина слоя */
    padding: 0 10px; /* Отступы вокруг текста */
    float: left; /* Обтекание по правому краю */
	background: #f0f0f0;
   }
   #content {
    margin-left: 190px; /* Отступ слева */
    padding: 10px; /* Поля вокруг текста */
    background: #fff; /* Цвет фона правой колонки */
   }
   #footer {
    background: #8fa09b; /* Цвет фона подвала */
    color: #fff; /* Цвет текста */
    padding: 5px; /* Отступы вокруг текста */
    clear: left; /* Отменяем действие float */
   }
  </style>
</head>
<body>

<?php  // include_once "menu.htm";    ?>
<?php  // require "menus.htm";    ?>
<?php  // require_once "menus.htm";    ?>

<div id="superHeader">
<?php   include_once "menu.htm";    ?>
</div>

<div id="container">

<div id="header">Мой любимый HTML</div>

<?php

//$_GET["cat"] - отвечает за отображение внутренних страниц


if(isset($_GET["cat"]))
{
	switch($_GET["cat"])
	{
		case "main":
		{
			?>
			<div id="sidebar">
			<ul>
				<li><a href="index.php?cat=main"> Main</a></li>
				<!--<li><a href="index.php?cat=login"> Login</a></li>-->
				<li><a href="index.php?cat=news"> News</a></li>
			</ul> 
			</div>
			<div id="content">
			<?php
			include_once "main.php";	
			?>
			</div>
			<?php
			break;
		}
		case "news":
			include_once "news.php";
			break;
		case "login":
			include_once "login.php";
			break;
		case "registration":
			include_once "registration.php";
			break;
		case "logout":
			include_once "logout.php";
			break;
        case "profile":
			include_once "profile.php";
			break;
		
		default:
			include_once "404.htm";
			break;		
	}
}
else
{
	?>
	<div id="sidebar">
	<ul>
		<li><a href="index.php?cat=main"> Main</a></li>
		<!--<li><a href="index.php?cat=login"> Login</a></li>-->
		<li><a href="index.php?cat=registration"> Registration</a></li>
	</ul> 
	</div>
	<div id="content">
	<?php
	include_once "main.php";	
	?>
	</div>
	<?php
}

?>

<div id="footer">&copy; Дмитрий Москалёв +380957202328</div>
<a name="bottom"></a>

</div>

</body>
</html>