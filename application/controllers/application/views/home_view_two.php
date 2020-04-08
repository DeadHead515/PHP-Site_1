
<p class="bg-success">
    <?php  if($this->session->flashdata('login_success')): ?>
    
    <?= $this->session->flashdata('login_success'); ?>  
       
    <?php endif; ?>

   


    <?php  if($this->session->flashdata('user_registered')): ?>
    
    <?= $this->session->flashdata('user_registered'); ?>  
       
    <?php endif; ?>

</p>

<p class="bg-danger">
    <?php  if($this->session->flashdata('login_failed')): ?>
    
    <?= $this->session->flashdata('login_failed'); ?>  
       
    <?php endif; ?>

    <?php  if($this->session->flashdata('no_access')): ?>
    
    <?= $this->session->flashdata('no_access'); ?>  
       
    <?php endif; ?>

        

</p>
<?php if(!isset($projects)):?>
<div class="jumbotron">
<h2 class="text-center"> Imperial Home Page </h2>

<p class="text-center"> Welcome Sith lords... </p>
</div>
<?php endif;?>

<?php if(isset($projects)): ?>
<h1> Imperial project page </h1>

<br> 

<table class= "table table-hover">
    <a class="btn btn-primary pull-right" href="<?=site_url('projects/create');?>">Create Project</a>
    <thead>
        <tr>
            <th>
            Project Name
            </th>
            <th>
            Project Description
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

        <?php endif; ?>