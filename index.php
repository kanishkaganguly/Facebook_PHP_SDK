<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        <h1>FACEBOOK OPEN GRAPH API</h1>
        <br>
        <h2>USING THE PHP SDK</h2>
    </center>
    <?php
    include 'libs/facebook.php';

    //NEW FACEBOOK INSTANCE
    $facebook = new Facebook(array('appId' => '153405974793688', 'secret' => '747220bd97921def2b43ffaf819a7965', 'cookie' => false));

    //CREATING A NEW SESSION
    $user_id = $facebook->getUser();

    if ($user_id) {
        try {
            $user_profile = $facebook->api('/me', 'GET');
            echo "<center><u> WELCOME </u></center>";
            echo "<br>";
            echo '<center><img src="https://graph.facebook.com/thebeginningoftheend/picture"/></center>';
            echo '<center> NAME : ' . $user_profile['name'] . '</center>';
            echo '<center> USERNAME : ' . $user_profile['username'] . '</center>';
            echo "<center> GENDER : " . $user_profile['gender'] . "</center>";
            echo "<center> WEBSITE : " . $user_profile['link'] . "</center>";
            echo "<center> EMAIL : " . $user_profile['email'] . "</center>";
            echo "<center> BIRTHDAY : " . $user_profile['birthday'] . "</center>";
                       
            echo '<center><a href ="'.$facebook->getLogoutUrl(array('next'=>'logout.php')).'">LOGOUT</a></center>';
        } catch (FacebookApiException $e) {
            $login_url = $facebook->getLoginUrl(array('scope' => 'email, user_birthday'));
            echo '<center>PLEASE <a href="' . $login_url . '">LOGIN</a></center>';
        }
    } else {
        $login_url = $facebook->getLoginUrl(array('scope' => 'email, user_birthday'));
        echo '<center>PLEASE <a href="' . $login_url . '">LOGIN</center></a>';
    }
    ?>
</body>
</html>
