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
	public function confirm_company($id){
            $result=$this->db->query("UPDATE employer SET `status`='confirmed' WHERE id='$id'");
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
            $result=$this->db->query("SELECT ja.*,j.job_title FROM job_application ja INNER JOIN jobs j ON j.id=ja.job_id INNER JOIN employer e ON e.id=j.comp_id WHERE e.username='$username' GROUP BY ja.app_code,ja.job_id ORDER BY ja.datearray DESC");
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
            $job_description=htmlspecialchars($this->input->post('job_description'));
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
        public function user_authentication(){            
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $result=$this->db->query("SELECT * FROM applicant WHERE app_username='$username' AND app_password='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function user_registration(){
            $lastname=$this->input->post('lastname');
            $firstname=$this->input->post('firstname');
            $middlename=$this->input->post('middlename');
            $contactno=$this->input->post('contactno');
            $email=$this->input->post('email');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $code=date('YmdHis');
            $check=$this->db->query("SELECT * FROM applicant WHERE app_username='$username'");
            if($check->num_rows()>0){
                return false;
            }else{
                $result=$this->db->query("INSERT INTO applicant(app_code,app_lastname,app_firstname,app_middlename,app_contactno,app_username,app_password,app_email) VALUES('$code','$lastname','$firstname','$middlename','$contactno','$username','$password','$email')");
            }
            if($result){
                $result=$this->db->query("SELECT * FROM applicant WHERE app_username='$username' AND app_password='$password'");
                return $result->row_array();
            }
        }
        public function getProfile($username){
            $result=$this->db->query("SELECT * FROM applicant WHERE app_username='$username'");
            return $result->row_array();
        }
        public function update_profile(){
            $id=$this->input->post('id');
            $lastname=$this->input->post('lastname');
            $firstname=$this->input->post('firstname');
            $middlename=$this->input->post('middlename');
            $birthdate=$this->input->post('birthdate');
            $gender=$this->input->post('gender');
            $address=$this->input->post('address');
            $contactno=$this->input->post('contactno');
            $result=$this->db->query("UPDATE applicant SET app_lastname='$lastname',app_firstname='$firstname',app_middlename='$middlename',app_birthdate='$birthdate',app_gender='$gender',app_address='$address',app_contactno='$contactno' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function update_interest(){
            $id=$this->input->post('id');
            $interest=$this->input->post('interest');
            $result=$this->db->query("UPDATE applicant SET app_interest='$interest' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function update_user_account(){
            $id=$this->input->post('id');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $result=$this->db->query("UPDATE applicant SET app_username='$username',app_password='$password' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllJobsByApplicant($code){
            $result=$this->db->query("SELECT j.job_title,j.job_description,e.comp_name,e.comp_address,ja.datearray,ja.timearray,ja.status FROM jobs j INNER JOIN employer e ON e.id=j.comp_id INNER JOIN job_application ja ON ja.job_id=j.id INNER JOIN applicant a ON a.app_username=ja.app_code WHERE a.app_username='$code' GROUP BY ja.app_code,ja.job_id ORDER BY ja.datearray DESC,ja.timearray DESC");
            return $result->result_array();
        }
        public function fetchAllJobs($description){
            $result=$this->db->query("SELECT j.*,e.comp_name,e.comp_address,e.comp_email,e.comp_contactno FROM jobs j INNER JOIN employer e ON e.id=j.comp_id WHERE (j.job_keyword LIKE '%$description%' OR j.job_title LIKE '%$description%') AND j.job_status='Posted' ORDER BY j.datearray DESC");
            return $result->result_array();
        }
        public function view_all_jobs(){
            $result=$this->db->query("SELECT j.*,e.comp_name,e.comp_address,e.comp_email,e.comp_contactno FROM jobs j INNER JOIN employer e ON e.id=j.comp_id WHERE j.job_status='Posted' ORDER BY j.datearray DESC");
            return $result->result_array();
        }
        public function save_application(){
            $id=$this->input->post('job_id');
            $subject=$this->input->post('app_subject');
            $letter=$this->input->post('app_letter');
            $file_name=$_FILES['file']['name'];
		    $file_tmp=$_FILES['file']['tmp_name'];
            $pdf_blob=addslashes(file_get_contents($file_tmp));
            $username=$this->session->username;            
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("INSERT INTO job_application(job_id,app_code,`subject`,coverletter,documents,datearray,timearray) VALUES('$id','$username','$subject','$letter','$pdf_blob','$date','$time')");
            if($result){
                return true;
            }else{
                return false;
            }
        }     
        public function getResume($id){
            $result=$this->db->query("SELECT * FROM job_application WHERE id='$id'");
            return $result->row_array();
        }
        public function update_user_status($code,$status){
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("UPDATE applicant SET `status`='$status',datearray='$date',timearray='$time' WHERE app_code='$code'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function checkStatus($username){
            $result=$this->db->query("SELECT * FROM applicant WHERE app_username='$username'");
            return $result->row_array();
        }

        public function updateApplicationStatus($id,$status,$message){
            $result=$this->db->query("UPDATE job_application SET `status`='$status',remarks='$message' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }

        }
	public function getAllDocuments($username){
		$result=$this->db->query("SELECT * FROM documents WHERE username='$username'");
		return $result->result_array();
	}
	public function save_document(){
		$username=$this->input->post("username");
		$description=$this->input->post("description");
		$file_name=$_FILES['file']['name'];
		$file_tmp=$_FILES['file']['tmp_name'];
            	$pdf_blob=addslashes(file_get_contents($file_tmp));
		$date=date('Y-m-d');
		$time=date('H:i:s');
		$result=$this->db->query("INSERT INTO documents(username,`description`,document,datearray,timearray) VALUES('$username','$description','$pdf_blob','$date','$time')");
		if($result){
			return true;
		}else{
			return false;
		}
	}

	public function delete_document($id){
		if($this->session->user_login){
			$result=$this->db->query("DELETE FROM user_documents WHERE id='$id'");
		}else{
			$result=$this->db->query("DELETE FROM documents WHERE id='$id'");
		}

		if($result){
			return true;
		}else{
			return false;
		}
	}
		 public function getDocument($id){
            $result=$this->db->query("SELECT * FROM documents WHERE id='$id'");
            return $result->row_array();
        }
	public function getSingleJob($id){
		$result=$this->db->query("SELECT * FROM jobs WHERE id='$id'");
		return $result->row_array();
	}
	public function getApplicationDetails($id){
		$result=$this->db->query("SELECT a.app_email,e.comp_email FROM job_application ja INNER JOIN applicant a ON a.app_username=ja.app_code INNER JOIN jobs j ON j.id=ja.job_id INNER JOIN employer e ON e.id=j.comp_id WHERE ja.id='$id'");
		return $result->row_array();
	}
	public function upload_document(){
            $username=$this->input->post('username');
            $description=$this->input->post('description');
            $file_name=$_FILES['file']['name'];
		    $file_tmp=$_FILES['file']['tmp_name'];
            $pdf_blob=addslashes(file_get_contents($file_tmp));
            $username=$this->session->username;            
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("INSERT INTO user_documents(username,description,document,datearray,timearray) VALUES('$username','$description','$pdf_blob','$date','$time')");
            if($result){
                return true;
            }else{
                return false;
            }
        }
	 public function getUserDocument($id){
            $result=$this->db->query("SELECT * FROM user_documents WHERE id='$id'");
            return $result->row_array();
        }
    }
?>
