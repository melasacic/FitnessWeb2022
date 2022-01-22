<?php

 require_once dirname(__FILE__). '/BaseService.class.php';
 require_once dirname(__FILE__).'/../dao/AccountDao.class.php';
 require_once dirname(__FILE__).'/../dao/UserDao.class.php';

 class UserService extends BaseService {

   private $accountDao;

   public function __construct(){
   $this->dao = new UserDao();
   $this->accountDao = new AccountDao();
 }

 public function register($user){
   // for user that is registering for the first time, he will need to have account name in it
    if (!isset($user['account'])) throw new Exception("Account field is required");

  // open transaction here
  // in this case either bouth will pass or bouth will fail

    try {
      $this->dao->beginTransaction();
      // add account
          $account = $this->accountDao->add([
            "name" => $user['account'],
            "status" => "PENDING",
            "created_at" => date("Y-m-d H:i:s")
          // "created_at" => date(Config::DATE_FORMAT)
         ]);

      // add user
        $user = parent::add([
           "account_id" => $account['id'],
           "name" => $user['name'],
           "email" => $user['email'],
           "password" => $user['password'],
           "status" => "PENDING",
           "role" => "USER",
           "created_at" => date("Y-m-d H:i:s"),
           //"created_at" => date(Config::DATE_FORMAT),
           "token" => md5(random_bytes(16))
         ]);
         // commit here
         $this->dao->commit();
    } catch (\Exception $e) {
      // rollback
       $this->dao->rollBack();
        throw $e;
        if (str_contains($e->getMessage(), 'users.uq_user_email')) {
        throw new Exception("Account with same email exists in the database", 400, $e);
      }else{
        throw $e;
      }
  }

// TODO: send email with some token (in some other lecture)

  return $user;
}

  public function confirm($token){

    $user = $this->dao->get_user_by_token($token);

    if(!isset($user['id'])) throw Exception("Invalid token");

    $this->dao->update($user['id'], ["status" => "ACTIVE"]);
    $this->accountDao->update($user['account_id'], ["status" => "ACTIVE"]);

    //TODO: send email to customer

    }
}
?>
