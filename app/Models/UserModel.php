<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
 /*  ime tabele u bazi */
   protected $table= 'dbanel';

/* filedovi koji ce biti inservotavani */
    protected $allowedFields = ['fname','lname','email','password','phone','user_type'];

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];




    public function beforeInsert (array $data){
      $data = $this->passwordhash($data);
      return $data;

    }



    public function beforeUpdate (array $data){
      $data = $this->passwordhash($data);
      return $data;

    }




    public function passwordhash (array $data){
      if(isset($data['data']['password']))
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
      return $data;

    }


   

   







  


     




  

}