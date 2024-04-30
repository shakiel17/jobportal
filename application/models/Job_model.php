 <?php   
    date_default_timezone_set('Asia/Manila');
    class Job_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function admin_authentication(){            
            $password=$this->input->post('password');
            $result=$this->db->query("SELECT * FROM `admin` WHERE `password`='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function getAllCompany(){
            $result=$this->db->query("SELECT * FROM employer ORDER BY comp_name ASC");
            return $result->result_array();
        }
        public function getAllApplicant(){
            $result=$this->db->query("SELECT * FROM job_application GROUP BY app_code");
            return $result->result_array();
        }
        public function getAllJobs(){
            $result=$this->db->query("SELECT * FROM jobs ORDER BY job_title ASC");
            return $result->result_array();
        }
        public function getAllUsers(){
            $result=$this->db->query("SELECT * FROM applicant ORDER BY app_lastname ASC");
            return $result->result_array();
        }
        public function save_company(){
            $id=$this->input->post('comp_id');
            $name=$this->input->post('comp_name');
            $address=$this->input->post('comp_address');
            $email=$this->input->post('comp_email');
            $contactno=$this->input->post('comp_contactno');
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
            if($id==""){
                $result=$this->db->query("INSERT INTO employer(comp_name,comp_address,comp_email,comp_contactno,datearray,timearray) VALUES('$name','$address','$email','$contactno','$datearray','$timearray')");
            }else{
                $result=$this->db->query("UPDATE employer SET comp_name='$name',comp_address='$address',comp_email='$email',comp_contactno='$contactno' WHERE id='$id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_company($id){
            $result=$this->db->query("DELETE FROM employer WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_company_account(){
            $id=$this->input->post('company');
            $email=$this->input->post('email');
            $contactno=$this->input->post('contactno');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $check=$this->db->query("SELECT * FROM employer WHERE username='$username' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                $check=$this->db->query("SELECT * FROM employer WHERE id='$id' AND comp_email='$email' AND comp_contactno='$contactno'");
                if($check->num_rows()>0){
                    $result=$this->db->query("UPDATE employer SET username='$username',`password`='$password' WHERE id='$id'");
                }else{
                    return false;
                }
            }
            if($result){
                $result=$this->db->query("SELECT * FROM employer WHERE id='$id'");            
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function company_authentication(){            
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $result=$this->db->query("SELECT * FROM `employer` WHERE username='$username' AND `password`='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function getAllJobsByEmployerPosted(){
            $username=$this->session->username;
            $result=$this->db->query("SELECT j.* FROM jobs j INNER JOIN employer e ON e.id=j.comp_id WHERE e.username='$username' AND j.job_status='Posted' ORDER BY j.job_title ASC");
            return $result->result_array();
        }
        public function getAllJobsByEmployer(){
            $username=$this->session->username;
            $result=$this->db->query("SELECT j.* FROM jobs j INNER JOIN employer e ON e.id=j.comp_id WHERE e.username='$username' ORDER BY j.job_title ASC");
            return $result->result_array();
        }
        public function getAllApplicantByEmployer(){
            $username=$this->session->username;
            $result=$this->db->query("SELECT ja.* FROM job_application ja INNER JOIN jobs j ON j.id=ja.job_id INNER JOIN employer e ON e.id=j.comp_id WHERE e.username='$username' GROUP BY ja.app_code,ja.job_id ORDER BY ja.datearray DESC");
            return $result->result_array();
        }
        public function getCompanyDetails($username){
            $result=$this->db->query("SELECT * FROM employer WHERE username='$username'");
            return $result->row_array();
        }
        public function save_job(){
            $id=$this->input->post('job_id');
            $comp_id=$this->input->post('comp_id');
            $job_title=$this->input->post('job_title');
            $job_description=$this->input->post('job_description');
            $job_keyword=$this->input->post('job_keyword');
            $job_status='Unposted';
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
            if($id==""){
                $result=$this->db->query("INSERT INTO jobs(comp_id,job_title,job_description,job_keyword,job_status,datearray,timearray) VALUES('$comp_id','$job_title','$job_description','$job_keyword','$job_status','$datearray','$timearray')");
            }else{
                $result=$this->db->query("UPDATE jobs SET job_title='$job_title',job_description='$job_description',job_keyword='$job_keyword' WHERE id='$id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function change_job_status($id,$status){
            $result=$this->db->query("UPDATE jobs SET job_status='$status' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_job($id){
            $result=$this->db->query("DELETE FROM jobs WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>