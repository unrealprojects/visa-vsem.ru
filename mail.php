<?php
    if(!empty($_POST["phone1"])){
        $phone = $_POST["phone1"];
    }elseif(!empty($_POST["phone2"]) && !isset($phone)){
        $phone = $_POST["phone2"];
    }else{
        $phone='Ошибка';
    }
    /* получатели */
    $to= "Oleg <olegblud@gmail.com>" . ", " ; //обратите внимание на запятую
    $to .= "Ruslan <69lee@mail.ru>";

    /* тема/subject */
    $subject = "Заявка visa-vsem.ru";

    /* сообщение */
    $message = '
    <html>
    <head>
     <title>Заявка visa-vsem.ru</title>
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
    $headers .= "From: Visa Vsem <info@visa-vsem.ru>\r\n";
    $headers .= "Cc: info@visa-vsem.ru\r\n";
    $headers .= "Bcc: info@visa-vsem.ru\r\n";

    /* и теперь отправим из */
    mail($to, $subject, $message, $headers);