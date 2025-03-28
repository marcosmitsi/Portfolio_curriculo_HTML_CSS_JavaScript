<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $nome = htmlspecialchars($_POST["nome"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars($_POST["mensagem"]);

    $mail = new PHPMailer(true);
    try {
        // Configuração do servidor SMTP do HostGator
        $mail->isSMTP();
        $mail->Host = '#'; // Alterar para o servidor SMTP 
        $mail->SMTPAuth = true;
        $mail->Username = '#'; // E-mail de envio
        $mail->Password = '#'; // Senha do e-mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 465; // Porta SMTP padrão (587 ou 465)

        // Remetente e Destinatário
        $mail->setFrom($email, $nome);
        $mail->addAddress('#', '#'); // E-mail para onde o formulário será enviado

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = "Novo contato do site - $nome";
        $mail->Body = "Nome: $nome<br>Email: $email<br><br>Mensagem:<br>$mensagem";
        $mail->AltBody = "Nome: $nome\nEmail: $email\n\nMensagem:\n$mensagem"; // Texto puro (fallback)

        // Enviar o e-mail
        $mail->send();
        echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='../index.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Erro ao enviar mensagem: {$mail->ErrorInfo}');</script>";
    }
} else
 {
    echo "<script>alert('Método inválido!'); window.location.href='../index.html';</script>";
 }


