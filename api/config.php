<?php

class Config{

  public static function DB_HOST(){
    return Config::get_env("DB_HOST", "localhost");
  }
  public static function DB_USERNAME(){
  //  return "root";
  return Config::get_env("DB_USERNAME", "root");
  }
  public static function DB_PASSWORD(){
    //return "root123";
    return Config::get_env("DB_PASSWORD", "root123");
  }
  public static function DB_SCHEME(){
  //  return "fit";
  return Config::get_env("DB_SCHEME", "fit");
  }
  public static function DB_PORT(){
  //  return "3306";
  return Config::get_env("DB_PORT", "3306");
  }
  public static function DATE_FORMAT(){
    return "Y-m-d H:i:s";
  }
  public static function SMTP_HOST(){

  return Config::get_env("SMTP_HOST", "smtp.gmail.com");
  }
  public static function SMTP_PORT(){

  return Config::get_env("SMTP_PORT", "587");
  }
  public static function SMTP_USER(){

  return Config::get_env("SMTP_USER", "mela.sacic@stu.ibu.edu.ba");
  }
  public static function SMTP_PASSWORD(){

  return Config::get_env("SMTP_PASSWORD", "");
  }

 // this function is getting parameter from enviroment variables or returning default value
  public static function get_env($name, $default){
    return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
  }


/*  const DB_HOST="localhost";
  const DB_USER_NAME="root";
  const DB_PASSWORD="root123";
  const DB_SCHEME="fit";*/

  /*const SMTP_HOST ="smtp.gmail.com";
  const SMTP_PORT ="587";
  const SMTP_USER ="mela.sacic@stu.ibu.edu.ba";
  const SMTP_PASSWORD ="n$!2*n8#As~WW*4=";*/


}

// const DB_HOST="localhost";
// const DB_USER_NAME="fitnesssystem";
// const DB_PASSWORD="fitnesssystem";
// const DB_SCHEME="FitnessSystem";
 ?>
