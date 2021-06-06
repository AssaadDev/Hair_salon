<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BookingModel;

class f_salon extends BaseController
{
	public function index(){

	if(!$this->session->has('fname')){
		echo view('template/headerstart');
        echo view('home');
        echo view('template/footerstart');
		}else{
			echo view('template/headeruser');
			echo view('home');
			echo view('template/footerstart');
		}
	}



	public function login()
	{


		if(!$this->session->has('fname')){

		$data = [];

		helper(['form']);
		
	
		if($this->request->getMethod() == 'post'){
	
			// Validation 
	
			$rules = [
	

				'email' => 'required|min_length[3]|max_length[50]|valid_email',
				'password' => 'required|min_length[3]|max_length[255]|validateUser[email,password]',
			];

			$errors = [

				'password' => [
					'validateUser' => 'email or password dont\' match'
				]



			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
	
			}else { 
				// pohrani usera u bazu 
	
				$model = new UserModel();

				$posjetioc = $model->where('email',$this->request->getVar('email'))->first();

				#print_r($posjetioc);

				$this->setUserSession($posjetioc);
				
				if($this->session->get('user_type') === 'user'){
					return 	redirect()->to('booking');
				}else if($this->session->get('user_type') === 'admin'){
					return 	redirect()->to('tbl');
				}else{
					$this->session->setFlashdata('err', 'Sorry something went wrong. Please try later.');
					return 	redirect()->to('login');
				}
				
		}
	
		}else{
			echo view('template/headerstart', $data);
			echo view('login');
			echo view('template/footerstart');
		}
		}else{
		$session = session();
		$this->session->setFlashdata('err', 'Ne pokusavaj!');
		return 	redirect()->to('/');
	}
	}


		private function setUserSession($data){
			

			$data = [
				
				'id' => $data['id'],
				'fname' => $data['fname'],
				'lname' => $data['lname'],
				'email' => $data['email'],
				'user_type' => $data['user_type'],
				'phone' => $data['phone'],
				'isLoggedIn' => true

			];

			$this->session->set($data);
		}


	public function register() {
		if(!$this->session->has('fname')){
		$data = [];

	helper(['form']);
	

	if($this->request->getMethod() == 'post'){

		// Validation 

		$rules = [

		'fname' => 'required|min_length[3]|max_length[20]',
		'lname' => 'required|min_length[3]|max_length[20]',
		'email' => 'required|min_length[3]|max_length[255]',
		'password' => 'required|min_length[3]|max_length[255]',
		'cpassword' => 'required|matches[password]',
		'email' => 'required|min_length[3]|max_length[20]|valid_email|is_unique[dbanel.email]',
		'phone' => 'required|min_length[3]|max_length[35]',

		
		
		
		];

		if (! $this->validate($rules)) {
			$data['validation'] = $this->validator;

		}else { 
			// pohrani usera u bazu 

			$model = new UserModel();

			$novadata = [
				'fname' => $this->request->getVar('fname'),
				'lname' => $this->request->getVar('lname'),
				'email' => $this->request->getVar('email'),
				'password' => $this->request->getVar('password'),
				'phone' => $this->request->getVar('phone'),
				'user_type' => "user"
		];
			$model->save($novadata);
			$session = session();
			$session->setFlashdata('success', ' Successful Registration');
			return redirect()->to('/');
		}
	}else{
		echo view('template/headerstart');
        echo view('register');
        echo view('template/footerstart');
		}	
	}else{
		$session = session();
		$this->session->setFlashdata('err', 'Ne pokusavaj!');
		return 	redirect()->to('/');
	}
}


	public function booking(){
		if(!$this->session->has('fname')){
			$session = session();
			$session->setFlashdata('err', ' Morate biti registrovani!!!');
			return redirect()->to('login');
		}else{

			if($this->request->getMethod() == 'post'){

				$idcheck = $this->request->getVar('id');
				$bookCheck = new BookingModel();
				$bookData = $bookCheck->where('id_person', $idcheck);
				$bookend = $bookData->countAllResults();

				if($bookend<3){

				// Validation 
				$rules = [
		
				'sati' => 'required|min_length[1]|max_length[23]',
				'usluga' => 'required|min_length[3]|max_length[50]',
				'datum' => 'required'
				];
		
				if (! $this->validate($rules)) {
					$data['validation'] = $this->validator;
					$this->session->setFlashdata('msg', 'Opss nesto nije uredu');
					return redirect()->to('booking');
				}else { 
					// pohrani usera u bazu 
		
					$model = new BookingModel();
					
					$sati = $this->request->getVar('sati');
					$minute = $this->request->getVar('minute');
					if($minute == null){
						$minute = "00";
					}
					if($minute == 1 || $minute == 2 || $minute == 3 || $minute == 4 || $minute == 5 || $minute == 6 || $minute == 7 || $minute == 8 || $minute == 9 ){
						$minute = '0'.$minute;
					}
					$vrijeme = $sati.":".$minute;

					$novadata = [
						'id_person' => $this->request->getVar('id'),
						'fname' => $this->request->getVar('fname'),
						'lname' => $this->request->getVar('lname'),
						'phone_number' => $this->request->getVar('phone'),
						'time' => $vrijeme,
						'service_type' => $this->request->getVar('usluga'),
						'date' => $this->request->getVar('datum'),
						'description' => $this->request->getVar('note'),
				];

				$email = \Config\Services::email();

				$maminmail = "assaadahmed@hotmail.com";
				$usluga = $this->request->getVar('usluga');
				$dana = $this->request->getVar('datum');
				$opis = $this->request->getVar('note');
				$brojtel =  $this->request->getVar('phone');
				$ime = $this->request->getVar('fname') ." ". $this->request->getVar('lname');

				if($opis == null){
					$opis = "Ja ".$ime." bi volio/voljela ".$usluga." dana ".$dana." u ".$vrijeme." sati."."<br>"."Moj broj telefona je ".$brojtel ." mozete me kontaktirati u koliko dodje do promjene.";
				}else{
					$opis = "Ja ".$ime." bi volio/voljela ".$usluga." dana ".$dana." u ".$vrijeme." sati.<br><br><br>".$opis."<br><br><br>"."Moj broj telefona je ".$brojtel ." mozete me kontaktirati u koliko dodje do promjene.";
				}

				$email->setFrom('imtecbuddy@gmail.com', 'Rezervacija Za Salon Anel');
				$email->setTo($maminmail);
				$email->setSubject($usluga);
				$email->setMessage($opis);
		    	$email->send();
			
					$model->save($novadata);
					$this->session->setFlashdata('msg', 'Vidimo se u salonu :D');
					return redirect()->to('booking');
				

					#$sending = http_post("your_domain", 80, "/sendsms", array("Username" => $uname, "PIN" => $password, "SendTo" => $Phone, "Message" => $usermessage));


				}
				}else{
					$this->session->setFlashdata('msg', 'Prekoracili ste limit rezervacija!');
					return redirect()->to('booking');
				}
		
			}

		echo view('template/headeruser');
        echo view('booking');
        echo view('template/footerstart');
		}
	}


	public function contact() {
		if(!$this->session->has('fname')){
			echo view('template/headerstart');
        	echo view('contact');
       		echo view('template/footerstart');
			}else{
				echo view('template/headeruser');
				echo view('contact');
				echo view('template/footerstart');
			}
		

	}

	function logout(){
		if(!$this->session->has('fname')){
		$session = session();
		$session->setFlashdata('err', 'Niste ovlasteni za ovu funkciju!!!');
		return redirect()->to('login');
			}else{
		$this->session->destroy();
		return redirect()->to('login');
	    }
	}


	function tbl(){
		if($this->session->get('user_type')!='admin'){
		$session = session();
		$session->setFlashdata('err', 'Niste ovlasteni za ovu funkciju!!!');
		return redirect()->to('login');
		}else{
		echo view('template/headeradmin');
        echo view('tbl');
		echo view('template/footeradmin');
		}
	}

	// public function delete(){
    //     if($this->input->get()){
	// 		$id=$this->input->get();
	// 		$dltModel = new BookingModel();
	// 		$dltModel->where('id', $id)->delete($id);
	// 		return $this->response->redirect(current_url());
	// 	}else{
	// 		echo "<script>alert('Nece da moze!')</script>";
	// 	}
    // }

 // delete user
 public function delete($id){

	if($this->session->get('user_type')!='admin'){
		$session = session();
		$session->setFlashdata('err', 'Niste ovlasteni za ovu funkciju!!!');
		return redirect('login');
	}else{
	//print_r($id);
	$dltModel = new BookingModel();
	$dltModel->init_delete($id);
	return $this->response->redirect(site_url('tbl'));
		}
	}	
}


//}

