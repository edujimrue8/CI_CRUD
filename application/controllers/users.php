<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
	private $salt = 'r4nd0m';

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index($start=0)
	{
		$data['users'] = $this->Users_model->get_all('id_user', 'DESC', '2', $start);//cambiar el numero de posts en 10

		$config['total_rows'] = $this->Users_model->get_count();
		$config['base_url'] = base_url().'admin/users/index/';
		$config['per_page'] = 2;//aqui tambien cambiar el numero de posts en 10
		$config['uri_segment'] = 4;
		$config['num_links'] = 2;
		$this->pagination->initialize($config);
		$data['pages']=$this->pagination->create_links();

		$data['main_content'] = 'admin/users/index';
		$this->load->view('admin/layouts/main', $data);
	}

	public function post() 
	{
		if ($this->form_validation->run('users') == FALSE) 
		{
			$data['main_content'] = 'admin/users/add';
			$this->load->view('admin/layouts/main', $data);
		} 
		else 
		{
			$pass = $this->input->post('password');
			$password = sha1($pass.$this->salt);

			$data = array(
				'username' => $this->input->post('username'),
				'password' => $password,
				'group' => $this->input->post('group'),
				'email' => $this->input->post('email'),
				'created' => NULL
				);
			$this->Users_model->insert($data);
			$this->session->set_flashdata('user_saved', 'El ususario ha sido creado correctamente!!');
			redirect('admin/users');
		}
	}

	public function put($id) 
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|edit_unique[users.username.'.$id.']|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|edit_unique[users.email.'.$id.']|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_dash|min_length[8]|max_length[40]|matches[confirm_password]|xss_clean');
		$this->form_validation->set_rules('group', 'Grupo', 'trim|required|min_length[5]|max_length[8]|xss_clean');
		
		$data['user'] = $this->Users_model->get($id);
		
		if ($this->form_validation->run() == FALSE) 
		{
			$data['main_content'] = 'admin/users/edit';
			$this->load->view('admin/layouts/main', $data);
		} 
		else 
		{
			$pass = $this->input->post('password');
			$password = sha1($pass.$this->salt);

			$data = array(
				'username' => $this->input->post('username'),
				'password' => $password,
				'group' => $this->input->post('group'),
				'email' => $this->input->post('email')
				);
			$this->Users_model->update($id, $data);
			$this->session->set_flashdata('user_saved', 'El usuario ha sido actualizado!!');
			redirect('admin/users');
		}
	}

	public function delete($id)
	{
		$this->Users_model->delete($id);
		$this->session->set_flashdata('user_deleted', 'El usuario ha sido eliminado:(');
		redirect('admin/users');
	}

	public function enable($id)
	{
		$this->Users_model->enable($id);
		$this->session->set_flashdata('user_enabled', 'El Usuario está activado.');
		redirect('admin/users');
	}

	public function disable($id)
	{
		$this->Users_model->disable($id);
		$this->session->set_flashdata('user_disabled', 'El Usuario está deshabilitado.');
		redirect('admin/users');
	}
}