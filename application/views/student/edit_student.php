<?php include('header.php'); ?>

<div class="container" style="margin-top:20px;">
<h1>Edit student</h1>
 <?php echo form_open("student/updatestudent/{$student->id} "); ?> 
 
<?php
//print_r($student) ;

//print_r($state) ;
//exit();
?>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="Title">Name:</label>
          <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter name','name'=>'name','value'=>set_value('name',$student->name)]);  ?>
          </div>
      </div>
        <div class="col-lg-6" style="margin-top:40px;">
         <?php  echo form_error('name');  ?>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="Title">gender:</label>
          <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter gender','name'=>'gender','value'=>set_value('gender',$student->gender)]);  ?>
        </div>
      </div>
        <div class="col-lg-6" style="margin-top:40px;">
         <?php  echo form_error('gender');  ?>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="Title">email:</label>
          <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter email','name'=>'email','value'=>set_value('email',$student->email)]);  ?>
        </div>
      </div>
        <div class="col-lg-6" style="margin-top:40px;">
         <?php  echo form_error('email');  ?>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="Title">password:</label>
          <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter password','name'=>'password','value'=>set_value('password',$student->password)]);  ?>
        </div>
      </div>
        <div class="col-lg-6" style="margin-top:40px;">
         <?php  echo form_error('password');  ?>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="Title">state:</label>
          <Select name="state" id="state" class="form-control" style="padding: 1;">
            <option value="<?php echo $student->state ;?>"><?php echo $student->state ;?></option>
            <?php
            foreach($state as $row)
            {
             echo '<option value="'.$row->state_id.'">'.$row->state.'</option>';
            } 
            ?>
            </select>

        </div>
      </div>
        <div class="col-lg-6" style="margin-top:40px;">
         <?php  echo form_error('state');  ?>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="Title">city:</label>

          <Select name="city" id="city" class="form-control" style="padding: 1;">
            <option value="<?php echo $student->city ;?>"><?php echo $student->city ;?></option>
            
          <select>
        </div>
      </div>
        <div class="col-lg-6" style="margin-top:40px;">
         <?php  echo form_error('city');  ?>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="Title">branch:</label>
          <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter branch','name'=>'branch','value'=>set_value('branch',$student->branch)]);  ?>
        </div>
      </div>
        <div class="col-lg-6" style="margin-top:40px;">
         <?php  echo form_error('branch');  ?>
        </div>
    </div>
 
  <?php  echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Submit']);  ?>
  <?php  echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);  ?>

</div>


<script>

$(document).ready(function(){

$('#state').change(function(){
  var state_id = $('#state').val();
  //var state = document.getElementById("state");
  //var state = $row->state;
  //var state= $("select[name='state'] option:selected").text();
  //alert(state);
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>student/fetch_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
     $('#city').html(data);
     //$('#state').val(state);
    }
   });
  }
  //$('#state').val(state);
  else
  {
    //alert("nnnnnn");
   $('#city').html('<option value="">Select City Again </option>');
  }
  //$('#state').val(state);
  //$('#state').text(state);
  //document.getElementById("state").value = '$("select[name='state'] option:selected").text()';
 });


$('#city').OnClick(function(){
  alert("nnnnnn");
  var state_id = $('#state').val();
  //var state= $("select[name='state'] option:selected").text();
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>student/fetch_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
     $('#city').html(data);
    }
   });
  }
  else
  {
   $('#city').html('<option value="">Select City Again </option>');
  }
 });

});
</script>
<?php //include('footer.php'); ?>