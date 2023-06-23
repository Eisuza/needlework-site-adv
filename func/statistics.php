<?php

function get_user_ip() {
	$keys = ['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'];

    foreach($keys as $key) {
        if(!empty($_SERVER[$key])) {
            $ip = $_SERVER[$key];
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }
    }
}

function update_iplist($link, $ip) {
    $query = "SELECT id FROM iplist WHERE ip = '$ip'";
    $result = mysqli_query($link, $query);
    $amount = mysqli_num_rows($result);
    if($amount > 0)
    { 
        $query = "UPDATE iplist SET amount  = (amount + 1) WHERE ip = '$ip'";
        $result = mysqli_query($link, $query);
    }
    else{
        $query = "INSERT INTO iplist (ip, amount) VALUES ('$ip', 1)";
        $request = mysqli_query($link, $query);
    }
}
?>