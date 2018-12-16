<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 07/03/2018
 * Time: 15:29
 */
?>



<form action="" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="address" placeholder="address"><br/>
    <input type="text" name="comment" placeholder="comment"><br/>
    <input type="text" name="email" placeholder="email"><br/>
    <input type="text" name="limitBytesIn" placeholder="limitBytesIn"><br/>
    <input type="text" name="limitBytesOut" placeholder="limiteBytesOut"><br/>
    <input type="text" name="limitBytesTotal" placeholder="limiteBytesTotal"><br/>
    <input type="text" name="limitUptime" placeholder="limitUptime"><br/>
    <input type="text" name="macAddress" placeholder="macAddress"><br/>
    <input type="text" name="name" placeholder="name"><br/>
    <input type="text" name="password" placeholder="password""><br/>
    <input type="text" name="profile" placeholder="profile"><br/>
    <input type="text" name="routes" placeholder="routes"><br/>
    <input type="text" name="server" placeholder="server"><br/>

    <input type="submit" value="Enviar">
</form>
