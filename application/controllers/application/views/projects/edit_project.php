<h2> Edit Project </h2>

<?php $attributes = array('id'=>'create_form', 'class'=> 'form_horizontal'); ?>

<?= validation_errors("<p class='bg-danger'>"); 
// you set the validations in users controller register method. 
?>


<?php echo form_open('projects/edit/'.$project_data->id, $attributes);
// https://codeigniter.com/user_guide/helpers/form_helper.html?highlight=form_open#form_open
// parameters are (action = string, $attributes = array of HTML attributes)
?>

<div class="form-group">

<?php echo form_label('Project Name');?>

<?php 

$data = array(
'name'          => 'project_name',
'class'            => 'form-control',
'value'         => $project_data->project_name,

);

?>

<?php echo form_input($data);?>

</div>

<div class="form-group">

<?php echo form_label('Project Description');?>

<?php 

$data = array(

    'class'         => 'form-control',    
    'name'          => 'project_body',
    'value'         => $project_data->project_body


);

?>

<?= form_textarea($data);?>

</div>

<div class="form-group">

<?php 

$data = array(
'name'          => 'submit',
'class'            => 'btn btn-primary',
'value'         => 'Update',

);

?>

<?php echo form_submit($data);?>

</div>

<?php echo form_close();?>
