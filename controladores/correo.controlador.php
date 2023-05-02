<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




class ContoladorCorreo
{

    public static function credencialesUsuarioNuevo($usuario,$Correo,$Contrasena)
    {
        //Load Composer's autoloader
        require 'vendor/autoload.php';


            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'mail.lubrimovil.com ';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'contacto@lubrimovil.com';                     //SMTP username
                $mail->Password   = 'N8dyAf@DxtkK';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('contacto@lubrimovil.com', 'CONTACTO UCEM');
                $mail->addAddress('bla_113@hotmail.com', 'El Usuario');     //Add a recipient
                //$mail->addAddress('ellen@example.com');               //Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name




                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'PHP MVC';
                $mail->Body    = "<html>

                <head>
                    <title>Nueva Cuenta</title>
                </head>
                
                <body>
                    <div style='width: 800px; background: #fff; border-style: groove'>
                        <div style='width: 50%; text-align: left'>
                            <a href='your website url'>
                                <img src=\"cid:logo_p2t\" height=60 width=200;'></a>
                        </div>
                        <hr width='100%' size='2' color='#A4168E' />
                        <div style='width:50%;height:20px; text-align:right;margin-top:-32px;padding-left:390px;'>
                            <a href='ucema.ac.cr' style='color:#00BDD3;text-decoration:none;'>
                               UCEM Cuenta</a>
                            |
                            <a href='your url' style='color:#00BDD3;text-decoration:none;'>Principal
                            </a>
                        </div>
                        <h2 style='width:50%;height:40px; text-align:right;margin:0px;padding-left:390px;color:#B24909;'>
                                Activción de Cuenta
                        </h2>
                       
                        <h4 style='color: #ea6512; margin-top: 20px'>
                            Bienvenido a la Universidad de las Ciencias Enpresariales
                        </h4>
                        <p>
                            Acontinuacion se le detallara las credenciales de acceso al sistema de la Universidad
                        </p>
                        <hr />
                        <div style='height: 210px'>
                            <table cellspacing='0' width='100%'>
                                <thead>
                                    <col width='80px' />
                                    <col width='40px' />
                                    <col width='40px' />
                                    <tr>
                                      
                                        <th style='color: #0a903b; text-align: left'>Identifiacion </th>
                                        <th style='color: #0a903b; text-align: left'>Correo Elctronicio</th>
                                        <th style='color: #0a903b; text-align: left'>Contrasena</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                     
                                        <td style='text-align: left'>
                                           ".$usuario."<br />   
                                        </td>
                                        <td style='text-align: left'>
                                        ".$Correo."<br />   
                                        </td>
                                        <td style='text-align: left'>
                                        ".$Contrasena."<br />   
                                        </td>
                                    </tr>
                                    <tr></tr>
                                </tbody>
                            </table>
                            <hr width='100%' size='1' color='black' style='margin-top: 10px' />
                            <table cellspacing='0' width='100%' style='padding-left: 300px'>
                             <h1> Ingrese al Sistema en siguiente enlace</h1><a href='http://ucemcampus.ucem.ac.cr/?=aula-virtual'></a>
                            </table>
                        </div>
                    </div>
                </body>
                
                </html>";
                $mail->AltBody = 'Mensaje enviado com MVC PHP LUBRIMOVIL';
                //$mail->send();

                if ($mail->send()) {
                    
                    return  "ok";
                }else{
                    return "error";
                }
            } catch (Exception $e) {
                echo "No se pudo enviar el coreo. Mailer Error: {$mail->ErrorInfo}";

            }
        
    }
}
