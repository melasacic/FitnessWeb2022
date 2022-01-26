<?php
require_once dirname(__FILE__).'/../../vendor/autoload.php';
require_once dirname(__FILE__).'/../config.php';

class SMTPClient {

  private $mailer;

  public function __construct(){
      // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.mailgun.com', 587))
      ->setUsername('postmaster@sandboxa73ae8d555934030adb0817a1d0514d7.mailgun.org')
      ->setPassword('') //64be5acfe67ea9297ef3f966efacd804-054ba6b6-0d770a75
    ;

      $this->mailer = new Swift_Mailer($transport);
  }

//  http://localhost/FITweb/api/users/confirm
  public function send_register_user_token($user){
        // Create a message
      $message = (new Swift_Message('Confirm your account'))
        ->setFrom(['mela@shfy.io' => 'FITweb'])
        ->setTo([$user['email']])
        ->setBody('Here is confirmation link: http://localhost/FITweb/api/users/confirm/'.$user['token'])
        ;

      $this->mailer->send($message);
  }

}
 ?>
