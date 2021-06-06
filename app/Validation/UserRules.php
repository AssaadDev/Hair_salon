<?php  

namespace App\Validation;

use App\Models\UserModel;

Class UserRules {


    public function validateUser(string $str , string $fields , array $data){
        $model = new UserModel();
        $posjetioc = $model->where('email', $data['email']);
        $posjetioc = $model->where('password', $data['password']);
        

    

        if(!$posjetioc) 
        return false;


    }
} 

