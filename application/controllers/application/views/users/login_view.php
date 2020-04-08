<?php if($this->session->userdata('logged_in')): ?>

    <h2> Logout </h2>
    <?php echo form_open('users/logout'); ?>
    <p>
    <?php if($this->session->userdata('username')): ?>
    
        <?php echo "You are logged in as " . $this->session->userdata('username'); ?>
    <?php endif; ?>
    </p>
    
    <?php
        $data = array(
            'class'=> 'btn btn-primary',
            'name'=> 'submit',
            'value'=> 'Logout'
        );
    ?>
    <?php echo form_submit($data); ?>
    <?php echo form_close();?>
    <?php else: ?>

<h2> Login form </h2>

<?php $attributes = array('id'=>'login_form', 'class'=> 'form_horizontal') ?>

<?php if($this->session->flashdata('errors')): ?>

<?php echo $this->session->flashdata('errors');?>

<?php endif; ?>    

<?php echo form_open('users/login', $attributes);
// https://codeigniter.com/user_guide/helpers/form_helper.html?highlight=form_open#form_open
// parameters are (action = string, $attributes = array of HTML attributes)
?>

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
    'value'         => 'Login',
    
);

?>

<?php echo form_submit($data);?>

</div>

<?php echo form_close();?>


    
<?php endif; ?>