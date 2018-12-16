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
    <input type="text" name="add_mac_cookie" placeholder="add_mac_cookie"><br/>
    <input type="text" name="address_list" placeholder="address_list"><br/>
    <input type="text" name="address_pool" placeholder="address_pool"><br/>
    <input type="text" name="advertise" placeholder="advertise"><br/>
    <input type="text" name="advertise_interval" placeholder="advertise_interval"><br/>
    <input type="text" name="advertise_timeout" placeholder="advertise_timeout"><br/>
    <input type="text" name="advertise_url" placeholder="advertise_url"><br/>
    <input type="text" name="idle_timeout" placeholder="idle_timeout"><br/>
    <input type="text" name="incoming_filter" placeholder="incoming_filter"><br/>
    <input type="text" name="incoming_packet_mark" placeholder="incoming_packet_mark"><br/>
    <input type="text" name="keepalive_timeout" placeholder="keepalive_timeout"><br/>
    <input type="text" name="mac_cookie_timeout" placeholder="mac_cookie_timeout"><br/>
    <input type="text" name="name" placeholder="name"><br/>
    <input type="text" name="on_login" placeholder="on_login"><br/>
    <input type="text" name="on_logout" placeholder="on_logout"><br/>
    <input type="text" name="open_status_page" placeholder="open_status_page"><br/>
    <input type="text" name="outgoing_filter" placeholder="outgoing_filter"><br/>
    <input type="text" name="outgoing_packet_mark" placeholder="outgoing_packet_mark"><br/>
    <input type="text" name="rate_limit" placeholder="rate_limit"><br/>
    <input type="text" name="session_timeout" placeholder="session_timeout"><br/>
    <input type="text" name="shared_users" placeholder="shared_users"><br/>
    <input type="text" name="status_autorefresh" placeholder="status_autorefresh"><br/>
    <input type="text" name="transparent_proxy" placeholder="transparent_proxy"><br/>

    <input type="submit" value="Enviar">
</form>
