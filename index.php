<?php include_once "header.php"; ?>
<?php include_once "functions.php"; ?>

<html>
<head> 
<title> Main Page  </title>
<style type="text/css">
   #container {
    width: 900px; /* ������ ���� */
	/*height: 500px;*/
    margin: 0 auto; /* ������������ �� ������ */
   }
   #superHeader {
	margin-left: 15px;
	margin-right: 15px;
    text-align: left
	color: white;
   }
   #header {
    font-size: 2.2em; /* ������ ������ */
    text-align: center; /* ������������ �� ������ */
    padding: 5px; /* ������� ������ ������ */
    background: #8fa09b; /* ���� ���� ����� */
    color: #ffe; /* ���� ������ */
   }
   #sidebar {
    margin-top: 10px; 
    width: 170px; /* ������ ���� */
    padding: 0 10px; /* ������� ������ ������ */
    float: left; /* ��������� �� ������� ���� */
	background: #f0f0f0;
   }
   #content {
    margin-left: 190px; /* ������ ����� */
    padding: 10px; /* ���� ������ ������ */
    background: #fff; /* ���� ���� ������ ������� */
   }
   #footer {
    background: #8fa09b; /* ���� ���� ������� */
    color: #fff; /* ���� ������ */
    padding: 5px; /* ������� ������ ������ */
    clear: left; /* �������� �������� float */
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

<div id="header">��� ������� HTML</div>

<?php

//$_GET["cat"] - �������� �� ����������� ���������� �������


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

<div id="footer">&copy; ������� ������� +380957202328</div>
<a name="bottom"></a>

</div>

</body>
</html>