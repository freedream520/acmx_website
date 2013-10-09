<?php

class Pages extends CI_Controller {
	public function view($page = 'home')
	{
		if(!file_exists('application/views/pages/'.$page.'.php'))
		{
			$this->load->database('acmx');
			$query = $this->db->get('projects');
			if($row = $query->result_array()){
				$names = [];
				foreach($row['name'] as $key->$name){
					$names[$key] = preg_replace('/[^a-z]/', '', strtolower($name));
				}
				if(in_array($page, $names){
					$data['project'] = $page;
					$this->load->view('templates/header',$data);
					$this->load->view('pages/project',$data);
					$this->load->view('templates/footer',$data);
				}else{
					show_404();
				}
			}
		}

		$data['title'] = ucfirst($page);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
}

?>