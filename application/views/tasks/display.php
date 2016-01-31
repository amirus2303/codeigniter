<h1><?php echo $task->task_name; ?></h1>
<small>Created on: <?php echo $task->date_created; ?></small>



<table class="table table-hover margin-top-40">
    <thead>
        <tr>
            <th>#</th>
            <th>Task name</th>
            <th>Task Description</th>
            <th>Due Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	
    	
        <tr>
            <td><?php echo $task->id; ?></td>
            <td><?php echo $task->task_name; ?></td>
            <td><?php echo $task->task_body; ?></td>
            <td><?php echo $task->due_date; ?></td>
            <td>
            	<a class="btn btn-danger" href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
            	<a class="btn btn-primary" href="<?php echo base_url(); ?>tasks/edit/<?php echo $task->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
            </td>
        </tr>

        
    </tbody>
</table>