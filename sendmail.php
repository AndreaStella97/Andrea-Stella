<?php
$adminEmail = 'andrea.stella02@universitadipavia.it';
$userEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$userMessage = '
  <html>
    <head>
      <title>Grazie per avermi contattato</title>
    </head>
    <body>
      <h1>Grazie per avermi contattato</h1>
      <p>La tua richiesta è stata inoltrata. Ti risponderò al più presto.</p>
      <p>Andrea Stella</p>
    </body>
  </html>
';
$adminMessage = "
  <html>
    <head>
      <title>Contatto dal sito web</title>
    </head>
    <body>
      <h1>Contatto dal sito web</h1>
      <p>Messaggio da <b>{$_POST['name']}</b></p><br>
      <p>{$_POST['message']}</p>
    </body>
  </html>
";
$headers = 'From: andreastellawebsite@gmail.com' . "\r\n" .
           'Reply-To: andreastellawebsite@gmail.com' . "\r\n" .
           'MIME-Version: 1.0' . "\r\n" .
           'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();
if(mail($userEmail, 'Richiesta di contatto effettuata con successo', $userMessage, $headers) and mail($adminEmail, 'Richiesta di contatto dal sito web', $adminMessage, $headers) )
    echo "Messaggio inviato con successo";
else
    echo "Invio del messaggio non andato a buon fine";
?>