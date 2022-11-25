<?php

class PhonebookModel extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public function show(){
		// $query = $this->db->get('user_info');
		// return $query->result(); 

        $query = $this->db->query('SELECT a.ref_id,a.id,a.name,a.desc,b.phone_number,b.id as contact_id FROM user_info AS a  LEFT JOIN contact_info AS b on  a.ref_id=b.ref_id order by a.id;');
        return $query->result();
	}

	public function insert($user_info){
		return $this->db->insert('user_info', $user_info);
	}
    public function insert_phone_number($contact_info){
		return $this->db->insert('contact_info', $contact_info);
	}
	// public function insertnewphonenumber($contact_Pnumber){
	// 	return $this->db->insert('contact_info', $contact_Pnumber);
	// }
	public function getid($name){
		$query = $this->db->get_where('user_info',array('name'=>$name));
		return $query->row_array();
	}

	public function getuser($id){
		// $query = $this->db->get_where('user_info',array('id'=>$id));
		// return $query->row_array();
        $query = $this->db->query('SELECT a.ref_id,a.id,a.name,a.desc,b.phone_number,b.id as contact_id FROM user_info AS a  LEFT JOIN contact_info AS b on  a.ref_id=b.ref_id ');
        return $query->result();
	}
	public function getuserdelete1($id){
		$sql='SELECT a.id as contact_id,a.phone_number,b.id as info_id,b.name,b.desc FROM contact_info AS a JOIN user_info AS b ON a.ref_id=b.ref_id WHERE a.id=?;';
		$query=$this->db->query($sql,array($id));
		return $query->row_array();

	}   

	public function getuserdelete($id){
		$sql='SELECT * FROM contact_info AS a JOIN user_info AS b ON a.ref_id=b.ref_id WHERE b.id=?;';
		$query=$this->db->query($sql,array($id));

		if($query->num_rows()==2){
			return $query->row_array();
		}
	}    
	public function getusercontact($id){
        // $id='24';
		
        $sql='SELECT a.id,a.name,b.phone_number,a.`desc`,a.ref_id  FROM user_info AS a JOIN contact_info AS b ON a.ref_id=b.ref_id WHERE a.id=?;';
        $query=$this->db->query($sql,array($id));
        return $query->row_array();
		// $query = $this->db->get_where('contact_info',array('id'=>$id));
		// return $query->row_array();
	}

	public function getusercontactPN($phone_number){
        // $id='24';
		
        $sql='SELECT a.id,a.name,b.phone_number,a.`desc`,a.ref_id,b.id as contact_id  FROM user_info AS a JOIN contact_info AS b ON a.ref_id=b.ref_id WHERE b.phone_number=?;';
        $query=$this->db->query($sql,array($phone_number));
        return $query->row_array();
		// $query = $this->db->get_where('contact_info',array('id'=>$id));
		// return $query->row_array();
	}

    public function delete($id){
		
		$this->db->where('user_info.id', $id);
		return $this->db->delete('user_info');
	}

    public function delete_Pnumber($id){

            $sql='DELETE FROM contact_info WHERE ref_id = (SELECT ref_id FROM user_info WHERE id=?);';
            $query=$this->db->query($sql,array($id));
            return $query ;
    }

	public function delete_contact($contact_id,$info_id){
		// $id = contact_id
		// Check if contact has more than 1 number
		// $sql='SELECT * FROM contact_info AS a JOIN user_info AS b ON a.ref_id=b.ref_id WHERE b.id=?;';
		$sql='SELECT * FROM contact_info WHERE ref_id = (SELECT ref_id FROM contact_info WHERE id=?)';
		$query=$this->db->query($sql,array($contact_id));

		if($query->num_rows()==1){
			// return $query->row_array();
			// $sql='DELETE FROM contact_info WHERE ref_id = (SELECT ref_id FROM user_info WHERE id=?);';
            // $query=$this->db->query($sql,array($info_id));


			// $this->db->where('user_info.id', $info_id);
			// return $this->db->delete('user_info');
			$sql='DELETE FROM user_info WHERE ref_id = (SELECT ref_id FROM contact_info WHERE id=?)';
			$query=$this->db->query($sql,array($contact_id));
			
			$this->db->where('contact_info.id', $contact_id);
			return $this->db->delete('contact_info');
		}else{
			$this->db->where('contact_info.id', $contact_id);
			return $this->db->delete('contact_info');
		}
	}
	public function updateuser($user, $id, $contact_Pnumber, $contactid){

		// $this->db->where('contact_info.ref_id', $refid);
		$this->db->where('contact_info.id', $contactid);
		$this->db->update('contact_info', $contact_Pnumber);

		$this->db->where('user_info.id', $id);
		return $this->db->update('user_info', $user);

	}

	public function getsearch($name){
		// $query = $this->db->get_where('user_info',array('id'=>$id));
		// return $query->row_array();
        // $query = $this->db->query('SELECT a.ref_id,a.id,a.name,a.desc,b.phone_number,b.id as contact_id FROM user_info AS a  LEFT JOIN contact_info AS b on  a.ref_id=b.ref_id WHERE a.name LIKE '%?%'');
        // return $query->result();
		// $sql = $this->db->query('SELECT a.ref_id,a.id,a.name,a.desc,b.phone_number,b.id as contact_id FROM user_info AS a  LEFT JOIN contact_info AS b on  a.ref_id=b.ref_id WHERE a.name LIKE '%'?'%'');
		$sql = $this->db->query('SELECT a.ref_id,a.id,a.name,a.desc,b.phone_number,b.id as contact_id FROM user_info as a LEFT JOIN contact_info AS b on  a.ref_id=b.ref_id where name like "% ? %"  order by id;');
        return $query=$this->db->query($sql,array($name));
	}

	function search($keyword)
    {
        $this->db->like('name',$keyword);
        $query  =   $this->db->get('user_info');
        return $query->result();
    }

	public function showtest($kw){
		// $query = $this->db->get('user_info');
		// return $query->result(); 
        // $sql = $this->db->query('SELECT a.ref_id,a.id,a.name,a.desc,b.phone_number,b.id as contact_id FROM user_info AS a  LEFT JOIN contact_info AS b on  a.ref_id=b.ref_id order by a.id;');
        // return $query=$this->db->query($sql,array($name));
		
		// $sql = $this->db->query('SELECT a.ref_id,a.id,a.name,a.desc,b.phone_number,b.id as contact_id FROM user_info as a LEFT JOIN contact_info AS b on  a.ref_id=b.ref_id where name like "% ? %"  order by id;');
        // return $query=$this->db->query($sql,array($name));


		// $this->db->like('name', $name);
		// $query = $this->db->get('user_info');
		// return $query->result(); 

		$name=$kw;

		$this->db->select('a.ref_id,a.id,a.name,a.desc,b.phone_number,b.id as contact_id');
		$this->db->from('user_info a'); 
		$this->db->join('contact_info b', 'b.ref_id=a.ref_id', 'left');
		$this->db->like('name', $name);
		$this->db->order_by('a.id','asc');         
		$query = $this->db->get(); 
		return $query->result(); 
	}

	public function funcname($id)
	{
		$this->db->select('*');
		$this->db->from('user_info a'); 
		$this->db->join('contact_info b', 'b.ref_id=a.ref_id', 'left');
		$this->db->where('c.album_id',$id);
		$this->db->order_by('a.id','asc');         
		$query = $this->db->get(); 
		if($query->num_rows() != 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}
}
?>