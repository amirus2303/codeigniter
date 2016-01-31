<h1>Edit project</h1>
<?php $attributes = array(
	'id'    => 'project_form',
	'class' => 'form_horizontal'
); 
?>
<?php echo form_open('projects/edit/'.$project_data->id, $attributes); ?>
		<div class="form-group">
			<?php echo form_label('Project Name'); ?>
			<?php 
			$data = array(
				'class'       => 'form-control',
				'name'        => 'project_name',
				'placeholder' => 'Enter a project name',
				'value'       => $project_data->project_name
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
				'value'       => $project_data->project_body
				);

			echo form_textarea($data); 
			?>
		</div>



		<div class="form-group">
			<?php 
			$data = array(
				'class' => 'btn btn-primary',
				'name'  => 'submit',
				'value'  => 'Update',
				);

			echo form_submit($data); 
			?>
		</div>
	<?php echo form_close(); ?>