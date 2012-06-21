<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>WALL POST</title>
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

        <form name="wall_post" action="post_success.php">
            <textarea name="wall_post_form" rows="4" cols="20">
            </textarea>
            <br>
            <input type="submit" value="POST TO WALL" name="post_wall" />
        </form>
    </center>
</body>
</html>
