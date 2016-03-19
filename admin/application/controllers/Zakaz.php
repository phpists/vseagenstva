<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zakaz extends CI_Controller {

	public function new_zakaz() {
		$emails = array();
		foreach ($this->input->post('checked') as $value) {
			// echo $value."<br>";
			$email = $this->db->get_where('tenders', array('id' => $value))->row('email');
			$emails[] = $email;
		}
		$form = json_decode($this->input->post('form'));
		$txt = "
		География - ".$form->geography_chapter."<br>
		URL - ".$form->url."<br>
		Бюджет - ".$form->butjet."<br>
		Срок - ".$form->srok."<br>
		<strong>Задачи:</strong><br>";
		if($form->services == "strategy") {
			$txt.="Комплексная стратегия (на усмотрение подрядчика)<br>";
		} else {	
		// individual
			if(@$form->seo) $txt.="SEO<br>";
			if(@$form->contact_marketing) $txt.="Контент-маркетинг<br>";
			if(@$form->sites) $txt.="Создание сайтов<br>";
			if(@$form->context) $txt.="Контекст <br>";
			if(@$form->price_place) $txt.="Прайс-площадки<br>";
			if(@$form->landing) $txt.="Лендинги<br>";
			if(@$form->media) $txt.="Медийка<br>";
			if(@$form->conversion) $txt.="Конверсия<br>";
			if(@$form->offlain_rekl) $txt.="Оффлайн-реклама<br>";
			if(@$form->smm) $txt.="SMM<br>";
			if(@$form->through_analytics) $txt.="Сквозная аналитика<br>";
			if(@$form->specproekty) $txt.="Спецпроекты<br>";
			if(@$form->serm) $txt.="SERM<br>";
			if(@$form->biznes_analitika) $txt.="Бизнес-аналитка<br>";
			if(@$form->pr) $txt.="PR, брендинг<br>";
		}
		$txt.="<strong>Опишите Ваши цели и задачи:</strong><br>"
		.$form->celi_i_zad."<br>
		<strong>Имя:</strong> ".$form->name."<br>
		<strong>Телефон:</strong> ".$form->phone."<br>
		<strong>email:</strong> ".$form->email;		
		//$this->send_email($emails, "Заявка з сайта всеагенства.рф", $txt);

		$data = array(
			'date_create' => date("Y-m-d H:i:s"),
			'emails' => implode(",", $emails),
			'text_zayavki' => $txt,
			'status' => 1,
		);
		$this->db->insert('zayavki', $data);
		// відсилаєм на модерацію адміну
		$return_id = $this->db->insert_id();
		$admin_email = $this->db->get_where('users', array('id' => 1))->row("email");
		$this->send_email($admin_email, "Заявка з сайта всеагенства.рф", "Поступила новая заявка, ссылка http://www.всеагентства.рф/admin/main/agency_edit/".$return_id);
		echo "ok";
	}

	public function ajax_send_from_admin() {
		$email = $this->db->get_where('zayavki', array('id' => $this->input->post('id_zap')))->row();
		$pieces = explode(",", $email->emails);
		$this->send_email($pieces, "Заявка з сайта всеагенства.рф", $email->text_zayavki);
		$this->db->where('id', $this->input->post('id_zap'));
		$this->db->update('zayavki', array("status"=>2));		
	}

// універсальна ф-ція відправки листа
	public function send_email($email, $subject, $message) {
		$this->load->library('email');
		$config['mailtype'] = 'html';	// відправка в html
		$this->email->initialize($config);
		$this->email->to($email); 
		$this->email->from('admin@vseagenstva.rf');
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	}



	
}
