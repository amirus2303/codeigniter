
<h2>Register</h2>
<?php  if(validation_errors()) : ?>
	<div class="alert alert-danger"><?php echo validation_errors(); ?></div>   

<?php endif; ?>



<?php $attributes = array(
	'id'    => 'register_form',
	'class' => 'form_horizontal'
); 
?>


<?php echo form_open('users/register', $attributes); ?>

	<div class="form-group">
		<?php echo form_label('First name'); ?>
		<?php 
		$data = array(
			'class' => 'form-control',
			'name'  => 'first_name',
			'placeholder'  => 'Enter your firstname',
			);

		echo form_input($data); 
		?>
	</div>


	<div class="form-group">
		<?php echo form_label('Last name'); ?>
		<?php 
		$data = array(
			'class' => 'form-control',
			'name'  => 'last_name',
			'placeholder'  => 'Enter your lastname',
			);

		echo form_input($data); 
		?>
	</div>


	<div class="form-group">
		<?php echo form_label('Email'); ?>
		<?php 
		$data = array(
			'class' => 'form-control',
			'name'  => 'email',
			'placeholder'  => 'Enter your email',
			);

		echo form_input($data); 
		?>
	</div>





	<div class="form-group">
		<?php echo form_label('Username'); ?>
		<?php 
		$data = array(
			'class' => 'form-control',
			'name'  => 'username',
			'placeholder'  => 'Enter a username',
			);

		echo form_input($data); 
		?>
	</div>


	<div class="form-group">
		<?php echo form_label('Password'); ?>
		<?php 
		$data = array(
			'class' => 'form-control',
			'name'  => 'password',
			'placeholder'  => 'Enter a password',
			);

		echo form_password($data); 
		?>
	</div>


	<div class="form-group">
		<?php echo form_label('Confirm password'); ?>
		<?php 
		$data = array(
			'class' => 'form-control',
			'name'  => 'confirm_password',
			'placeholder'  => 'Confirm a password',
			);

		echo form_password($data); 
		?>
	</div>


	<div class="form-group">
		<?php 
		$data = array(
			'class' => 'btn btn-primary',
			'name'  => 'submit',
			'value'  => 'Register',
			);

		echo form_submit($data); 
		?>
	</div>
<?php echo form_close(); ?>

