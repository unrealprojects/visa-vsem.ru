<?php
    if(!empty($_POST["phone1"])){
        $phone = $_POST["phone1"];
    }elseif(!empty($_POST["phone2"]) && !isset($phone)){
        $phone = $_POST["phone2"];
    }else{
        $phone='Ошибка';
    }
    /* получатели */
    $to= "Oleg <office@unrealprojects.com>" . ", " ;
    $to .= "Ruslan <69lee@mail.ru>";

    /* тема/subject */
    $subject = "Заявка visa-vsem.ru";

    /* сообщение */
    $message = '
    <html>
    <head>
     <title>Заявка visa-vsem.ru</title>
     <meta charset="utf-8">
    </head>
    <body>
        <p>
        Телефон: '.$phone.'
        </p>
    </body>
    </html>
    ';

    /* Для отправки HTML-почты вы можете установить шапку Content-type. */
    $headers= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    /* дополнительные шапки */
    $headers .= "From: Visa Vsem <office@unrealprojects.com>\r\n";
    $headers .= "Cc: office@unrealprojects.com\r\n";
    $headers .= "Bcc: office@unrealprojects.com\r\n";

    /* и теперь отправим из */
    mail($to, $subject, $message, $headers);