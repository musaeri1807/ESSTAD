 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Organization extends CI_Controller
    {


        function __construct()
        {
            parent::__construct();
            $this->load->database();
            // $this->load->model('M_mysqldata');
            // $this->load->model('dashboard_model');
            // $this->load->model('employee_model');
            // $this->load->model('organization_model');
            // $this->load->model('settings_model');
            // $this->load->model('leave_model');
            // $this->load->library('form_validation');
            // $this->load->library('session');
            // $this->load->helper('url');
        }

        public function index()
        {
            #Redirect to Admin dashboard after authentication
            #if ($this->session->userdata('user_login_access') == 1)
            #redirect('dashboard/Dashboard');
            #$data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
            #$this->load->view('login');
            // var_dump($this->session->userdata('email')==TRUE);
            // die();

            if ($this->session->userdata('login_state') == TRUE) {
                redirect('Organization/Department');
            } else {
                redirect(base_url('Authorization'), 'refresh');
            }
        }
        public function Department()
        {
            if ($this->session->userdata('login_state') == TRUE) {
                $uri = array(
                    'header1' => $this->uri->segment('1'),
                    'header2' => $this->uri->segment('2')
                );
                // $dat['users'] = $this->M_mysqldata->userLogin($this->session->userdata('id_users'));
                // $data = array_merge($uri, $dat);
                $data['department'] = $this->organization_model->depselect();
                $this->template->views('backend/department', $data);
                // var_dump($this->session->userdata('login_state'));
            } else {
                redirect(base_url('Authorization'), 'refresh');
            }
        }
        public function Save_dep()
        {
            // if ($this->session->userdata('user_login_access') != False) {
            //     $dep = $this->input->post('department');
            //     $this->load->library('form_validation');
            //     $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //     $this->form_validation->set_rules('department', 'department', 'trim|required|xss_clean');

            //     if ($this->form_validation->run() == FALSE) {
            //         echo validation_errors();
            //     } else {
            //         $data = array();
            //         $data = array('dep_name' => $dep);
            //         $success = $this->organization_model->Add_Department($data);
            //         $this->session->set_flashdata('feedback', 'Successfully Added');
            //         echo "Successfully Added";
            //     }
            // } else {
            //     redirect(base_url(), 'refresh');
            // }


            $dep = $this->input->post('department', true);
            $data = array('dep_name' => $dep);
            $this->organization_model->Add_Department($data);
            redirect(base_url(), 'refresh');
        }
        public function Delete_dep($dep_id)
        {
            // if ($this->session->userdata('user_login_access') != False) {
            $this->organization_model->department_delete($dep_id);
            $this->session->set_flashdata('delsuccess', 'Successfully Deleted');
            redirect('organization/Department');
            // } else {
            //     redirect(base_url(), 'refresh');
            // }
        }
        // public function Dep_edit($dep)
        // {
        //     if ($this->session->userdata('user_login_access') != False) {
        //         $data['department'] = $this->organization_model->depselect();
        //         $data['editdepartment'] = $this->organization_model->department_edit($dep);
        //         $this->load->view('backend/department', $data);
        //     } else {
        //         redirect(base_url(), 'refresh');
        //     }
        // }
        // public function Update_dep()
        // {
        //     if ($this->session->userdata('user_login_access') != False) {
        //         $id = $this->input->post('id');
        //         $department = $this->input->post('department');
        //         $data =  array('dep_name' => $department);
        //         $this->organization_model->Update_Department($id, $data);
        //         #$this->session->set_flashdata('feedback','Updated Successfully');
        //         echo "Successfully Added";
        //     } else {
        //         redirect(base_url(), 'refresh');
        //     }
        // }
        // public function Designation()
        // {
        //     if ($this->session->userdata('user_login_access') != False) {
        //         $data['designation'] = $this->organization_model->desselect();
        //         $this->load->view('backend/designation', $data);
        //     } else {
        //         redirect(base_url(), 'refresh');
        //     }
        // }
        // public function Save_des()
        // {
        //     if ($this->session->userdata('user_login_access') != False) {
        //         $des = $this->input->post('designation');
        //         $this->load->library('form_validation');
        //         $this->form_validation->set_error_delimiters();
        //         $this->form_validation->set_rules('designation', 'designation', 'trim|required|xss_clean');

        //         if ($this->form_validation->run() == FALSE) {
        //             echo validation_errors();
        //         } else {
        //             $data = array();
        //             $data = array('des_name' => $des);
        //             $success = $this->organization_model->Add_Designation($data);
        //             echo "Successfully Added";
        //         }
        //     } else {
        //         redirect(base_url(), 'refresh');
        //     }
        // }
        // public function des_delete($des_id)
        // {
        //     if ($this->session->userdata('user_login_access') != False) {
        //         $this->organization_model->designation_delete($des_id);
        //         $this->session->set_flashdata('delsuccess', 'Successfully Deleted');
        //         redirect('organization/Designation');
        //     } else {
        //         redirect(base_url(), 'refresh');
        //     }
        // }
        // public function Edit_des($des)
        // {
        //     if ($this->session->userdata('user_login_access') != False) {
        //         $data['designation'] = $this->organization_model->desselect();
        //         $data['editdesignation'] = $this->organization_model->designation_edit($des);
        //         $this->load->view('backend/designation', $data);
        //     } else {
        //         redirect(base_url(), 'refresh');
        //     }
        // }
        // public function Update_des()
        // {
        //     if ($this->session->userdata('user_login_access') != False) {
        //         $id = $this->input->post('id');
        //         $designation = $this->input->post('designation');
        //         $data =  array('des_name' => $designation);
        //         $this->organization_model->Update_Designation($id, $data);
        //         echo "Successfully Updated";
        //     } else {
        //         redirect(base_url(), 'refresh');
        //     }
        // }
    }
