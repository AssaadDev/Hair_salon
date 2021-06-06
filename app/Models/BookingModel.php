<?php namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model {
 /*  ime tabele u bazi */
   protected $table= 'booking';

/* filedovi koji ce biti inservotavani */
    protected $allowedFields = ['id_person','fname','lname','phone_number','date','time','service_type','description'];
     

    public function init_delete($id){

      /* delete user po idu */
      $this->delete($id);

  }
}