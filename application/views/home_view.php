<h1>User projects</h1>

<?php if($this->session->flashdata('login_success')) : ?>
	<div class="alert alert-success"><?php echo $this->session->flashdata('login_success'); ?></div>
<?php endif; ?>


<?php if($this->session->flashdata('login_failed')) : ?>
	<div class="alert alert-danger"><?php echo $this->session->flashdata('login_failed'); ?></div>
<?php endif; ?>


<?php if($this->session->flashdata('user_registered')) : ?>
	<div class="alert alert-success"><?php echo $this->session->flashdata('user_registered'); ?></div>
<?php endif; ?>


<?php if($this->session->flashdata('no_access')) : ?>
	<div class="alert alert-danger"><?php echo $this->session->flashdata('no_access'); ?></div>
<?php endif; ?>


<?php if($this->session->userdata('logged_in')) : ?>
	
	<?php 
	$user_id = $this->session->userdata('user_id');
	$projects = $this->project_model->get_user_projects($user_id);
	?>


	<table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Project name</th>
                <th>Project body</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach ($projects as $project) : ?>
        	
	            <tr>
	                <td><?php echo $project->id; ?></td>
	                <td><a href="<?php echo base_url(); ?>projects/display/<?php echo $project->id; ?>"><?php echo $project->project_name; ?></a></td>
	                <td><?php echo $project->project_body ?></td>
                    <td><a  href="<?php echo base_url(); ?>projects/display/<?php echo $project->id; ?>">View</a></td>
	            </tr>
        	<?php endforeach; ?>
            
        </tbody>
    </table>
<?php endif; ?>