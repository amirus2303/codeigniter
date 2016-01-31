<div class="col-xs-9">
	<?php if($this->session->flashdata('task_created')) : ?>
		<p class="alert alert-success"><?php echo  $this->session->flashdata('task_created'); ?></p>
	<?php endif; ?>


    <?php if($this->session->flashdata('task_updated')) : ?>
        <p class="alert alert-success"><?php echo  $this->session->flashdata('task_updated'); ?></p>
    <?php endif; ?>


    <?php if($this->session->flashdata('task_deleted')) : ?>
        <p class="alert alert-success"><?php echo  $this->session->flashdata('task_deleted'); ?></p>
    <?php endif; ?>



	<h1><?php echo $project_data->project_name; ?></h1>
	<small>Created on : <?php echo $project_data->date_created; ?></small>
	<h3 class="margin-top-40">Description</h3>
	<p ><?php echo $project_data->project_body; ?></p>
	
	<hr />

	<h2>Project Tasks</h2>
	<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Task name</th>
            <th>Task body</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<?php foreach ($tasks as $task) : ?>
    	
            <tr>
                <td><?php echo $task->id; ?></td>
                <td><a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->id; ?>"><?php echo $task->task_name; ?></a></td>
                <td><?php echo $task->task_body ?></td>
                <td><a class="btn btn-danger" href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
    	<?php endforeach; ?>
        
    </tbody>
</table>

</div>

<div class="col-xs-3">
	<ul class="list-group">
		<h3>Project action</h3>
		<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/create/<?php  echo $project_data->id; ?>">Create task</a></li>
		<li class="list-group-item"><a href="<?php echo base_url(); ?>projects/edit/<?php echo $project_data->id; ?>">Edit project</a></li>
		<li class="list-group-item"><a href="<?php echo base_url(); ?>projects/delete/<?php echo $project_data->id; ?>">Delete project</a></li>
	</ul>
</div>
