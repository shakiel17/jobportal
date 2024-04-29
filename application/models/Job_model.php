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
    }
?>