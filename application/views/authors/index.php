<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap.min.css">
    <script src="<?= base_url();?>assets/js/jquery.js"></script>
    <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
    <title>Jedi Pagination</title>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= site_url('home');?>">Jedi</a>
    </div>

    
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
          <!-- ^^User log out session currently true^^. originated in login view. -->
          <li><a href="<?=site_url();?>/users/logout">Logout</a></li>
        
        <?php endif; ?>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class='container'>
<body>
<h2>Random User Data Table</h2>
    <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Number</th>
                    <th>Email</th>
                    <th>Birthdate</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($authors as $author): ?>
                            <tr>
                                <td><?= $author->id ?></td>
                                <td><?= $author->first_name ?></td>
                                <td><?= $author->last_name ?></td>
                                <td><?= $author->email ?></td>
                                <td><?= $author->birthdate ?></td>
                            </tr>
                        <?php endforeach; ?>
              </tbody>
            </table>
            <p><?php echo $links; ?></p>
        </body>
    </div>