<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller
{

    public function index() {

        $this->load->library('pagination');
        $config['per_page'] = 10;

        $page = $this->input->get('page', true);
        $search_data = $this->input->get('search_data', true);

        if ($search_data != '') {

            $this->db->like('student_name', $search_data);
            $this->db->or_like('email_address', $search_data);
            $this->db->or_like('contact', $search_data);
            $this->db->or_like('gender', $search_data);
            $this->db->or_like('country', $search_data);
        }
        $tempdb = clone $this->db;
        $total_row = $tempdb->from('students')->count_all_results();
        $this->db->limit($config['per_page'], $page);
        $this->db->order_by("student_id", "desc");
        $result['student_list'] = $this->db->get('students')->result_array();

        $config['base_url'] = "http://localhost/student?search_data=$search_data";
        $config['total_rows'] = $total_row;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';


        //Optional (Pagination Design)
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next &gt;</i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';


        $this->pagination->initialize($config);
        $result['pagination'] = $this->pagination->create_links();


        $data['content'] = $this->load->view('student_list', $result, true);
        $this->load->view('master', $data);
    }

	public function perosona_add()
	{
		$data = array(
			'student_name' => $this->input->post('student_name'),
			'email_address' => $this->input->post('email_address'),
			'contact' => $this->input->post('contact'),
            'gender' => $this->input->post('gender'),
            'country' => $this->input->post('country'),
		);
		$insert = $this->persona_model->pers_add($data);
		echo json_encode(array("status" => TRUE));
	}
	public function person_delete($id)
	{
		$this->persona_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
    public function view_student_info($student_id) {
        if ($student_id != '') {
            $this->db->where('student_id', $student_id);
            $row['student_info'] = $this->db->get('students')->row_array();
        }
        $data['content'] = $this->load->view('view_student_info', $row, true);
        $this->load->view('master', $data);
    }


}
