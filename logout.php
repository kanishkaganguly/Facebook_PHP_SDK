<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <META HTTP-EQUIV=REFRESH CONTENT="5; URL=http://localhost/GraphAPI/Facebook_PHP_SDK/index.php"> 
        <title></title>
    </head>
    <body>
    <center>
        <h1>FACEBOOK OPEN GRAPH API</h1>
        <br>
        <h2>USING THE PHP SDK</h2>
    </center>

    <?php
    include '/libs/facebook.php';
    $facebook = new Facebook(array(
                'appId' => '153405974793688',
                'secret' => '747220bd97921def2b43ffaf819a7965',
            ));

    $user = $facebook->getUser();

    if (!$user) {
        $this->session->sess_destroy();
    }
    ?>

    <center><h3>YOU WILL BE REDIRECTED IN 5 SECONDS</h3></center>
</body>
</html>
