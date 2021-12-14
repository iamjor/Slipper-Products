<?php
/**
 * Author: Jomar Oliver Reyes
 * Author URL: https://www.jomaroliverreyes.com
*/

// Model class that contains methods that are needed to connect with the database.

class Slippers_model extends CI_model{
	
	public function __construct(){
	parent::__construct();
	//load database
	$this->load->database();
	}
    
    //getSlippers() --> method that will get the data or values from database
	public function getSlippers($slipper_id=null){
		if($slipper_id==null){
			$rs = $this->db->get('slippers');
		    //displays all the lists of slipper products from database
		    return $rs->result_array();
	    }else{
	    	$rs = $this->db->get_where('slippers', array('slipper_id' => $slipper_id));
	    	//displays or returns a single slipper product from database
	    	return $rs->row_array();
	    }
	}
    
    //update() --> method that will update the data or values from the database
	public function update($slipper_id){
		$data = array(
			'slipper_name' => $this->input->post('slipper_name'),
			'price' => $this->input->post('price'),
			'isAvailable' => $this->input->post('isAvailable')
		);
		$this->db->where('slipper_id', $slipper_id);
		//displays the updated value
		return $this->db->update('slippers', $data);
	}

    //delete() --> method that will delete the data or slipper product from the database
	public function delete($slipper_id){
		//removes row from the array
		return $this->db->delete('slippers', array('slipper_id' => $slipper_id));
	}
}
?>