<h1>Projects</h1>

<?php if($this->session->flashdata('login_success')) : ?>
    <p class="alert alert-success"><?php echo $this->session->flashdata('login_success'); ?></p>
<?php endif; ?>
<?php if($this->session->flashdata('project_created')) : ?>
    <p class="alert alert-success"><?php echo $this->session->flashdata('project_created'); ?></p>
<?php endif; ?>

<?php if($this->session->flashdata('project_updated')) : ?>
    <p class="alert alert-success"><?php echo $this->session->flashdata('project_updated'); ?></p>
<?php endif; ?>

<?php if($this->session->flashdata('project_deleted')) : ?>
    <p class="alert alert-success"><?php echo $this->session->flashdata('project_deleted'); ?></p>
<?php endif; ?>

<a href="<?php echo base_url(); ?>projects/create" class="btn btn-primary pull-right">Create project</a>
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
                <td><a class="btn btn-danger" href="<?php echo base_url(); ?>projects/delete/<?php echo $project->id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
    	<?php endforeach; ?>
        
    </tbody>
</table>