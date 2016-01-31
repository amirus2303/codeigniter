<?php if($this->session->flashdata('task_errors')): ?>
	<div class="alert alert-danger"><?php echo $this->session->flashdata('task_errors'); ?></div>
<?php endif; ?>

<h1>Create task</h1>
<?php $attributes = array(
	'id'    => 'task_form',
	'class' => 'form_horizontal'
); 
?>
<?php echo form_open('tasks/create/'.$project_id, $attributes); ?>
		<div class="form-group">
			<?php echo form_label('task Name'); ?>
			<?php 
			$data = array(
				'class'       => 'form-control',
				'name'        => 'task_name',
				'placeholder' => 'Enter a task name',
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
				'placeholder' => 'Enter a task description',
				);

			echo form_textarea($data); 
			?>
		</div>


		<div class="form-group">
			<?php echo form_label('Due date'); ?>
			<?php 
			$data = array(
				'class'       => 'form-control',
				'name'        => 'due_date',
				'placeholder' => 'Enter a due date',
				'type'        => 'date'
				);

			echo form_input($data); 
			?>
		</div>



		<div class="form-group">
			<?php 
			$data = array(
				'class' => 'btn btn-primary',
				'name'  => 'submit',
				'value' => 'Create',
				);

			echo form_submit($data); 
			?>
		</div>
	<?php echo form_close(); ?>