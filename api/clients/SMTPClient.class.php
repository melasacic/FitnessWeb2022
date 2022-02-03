<?php
require_once dirname(__FILE__).'/../../vendor/autoload.php';
require_once dirname(__FILE__).'/../config.php';

class SMTPClient {

  private $mailer;

  public function __construct(){
      // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
      ->setUsername('mela.sacic@stu.ibu.edu.ba')
      ->setPassword('')
      /*'n$!2*n8#As~WW*4='*/
    ;

      $this->mailer = new Swift_Mailer($transport);
  }

//  http://localhost/FITweb/api/users/confirm
  public function send_register_user_token($user){
        // Create a message
      $message = (new Swift_Message('Confirm your account'))
        ->setFrom(['mela@shfy.io' => 'FITweb'])
        ->setTo([$user['email']])
        ->setBody('Here is the confirmation link: http://localhost/FITweb/api/users/confirm/'.$user['token'])
        ;

      $this->mailer->send($message);
  }

  public function send_user_recovery_token($user){
        // Create a message
      $message = (new Swift_Message('Reset Your Password'))
        ->setFrom(['mela@shfy.io' => 'FITweb'])
        ->setTo([$user['email']])
        ->setBody('Here is the recovery token: '.$user['token'])
        ;

      $this->mailer->send($message);
  }

}
 ?>
