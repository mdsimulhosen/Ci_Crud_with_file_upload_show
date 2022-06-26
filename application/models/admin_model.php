<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function admin_register()
    {
        $data = array();
        $data['email'] = $this->input->post('email');
        $pass = $this->input->post('password');
        $data['password'] = md5($pass);
        $data['admin_name'] = $this->input->post('admin_name');
        $data['admin_image'] = $this->input->post('profile_image');


        // fileu upload 
        $sdata = array();
        $error = '';
        $config['upload_path'] = 'admin-images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1000';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);

        if (($this->upload->do_upload('profile_image'))) {
            $sdata = $this->upload->data();
            $data['admin_image'] = $config['upload_path'] . $sdata['file_name'];
        } else {
            $error = $this->upload->display_errors();
        }


        $result = $this->db->insert('tbl_admin', $data);
        return true;
    }

    public function admin_info()
    {
        $this->db->SELECT('*');
        $this->db->FROM('tbl_admin');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


    public function admin_model_info($email, $pass)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $result_query = $this->db->get();
        $result = $result_query->row();
        return $result;
    }
    public function save_student()
    {
        $data  = array();
        $data['student_name'] = $this->input->post('student_name');
        $data['student_phone'] = $this->input->post('student_phone');
        $data['student_roll'] = $this->input->post('student_roll');
        $this->db->insert('tbl_student', $data);
    }
    public function save_student_info()
    {
        $this->db->SELECT('*');
        $this->db->FROM('tbl_student');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function student_info($id)
    {
        $this->db->SELECT('*');
        $this->db->FROM('tbl_student');
        $this->db->WHERE('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function update_student()
    {
        $data = array();
        $this->db->SELECT('*');
        $this->db->FROM('tbl_student');
        $id = $this->input->post('id');
        $data['student_name'] = $this->input->post('student_name');
        $data['student_phone'] = $this->input->post('student_phone');
        $data['student_roll'] = $this->input->post('student_roll');
        $this->db->WHERE('id', $id);
        $this->db->update('tbl_student', $data);
    }

    public function delete_info($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_student');
    }
}
