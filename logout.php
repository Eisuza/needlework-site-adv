<?php
session_start();
unset($_SESSION['user']);
setcookie('user','',time()-10, '/');
if (isset($_COOKIE['remember']) && ($_COOKIE['remember'] == 0)) {
    unset($_COOKIE['remember']); 
    setcookie('remember', 'nodata', time()-1, '/');
    if (isset($_COOKIE['searches'])) {
        unset($_COOKIE['searches']); 
        setcookie('searches', 'nodata', time()-1, '/');
    } 
    if (isset($_COOKIE['visits'])) {
        unset($_COOKIE['visits']); 
        setcookie('visits', 'nodata', time()-1, '/');
    } 
}

header('Location:/');
?>