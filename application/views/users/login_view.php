<?php if($this->session->userdata('logged_in')) : ?>
	<h2>Logout </h2>
	<h4> You are logged in as <?php echo $this->session->userdata('user_name'); ?></h4>
	<?php echo form_open('users/logout'); ?>
		<div class="form-group">
			<?php 
			$data = array(
				'class' => 'btn btn-primary',
				'name'  => 'logout',
				'value'  => 'Logout',
				);

			echo form_submit($data); 
			?>
		</div>
	<?php echo form_close(); ?>
	
<?php else: ?>
	<h2>Login form</h2>
	<?php if($this->session->flashdata('errors')) : ?>
		<div class="alert alert-danger"><?php  echo $this->session->flashdata('errors'); ?></div>
	
	<?php endif; ?>



	<?php $attributes = array(
		'id'    => 'login_form',
		'class' => 'form_horizontal'
	); 
	?>


	<?php echo form_open('users/login', $attributes); ?>
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
				'value'  => 'Login',
				);

			echo form_submit($data); 
			?>
		</div>
	<?php echo form_close(); ?>

<?php endif; ?>
