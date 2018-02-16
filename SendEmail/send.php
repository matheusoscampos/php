<?php 
    date_default_timezone_set('Etc/UTC');

    require 'PHPMailer\PHPMailerAutoload.php';

    // Recuperando os valores dos campos digitados pelo usuário;
    $InputName    = $_POST['InputName'];
    $InputEmail   = $_POST['InputEmail'];
    $InputMessage = $_POST['InputMessage']; 

    $mail = new PHPMailer();
    // Aceitar caracteres especiais;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host = 'smtp.live.com'; // exemplo hotmail
    $mail->Port = 587;             // porta do hotmail
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "AQUI_VAI_SEU_E-MAIL";
    $mail->Password = "SENHA_DO_SEU_EMAIL";
    $mail->setFrom('matheus.sparks@hotmail.com', 'Matheus Campos');
    // Responder a:
    $mail->addReplyTo('matheus.sparks@gmail.com', 'Responder para: ');
    $mail->addAddress('matheus.sparks@gmail.com', '');
    $mail->isHTML(true);

    // Assunto do e-mail
    $mail->Subject = '[SITE] - Contato de Cliente';
    // Corpo do e-mail
    $mail->Body = 'Mensagem do cliente: <br>'.$InputMessage. '<br><br><br>E-mail: '.$InputEmail;
    

    if (!$mail->send()) {
       echo "Error: " . $mail->ErrorInfo;
    } else {
       echo "Mensagem envíada com sucesso !";
    }

?>