<?php
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{
        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            // $this->load->view('templates/header');
            // $this->load->view('templates/user/navbar');
            // $this->load->view('templates/user/sidebar');
            $this->load->view('pages/'.$page);  
            // $this->load->view('templates/user/modal');          
            // $this->load->view('templates/user/footer');
        }
                
        //======================Admin Module==========================
        public function admin(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }                        
            if($this->session->admin_login){
                redirect(base_url()."admin_main");
            }
            $this->load->view('pages/admin/'.$page);
        }
        public function admin_authentication(){
            $data=$this->Job_model->admin_authentication();
            if($data){
                $user_data=array(
                    'username' => $data['username'],
                    'fullname' => $data['fullname'],
                    'admin_login' => true
                );
                $this->session->set_userdata($user_data);
                redirect(base_url()."admin_main");
            }else{
                $this->session->set_flashdata('error','Invalid password!');
                redirect(base_url()."admin");
            }
        }
        public function admin_main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }                        
            if($this->session->admin_login){
                
            }else{
                $this->session->set_flashdata('error','You are not logged in! Please enter password to login.');
                redirect(base_url()."admin");
            }
            $data['company']=$this->Job_model->getAllCompany();
            $data['applicant']=$this->Job_model->getAllApplicant();
            $data['jobs']=$this->Job_model->getAllJobs();
            $data['users']=$this->Job_model->getAllUsers();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        public function admin_logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('admin_login');
            redirect(base_url()."admin");
        }
        public function manage_company(){
            $page = "manage_company";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }                        
            if($this->session->admin_login){
                
            }else{
                $this->session->set_flashdata('error','You are not logged in! Please enter password to login.');
                redirect(base_url()."admin");
            }
            $data['title']="Company Manager";
            $data['company']=$this->Job_model->getAllCompany();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        public function save_company(){
            $save=$this->Job_model->save_company();
            if($save){
                $this->session->set_flashdata('success','Company details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save company details!');
            }
            redirect(base_url()."manage_company");
        }
        public function delete_company($id){
            $save=$this->Job_model->delete_company($id);
            if($save){
                $this->session->set_flashdata('success','Company details successfully deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete company details!');
            }
            redirect(base_url()."manage_company");
        }
        public function manage_users(){
            $page = "manage_user";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }                        
            if($this->session->admin_login){
                
            }else{
                $this->session->set_flashdata('error','You are not logged in! Please enter password to login.');
                redirect(base_url()."admin");
            }
            $data['title']="User Manager";
            $data['company']=$this->Job_model->getAllUsers();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }

        public function update_user_status($code,$status){
            $save=$this->Job_model->update_user_status($code,$status);
            if($save){
                $this->session->set_flashdata('success','User status successfully updated!');
            }else{
                $this->session->set_flashdata('failed','Unable to update user status!');
            }
            redirect(base_url()."manage_users");
        }
        //======================Admin Module==========================

        //=====================Company Module=========================
        public function company(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/company/'.$page.".php")){
                show_404();
            }                        
            if($this->session->company_login){
                redirect(base_url()."company_main");
            }
            $this->load->view('pages/company/'.$page);
        }
        public function company_authentication(){
            $data=$this->Job_model->company_authentication();
            if($data){
                $user_data=array(
                    'username' => $data['username'],
                    'fullname' => $data['comp_name'],
                    'company_login' => true
                );
                $this->session->set_userdata($user_data);
                redirect(base_url()."company_main");
            }else{
                $this->session->set_flashdata('error','Invalid password!');
                redirect(base_url()."company");
            }
        }
        public function save_company_account(){
            $save=$this->Job_model->save_company_account();
            if($save){
                $user_data=array(
                    'username' => $save['username'],
                    'fullname' => $save['comp_name'],
                    'company_login' => true
                );
                $this->session->set_userdata($user_data);
                redirect(base_url()."company_main");
            }else{
                $this->session->set_flashdata('error','Username already exists!');
                redirect(base_url()."company");
            }
        }
        public function company_main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/company/'.$page.".php")){
                show_404();
            }                        
            if($this->session->company_login){
                
            }else{
                $this->session->set_flashdata('error','You are not logged in! Please enter password to login.');
                redirect(base_url()."company");
            }
            $data['company']=$this->Job_model->getAllJobsByEmployer();
            $data['applicant']=$this->Job_model->getAllApplicantByEmployer();
            $data['jobs']=$this->Job_model->getAllJobsByEmployerPosted();
            $data['users']=$this->Job_model->getAllUsers();
            $this->load->view('templates/header');
            $this->load->view('templates/company/navbar');
            $this->load->view('templates/company/sidebar');
            $this->load->view('pages/company/'.$page,$data);
            $this->load->view('templates/company/modal');
            $this->load->view('templates/company/footer');
        }
        public function company_logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('company_login');
            redirect(base_url()."company");
        }
        public function manage_job(){
            $page = "manage_job";
            if(!file_exists(APPPATH.'views/pages/company/'.$page.".php")){
                show_404();
            }                        
            if($this->session->company_login){
                
            }else{
                $this->session->set_flashdata('error','You are not logged in! Please enter password to login.');
                redirect(base_url()."company");
            }
            $data['title']="Job Offering Manager";
            $data['jobs']=$this->Job_model->getAllJobsByEmployer();
            $data['comp_id']=$this->Job_model->getCompanyDetails($this->session->username);
            $this->load->view('templates/header');
            $this->load->view('templates/company/navbar');
            $this->load->view('templates/company/sidebar');
            $this->load->view('pages/company/'.$page,$data);
            $this->load->view('templates/company/modal');
            $this->load->view('templates/company/footer');
        }
        public function save_job(){
            $save=$this->Job_model->save_job();
            if($save){
                $this->session->set_flashdata('success','Job offering details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save job offering details!');
            }
            redirect(base_url()."manage_job");
        }
        public function delete_job($id){
            $save=$this->Job_model->delete_job($id);
            if($save){
                $this->session->set_flashdata('success','Job offering details successfully deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete job offering details!');
            }
            redirect(base_url()."manage_job");
        }
        public function change_job_status($id,$status){
            $save=$this->Job_model->change_job_status($id,$status);
            if($save){
                $this->session->set_flashdata("success","Job offering successfully $status!");
            }else{
                $this->session->set_flashdata("failed","Unable to post/unpost job offering!");
            }
            redirect(base_url()."manage_job");
        }
        public function manage_applicant(){
            $page = "manage_applicant";
            if(!file_exists(APPPATH.'views/pages/company/'.$page.".php")){
                show_404();
            }                        
            if($this->session->company_login){
                
            }else{
                $this->session->set_flashdata('error','You are not logged in! Please enter password to login.');
                redirect(base_url()."company");
            }
            $data['title']="Applicant Manager";
            $data['applicants'] = $this->Job_model->getAllApplicantByEmployer();            
            $this->load->view('templates/header');
            $this->load->view('templates/company/navbar');
            $this->load->view('templates/company/sidebar');
            $this->load->view('pages/company/'.$page,$data);
            $this->load->view('templates/company/modal');
            $this->load->view('templates/company/footer');
        }
        public function view_resume($id){
            $page = "view_resume";
            if(!file_exists(APPPATH.'views/pages/company/'.$page.".php")){
                show_404();
            }                        
            if($this->session->company_login){                
                $data['doc'] = $this->Job_model->getResume($id);
                $this->load->view('pages/company/'.$page,$data);
            }else{
                $this->session->set_flashdata('error','You are not logged in! Please enter password to login.');
                redirect(base_url()."company");
            }

        }
        public function send_email(){            
            $email = $this->input->post('email');                        
            $job_id = $this->input->post('job_id');
            $status = $this->input->post('status');
            $message = $this->input->post('remarks');
            if($status=="accepted"){
                $subject = 'Application Accepted!';
            }else{
                $subject = 'Application Declined!';
            }      
            
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'easykill.aboy@gmail.com',
                'smtp_pass' => 'ngfpdqyrfvoffhur',
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            $this->email->from('Online Job Portal');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);
            // $this->email->send();
            // $this->email->print_debugger();
            if($this->email->send()){
                $this->Job_model->updateApplicationStatus($job_id,$status,$message);                
                $this->session->set_flashdata("success","Application status successfully updated!");
            }else{
                $this->session->set_flashdata("failed","Unable to update application status!");
            }
            redirect(base_url()."manage_applicant");

        }
        //=====================Company Module=========================

        //=====================User Module============================
        public function user_signin(){
            $page = "user_login";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            $this->load->view('templates/header');
            $this->load->view('templates/user/navbar');
            $this->load->view('templates/user/sidebar');
            $this->load->view('pages/'.$page);  
            $this->load->view('templates/user/modal');          
            $this->load->view('templates/user/footer');
        }
        public function user_authentication(){
            $data=$this->Job_model->user_authentication();            
            if($data){
                $fullname=$data['app_firstname']." ".$data['app_lastname'];
                $user_data=array(
                    'username' => $data['app_username'],
                    'fullname' => $fullname,
                    'user_login' => true
                );
                $this->session->set_userdata($user_data);
                redirect(base_url());
            }else{
                $this->session->set_flashdata('error','Invalid password!');
                redirect(base_url()."user_signin");
            }
        }
        public function user_registration(){
            $data=$this->Job_model->user_registration();            
            if($data){
                $fullname=$data['app_firstname']." ".$data['app_lastname'];
                $user_data=array(
                    'username' => $data['app_username'],
                    'fullname' => $fullname,
                    'user_login' => true
                );
                $this->session->set_userdata($user_data);
                redirect(base_url());
            }else{
                $this->session->set_flashdata('error_save','Unable to save details!');
                redirect(base_url()."user_signin");
            }
        }
        public function user_logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('user_login');
            redirect(base_url());
        }
        public function user_profile(){
            $page = "user_profile";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){

            }else{
                redirect(base_url()."user_signin");
            }
            $data['profile'] = $this->Job_model->getProfile($this->session->username);
            $this->load->view('templates/header');
            $this->load->view('templates/user/navbar');
            $this->load->view('templates/user/sidebar');
            $this->load->view('pages/'.$page,$data);  
            $this->load->view('templates/user/modal',$data);          
            $this->load->view('templates/user/footer');
        }
        public function update_profile(){
            $save=$this->Job_model->update_profile();
            if($save){
                $this->session->set_flashdata('success','User Profile successfully updated!');
            }else{
                $this->session->set_flashdata('failed','Unable to update user profile!');
            }
            redirect(base_url()."user_profile");
        }
        public function update_interest(){
            $save=$this->Job_model->update_interest();
            if($save){
                $this->session->set_flashdata('success','User field of interest successfully updated!');
            }else{
                $this->session->set_flashdata('failed','Unable to update user field of interest!');
            }
            redirect(base_url()."user_profile");
        }
        public function update_user_account(){
            $save=$this->Job_model->update_user_account();
            if($save){
                $this->session->set_flashdata('success','User account successfully updated!');
            }else{
                $this->session->set_flashdata('failed','Unable to update user account!');
            }
            redirect(base_url()."user_profile");
        }
        public function search_jobs(){
            $page = "search_jobs";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){

            }else{
                redirect(base_url()."user_signin");
            }
            
            $data['user_status'] = $this->Job_model->checkStatus($this->session->username);
            $description=$this->input->post('description');
            $data['jobs'] = $this->Job_model->fetchAllJobs($description);
            $this->load->view('templates/header');
            $this->load->view('templates/user/navbar');
            $this->load->view('templates/user/sidebar');
            $this->load->view('pages/'.$page,$data);  
            $this->load->view('templates/user/modal',$data);          
            $this->load->view('templates/user/footer');
        }
        public function view_all_jobs(){
            $page = "search_jobs";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){

            }else{
                redirect(base_url()."user_signin");
            }
            $data['user_status'] = $this->Job_model->checkStatus($this->session->username);
            $description=$this->input->post('description');
            $data['jobs'] = $this->Job_model->view_all_jobs();
            $this->load->view('templates/header');
            $this->load->view('templates/user/navbar');
            $this->load->view('templates/user/sidebar');
            $this->load->view('pages/'.$page,$data);  
            $this->load->view('templates/user/modal',$data);          
            $this->load->view('templates/user/footer');
        }

        public function apply_job($id){
            $page = "apply_job";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){

            }else{
                redirect(base_url()."user_signin");
            }            
            $data['id'] = $id;
            $this->load->view('templates/header');
            $this->load->view('templates/user/navbar');
            $this->load->view('templates/user/sidebar');
            $this->load->view('pages/'.$page,$data);  
            $this->load->view('templates/user/modal',$data);          
            $this->load->view('templates/user/footer');
        }
        public function save_application(){
            $id=$this->input->post('job_id');
            $save=$this->Job_model->save_application();
            echo "<script>";
            if($save){
                echo "alert('Application successfully submitted!');";
            }else{
                echo "alert('Unable to submit application!');";
            }
            echo "window.location='".base_url()."apply_job/$id';";
            echo "</script>";
        }
        //=====================User Module============================
    }
?>