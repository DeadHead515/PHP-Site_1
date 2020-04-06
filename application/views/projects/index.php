<h1> Projects </h1>

<p class="bg-success">
    <?php  if($this->session->flashdata('project_created')): ?>
    
    <?= $this->session->flashdata('project_created'); ?>  
       
    <?php endif; ?>

    <?php  if($this->session->flashdata('project_updated')): ?>
    
    <?= $this->session->flashdata('project_updated'); ?>  
       
    <?php endif; ?>

    <?php  if($this->session->flashdata('project_deleted')): ?>
    
    <?= $this->session->flashdata('project_deleted'); ?>  
       
    <?php endif; ?>
</p>

<table class= "table table-hover">
    <a class="btn btn-primary pull-right" href="<?=site_url('projects/create');?>">Create Project</a>
    <thead>
        <tr>
            <th>
            Project Name
            </th>
            <th>
            Project body
            </th>
        </tr>
    </thead>
    <tbody>
        
        <?php foreach($projects as $project): ?>
        
        <tr>
        
        <?= "<td><a href='". site_url() ."/projects/display/".$project->id."'>" . $project->project_name . "</a></td>"; ?>
        <?= "<td>" . $project->project_body . "</td>"; ?>    
        <td><a class="btn btn-danger btn-sm" href="<?=site_url('projects/delete/'.$project->id);?>"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>

        <?php endforeach; ?>    


    </tbody>



</table>