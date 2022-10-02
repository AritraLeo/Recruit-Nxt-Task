<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->library('upload');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function logout(){
		session_destroy();
		redirect('/');
	}

	// States
	public function states()
	{
		$this->load->view('states');
	}

	// City
	public function cities()
	{
		$this->load->view('cities');
	}

	public function login()
	{
		$result = array();
		$email = trim($_POST['email']);
		// $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$password = md5($_POST['password']);
		// Should have used bycrypt but for that I had to import the library and all so went with md5
		// $result = $this->Home_model->login($email);
		$result = $this->db->where('email', $email)->where('password', $password)->get('master_users')->row_array();
		$verifyingPassword = $result['password'];

		// if (password_verify($verifyingPassword, $password)) {
		// 	$PassResult = true;
		// } else {
		// 	$PassResult = false;
		// }

		// && $PassResult
		if ($result) {
			// $_SESSION['email'] = $result['email'];
			// $_SESSION['name'] = $result['name'];
			// $_SESSION['loggedIn'] = true;
			// $_SESSION['type'] = $result['type'];
			$data_login = array('email' => $result['email'],
			'name' => $result['name'],
			'loggedIn' => true,
			'type' => $result['type']
		);
		$this->session->set_userdata($data_login);
			redirect('/');
			// $this->load->view('home', $result);
			// $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Logged In Successfully.</div>');
			// redirect(base_url('profile'));
		} else {
			$_SESSION['loggedIn'] = false;
			// $this->load->view('home');
			redirect('/');
			$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid Credentials.</div>');
			// redirect(base_url('login'));
		}
		// $this->load->view('home');
	}

	public function editState($id){
		$data = array();
		$updateState = array();

		$data = $this->db->where('id', $id)->get('states')->row_array();
		$StateEdit = array(
			'StateEditId' => $data['id'],
			'StateName' => $data['name'],
			'image' => $data['image'],
			'StateEdit' => true,
		);
		$this->session->set_userdata($StateEdit);
		redirect('/states');
		
	}

	public function editStateAction(){
		// if (isset($_POST['editState'])) {
			// $updateState = array(
			// 	'name' => $_POST['State'],
			// 	'image' => $_POST['StateImgUrl'],
			// );
			$updateState['name'] = $_POST['State'];
			$updateState['image'] = $_POST['StateImgUrl'];
			$this->db->where('id', $_SESSION['StateEditId'])->update('states', $updateState);
			$StateEdit = array(
				'StateName' => $updateState['name'],
				'image' => $updateState['StateImgUrl'],
			);
			$this->session->set_userdata($StateEdit);
			redirect('/states');
		// }
	}

	public function deleteState($id){
		$this->db->where('id', $id)->delete('states');
		redirect('/states');
	}

	public function removeEdit(){
		$_SESSION['StateEdit'] = false;
		redirect('/states');
	}

	public function addState(){
		$addState = array(
			'name' => $_POST['State'],
			'image' => $_POST['StateImgUrl'],
			'country_id' => '101',
		);
		$this->db->insert('states', $addState);
		redirect('/states');
	}
}
