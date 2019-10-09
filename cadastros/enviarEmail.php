<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require_once __DIR__ . '/../PHPMailer-master/src/PHPMailer.php';
require_once __DIR__ . '/../PHPMailer-master/src/SMTP.php';
require_once __DIR__ . '/../PHPMailer-master/src/Exception.php';


$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Sem nome';
$email = isset($_POST['email']) ? $_POST['email'] : 'Sem email';
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : 'Sem mensagem';
$enviado = isset($_POST['enviado']) ? $_POST['enviado'] : 'nao enviado';


// Inicia a classe PHPMailer
$mail = new PHPMailer();

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->SMTPAuth   = true;
$mail->Port       = 587;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
//$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Username = 'jessica.08041992@gmail.com'; // Usuário do servidor SMTP
$mail->Password = '123456'; // Senha do servidor SMTP
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "jessica.08041992@gmail.com"; // Seu e-mail ( de quem vai mandar email)
$mail->FromName = $nome; // Seu nome
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('jessica.08041992@gmail.com', 'Portal');

//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = "Contato Portal"; // Assunto da mensagem
$mail->Body = "Você recebeu um email de: " . $nome . ", " . $email . ", " .$mensagem;
$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";
// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
// Envia o e-mail
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
 //Exibe uma mensagem de resultado
if ($enviado) {
  header('location:contato.php?msg=1');
} else {
    header('location: contato.php?msg=2');
}