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
if(isset($_POST["login"]) &&  isset($_POST["pass"]) && $_POST["login"] != "" && $_POST["pass"] != "")
{
    $fileName="users/".$_POST["login"].".txt";
    $name = $_POST["login"];
    
    if(file_exists($fileName))
    {
        $fp = fopen("users/$name.txt", "r");
        
        fgets($fp);
        fgets($fp);
        fgets($fp);
        fgets($fp);
        fgets($fp);
        fgets($fp);
        $pass = fgets($fp);
        $pass = trim($pass);
        $pass1 = $_POST["pass"];    
        if(strcmp($pass, $pass1) == 0)
        {
            $message="����� ����������!";
            echo "<div id=content>$message</div>";
            $_SESSION["isLogined"] = "yes";
            $_SESSION["Login"] = $_POST['login'];
            $fileName = $_POST['login'];
            $result = glob("users/$fileName.{jpg,jpeg,png,gif,tif}", GLOB_BRACE);
            if($result)
            {
                echo "<div id=content><img src='$result[0]' /></div>";
            }
        }
        else
        {
            $message="!!!�� ������ ������!!!";
            echo "<div id=content>$message</div>";
            LoginForm();
        }
        fclose($fp);
        
    }
    else
    {
        $message="!!!������������ �� ���������������!!!";
        echo "<div id=content>$message</div>";
        LoginForm();
    }
	
}
else
{
?>
<title><?php echo "����"; ?></title>
<style type="text/css">
input, select, textarea
{
    width: 100%;
}
</style>

<?php
LoginForm();
}
//var_dump($_POST);
?>