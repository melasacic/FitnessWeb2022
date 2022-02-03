<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../vendor/autoload.php';

/*Username: postmaster@sandboxa73ae8d555934030adb0817a1d0514d7.mailgun.org
Default password: 64be5acfe67ea9297ef3f966efacd804-054ba6b6-0d770a75*/
// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
  ->setUsername('mela.sacic@stu.ibu.edu.ba')
  ->setPassword('') /*n$!2*n8#As~WW*4=*/
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['mela@shfy.io' => 'Mela'])
  ->setTo(['melasacic74@gmail.com'])
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);

print_r($result);

?>
