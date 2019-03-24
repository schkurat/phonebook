<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {     
      parent::__construct();
      $this->load->model('user');
    }
    
    public function index() { 
        redirect('auth/logout'); 
    }


    public function login() {
		
        delete_cookie('auth');
        delete_cookie('uname');
        delete_cookie('email');

	$data['message'] = '';
		
	if ( $this->input->post("user_email") ) {
            
            $check_user = $this->user->check_user_email( $this->input->post("user_email",TRUE) );
            if ( $check_user ) {
		$pwd = $this->input->post("user_pasw");
		if ( $pwd === $check_user->pasword ) {	
                    $this->input->set_cookie('auth', md5(date('Y-m-d H:i:s').'-book'), 26000000);
                    $this->input->set_cookie('uname', $check_user->first_name.' '.$check_user->last_name, 26000000);
                    $this->input->set_cookie('email', $check_user->email, 26000000);
		
                    redirect(base_url());
			
		  } else $data['message'] = '<h4 class="card-title text-danger">Пароль указан неверно!</h4>';
            } else $data['message'] = '<h4 class="card-title text-danger">Указанный email незарегистрированный!</h4>';
	}

	$this->load->view('login', $data);
    }

    public function register() {
        $data['message'] = '';
        if ( $this->input->post("Email") ) {
            $email = $this->input->post("Email",TRUE);
            $check_user = $this->user->check_user_email($email);
            if ( !$check_user ) {
                $pass = $this->input->post("Password",TRUE);
                $confirm_pass = $this->input->post("ConfirmPassword",TRUE);
                if($pass === $confirm_pass){
                    $this->user->add_user($email, $pass);
                    $this->email->from('4949515@ukr.net', 'Phonebook admin');
                    $this->email->to($email); 
                    $this->email->subject('Регистрация в телефонном справочнике');
                    $this->email->message('Здравствуйте, Вы зарегистрировались в телефонном справочнике http://alen.pp.ua! '
                        . 'Ваш логин: '.$email.' Ваш пароль: '.$pass);	
                    $this->email->send();
                    $data['message'] = $email;
                    $this->load->view('created_user', $data);
                }
            }
        }

        $this->load->view('register');
    }

    public function logout() {

        delete_cookie('auth');
        delete_cookie('uname');
        delete_cookie('email');

        redirect(base_url());
    }

}
