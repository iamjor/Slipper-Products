<?php
/**
 * Author: Jomar Oliver Reyes
 * Author URL: https://www.jomaroliverreyes.com
*/

// Controller class that contains methods that will let the user update or delete slippers product information.

class Slippers extends CI_Controller{
	
	//initialize
	public function __construct(){
	parent::__construct();
	}

	public function index(){
	    $data["title"] = 'Slipper Products';

	    //load slippers_model
	    $this->load->model('slippers_model');
	    
        //set getSlippers() method of slippers_model to $slippers
	    $data["slippers"] = $this->slippers_model->getSlippers();
    
        //provide access for slippers view page to use $slippers
	    $this->load->view('slippers', $data);
	}

    //edit() --> method that prepares data needed to be updated
	public function edit($slipper_id=''){

		if($slipper_id){
			$data["title"] = 'Edit slipper';

			$this->load->model('slippers_model');
			$data["slipper"] = $this->slippers_model->getSlippers($slipper_id);
			if($data["slipper"]){
				$this->load->view('slipper_edit', $data);
			}
		}else{
			redirect(base_url('slippers'));
		}

	}
    
    //verifyEdit()  --> method that validates updated inputs from slipper_edit page and sends updated inputs to database
	public function verifyEdit(){
		$slipper_id = $this->uri->segment(3);
		$this->form_validation->set_rules('slipper_name', 'Slipper Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required|decimal');
        
        //if inputs abide to form rules, slippers_model will be loaded and it will proceed to the nested if-else method. Else, it will go back to the edit method
		if($this->form_validation->run()===TRUE){
			$this->load->model('slippers_model');
			$isUpdated = $this->slippers_model->update($slipper_id);

			//If update method of slippers_method successfully loaded, updated inputs will be sent to database and "Updated Successfully!" will be displayed. Else, it will display "Update failed!"
			if($isUpdated){
				$this->session->set_flashdata('statusColor','green');
				$this->session->set_flashdata('statusMessage','Updated successfully!');
			}else{
				$this->session->set_flashdata('statusColor','red');
				$this->session->set_flashdata('statusMessage','Update failed!');
			}
		}else{
			$this->edit($slipper_id);
		}
	}

	//delete() --> method that lets us delete a slippers product
	public function delete($slipper_id=''){

		$this->load->model('slippers_model');
		$data["slipper"] = $this->slippers_model->getSlippers($slipper_id);

		//if we successfully load getSlippers method from slippers_model, it will proceed to the nested if-else statement. Else, it will redirect to the slippers view page
		if($data["slipper"]){
			$isDeleted = $this->slippers_model->delete($slipper_id);
			//if delete method from slippers_model successfully loaded, our selected slippers product will be deleted and "Deleted successfully!" will be displayed. Else, "Delete failed!" will be displayed
			if($isDeleted){
				$this->session->set_flashdata('statusColor','green');
				$this->session->set_flashdata('statusMessage','Deleted successfully!');
			}else{
				$this->session->set_flashdata('statusColor','red');
				$this->session->set_flashdata('statusMessage','Delete failed!');
			}
		}else{
			redirect(base_url('slippers'));
		}

	}
}
?>