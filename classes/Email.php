<?php
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public  $token;

    public function __construct($email,$nombre, $token){

        $this->email =$email;
        $this->nombre =$nombre;
        $this->token =$token;
    }
    
    public function enviarConfirmacion(){

        //Crear una instancia de PHPMailer

        $mail = new PHPMailer();

        //Configurar SMTP
        $mail->isSMTP();
        $mail->Host=$_ENV['EMAIL_HOST'];
        $mail->SMTPAuth=true;
        $mail->Username = $_ENV['USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = 'tls';
        $mail->Port=$_ENV['PORT'];

        //Configurar el contenido del mail
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com','AppSalon.com');
        $mail->Subject = 'Confirma tu Cuenta';
        
        //Habilitas HTML
        $mail->isHTML(true);
        $mail->CharSet='UTF-8';

        //Definir el Contenido
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>. Has creado tu cuenta en AppSalon, sólo debes confirmarla presionando el siguiente enlace.</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] . "/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .="<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje.</p>";
        $contenido .="</html>";

        $mail->Body=$contenido;
        
        //Enviar el mail

        $mail->send();
    }

    public function enviarInstrucciones(){

        //Crear una instancia de PHPMailer

        $mail = new PHPMailer();

        //Configurar SMTP
        $mail->isSMTP();
        $mail->Host=$_ENV['EMAIL_HOST'];
        $mail->SMTPAuth=true;
        $mail->Username = $_ENV['USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = 'tls';
        $mail->Port=$_ENV['PORT'];

        //Configurar el contenido del mail
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com','AppSalon.com');
        $mail->Subject = 'Reestablece tu Password';
        
        //Habilitas HTML
        $mail->isHTML(true);
        $mail->CharSet='UTF-8';

        //Definir el Contenido
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>. Has solicitado reestablecer tu Password. Sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] . "/recuperar?token=" . $this->token . "'>Reestablecer Password</a></p>";
        $contenido .="<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje.</p>";
        $contenido .="</html>";

        $mail->Body=$contenido;
        
        //Enviar el mail

        $mail->send();
    }
}