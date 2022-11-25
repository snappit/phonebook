<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebook extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('PhonebookModel');
		// //include modal.php in views
		$this->inc['modal'] = $this->load->view('modal', '', true);
	}

	public function index()
	{
        // echo "Hello phonebook";
		$this->load->view('phonebook', $this->inc);
	}

    public function show(){
		
		$data = $this->PhonebookModel->show();
		$output = array();
		foreach($data as $row){
			?>
			<tr>
				<td style="display:"><?php echo $row->contact_id; ?></td>
                <td style="display:"><?php echo $row->ref_id; ?></td>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->phone_number; ?></td>
				<td><?php echo $row->desc; ?></td>
				<td>
					<button class="btn btn-warning edit" data-id="<?php echo $row->phone_number; ?>" alt="dsfsdf"><span class="glyphicon glyphicon-edit"></span> Edit</button>&nbsp; 
					<button class="btn btn-danger delete" data-id="<?php echo $row->contact_id; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</button>&nbsp; 
					<button class="btn btn-success addnewnum" data-id="<?php echo $row->id; ?>"><span class="glyphicon glyphicon-earphone"></span> Add Number</button>&nbsp; 
					
				</td>
			</tr>
			<?php
		}
	}

	public function insert(){

        $this->load->helper('string');
        // echo random_string('alnum',5);
        //$id= $_POST['id'];
        $refid = random_string('alnum',5);
        $user_info['ref_id'] = $refid;
		$user_info['name'] = $_POST['name'];
		$user_info['desc'] = $_POST['desc'];
		$contact_info['phone_number'] = $_POST['phone_number'];
        $contact_info['ref_id'] = $refid;
 

		 $query = $this->PhonebookModel->insert($user_info);
         $query = $this->PhonebookModel->insert_phone_number($contact_info);
	}

	public function getuser(){
		$id = $_POST['id'];
		$data = $this->PhonebookModel->getuser($id);
		echo json_encode($data);
	}
	public function getuserdelete1(){
		$id = $_POST['contact_id'];
		$data = $this->PhonebookModel->getuserdelete1($id);
		echo json_encode($data);
	}
	public function getuserdelete(){
		$id = $_POST['id'];
		$data = $this->PhonebookModel->getuserdelete($id);
		echo json_encode($data);
	}

	public function getusercontact(){
		$id = $_POST['id'];
		$data = $this->PhonebookModel->getusercontact($id);
		echo json_encode($data);
	}

	public function getusercontactPN(){
		$phone_number = $_POST['phone_number'];
		$data = $this->PhonebookModel->getusercontactPN($phone_number);
		echo json_encode($data);
	}

    public function update(){
		$id = $_POST['id'];
		$contactid = $_POST['contact_id'];
		$user['name'] = $_POST['name'];
		$user['desc'] = $_POST['desc'];
		$refid = $_POST['phone_number'];
        $contact_Pnumber['phone_number'] = $_POST['phone_number'];
		$query = $this->PhonebookModel->updateuser($user, $id, $contact_Pnumber, $contactid);
	}

    public function delete(){
		// $id = $_POST['id'];
        // $query = $this->PhonebookModel->delete_Pnumber($id);
		// $query = $this->PhonebookModel->delete($id);
		$contact_id = $_POST['id'];
		$info_id = $_POST['info_id'];
		$query = $this->PhonebookModel->delete_contact($contact_id,$info_id);
	}

    public function insertnewphonenumber(){
		// $id = $_POST['id'];
		// $contact_Pnumber['ref_id'] = $_POST['ref_id'];
        // $contact_Pnumber['phone_number'] = $_POST['phone_number'];
		// $query = $this->PhonebookModel->insertphonenumber($contact_Pnumber);

		$contact_info['ref_id'] = $_POST['ref_id_addnew'];
		$contact_info['phone_number'] = $_POST['phone_number'];
		$query = $this->PhonebookModel->insert_phone_number($contact_info);
	}

	public function searchname(){
		$name = $_POST['search_name'];
		$data = $this->PhonebookModel->getsearch($name);
		echo json_encode($data);
	}

	public function showtest2(){
		$this->load->helper('string');
		$refid = random_string('alnum',5);
		$user_info['ref_id'] = $refid;
		$user_info['name'] = $_POST['name'];


		 $query = $this->PhonebookModel->insert($user_info);
		 echo json_encode($query);
	}

	public function showtest(){
		$this->load->helper('string');

		$kw =$_POST['name'];	//$_POST['name'];
		//  $kw = $_POST['search_name'];// $_POST['search_name'];
		//  $sch=$this->input->post('search_name');
		// $kw=$sch;
		//  $kw = isset($_POST['search_name']) ? $_POST['search_name'] : '';

		$data = $this->PhonebookModel->showtest($kw);
		echo json_encode($data);
		$output = array();
		foreach($data as $row){
			?>
			<tr>
				<td style="display:"><?php echo $row->contact_id; ?></td>
                <td style="display:"><?php echo $row->ref_id; ?></td>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->phone_number; ?></td>
				<td><?php echo $row->desc; ?></td>
				<td>
					<button class="btn btn-warning edit" data-id="<?php echo $row->phone_number; ?>" alt="dsfsdf"><span class="glyphicon glyphicon-edit"></span> Edit</button>&nbsp; 
					<button class="btn btn-danger delete" data-id="<?php echo $row->contact_id; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</button>&nbsp; 
					<button class="btn btn-success addnewnum" data-id="<?php echo $row->id; ?>"><span class="glyphicon glyphicon-earphone"></span> Add Number</button>&nbsp; 
					
				</td>
			</tr>
			<?php
		}
	}



}
