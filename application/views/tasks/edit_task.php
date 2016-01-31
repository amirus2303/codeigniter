<?php if($this->session->flashdata('task_errors')): ?>
	<div class="alert alert-danger"><?php echo $this->session->flashdata('task_errors'); ?></div>
<?php endif; ?>

<h1>Edit task</h1>
<?php $attributes = array(
	'id'    => 'task_form',
	'class' => 'form_horizontal'
); 
?>
<?php echo form_open('tasks/edit/'.$task_data->id, $attributes); ?>
		<div class="form-group">
			<?php echo form_label('task Name'); ?>
			<?php 
			$data = array(
				'class'       => 'form-control',
				'name'        => 'task_name',
				'value' => $task_data->task_name
				);

			echo form_input($data); 
			?>
		</div>


		<div class="form-group">
			<?php echo form_label('task description'); ?>
			<?php 
			$data = array(
				'class'       => 'form-control',
				'name'        => 'task_body',
				'value' => $task_data->task_body
				);

			echo form_textarea($data); 
			?>
		</div>


		<div class="form-group">
			<?php echo form_label('Due date'); ?>
			<?php 
			$data = array(
				'class' => 'form-control',
				'name'  => 'due_date',
				'type'  => 'date',
				'value' => $task_data->due_date
				);

			echo form_input($data); 
			?>
		</div>



		<div class="form-group">
			<?php 
			$data = array(
				'class' => 'btn btn-primary',
				'name'  => 'submit',
				'value' => 'Update',
				);

			echo form_submit($data); 
			?>
		</div>
	<?php echo form_close(); ?>