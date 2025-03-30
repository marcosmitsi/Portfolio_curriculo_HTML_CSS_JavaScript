<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = htmlspecialchars($_POST["nome"]);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $mensagem = htmlspecialchars($_POST["mensagem"]);

        $destinatario = "email@hotmail.com";
        $assunto = "Contato do Site - $nome";
        $corpoEmail = "Nome: $nome\nE-mail: $email\nMensagem:\n$mensagem";

        $headers = "From: $email\r\nReply-To: $email\r\n";

        if (mail($destinatario, $assunto, $corpoEmail, $headers)) {
            echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='../index.html';</script>";
        } else {
            echo "<script>alert('Erro ao enviar a mensagem. Tente novamente.');</script>";
        }
    } else {
        echo "<script>alert('Método inválido!'); window.location.href='../index.html';</script>";
    }

}