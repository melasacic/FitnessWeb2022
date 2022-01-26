<?php

class Config{

  public static function DB_HOST(){
    return "localhost";
  }
  public static function DB_USERNAME(){
    return "root";
  }
  public static function DB_PASSWORD(){
    return "root123";
  }
  public static function DB_SCHEME(){
    return "fit";
  }
  public static function DB_PORT(){
    return "3306";
  }
  public static function DATE_FORMAT(){
    return "Y-m-d H:i:s";
  }

/*  const DB_HOST="localhost";
  const DB_USER_NAME="root";
  const DB_PASSWORD="root123";
  const DB_SCHEME="fit";*/

  const SMTP_HOST ="smtp.mailgun.com";
  const SMTP_PORT ="587";
  const SMTP_USER ="postmaster@sandboxa73ae8d555934030adb0817a1d0514d7.mailgun.org";
  const SMTP_PASSWORD ="";//64be5acfe67ea9297ef3f966efacd804-054ba6b6-0d770a75


}

// const DB_HOST="localhost";
// const DB_USER_NAME="fitnesssystem";
// const DB_PASSWORD="fitnesssystem";
// const DB_SCHEME="FitnessSystem";
 ?>
