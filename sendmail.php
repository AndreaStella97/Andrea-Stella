<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title>Andrea Stella</title>
        <link type="text/css" rel="stylesheet" href="main.css">
        <script src="https://kit.fontawesome.com/826df63da7.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="fixed-top">
            <header id="header">
                <a href="index.html"><h1>ANDREA STELLA</h1></a>
            </header>
            <nav id="navbar">
                <ul>
                    <li><a href="index.html">Chi sono</a></li>
                    <li><a href="abilita.html">Abilità</a></li>
                    <li><a href="esperienze.html">Esperienze</a></li>
                    <li><a href="video.html">Video</a></li>
                    <li><a href="contatti.html" class="current">Contatti</a></li>
                </ul>
            </nav>
        </div>
        <article id="article">
            <?php
                $adminEmail = 'andrea.stella02@universitadipavia.it';
                $userEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $name = $_POST['name'];
                $message = $_POST['message'];
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
                      <p>Messaggio da <b>{$name}</b></p><br>
                      <p>{$message}</p>
                    </body>
                  </html>
                ";
                $headers = 'From: andreastellawebsite@gmail.com' . "\r\n" .
                           'Reply-To: ' . $userEmail . "\r\n" .
                           'MIME-Version: 1.0' . "\r\n" .
                           'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                           'X-Mailer: PHP/' . phpversion();
                $errorMessage = '';
                if($name == '')
                    $errorMessage .= "Campo nome vuoto<br>";
                if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL))
                    $errorMessage .= "Indirizzo e-mail non valido<br>";
                if($message == '')
                    $errorMessage .= "Campo messaggio vuoto<br>";
                if($errorMessage != ''){
                    echo "
                    <div class='text-center'>
                        <h1>Sono stati riscontrati i seguenti errori:</h1>
                        <p class ='error-message'>$errorMessage</p>
                        <p>Torna alla pagina <a href='contatti.html'>Contatti</a> per correggerli.</p>
                    </div>
                    ";
                }
                else{
                    if(mail($adminEmail, 'Richiesta di contatto dal sito web', $adminMessage, $headers))
                        echo "
                        <div class=text-center>
                            <h1>Messaggio inviato con successo.</h1>
                            <h3>Grazie per avermi contattato!</h3>
                            <p>Torna alla pagina <a href='index.html'>Chi sono</a>.</p>
                        </div>
                        ";
                    else
                        echo "
                        <div class='text-center'>
                            <h1>Sono spiacente, l'invio del messaggio non è andato a buon fine</h1>
                            <p>Riprova più tardi oppure contattami tramite <a href='https://wa.me/393200709929'>Whatsapp</a> o tramite <a href='mailto:andrea.stella3797@gmail.com'>E-mail</a>.</p>
                            <p>Torna alla pagina <a href='contatti.html'>Contatti</a>.</p>
                        </div>
                        ";
                }   
                ?>
        </article>
        <footer id="footer">
            <a href="https://wa.me/393200709929"><i class="fab fa-whatsapp fa-2x"></i></a>
            <a href="mailto:andrea.stella3797@gmail.com"><i class="far fa-envelope fa-2x"></i></a>
            <p>&copy; Andrea Stella 2021</p>
        </footer>
    </body>
</html>