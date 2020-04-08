
<h2> Register </h2>

<?php $attributes = array('id'=>'register_form', 'class'=> 'form_horizontal') ?>

<?= validation_errors("<p class='bg-danger'>"); 
// you set the validations in users controller register method. 
?>


<?php echo form_open('users/register', $attributes);
// https://codeigniter.com/user_guide/helpers/form_helper.html?highlight=form_open#form_open
// parameters are (action = string, $attributes = array of HTML attributes)
?>

<div class="form-group">

<?php echo form_label('First Name');?>

<?php 

$data = array(
'name'          => 'first_name',
'class'            => 'form-control',
'placeholder'         => 'Enter First Name',

);

?>

<?php echo form_input($data);?>

</div>

<div class="form-group">

<?php echo form_label('Last Name');?>

<?php 

$data = array(
'name'          => 'last_name',
'class'            => 'form-control',
'placeholder'         => 'Enter Last Name',

);

?>

<?php echo form_input($data);?>

</div>

<div class="form-group">

<?php echo form_label('Email');?>

<?php 

$data = array(
'name'          => 'email',
'class'            => 'form-control',
'placeholder'         => 'Enter email',

);

?>

<?php echo form_input($data);?>

</div>

<div class="form-group">

<?php echo form_label('Username');?>

<?php 

$data = array(
'name'          => 'username',
'class'            => 'form-control',
'placeholder'         => 'Enter Username',

);

?>

<?php echo form_input($data);?>



</div>

<div class="form-group">

<?php echo form_label('Password');?>

<?php 

$data = array(
'name'          => 'password',
'class'            => 'form-control',
'placeholder'         => 'Enter Password',

);

?>

<?php echo form_password($data);?>

</div>

<div class="form-group">

<?php echo form_label('Confirm Password');?>

<?php 

$data = array(
'name'          => 'confirm password',
'class'            => 'form-control',
'placeholder'         => 'Confirm Password',

);

?>

<?php echo form_password($data);?>

</div>

<div class="form-group">

<?php 

$data = array(
'name'          => 'submit',
'class'            => 'btn btn-primary',
'value'         => 'Register',

);

?>

<?php echo form_submit($data);?>

</div>

<?php echo form_close();?>
