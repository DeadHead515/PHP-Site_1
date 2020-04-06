<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap.min.css">
    <script src="<?= base_url();?>assets/js/jquery.js"></script>
    <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= site_url('home');?>">Jedi</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?= site_url('home');?>">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="<?= site_url('projects');?>">Projects <span class="sr-only">(current)</span></a></li>  
        <li><a href="<?= site_url('users/register');?>">Register <span class="sr-only">(current)</span></a></li>
        <li><a href="<?= site_url('weather');?>">Weather<span class="sr-only">(current)</span></a></li>
        <li><a href="<?= site_url('weather');?>">Pagination<span class="sr-only">(current)</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if($this->session->userdata('logged_in')):?>
          <!-- ^^User log out session based on if the user is logged in^^. we took this from our login view. -->
          <li><a href="<?=site_url();?>/users/logout">Logout</a></li>
        
        <?php endif; ?>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <div class="container">
    
    
        <div class="col-xs-3">
        
        <?php $this->load->view('users/login_view'); ?>

        </div>
        <div class="col-xs-9">
        <?php $this->load->view($main_view); ?>
        
        </div>
    </div>
</body>
</html>