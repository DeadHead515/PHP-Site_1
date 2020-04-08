<div class="col-xs-9">
    
    <h1>Project Name: <?= $project_data->project_name; ?></h1>

    <h6>Date Created: <?= $project_data->date_created; ?></h6>
    
    <h3>Description: </h3>
    <p><?= $project_data->project_body; ?></p>
    
</div>
<div class="col-xs-3 pull-right">
    <ul class="list-group">

        <h4> Project Actions </h4>

        
        
        <li class="list-group-item"><a href="">Create Task</a></li>
        <li class="list-group-item"><a href="<?=site_url('projects/edit/'.$project_data->id);?>">Edit Project</a></li>
        <li class="list-group-item"><a href="<?=site_url('projects/delete/'.$project_data->id);?>">Delete Project</a></li>

    </ul>
</div>