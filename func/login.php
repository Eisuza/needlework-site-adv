<?php
function login($link, $login, $password) {
    $query = "SELECT id, user_type FROM user WHERE login = '$login' AND password = '$password'";
    $result = mysqli_query($link, $query);
    $userdata = $result->fetch_assoc();
    $amount = mysqli_num_rows($result);
    if($amount > 0 && $userdata['user_type'] == 1) { 
        session_start();
        $_SESSION['user'] = $login;
        if($_POST['remember'] == 1){
            setcookie('user', $login, time() + 60*60*24*365*2 ,'/' );
            setcookie('remember', 1, time() + 60*60*24, '/' );
        }
        setcookie('remember', 0, time() + 60*60*24, '/' );
        header("Location:/admin.php");
    }
    else if ($amount > 0 && $userdata['user_type'] != 1) {
        session_start();
        $_SESSION['user'] = $login;
        if($_POST['remember'] == 1){
            setcookie('user', $login, time() + 60*60*24*365*2 ,'/' );
            setcookie('remember', 1, time() + 60*60*24, '/' );
        }
        setcookie('remember', 0, time() + 60*60*24, '/' );
        header("Location:/index.php");
    }
    else
        header("Location:/login.php");
}


function registration($link, $login, $password){
    $query = "SELECT id FROM user WHERE login = '$login'";
    $result = mysqli_query($link, $query);
    $amount = mysqli_num_rows($result);
    if($amount > 0)
    { 
        header("Location:/registration.php");       
    }
    else{
    $query = "INSERT INTO user (login, password, user_type) VALUES ('$login', '$password', 0)";
    $request = mysqli_query($link, $query);
    header("Location:/index.php");
    }
}
?>