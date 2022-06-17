<?php include('header.php'); ?>

<div class="container" style="margin-top:50px;"">
	<div class="row">
	<?=   anchor('student/add','Add',['class'=>'btn btn-lg btn-primary'])  ?>
</div>


<div class="container" style="margin-top:50px;">
	<?php  if($msg=$this->session->flashdata('msg')): 

	$msg_class=$this->session->flashdata('msg_class')

	?>
	<div class="row">
		<div class="col-lg-6">
			<div class="alert <?= $msg_class ?>">
			<?= $msg; ?>
			</div>
		</div>
	</div>
	 
	<?php endif; ?>

</div>

<?php echo $this->db->last_query(); ?>
<div class="table">
	<table>
		<thead>
			<tr>
			<th>S.no</th>
			<th>name</th>
			<th>gender</th>
			<th>email</th>
			<th>password</th>
			<th>state</th>
			<th>city</th>
			<th>branch</th>
			<th>Edit</th>
			<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		 <?php if(count($studentdata)):
		 $count=$this->uri->segment(3); 
		 ?> 
		<?php foreach ($studentdata as $student): ?>
		<tr>
			   
	        <td><?=    ++$count; ?></td>
			<td><?=  $student->name; ?></td>
			<td><?=  $student->gender; ?></td>
			<td><?=  $student->email; ?></td>
			<td><?=  $student->password; ?></td>
			<td><?=  $student->state; ?></td>
			<td><?=  $student->city; ?></td>
			<td><?=  $student->branch; ?></td>
			<td><?=  anchor("student/editstudent/{$student->id}",'Edit',['class'=>'btn btn-default']);  ?></td>
			
			<td>
	        <?=
	        form_open('student/delstudent'),//delarticles
	        form_hidden('id',$student->id),
	        form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
	        form_close();

	        ?>
	      	</td>
		</tr>
			<?php endforeach; ?>
			<?php else: ?>
			<tr>
			<td colspan="3">Not data available</td>
			</tr>
		   <?php endif; ?>
		</tbody>
	</table>
	<?php // echo $this->pagination->create_links();   ?> 
	</div>





</div>
