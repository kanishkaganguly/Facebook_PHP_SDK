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
        <title>FACEBOOK PHP SDK</title>
    </head>
    <body>
    <center>
        <h1><u>FACEBOOK OPEN GRAPH API</u></h1>
        <br>
        <h2>USING THE PHP SDK</h2>
    </center>
    <?php
    if ($user_id) {
        try {
            $user_profile = $facebook->api('/me', 'GET');
            echo '<center><u> WELCOME </u></center>';
            echo '<br>';
            echo '<center><table border = "0" cellspacing = "15">';
            echo '<tbody>';
            echo '<tr>';
            echo '<td> PROFILE PICTURE</td>';
            echo '<td><img src="https://graph.facebook.com/thebeginningoftheend/picture"/></td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>NAME</td>';
            echo '<td>' . $user_profile['name'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>USERNAME</td>';
            echo '<td>' . $user_profile['username'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>GENDER</td>';
            echo '<td>' . $user_profile['gender'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>WEBSITE</td>';
            echo '<td>' . $user_profile['link'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>LOCATION</td>';
            echo '<td>' . $user_profile['location']['name'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>EMAIL</td>';
            echo '<td>' . $user_profile['email'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>BIRTHDAY</td>';
            echo '<td>' . $user_profile['birthday'] . '</td>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table></center>';
            echo '<br>';
            echo '<center><a href="wall_post.php">WALL POST</a></center>';
            echo '<center><a href ="' . $facebook->getLogoutUrl(array('next' => 'logout.php')) . '">LOGOUT</a></center>';
        } catch (FacebookApiException $e) {
            $login_url = $facebook->getLoginUrl(array('scope' => 'email, user_birthday,user_location,   publish_stream'));
            echo '<center>PLEASE <a href="' . $login_url . '">LOGIN</a></center>';
        }
    } else {
        $login_url = $facebook->getLoginUrl(array('scope' => 'email, user_birthday, user_location, publish_stream'));
        echo '<center>PLEASE <a href="' . $login_url . '">LOGIN</center></a>';
    }
    ?>
</body>
</html>
