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
        <?php
        if ($user_id) {
            try {
                $ret_obj = $facebook->api('/me/feed', 'POST', array(
                    'link' => 'http://localhost/GraphAPI/Facebook_PHP_SDK/wall_post.php',
                    'message' => $_REQUEST['wall_post_form']
                        ));
            } catch (FacebookApiException $e) {
                $login_url = $facebook->getLoginUrl(array('scope' => 'email, user_birthday,publish_stream'));
                echo '<center>PLEASE <a href="' . $login_url . '">LOGIN</a></center>';
            }
        } else {
            $login_url = $facebook->getLoginUrl(array('scope' => 'email, user_birthday, publish_stream'));
            echo '<center>PLEASE <a href="' . $login_url . '">LOGIN</center></a>';
        }
        ?>
    </body>
</html>
