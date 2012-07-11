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
$facebook->setFileUploadSupport(true);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        } else {
            $photo = $_FILES["file"]["tmp_name"];
            $message = $_REQUEST['pic_message'];
        }
        if ($user_id) {
            try {
                $ret_obj = $facebook->api('/me/photos', 'POST', array(
                    'source' => '@' . $photo,
                    'message' => $message,
                        )
                );
                echo '<center>SUCCESS FULLY POSTED</center>';
                echo '<br>';
                echo '<center><pre>POST ID : ' . $ret_obj['id'] . '</pre></center>';
                echo '<br>';
                echo '<br>';
                echo '<center><a href="http://localhost/GraphAPI/Facebook_PHP_SDK/index.php">GO BACK</a></center>';
            } catch (FacebookApiException $e) {
                $login_url = $facebook->getLoginUrl(array('scope' => 'email, user_birthday,user_location, publish_stream,photo_upload, read_stream', 'redirect_uri' => 'http://localhost/GraphAPI/Facebook_PHP_SDK/index.php'));
                echo '<center><a href="' . $login_url . '"><img src="imgs/fb_login_icon.gif"></a></center>';
            }
        } else {
            $login_url = $facebook->getLoginUrl(array('scope' => 'email, user_birthday, user_location, publish_stream, photo_upload, read_stream', 'redirect_uri' => 'http://localhost/GraphAPI/Facebook_PHP_SDK/index.php'));
            echo '<center><a href="' . $login_url . '"><img src="imgs/fb_login_icon.gif"></center></a>';
        }
        ?>
    </body>
</html>
