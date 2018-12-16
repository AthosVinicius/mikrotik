<?php
/**
 * Created by PhpStorm.
 * User: Atos Vinicius
 * Date: 11/03/2018
 * Time: 21:18
 */
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Change your hotspot password</title>
    <style type="text/css">
        #errors {background-color: darkred; color: white;}
        #success {background-color: darkgreen; color: white;}
    </style>
</head>
<body>
<div>

    <?php if(!empty($errors)) { ?>
    <div id="errors"><ul>
            <?php foreach ($errors as $error) { ?>
            <li><?php echo $error; ?></li>
            <?php } ?>
        </ul></div>
    <?php } elseif (isset($_POST['password'])) { ?>
    <div id="success">Your password has been changed.</div>
    <?php } ?>

    <form action="" method="post">
        <ul>
            <li>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label for="name">Name:</label>
                <input type="name" id="name" name="name" value="" />
            </li>
            <li>
                <label for="password">New password:</label>
                <input type="password" id="password" name="password" value="" />
            </li>
            <li>
                <label for="password2">Confirm new password:</label>
                <input type="password" id="password2" name="password2" value="" />
            </li>
            <li>
                <input type="submit" id="act" name="act" value="Change password" />
            </li>
        </ul>
    </form>
</div>
</body>
</html>
