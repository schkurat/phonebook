<?php
class Phonebook_model extends CI_Model {

    public function get_phonebook_users($id, $search, $type_search, $num, $offset) {

        $this->db->where('user_id', $id);
        if($search > '') $this->db->like($type_search, $search);
        $this->db->order_by('phonebook.name', 'ASC');
        $request = $this->db->get('phonebook',$num, $offset);

        return $request->result();
    }
    
    public function get_phone_rows_user($id, $search, $type_search) {

        $this->db->from('phonebook');
        $this->db->where('user_id', $id);
        if($search > '') $this->db->like($type_search, $search); 
        $request = $this->db->get();
        $rows = $request->num_rows();
        return $rows;
    }
    
    public function insert_phone($id_user) {

        $data = array( 
            'user_id' => $id_user, 
            'phone_number' => $this->input->post('PhoneNumber', TRUE), 
            'name' => $this->input->post('AbonentName', TRUE), 
            'other_information' => $this->input->post('OtherInformation', TRUE), 
            'date_create' => date('Y-m-d H:i:s')
        );
        $this->db->insert('phonebook', $data);
        $id_prod = $this->db->insert_id();
        return $id_prod;
    }
    
    public function search_phone($id, $phone) {

        $this->db->where('user_id', $id);
        $this->db->where('phone_number', $phone);
        $request = $this->db->get('phonebook');
        return $request->result();
    }
    
    public function search_person($id, $person) {

        $this->db->where('user_id', $id);
        $this->db->where('name', $person);
        $request = $this->db->get('phonebook');
        return $request->result();
    }
    
    public function delete_record($id) {

        $this->db->where('id', $id);
        $this->db->delete('phonebook');
    }
    
    public function clear_user_book($id) {

        $this->db->where('user_id', $id);
        $this->db->delete('phonebook');
    }
}