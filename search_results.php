<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'libs/facebook.php';

//NEW FACEBOOK INSTANCE
$facebook = new Facebook(array('appId' => '153405974793688', 'secret' => '747220bd97921def2b43ffaf819a7965', 'cookie' => false));
$access_token = $facebook->getAccessToken();
//CREATING A NEW SESSION
$user_id = $facebook->getUser();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="table_style.css" />
        <title>SEARCH RESULTS</title>
    </head>
    <body>
    <center>
        <img src="imgs/og_logo.png" height="100" width ="100"/>
        <br>
        <img src ="imgs/facebook-logo.jpg" height ="80" width="250">
        <h1>OPEN GRAPH API</h1>
        <h2>USING THE PHP SDK</h2>
    </center>
    <?php
    echo '<center><table border = "0" cellspacing = "15">';
    echo '<tbody>';
    echo '<thead>';
    echo '<td>PROFILE IMAGE</td>';
    echo '<td> ID </td>';
    echo '<td> NAME </td>';
    echo '</thead>';

    $friends = $facebook->api('/me/friends');
    $searchname = $_REQUEST['search_term'];
    foreach ($friends['data'] as $friend) {
        if (strripos($friend['name'], $searchname) !== FALSE) {
            echo '<tr>';
            echo '<td><a href="http://www.facebook.com/' . $friend['id'] . '"><div id="prof_pic"><img src="https://graph.facebook.com/' . $friend['id'] . '/picture?type=square"></div></a></td>';
            echo '<td><a href="http://www.facebook.com/' . $friend['id'] . '">' . $friend['id'] . '</a></td>';
            echo '<td><a href="http://www.facebook.com/' . $friend['id'] . '">' . $friend['name'] . '</a></td>';
            echo '<tr>';
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo '</center>';
    ?>
</body>
</html>
