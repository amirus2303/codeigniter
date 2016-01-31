<h1>Tasks</h1>

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