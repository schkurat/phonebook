<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebook extends CI_Controller {

    public function __construct() {     
      parent::__construct();
      $this->load->model('Phonebook_model');
      $this->load->model('user');
    }

    public function index(){
        if ( $this->input->cookie('auth', TRUE) ) {
            $user_id = $this->get_user_id();
            if($this->input->get('search')){
                $search = $this->input->get('search', TRUE);
                $type_search = $this->input->get('sRadios', TRUE);
            }
            else {
                $search = ''; $type_search = '';
            }
            $config['base_url'] = base_url().'phonebook/index/';
            $config['total_rows'] = $this->Phonebook_model->get_phone_rows_user($user_id, $search, $type_search);
            $config['per_page'] = 4;
            $config['num_tag_open'] = '<button type="button" class="btn btn-pag btn-outline-secondary" style="padding: 0;">';
            $config['num_tag_close'] = '</button>';
            $config['cur_tag_open'] = '<button type="button" class="btn btn-pag btn-outline-primary" style="padding: 0;">';
            $config['cur_tag_close'] = '</button>';
            $config['prev_tag_open'] = '<button type="button" class="btn btn-pag btn-outline-secondary" style="padding: 0;">';
            $config['prev_tag_close'] = '</button>';
            $config['next_tag_open'] = '<button type="button" class="btn btn-pag btn-outline-secondary" style="padding: 0;">';
            $config['next_tag_close'] = '</button>';
            $config['reuse_query_string'] = TRUE;
            $this->pagination->initialize($config);

            $data['book_list'] = $this->Phonebook_model->get_phonebook_users($user_id, $search, $type_search, $config['per_page'], $this->uri->segment(3));
            $data['book_menu'] = $this->pagination->create_links();
            $data['content'] = 'phones';
            $this->load->view('phonebook_template',$data);
        } else redirect(base_url('auth/login'));
    }
    
    public function add_new_phone(){
        if ( $this->input->cookie('auth', TRUE) ) {
            if($this->input->post('PhoneNumber')){
                $user_id = $this->get_user_id();
                $id_record = $this->Phonebook_model->insert_phone($user_id);
		redirect(base_url('phonebook'));
            }
            $data['content'] = 'one_phone_record';
            $this->load->view('phonebook_template',$data);
        }else redirect(base_url('auth/login'));
    }
        
    public function get_user_id(){
        if ( $this->input->cookie('auth', TRUE) ) {
            $user_email = $this->input->cookie('email', TRUE);
            $user_info = $this->user->check_user_email($user_email);
            $user_id = (int)$user_info->id;
            return $user_id;
        }else redirect(base_url('auth/login'));
    }
        
    public function delete() {
        if ( $this->input->cookie('auth', TRUE) ) {
            if ( $this->input->get('id') ) $this->Phonebook_model->delete_record($this->input->get('id', TRUE));

            redirect(base_url('phonebook'));
        } else redirect(base_url('auth/login'));  
    }
        
    public function clear_book() {
        if ( $this->input->cookie('auth', TRUE) ) {
            $user_id = $this->get_user_id();
            $this->Phonebook_model->clear_user_book($user_id);

            redirect(base_url('phonebook'));
        } else redirect(base_url('auth/login'));  
    }
        
    public function ajax_search_number_phone() {

        if ( $this->input->post('phone') ) {
            $phone = $this->input->post('phone', TRUE);
            $user_id = $this->get_user_id();
            $res_s = $this->Phonebook_model->search_phone($user_id, $phone);
            if($res_s) echo 'Yes';
            else echo 'No';
        }
    }
        
    public function ajax_search_person() {

        if ( $this->input->post('person') ) {
            $person = $this->input->post('person', TRUE);
            $user_id = $this->get_user_id();
            $res_s = $this->Phonebook_model->search_person($user_id, $person);
            if($res_s) echo 'Yes';
            else echo 'No';
        }
    }
        
    public function ajax_search_email() {

        if ( $this->input->post('email') ) {
            $email = $this->input->post('email', TRUE);
            $res_s = $this->user->check_user_email($email);
            if($res_s) echo 'Yes';
            else echo 'No';
        }
    }
}
