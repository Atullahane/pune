<?php
class Studentmodel extends CI_Model
{

	 public function studentdataModel()
  {

   $query=$this->db->select()
            ->from('student')
            ->get();  
           return  $query->result();
  }

   public function fetch_Department()
  {

   $query=$this->db->select()
            ->from('department')
            ->get();  
           return  $query->result(); 
  }

  public function add_student($array,$state,$city) 
  {
    $st=$state->state;

    $ct=$city->city;
//print_r($st);
//exit();
// Array ( [0] => stdClass Object ( [state_id] => 2 [state] => karnataka ) )
// Array ( [name] => Atul Lahane [gender] => Mail [email] => demo@demo.com [password] => 111 [state] => 2 [city] => 3 [branch] => science )
   //  return $this->db->insert('student',$array,);//

    //INSERT INTO `student`(`id`, `name`, `gender`, `email`, `password`, `state`, `city`, `branch`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')

     // $name=$array['name'];
      //return $this->db->insert('student',['name',$name]);

      $record = array(
             'name' => $array['name'],
             'gender' => $array['gender'],
             'email' => $array['email'],
             'password' => $array['password'],
             'state' =>$st,
             'city' => $ct,
             'branch' => $array['branch'],
            
 );
      return $this->db->insert('student',$record);

 //$this->db->insert(‘customer’, $record);

    //$t=$array['title']; //form name
    // return $this->db->insert('student',['article_title',$t]);// db fild name

  }

  public function del($id)
    {
    return $this->db->delete('student',['id'=>$id]);

    }

  public function find_student($studentid)
    {
     $q=$this->db->select(['name','gender','email','password','state','city','branch','id'])
              ->where('id',$studentid)
              ->get('student');
              return $q->row(); 

    }
    public function update_student($studentid,Array $array,$state,$city)
    {
      $st=$state->state;

      $ct=$city->city;

      $record = array(
             'name' => $array['name'],
             'gender' => $array['gender'],
             'email' => $array['email'],
             'password' => $array['password'],
             'state' =>$st,
             'city' => $ct,
             'branch' => $array['branch'],
            
  );
    
     return $this->db->where('id',$studentid)
                     ->update('student',$record);

    }
    
    public function update_student_notstate($studentid,Array $array)
    {
      //$st=$state->state;

      //$ct=$city->city;

      $record = array(
             'name' => $array['name'],
             'gender' => $array['gender'],
             'email' => $array['email'],
             'password' => $array['password'],
             'state' =>$array['state'],
             'city' =>$array['city'],
             'branch' => $array['branch'],
            
  );
  return $this->db->where('id',$studentid)
                     ->update('student',$record);
 }   

                
function getstate($state_id)
 {
  //$this->db->order_by("state", "ASC");
  $this->db->where('state_id', $state_id);
  $query = $this->db->get("state");
 
  return $query->row(); 
 }

 function getcity($city_id)
 {
  //$this->db->order_by("state", "ASC");
  $this->db->where('city_id', $city_id);
  $query = $this->db->get("city");
 
  return $query->row(); 
 }


  function fetch_state()
 {
  $this->db->order_by("state", "ASC");
  $query = $this->db->get("state");
 
  return $query->result();
  //return $query->result_array() ;
 }

 function fetch_city($state_id)
 {
  $this->db->where('state_id', $state_id);
  $this->db->order_by('city', 'ASC');
  $query = $this->db->get('city');
  $output = '<option value="">Select City</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->city_id.'">'.$row->city.'</option>';
  }
  return $output;
 }
 
}

 