<style type="text/css">
   #container {
    width: 900px; /* ������ ���� */
	/*height: 500px;*/
    margin: 0 auto; /* ������������ �� ������ */
   }
   #content {
    margin-left: 190px; /* ������ ����� */ 
    padding: 10px; /* ���� ������ ������ */
    background: #fff; /* ���� ���� ������ ������� */
   }
  </style>
  
<?php

$error = false;

$message = "������������ ������ � ";
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
		if($_POST["FirstName"]!=trim($_POST["FirstName"]) || $_POST["FirstName"] == "")//���
		{
			$error=true;
			$message.="��� ";
		}
		else
			$firstName = $_POST["FirstName"];
		if($_POST["LastName"]!=trim($_POST["LastName"]) || $_POST["LastName"] == "")//�������
		{
			$error=true;
			$message.="������� ";
		}
		else
			$lastName = $_POST["LastName"];
		if($_POST["Login"]!=trim($_POST["Login"]) || $_POST["Login"] == "")//�����
		{
			$error=true;
			$message.="����� ";
		}
		else
			$login = $_POST["Login"];
		if(!(filter_var($_POST["e-mail"], FILTER_VALIDATE_EMAIL)))//�����
		{
			$error=true;
			$message.="����� ";
		}
		else
			$email = $_POST["e-mail"];
		if($_POST["pass1"]!=trim($_POST["pass1"]) || $_POST["pass1"] != $_POST["pass2"] || $_POST["pass1"] == "")//������
		{
			$error=true;
			$message.="������ ";
		}
		if($_POST["Age"]=="")//�������
		{
			$error=true;
			$message.="������� ";
		}
		else
			$age = $_POST["Age"];
		if($_POST["aboutMe"]!="")//��� ���
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
			<td>������� ���� ���:</td><td><input name="FirstName" type="text" onKeyUp="if(/[^a-zA-Z�-��-߸�-��.]/i.test(this.value)){this.value='';}" value="<?php echo $firstName ?>"/></td>
			</tr>
			<tr>
			<td>������� ���� �������:</td><td><input name="LastName" type="text" onKeyUp="if(/[^a-zA-Z�-��-߸�-��.]/i.test(this.value)){this.value='';}" value="<?php echo $lastName ?>"/></td>
			</tr>
			<tr>
			<td>������� ��� �����:</td><td><input name="Login" type="text" onKeyUp="if(/[^a-zA-Z0-9-]/i.test(this.value)){this.value='';}" value="<?php echo $login ?>"/></td>
			</tr>
			<tr>
			<td>������� ����� ����������� �����:</td><td><input name="e-mail" type="text" value="<?php echo $email ?>"/></td>
			</tr>
			<tr>
			<td>������� ������:</td><td><input name="pass1" type="password"/></td>
			</tr>
			<tr>
			<td>������� ������ ��� ���:</td><td><input name="pass2" type="password"/></td>
			</tr>
			<tr>
			<td>������� ��� �������:</td><td><input name="Age" type="number" min="0" value="<?php echo $age ?>"/></td>
			</tr>
			<tr>
			<td>�������� ��� ���:</td>
			<td>
			<select name="Sex">
			<option>�������</option>
			<option>�������</option>
			</select>
			</td>
			</tr>
			<tr>
			<td>� ����</td><td><textarea name="aboutMe"><?php echo $about ?></textarea></td>
			</tr>
			<tr>
			<td colspan="2" style="text-align: center;">
			<input type="submit" value="������������������"/>
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
				<td>���:</td><td><?php echo $_POST["FirstName"]; ?></td>
				</tr>
				<tr>
				<td>�������:</td><td><?php echo $_POST["LastName"]; ?></td>
				</tr>
				<tr>
				<td>�����:</td><td><?php echo $_POST["Login"]; ?></td>
				</tr>
				<tr>
				<td>�������:</td><td><?php echo $_POST["Age"]; ?></td>
				</tr>
				<tr>
				<td>�����:</td><td><?php echo $_POST["e-mail"]; ?></td>
				</tr>
				<tr>
				<td>���:</td><td><?php echo $_POST["Sex"]; ?></td>
				</tr>
				<tr>
				<td>������:</td><td><?php echo $_POST["pass1"]; ?></td>
				</tr>
				<tr>
				<td>� ����:</td><td><?php echo $_POST["aboutMe"]; ?></td>
				</tr>
				</table>
				</div>
                </div>
                </left>
			   <?php
			}
			else
			{
				$message="!!!��� ��� ������������!!!";
				echo "<div id=content>$message</div>";
				?>
				<form method="post">
                <left>
                <div id="container">
                <div id="content">
				<table>
				<tr>
				<td>������� ���� ���:</td><td><input name="FirstName" type="text" onKeyUp="if(/[^a-zA-Z�-��-߸�-��.]/i.test(this.value)){this.value='';}" value="<?php echo $firstName ?>"/></td>
				</tr>
				<tr>
				<td>������� ���� �������:</td><td><input name="LastName" type="text" onKeyUp="if(/[^a-zA-Z�-��-߸�-��.]/i.test(this.value)){this.value='';}" value="<?php echo $lastName ?>"/></td>
				</tr>
				<tr>
				<td>������� ��� �����:</td><td><input name="Login" type="text" onKeyUp="if(/[^a-zA-Z0-9-]/i.test(this.value)){this.value='';}" value="<?php echo $login ?>"/></td>
				</tr>
				<tr>
				<td>������� ����� ����������� �����:</td><td><input name="e-mail" type="text" value="<?php echo $email ?>"/></td>
				</tr>
				<tr>
				<td>������� ������:</td><td><input name="pass1" type="password"/></td>
				</tr>
				<tr>
				<td>������� ������ ��� ���:</td><td><input name="pass2" type="password"/></td>
				</tr>
				<tr>
				<td>������� ��� �������:</td><td><input name="Age" type="number" min="0" value="<?php echo $age ?>"/></td>
				</tr>
				<tr>
				<td>�������� ��� ���:</td>
				<td>
				<select name="Sex">
				<option>�������</option>
				<option>�������</option>
				</select>
				</td>
				</tr>
				<tr>
				<td>� ����</td><td><textarea name="aboutMe"><?php echo $about ?></textarea></td>
				</tr>
				<tr>
				<td colspan="2" style="text-align: center;">
				<input type="submit" value="������������������"/>
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
<title><?php echo "�����������"; ?></title>
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
            <td>������� ���� ���:</td><td><input name="FirstName" type="text" onKeyUp="if(/[^a-zA-Z�-��-߸�-��.]/i.test(this.value)){this.value='';}"/></td>
            </tr>
            <tr>
            <td>������� ���� �������:</td><td><input name="LastName" type="text" onKeyUp="if(/[^a-zA-Z�-��-߸�-��.]/i.test(this.value)){this.value='';}"/></td>
            </tr>
        	<tr>
            <td>������� ��� �����:</td><td><input name="Login" type="text" onKeyUp="if(/[^a-zA-Z0-9-]/i.test(this.value)){this.value='';}"/></td>
            </tr>
        	<tr>
            <td>������� ����� ����������� �����:</td><td><input name="e-mail" type="text"/></td>
            </tr>
        	<tr>
            <td>������� ������:</td><td><input name="pass1" type="password"/></td>
            </tr>
        	<tr>
            <td>������� ������ ��� ���:</td><td><input name="pass2" type="password"/></td>
            </tr>
            <tr>
            <td>������� ��� �������:</td><td><input name="Age" type="number" min="0"/></td>
            </tr>
            <tr>
            <td>�������� ��� ���:</td>
            <td>
            <select name="Sex">
            <option>�������</option>
            <option>�������</option>
            </select>
            </td>
            </tr>
            <tr>
            <td>� ����</td><td><textarea name="aboutMe"></textarea></td>
            </tr>
            <tr>
            <td colspan="2" style="text-align: center;">
            <input type="submit" value="������������������"/>
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