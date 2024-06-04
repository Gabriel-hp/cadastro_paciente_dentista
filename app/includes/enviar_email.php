<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require "../includes/PHPMailer-master/src/Exception.php";
require "../includes/PHPMailer-master/src/PHPMailer.php";
require "../includes/PHPMailer-master/src/SMTP.php";

function enviarEmailConsultaMarcada($email_paciente, $nome_paciente, $data_consulta, $hora_consulta, $nome_medico) {
    $mail = new PHPMailer();
    try{
        
        
        // Configurações do servidor SMTP
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP(); // Defina o uso do SMTP
        $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP
        $mail->SMTPAuth = true; // Ativa a autenticação SMTP
        $mail->Username = ''; // Seu e-mail
        $mail->Password = ''; // Sua senha
        $mail->SMTPSecure = 'tls'; // Tipo de criptografia - tls ou ssl
        $mail->Port = 587; // Porta do servidor SMTP

        // Configurações do e-mail
        $mail->setFrom('', ''); // Seu endereço de e-mail e nome
        $mail->addAddress($email_paciente, $nome_paciente); // Endereço de e-mail do paciente
        $mail->Subject = 'Confirmação de Consulta'; // Assunto do e-mail
        $mail->Body = "Olá $nome_paciente,\n\nSua consulta foi marcada com sucesso para o dia $data_consulta às $hora_consulta com o Dr. $nome_medico. Aguardamos sua presença!\n\nAtenciosamente,\n[Clínica happySmille]"; // Corpo do e-mail
    

    }catch (Exception $e){

        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}"; // Erro ao enviar o e-mail
    }
    }



?>
