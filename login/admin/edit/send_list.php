<?php session_start();
require_once("../../../func/db_connection.php");
require_once("../../../func/page_data.php");
require_once("../../../func/save_logs.php");
require_once("../../../func/statistics.php");
require_once("../../../vendor/autoload.php");
require_once("../../admin_mail_conf.php");
require_once("../../mail_func.php");

$link = connect_to_db();
$emails = get_emails_for_notifications($link);
?>
<!DOCTYPE html>
<html>
<?php require("header_part_edit.php"); ?>

<body>
    <?php
    if (!empty($_SESSION['user']) && $_SESSION['user'] == 'admin2451') {
        require("logout_part_edit.php");
        if (isset($_POST['emailforsubs']) && isset($_POST['titleforsubs']) && isset($_POST['messageforsubs'])) {
            if ($_POST['emailforsubs'] == 'sendit') {
                $title = $_POST['titleforsubs'];
                $body = $_POST['messageforsubs'];
                $e_mails[] = "";
                $index = 0;
                foreach ($emails as $email) :
                    if ($index == 0) {
                        $e_mails[0] = $email['email'];
                    } else {
                        array_push($e_mails, $email['email']);
                    }
                    $index += 1;                    
                endforeach;
                $ifsend = send_mails($mail_settings, $e_mails, $title, $body);
                if ($ifsend == true) {
                    echo "Рассылка успешно осуществлена.";
                } else {
                    echo "Рассылка не осуществлена или осуществлена не полностью. Возникли ошибки";
                }
                //var_dump(send_mail($mail_settings, $email, 'Отчет по IP адресам', $body));
            }
        } ?>
        <div class="container">           
            <h2> ТЕКСТ ЗАГОЛОВКА</h2>
            <form action="#" method="POST">
            <input name="emailforsubs" value="sendit" style="display:none">
                <div class="form-group">
                    <textarea type="text" name="titleforsubs" value="" cols="100" rows="1" required></textarea>
                </div>
                <br>
                <h2> ТЕКСТ УВЕДОМЛЕНИЯ</h2>
                <div class="form-group">
                    <textarea type="text" name="messageforsubs" value="" cols="100" rows="15" required></textarea>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="form_button" name="save" value="Осуществить рассылку">
                </div>
            </form>
            <h2> СПИСОК EMAIL-АДРЕСОВ ДЛЯ ОСУЩЕСТВЛЕНИЯ РАССЫЛКИ</h2>
            <table class="table2">
                <tr>
                    <th>№ п/п</th>
                    <th>email адрес</th>
                </tr>
                <?php
                $index = 1;
                $e_mails;
                foreach ($emails as $email) : ?>
                    <tr>
                        <td><?= $index ?></td>
                        <td><?= $email['email'] ?></td>
                    </tr>
                <?php $index += 1;
                endforeach; ?>
            </table><?php

                } else {
                    echo 'Не достаточно прав для просмотра.';
                    ?> <br><a href="/">На главную></a>
        <?php
                }
        ?>
</body>

</html>