<h1>Create project</h1>
<?php $attributes = array(
	'id'    => 'project_form',
	'class' => 'form_horizontal'
); 
?>
<?php echo form_open('projects/create', $attributes); ?>
		<div class="form-group">
			<?php echo form_label('Project Name'); ?>
			<?php 
			$data = array(
				'class' => 'form-control',
				'name'  => 'project_name',
				'placeholder'  => 'Enter a project name',
				);

			echo form_input($data); 
			?>
		</div>


		<div class="form-group">
			<?php echo form_label('Project description'); ?>
			<?php 
			$data = array(
				'class' => 'form-control',
				'name'  => 'project_body',
				'placeholder'  => 'Enter a project description',
				);

			echo form_textarea($data); 
			?>
		</div>



		<div class="form-group">
			<?php 
			$data = array(
				'class' => 'btn btn-primary',
				'name'  => 'submit',
				'value'  => 'Create',
				);

			echo form_submit($data); 
			?>
		</div>
	<?php echo form_close(); ?>