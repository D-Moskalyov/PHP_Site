<style type="text/css">
   #container {
    width: 900px; /* Ширина слоя */
	/*height: 500px;*/
    margin: 0 auto; /* Выравнивание по центру */
   }
   #content {
    margin-left: 190px; /* Отступ слева */ 
    padding: 10px; /* Поля вокруг текста */
    background: #fff; /* Цвет фона правой колонки */
   }
  </style>
  
<?php

$error = false;

$message = "Некорректные данные в ";
$login;
$firstName;
$lastName;
$email;
$age;
$sex;
$about;

if(isset($_POST["FirstName"]) &&  isset($_POST["LastName"])
	&& isset($_POST["Age"]) &&  isset($_POST["Sex"]) 
	&&  isset($_POST["aboutMe"]) &&  isset($_POST["e-mail"])
	&&  isset($_POST["pass1"]) &&  isset($_POST["pass2"]))
{
		if($_POST["FirstName"]!=trim($_POST["FirstName"]) || $_POST["FirstName"] == "")//Имя
		{
			$error=true;
			$message.="имя ";
		}
		else
			$firstName = $_POST["FirstName"];
		if($_POST["LastName"]!=trim($_POST["LastName"]) || $_POST["LastName"] == "")//Фамилия
		{
			$error=true;
			$message.="фамилия ";
		}
		else
			$lastName = $_POST["LastName"];
		if($_POST["Login"]!=trim($_POST["Login"]) || $_POST["Login"] == "")//Логин
		{
			$error=true;
			$message.="логин ";
		}
		else
			$login = $_POST["Login"];
		if(!(filter_var($_POST["e-mail"], FILTER_VALIDATE_EMAIL)))//Почта
		{
			$error=true;
			$message.="почта ";
		}
		else
			$email = $_POST["e-mail"];
		if($_POST["pass1"]!=trim($_POST["pass1"]) || $_POST["pass1"] != $_POST["pass2"] || $_POST["pass1"] == "")//Пароли
		{
			$error=true;
			$message.="пароль ";
		}
		if($_POST["Age"]=="")//Возраст
		{
			$error=true;
			$message.="возраст ";
		}
		else
			$age = $_POST["Age"];
		if($_POST["aboutMe"]!="")//Обо мне
			$about = $_POST["aboutMe"];
			
			
		if($error)
		{
			echo "<div id=content>$message</div>";
			?>
			<form method="post">
			<left>
            <div id="container">
            <div id="content">
			<table>
			<tr>
			<td>Введите Ваше имя:</td><td><input name="FirstName" type="text" onKeyUp="if(/[^a-zA-Zа-яА-ЯёЁ-Іі.]/i.test(this.value)){this.value='';}" value="<?php echo $firstName ?>"/></td>
			</tr>
			<tr>
			<td>Введите Вашу фамилию:</td><td><input name="LastName" type="text" onKeyUp="if(/[^a-zA-Zа-яА-ЯёЁ-Іі.]/i.test(this.value)){this.value='';}" value="<?php echo $lastName ?>"/></td>
			</tr>
			<tr>
			<td>Введите Ваш Логин:</td><td><input name="Login" type="text" onKeyUp="if(/[^a-zA-Z0-9-]/i.test(this.value)){this.value='';}" value="<?php echo $login ?>"/></td>
			</tr>
			<tr>
			<td>Введите адрес электронной почты:</td><td><input name="e-mail" type="text" value="<?php echo $email ?>"/></td>
			</tr>
			<tr>
			<td>Введите пароль:</td><td><input name="pass1" type="password"/></td>
			</tr>
			<tr>
			<td>Введите пароль ещё раз:</td><td><input name="pass2" type="password"/></td>
			</tr>
			<tr>
			<td>Введите Ваш возраст:</td><td><input name="Age" type="number" min="0" value="<?php echo $age ?>"/></td>
			</tr>
			<tr>
			<td>Выберите Ваш пол:</td>
			<td>
			<select name="Sex">
			<option>Мужской</option>
			<option>Женский</option>
			</select>
			</td>
			</tr>
			<tr>
			<td>О себе</td><td><textarea name="aboutMe"><?php echo $about ?></textarea></td>
			</tr>
			<tr>
			<td colspan="2" style="text-align: center;">
			<input type="submit" value="Зарегистрироваться"/>
			</tr>
			</table>
			</div>
            </div>
            </left>
			</form>
			<?php
		}
		else
		{
			$name = $_POST["Login"];
			$uniq = true;
			$dir = "users";
			$dh  = opendir($dir);
			while (false !== ($filename = readdir($dh))) {
				if($filename == $name.".txt")
					$uniq = false;
			}
			if($uniq)
			{

				$fp = fopen("users/$name.txt", "w+b");
                
                fwrite($fp, $_POST["FirstName"]."\r\n");
                fwrite($fp, $_POST["LastName"]."\r\n");
                fwrite($fp, $_POST["Login"]."\r\n");
                fwrite($fp, $_POST["Age"]."\r\n");
                fwrite($fp, $_POST["e-mail"]."\r\n");
                fwrite($fp, $_POST["Sex"]."\r\n");
                fwrite($fp, $_POST["pass1"]."\r\n");
                fwrite($fp, $_POST["aboutMe"]."\r\n");
				
                fclose($fp);
                
                $_SESSION["Login"] = $_POST['Login'];
                $_SESSION["isLogined"] = "yes";
                
                //header("Location: index.php?cat=main");
                //require('main.php');
                
			   ?>
				<left>
                <div id="container">
                <div id="content">
				<table style="width: 50%;">
				<tr>
				<td>Имя:</td><td><?php echo $_POST["FirstName"]; ?></td>
				</tr>
				<tr>
				<td>Фамилия:</td><td><?php echo $_POST["LastName"]; ?></td>
				</tr>
				<tr>
				<td>Логин:</td><td><?php echo $_POST["Login"]; ?></td>
				</tr>
				<tr>
				<td>Возраст:</td><td><?php echo $_POST["Age"]; ?></td>
				</tr>
				<tr>
				<td>Почта:</td><td><?php echo $_POST["e-mail"]; ?></td>
				</tr>
				<tr>
				<td>Пол:</td><td><?php echo $_POST["Sex"]; ?></td>
				</tr>
				<tr>
				<td>Пароль:</td><td><?php echo $_POST["pass1"]; ?></td>
				</tr>
				<tr>
				<td>О себе:</td><td><?php echo $_POST["aboutMe"]; ?></td>
				</tr>
				</table>
				</div>
                </div>
                </left>
			   <?php
			}
			else
			{
				$message="!!!Имя уже используется!!!";
				echo "<div id=content>$message</div>";
				?>
				<form method="post">
                <left>
                <div id="container">
                <div id="content">
				<table>
				<tr>
				<td>Введите Ваше имя:</td><td><input name="FirstName" type="text" onKeyUp="if(/[^a-zA-Zа-яА-ЯёЁ-Іі.]/i.test(this.value)){this.value='';}" value="<?php echo $firstName ?>"/></td>
				</tr>
				<tr>
				<td>Введите Вашу фамилию:</td><td><input name="LastName" type="text" onKeyUp="if(/[^a-zA-Zа-яА-ЯёЁ-Іі.]/i.test(this.value)){this.value='';}" value="<?php echo $lastName ?>"/></td>
				</tr>
				<tr>
				<td>Введите Ваш Логин:</td><td><input name="Login" type="text" onKeyUp="if(/[^a-zA-Z0-9-]/i.test(this.value)){this.value='';}" value="<?php echo $login ?>"/></td>
				</tr>
				<tr>
				<td>Введите адрес электронной почты:</td><td><input name="e-mail" type="text" value="<?php echo $email ?>"/></td>
				</tr>
				<tr>
				<td>Введите пароль:</td><td><input name="pass1" type="password"/></td>
				</tr>
				<tr>
				<td>Введите пароль ещё раз:</td><td><input name="pass2" type="password"/></td>
				</tr>
				<tr>
				<td>Введите Ваш возраст:</td><td><input name="Age" type="number" min="0" value="<?php echo $age ?>"/></td>
				</tr>
				<tr>
				<td>Выберите Ваш пол:</td>
				<td>
				<select name="Sex">
				<option>Мужской</option>
				<option>Женский</option>
				</select>
				</td>
				</tr>
				<tr>
				<td>О себе</td><td><textarea name="aboutMe"><?php echo $about ?></textarea></td>
				</tr>
				<tr>
				<td colspan="2" style="text-align: center;">
				<input type="submit" value="Зарегистрироваться"/>
				</tr>
				</table>
				</div>
                </div>
                </left>
				</form>
				<?php
			}
		}
}
else
{
?>
<title><?php echo "пїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅпїЅ"; ?></title>
<style type="text/css">
input, select, textarea
{
    width: 100%;
}
</style>
<!--</head>-->
    <form method="post">
    <left>
    <div id="container">
        <div id="content">
            <table>
            <tr>
            <td>Введите Ваше имя:</td><td><input name="FirstName" type="text" onKeyUp="if(/[^a-zA-Zа-яА-ЯёЁ-Іі.]/i.test(this.value)){this.value='';}"/></td>
            </tr>
            <tr>
            <td>Введите Вашу фамилию:</td><td><input name="LastName" type="text" onKeyUp="if(/[^a-zA-Zа-яА-ЯёЁ-Іі.]/i.test(this.value)){this.value='';}"/></td>
            </tr>
        	<tr>
            <td>Введите Ваш Логин:</td><td><input name="Login" type="text" onKeyUp="if(/[^a-zA-Z0-9-]/i.test(this.value)){this.value='';}"/></td>
            </tr>
        	<tr>
            <td>Введите адрес электронной почты:</td><td><input name="e-mail" type="text"/></td>
            </tr>
        	<tr>
            <td>Введите пароль:</td><td><input name="pass1" type="password"/></td>
            </tr>
        	<tr>
            <td>Введите пароль ещё раз:</td><td><input name="pass2" type="password"/></td>
            </tr>
            <tr>
            <td>Введите Ваш возраст:</td><td><input name="Age" type="number" min="0"/></td>
            </tr>
            <tr>
            <td>Выберите Ваш пол:</td>
            <td>
            <select name="Sex">
            <option>Мужской</option>
            <option>Женский</option>
            </select>
            </td>
            </tr>
            <tr>
            <td>О себе</td><td><textarea name="aboutMe"></textarea></td>
            </tr>
            <tr>
            <td colspan="2" style="text-align: center;">
            <input type="submit" value="Зарегистрироваться"/>
            </tr>
            </table>
        </div>
    </div>
    </left>
    </form>
<?php
}
//var_dump($_POST);
?>