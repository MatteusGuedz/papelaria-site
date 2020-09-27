<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        $name = $_POST['name']
        $email = $_POST['email']
        $subject = $_POST['subject']
        $message = $_POST['message']
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "guedzm@gmail.com");
        $subject = "Mensagem de Contato";
        $to = new SendGrid\Email(null, "eessaquemerda@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá Rogiane, <br><br>Link Nova Mensagem no Site <br><br> Nome: $name<br>Assunto: $subject <br> Email: $email <br> Mensagem: $message
        ");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso!";
       
        ?>
    </body>
</html>
