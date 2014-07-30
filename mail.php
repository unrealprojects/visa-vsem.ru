<?php
    if(!empty($_POST["phone1"])){
        $phone = $_POST["phone1"];
    }elseif(!empty($_POST["phone2"]) && !isset($phone)){
        $phone = $_POST["phone2"];
    }else{
        $phone='Ошибка';
    }


    require 'PHPMailerAutoload.php';

    //Create a new PHPMailer instance
    $mail = new PHPMailer();

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 2;

    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "massage.sender@gmail.com";

    //Password to use for SMTP authentication
    $mail->Password = "sender123456789";

    //Set who the message is to be sent from
//    $mail->setFrom('from@example.com', 'First Last');

    //Set an alternative reply-to address
//    $mail->addReplyTo('replyto@example.com', 'First Last');

    //Set who the message is to be sent to
    $mail->addAddress('office@unrealprojects.com');
    $mail->addAddress('69lee@mail.ru');

    //Set the subject line
    $mail->Subject = 'visa-vsem.ru';

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML($phone);

    //Replace the plain text body with one created manually
    $mail->AltBody = $phone;

    //Attach an image file
//    $mail->addAttachment('images/phpmailer_mini.png');

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }


/*
    $to= "Oleg <office@unrealprojects.com>" . ", " ;
    $to .= "Ruslan <69lee@mail.ru>";
/
    $subject = "Заявка visa-vsem.ru";

    $message = 'Телефон: '.$phone;

    $headers= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";

    $headers .= "From: visa-vsem.ru <office@unrealprojects.com>\r\n";
    $headers .= "Cc: office@unrealprojects.com\r\n";
    $headers .= "Bcc: office@unrealprojects.com\r\n";

    mail($to, $subject, $message, $headers);*/