<?php
if($_SESSION["isLogined"] == "yes")
{
    $fileName="users/".$_SESSION["Login"].".txt";
    $login = $_SESSION["Login"];
    if(file_exists($fileName))
    {
        $fp = fopen("users/$login.txt", "r");
        
            if(!feof($fp))
                $FirstName = fgets($fp);
            if(!feof($fp))
                $LastName = fgets($fp);
            if(!feof($fp))
                $Login = fgets($fp);
            if(!feof($fp))
                $Age = fgets($fp);
            if(!feof($fp))
                $email = fgets($fp);
            if(!feof($fp))
                $Sex = fgets($fp);
            if(!feof($fp))
                fgets($fp);
            if(!feof($fp))
                $aboutMe = fgets($fp);
        ?>
    				<left>
                    <div id="container">
                    <div id="content">
    				<table style="width: 50%;">
    				<tr>
    				<td>Имя:</td><td><?php echo $FirstName; ?></td>
    				</tr>
    				<tr>
    				<td>Фамилия:</td><td><?php echo $LastName; ?></td>
    				</tr>
    				<tr>
    				<td>Логин:</td><td><?php echo $Login; ?></td>
    				</tr>
    				<tr>
    				<td>Возраст:</td><td><?php echo $Age; ?></td>
    				</tr>
    				<tr>
    				<td>Почта:</td><td><?php echo $email; ?></td>
    				</tr>
    				<tr>
    				<td>Пол:</td><td><?php echo $Sex; ?></td>
    				</tr>
    				<tr>
    				<td>О себе:</td><td><?php echo $aboutMe; ?></td>
    				</tr>
    				</table>
                    <?php
                    //$picName="users/".$_SESSION["Login"].".*";
                    //echo $picName;
                    $fileName = $_SESSION["Login"];
                    $result = glob("users/$fileName.{jpg,jpeg,png,gif,tif}", GLOB_BRACE);
                    if($result)
                    {
                        echo "<img src='$result[0]' />";
                    }
                    else
                    {
                        if ($_FILES)
                        {
                            $name = $_FILES['uploadfile']['name'];
                            switch($_FILES['uploadfile']['type'])
                            {
                                case 'image/jpeg': $ext = 'jpg'; break;
                                case 'image/gif': $ext = 'gif'; break;
                                case 'image/png': $ext = 'png'; break;
                                case 'image/tiff': $ext = 'tif'; break;
                                default: $ext = ''; break;
                            }
                            if ($ext)
                            {
                                copy($_FILES['uploadfile']['tmp_name'],"users/".$_SESSION["Login"].".$ext");
                                $path = "users/".$_SESSION["Login"].".$ext";
                                echo "<img src='$path' />";
                                //$n = "image.$ext";
                                //move_uploaded_file($_FILES['filename']['tmp_name'], $n);
                                //echo "Загружено изображение '$name' под именем '$n':<br />";
                                //echo "<img src='$n' />";
                            }
                            else
                            {
                                echo "$name — неприемлемый формат изображения";
                                ?>
                                <form method=post enctype=multipart/form-data>
                                <input type=file name=uploadfile>
                                <input type=submit value=Загрузить></form>
                                <?php
                            }
                            //move_uploaded_file($_FILES['uploadfile']['tmp_name'], $name);
                            //echo "Загружаемое изображение '$name'<br /><img src='$name' />";
                        }
                        else
                        {
                            ?>
                            <form method=post enctype=multipart/form-data>
                            <input type=file name=uploadfile>
                            <input type=submit value=Загрузить></form>
            				
                        
                        <?php
                        }
                    }
                    ?>
                    </div>
                    </div>
                    </left>
                    <?php
        fclose($fp);
    }
}
else
{
    $message="Войдите или зарегистрируйтесь";
    echo "<div id=content>$message</div>";
}


?>