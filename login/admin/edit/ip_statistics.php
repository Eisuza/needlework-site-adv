<?php session_start();
require_once("../../../func/db_connection.php");
require_once("../../../func/page_data.php");
require_once("../../../func/save_logs.php");
require_once("../../../func/statistics.php");
require_once("../../../vendor/autoload.php");
require_once("../../admin_mail_conf.php");
require_once("../../mail_func.php");

$link = connect_to_db();
$ips = get_ips($link);
?>
<!DOCTYPE html>
<html>
<?php require("header_part_edit.php"); ?>

<body>
    <?php
    if (!empty($_SESSION['user']) && $_SESSION['user'] == 'admin2451') {
        require("logout_part_edit.php");
        if (isset($_POST['emailforadmin'])) {
            if ($_POST['emailforadmin'] == 'send') {
                $body = "";
                /*                foreach ($ips as $ip) :                       // в строчку
                    $body .= $ip['ip'];
                    $body .= " - ";
                    $body .= $ip['amount'];
                    $body .= "\n";
                endforeach;*/
                $body .= "<h2>СПИСОК IP-АДРЕСОВ</h2>";
                $body .= "<table><tr><th>IP-адрес</th><th>Количество посещений</th></tr>";
                foreach ($ips as $ip) :
                    $body .= "<tr><td>";
                    $body .= $ip['ip'];
                    $body .= "</td><td>";
                    $body .= $ip['amount'];
                    $body .= "</td></tr>";
                endforeach;
                $body .= "</table>";
                $login = $_SESSION['user'];
                $email = get_user_email($link, $login);
                $ifsend = send_mail($mail_settings, $email, 'Отчет по IP адресам', $body);
                if ($ifsend == true) {
                    echo "Отчет успешно отправлен.";
                } else {
                    echo "Отчет не отправлен. Возникли ошибки";
                }
                //var_dump(send_mail($mail_settings, $email, 'Отчет по IP адресам', $body));
            }
        }

    ?><div class="caption"> СПИСОК IP-АДРЕСОВ</div>
        <form action="#" method="POST">
            <table class="table2">
                <tr>
                    <th>IP-адрес</th>
                    <th>Количество посещений</th>
                </tr>
                <?php
                foreach ($ips as $ip) : ?>
                    <tr>
                        <td><?= $ip['ip'] ?></td>
                        <td><?= $ip['amount'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <input name="emailforadmin" value="send" style="display:none">
            <td><input type="submit" class="form_button" name="save" value="Отправить отчет"></td>
        </form><?php

            } else {
                echo 'Не достаточно прав для просмотра.';
                ?> <br><a href="/">На главную></a>
    <?php
            }
    ?>
</body>

</html>