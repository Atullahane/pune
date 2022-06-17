<?php include('header.php'); ?>

<div class="container" style="margin-top:20px;">
<h1>Add student</h1>

   <?php echo form_open_multipart('student/studentValidation'); ?>
   <?php //echo form_hidden('user_id',$this->session->userdata('id'));
    ?>

   <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="Title">Name:</label>
          <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter name','name'=>'name','value'=>set_value('name')]);  ?>
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
          <Select name="gender" id="gender" class="form-control" value="<?php set_value('gender')?>" style="padding: 1;">
            <option value="">Select</option> 
            <option value="Mail">Mail</option>
            <option value="Femail">Femail</option>
          <select>

          <?php //echo form_input(['class'=>'form-control','placeholder'=>'Enter gender','name'=>'gender','value'=>set_value('gender')]);  ?>
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
          <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter email','name'=>'email','value'=>set_value('email')]);  ?>
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
          <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter password','name'=>'password','value'=>set_value('password')]);  ?>
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
            <option value="">Select</option>
            <?php
            foreach($state as $row)
            {
             echo '<option value="'.$row->state_id.'">'.$row->state.'</option>';
            } 
            ?>
            <!-- <option value="Maharashtra">Maharashtra</option>
            <option value="Karnataka">Karnataka</option> -->
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
            <option value="">Select city</option>
            <!-- <option value="Pune">Pune</option>
            <option value="Jalna">Jalna</option> -->
          <select>
          <!-- <?php //echo form_input(['class'=>'form-control','placeholder'=>'Enter city','name'=>'city','value'=>set_value('city')]);  ?> -->
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
          <!-- <select name="myselect">
            <option value="one" <?php //echo  set_select('myselect', 'one', TRUE); ?> >One</option>
            <option value="two" <?php //echo  set_select('myselect', 'two'); ?> >Two</option>
            <option value="three" <?php //echo  set_select('myselect', 'three'); ?> >Three</option>
          </select> -->

          <Select name="branch" id="branch" class="form-control" value="<?php set_value('branch')?>" style="padding: 1;">
            <option value="">Select</option>
            <option value="Art">Art</option>
            <option value="science">science</option>
            <option value="commerce">commerce</option>
          <select>
          <!-- <?php //echo form_input(['class'=>'form-control','placeholder'=>'Enter branch','name'=>'branch','value'=>set_value('branch')]);  ?> -->
        </div>
      </div>
        <div class="col-lg-6" style="margin-top:40px;">
         <?php  echo form_error('branch');  ?>
        </div>
    </div>
 
  <?php  echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Update']);  ?>
  <?php  echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);  ?>

</div>

<script>

$(document).ready(function(){

$('#state').change(function(){
  var state_id = $('#state').val();
  //var state = document.getElementById("state");
  //var state = $row->state;
  var state= $("select[name='state'] option:selected").text();
  //alert(state);
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>student/fetch_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {

  //alert("jjjjjjjj");
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
});
</script>
<?php //include('footer.php'); ?>