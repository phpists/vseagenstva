<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function _remap($method, $params = array()) {
		if($this->session->userdata('user_id'))  {
			if (method_exists($this, $method)) {
				return call_user_func_array(array($this, $method), $params);
			}
			show_404();
		} else {
			redirect('login');
		}
	}	

	public function index() {
		$data['main'] = $this->db->order_by('id', 'DESC')->get('zayavki');
		$this->load->view('index', $data);
	}

	public function agency() {
		$data['main'] = $this->db->get('tenders');
		$this->load->view('agency', $data);
	}

	public function agency_edit($id) {
		$data['main'] = $this->db->get_where('tenders', array('id' => $id))->row();
		$data['city'] = $this->db->get_where('city');
		$this->load->view('edit', $data);
	}

	public function update_agency() {
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'url' => $this->input->post('url'),
			//'favicon' => $this->upload_image(),
			'description' => $this->input->post('description'),
			'year' => $this->input->post('year'),
			'month' => $this->input->post('month'),
			'date_created' => date("Y-m-d"),
			'min_cost' => $this->input->post('min_cost'),
			'seo' => $this->input->post('seo'),
			'context' => $this->input->post('context'),
			'media' => $this->input->post('media'),
			'smm' => $this->input->post('smm'),
			'serm' => $this->input->post('serm'),
			'sites' => $this->input->post('sites'),
			'price_place' => $this->input->post('price_place'),
			'through_analytics' => $this->input->post('through_analytics'),
			'conversion' => $this->input->post('conversion'),
			'contact_marketing' => $this->input->post('contact_marketing'),
			'landing' => $this->input->post('landing'),
			//'btl' => $this->input->post('btl'),
			'pr' => $this->input->post('pr'),
			'strategy' => $this->input->post('strategy'),
			'offlain_rekl' => $this->input->post('offlain_rekl'),
			'specproekty' => $this->input->post('specproekty'),
			'biznes_analitika' => $this->input->post('biznes_analitika'),			
			'geography_chapter' => $this->input->post('geography_chapter'),
			'office1' => $this->input->post('office1'),
			'office2' => $this->input->post('office2'),
			'office3' => $this->input->post('office3'),
			'map1' => $this->input->post('map1'),
			'adress' => $this->input->post('adress'),
			'tel' => $this->input->post('tel'),
		);
		if (!empty($_FILES['file']['name'])) { 
			$data['favicon'] = $this->upload_image();
		}
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tenders', $data);
		redirect(site_url("main/agency"));
	}

	public function add() {
		$data['city'] = $this->db->get_where('city');
		$this->load->view('add', $data);
	}

	public function add_agency() {
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'url' => $this->input->post('url'),
			'favicon' => $this->upload_image(),
			'description' => $this->input->post('description'),
			'year' => $this->input->post('year'),
			'month' => $this->input->post('month'),
			//'date_created' => $this->input->post('date_created'),
			'min_cost' => $this->input->post('min_cost'),
			'seo' => $this->input->post('seo'),
			'context' => $this->input->post('context'),
			'media' => $this->input->post('media'),
			'smm' => $this->input->post('smm'),
			'serm' => $this->input->post('serm'),
			'sites' => $this->input->post('sites'),
			'price_place' => $this->input->post('price_place'),
			'through_analytics' => $this->input->post('through_analytics'),
			'conversion' => $this->input->post('conversion'),
			'contact_marketing' => $this->input->post('contact_marketing'),
			'landing' => $this->input->post('landing'),
			//'btl' => $this->input->post('btl'),
			'pr' => $this->input->post('pr'),
			'strategy' => $this->input->post('strategy'),
			'offlain_rekl' => $this->input->post('offlain_rekl'),
			'specproekty' => $this->input->post('specproekty'),
			'biznes_analitika' => $this->input->post('biznes_analitika'),
			'geography_chapter' => $this->input->post('geography_chapter'),
			'office1' => $this->input->post('office1'),
			'office2' => $this->input->post('office2'),
			'office3' => $this->input->post('office3'),
			'map1' => $this->input->post('map1'),
			'adress' => $this->input->post('adress'),
			'tel' => $this->input->post('tel'),
		);
		$this->db->insert('tenders', $data);
		redirect(site_url("main/agency"));
	}

	public function del_agency($id) {
		$this->db->delete('tenders', array('id' => $id));
		redirect(site_url("main/agency"));
	}

	public function del_img($id) {
		$image = $this->db->get_where('tenders', array('id' => $id))->row("favicon");
		$this->del_image($image);
		$this->db->where('id', $id);
		$this->db->update('tenders', array('favicon' => ''));
		redirect(site_url("main/agency_edit/".$id));
	}

	public function edit_zayavka($id) {
		$data['main'] = $this->db->get_where('zayavki', array('id' => $id))->row();
		$this->load->view('edit_zayavka', $data);
	}

	public function update_zayavka() {
		$data = array(
			'emails' => $this->input->post('emails'),
			'text_zayavki' => $this->input->post('text_zayavki'),
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('zayavki', $data);
		redirect(site_url("main/index"));
	}

	public function del_zayavka($id) {
		$this->db->delete('zayavki', array('id' => $id));
		redirect(site_url("main/index"));
	}

	public function profile() {
		$data['main'] = $this->db->get_where('users', array('id' => 1))->row();
		$data['message'] = '';
		$this->load->view('profile', $data);
	}

	public function update_profile() {
		$data_a = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'pass' => $this->input->post('pass'),
		);
		$this->db->where('id', 1);
		$this->db->update('users', $data_a);
		$this->session->set_userdata('user_name', $this->input->post('name'));
		$data['main'] = $this->db->get_where('users', array('id' => 1))->row();
		$data['message'] = 'saved';
		$this->load->view('profile', $data);
	}


// загрузка логотипа компанії
 	protected function upload_image() {
		$config['upload_path'] = './icons/';
		$config['allowed_types'] = "gif|jpg|png|JPG|jpeg|JPEG";
		$config['max_size']	= '180000'; //'100';
		$config['encrypt_name']  = true;		
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			//print_r($error);	// для ajax
			return '';
		} else {
			$upload_data = $this->upload->data();
			$name_img = $upload_data['file_name'];			
			// ресайз
			//$this->load->library('image_lib', array('image_library'=>'gd2', 'source_image'=>'./images/logo/'.$name_img, 'create_thumb'=> TRUE, 'maintain_ratio'=> TRUE, 'width'=> 161, 'height'=> 161));
			//$this->image_lib->resize();			
			//$name_img = str_replace(".", "_thumb.", $name_img);
			//echo $name_img;	// для ajax
			return $name_img;
		}
	}

// видалення фото з сервера
	protected function del_image($img) {
		if($img) {
			unlink('./icons/'.$img);
			//$thumb_img = str_replace("_thumb.", ".", $img);
			//unlink('./images/'.$thumb_img);
		}
	}

	
}
