<?php

function greeting()
{
	if($_SESSION["isLogined"] == "yes")
	{
		echo "Hello, ".$_SESSION["UserName"]."<br />";
	}
}

function stringToHeader($name)
{
	//$result = "<h1>."$name".</h1>";
	//return $result;
	
	return "<h1>".$name."</h1>";
}

function LoginForm()
{
    ?>
    <title><?php echo "����"; ?></title>
        <style type="text/css">
        input, select, textarea
        {
            width: 100%;
        }
        </style>
        <div id="container">
        <div id="content">
            <form method="post">
            <left>
            <table>
            <tr>
            <td>������� ��� �����:</td><td><input name="login" type="text" min="0"/></td>
            </tr>
            <tr>
            <td>������� ��� ������:</td><td><input name="pass" type="password" min="0"/></td>
        	</tr>
            <tr>
            <td colspan="2" style="text-align: center;">
            <input type="submit" value="�����"/>
            </tr>
            </table>
            </left>
            </form>
         </div>
         </div>
    <?php
}

?>