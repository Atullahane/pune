<?php

class student extends MY_controller
{
public function __construct()
{
  parent::__construct();
  $this->load->model('studentmodel');
}

public function atul()
{
echo "nnnnnnnnn";
}
public function welcome()
{
      $this->load->model('studentmodel','sm');
      $studentdata=$this->sm->studentdataModel();
      $this->load->view('student/dashboard',['studentdata'=>$studentdata ]); 
}

public function add()
 {
    $this->load->model('studentmodel','sm');
    $data['state'] = $this->studentmodel->fetch_state();
    $this->load->view('student/add_student', $data); 
 }

public function studentValidation()//classsValidation =studentValidation
{
  $this->form_validation->set_rules('name','User Name','required');
  $this->form_validation->set_rules('gender','User gender','required');
  $this->form_validation->set_rules('email','User email','required');
  $this->form_validation->set_rules('password','password','required');
  $this->form_validation->set_rules('state','state','required');
  $this->form_validation->set_rules('city','city','required');
  $this->form_validation->set_rules('branch','branch','required'); 

  if($this->form_validation->run(''))
   {
      $post=$this->input->post();

      $state_id=$post['state'];

      $this->load->model('studentmodel','getstate');
      $state=$this->getstate->getstate($state_id);
/*city*/
      $city_id=$post['city'];

      $this->load->model('studentmodel','getcity');
      $city=$this->getcity->getcity($city_id);

/*end city*/

      $this->load->model('studentmodel','studentadd');//useradd
      
      if($this->studentadd->add_student($post,$state,$city))//add_articles
      {
         $this->session->set_flashdata('msg','student added successfully');
          $this->session->set_flashdata('msg_class','alert-success');
      }
      else
      {
         $this->session->set_flashdata('msg','student not added Please try again!!');
         $this->session->set_flashdata('msg_class','alert-danger');
      }
      return redirect('student/welcome');
    }
    else
    {
      //$this->load->view('student/add_student');
       //return redirect('student/add');
       $this->add();
    }

 }

public function fetch_city()
{
  if($this->input->post('state_id'))
  {
   echo $this->studentmodel->fetch_city($this->input->post('state_id'));
  }
}

public function delstudent()
{
  $id=$this->input->post('id');
  
    $this->load->model('studentmodel','delclass');
      if($this->delclass->del($id))
      {
          $this->session->set_flashdata('msg','Delete Successfully');
          $this->session->set_flashdata('msg_class','alert-success');
      }
      else
      {
         $this->session->set_flashdata('msg','Please try again..not delete');
         $this->session->set_flashdata('msg_class','alert-danger');
      }
    return redirect('student/welcome');
}

public function editstudent($id)
{

  $this->load->model('studentmodel','sm');
  $student['student']=$this->studentmodel->find_student($id);
  $student['state'] = $this->studentmodel->fetch_state();

//$this->load->view('student/edit_student',$state);
 $this->load->view('student/edit_student',$student);
 //$this->load->view('student/edit_student',['student'=>$student],['state'=>$state]);
}

public function updatestudent($student_id)
{
  $this->form_validation->set_rules('name','User Name','required');
  $this->form_validation->set_rules('gender','User gender','required');
  $this->form_validation->set_rules('email','User email','required');
  $this->form_validation->set_rules('password','password','required');
  $this->form_validation->set_rules('state','state','required');
  $this->form_validation->set_rules('city','city','required');
  $this->form_validation->set_rules('branch','branch','required'); 

  if($this->form_validation->run())
    {
      $post=$this->input->post(); 

      $state_id=$post['state'];

      $this->load->model('studentmodel','getstate');
      $state=$this->getstate->getstate($state_id);
/*city*/
      $city_id=$post['city'];

      $this->load->model('studentmodel','getcity');
      $city=$this->getcity->getcity($city_id);
/*end city*/    
      $this->load->model('studentmodel','editupdate');

      if ( $state=='' && $city=='')
      {
        $edit=$this->editupdate->update_student_notstate($student_id,$post);
      }   
      else
      {
        $edit=$this->editupdate->update_student($student_id,$post,$state,$city);
      }
      if($edit)
      {
        $this->session->set_flashdata('msg','studen update successfully');
        $this->session->set_flashdata('msg_class','alert-success');
      }
      else
      {
         $this->session->set_flashdata('msg','studen not update Please try again!!');
         $this->session->set_flashdata('msg_class','alert-danger');
      }
      return redirect('student/welcome');
      }
    else
    {
     // $this->load->view('student/edit_student');
      $this->editstudent($student_id);
    }
  }
}
?>
