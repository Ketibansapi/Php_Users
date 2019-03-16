<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
       $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
       $this->form_validation->set_rules('password', 'Password', 'trim|required');
       if ($this->form_validation->run() == false) {
         $data['title'] = 'Login Page';
         $this->load->view('templates/auth_header', $data);
         $this->load->view('auth/login');
         $this->load->view('templates/auth_footer');
       } else {
          //validation success
          $this->_login();
       }
    }

    private function _login()
    {
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $user = $this->db->get_where('user', ['email' => $email])->row_array();

      //if user available
      if($user) {
          // if user active
          if($user ['is_active'] == 1) {
            // check password
            if(password_verify($password, $user['password'])) {
              $data = [
                'email' => $user ['email'],
                'role_id' => $user ['role_id']
              ];
              $this->session->set_userdata($data);
              if ($user['role_id'] == 1) {
                  redirect('admin');
              } else {
                  redirect('user');
              }

            } else {
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password! Please try again. </div>');
              redirect('auth');

            }

          } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Your identity has not been activated. </div>');
            redirect('auth');

          }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Your identity not registered. Sorry, please create one. </div>');
        redirect('auth');
      }
    }

    public function registration()
    {

      $this->form_validation->set_rules('name', 'Name', 'required|trim');
      $this->form_validation->set_rules('nric', 'Nric', 'required|trim');
      $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
      $this->form_validation->set_rules('city', 'City', 'required|trim');
      $this->form_validation->set_rules('state', 'State', 'required|trim');
      $this->form_validation->set_rules('country', 'Country', 'required|trim');
      $this->form_validation->set_rules('zip', 'Zip', 'required|trim');
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
          'is_unique' => 'This Email has already registered!'
        ]);
      $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
          'matches' => 'password do not match!',
          'min_length' => 'Password too short!'
        ]);

      $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

      if( $this->form_validation->run() == false) {

        $data['title'] = 'User Form - Registration';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/registration');
        $this->load->view('templates/auth_footer');
      } else {
          $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'nric' => $this->input->post('nric'),
            'mobile' => $this->input->post('mobile'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
            'zip' => $this->input->post('zip'),
            'image' => 'default.jpg',
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
          ];

          $this->db->insert('user', $data);
          $this->session->set_flashdata('message', '<i class="fas fa-check-circle fa-fw fa-pull-left fa-3x"></i> <p> Thank you for your submission  <br>We will process your application shortly. </br> </p> ');
          redirect('auth');
      }
   }

   public function logout()
   {
     $this->session->unset_userdata('email');
     $this->session->unset_userdata('role_id');

     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You have been logged out! </div>');
     redirect('auth');
   }

}
