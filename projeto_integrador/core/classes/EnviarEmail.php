<?php

namespace core\classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EnviarEmail{
    
    public function enviar_email_confirmacao_novo_cliente($email_cliente, $purl){

        //Load Composer's autoloader
        //require 'vendor/autoload.php';

        

        //constroi o purl(link para validação do email)
        $link = BASE_URL . '?a=confirmar_email&purl=' . $purl;

        //Envia um email para o novo cliente para confirmar o email
        $mail = new PHPMailer(true);

        try {
            //Config do email
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                            //Enable verbose debug output
            $mail->isSMTP();                                               //Send using SMTP
            $mail->Host       = EMAIL_HOST;                                //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                      //Enable SMTP authentication
            $mail->Username   = EMAIL_FROM;                                //SMTP username
            $mail->Password   = EMAIL_PASS;                                //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = EMAIL_PORT;                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet    = 'UTF-8';                               

            //Emissor e receptor
            $mail->setFrom(EMAIL_FROM, APP_NAME);
            $mail->addAddress($email_cliente);     //Add a recipient
            
            /* Não Obrigatório
            $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');
            */

            /* Não Obrigatório
            //Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            */

            //Conteudo
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = APP_NAME . ' - Confirmação de email.';

            //mensagem do email
            $html = '<p>Seja bem-vindo a nossa loja ' . APP_NAME . '.</p>';
            $html .= '<p>Para poder entrar na nosssa loja, confirme o seu email</p>';
            $html .= '<p>Para confirmar o Email, CLICK no link abaixo:</p>';
            $html .= '<p><a href="'.$link.'">Confirmar Email</a></p>';
            $html .= '<p><i><small>' . APP_NAME . '</small></i></p>';
            $html .= '<p></p>';
            $mail->Body    = $html;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }

    }
}