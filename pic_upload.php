<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'libs/facebook.php';

//NEW FACEBOOK INSTANCE
$facebook = new Facebook(array('appId' => '153405974793688', 'secret' => '747220bd97921def2b43ffaf819a7965', 'cookie' => false));

//CREATING A NEW SESSION
$user_id = $facebook->getUser();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="table_style.css" />
    <center>
        <img src="imgs/og_logo.png" height="150" width ="150"/>
        <br>
        <img src ="imgs/facebook-logo.jpg" height ="80" width="250">
        <h1>OPEN GRAPH API</h1>
        <h2>USING THE PHP SDK</h2>
        <br>
        <form action="upload_success.php" method="post" enctype="multipart/form-data">
            <label for="file">Filename:</label>
            <input type="file" name="file" id="file" /> 
            <br />
            <input type="submit" name="submit" value="Submit" />
        </form>
    </body>
</html>
