<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DSS - <?php echo $page_title;?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('/assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/datatables/jquery.dataTables.min.css') ?>" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url();?>">DSS System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url();?>calculate/resetdata">Reset Data</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="list-group">
              <a href="<?php echo base_url();?>" class="list-group-item">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                Dashboard
              </a>
              <p class="list-group-item">
                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                Master Data
              </p>
              <a href="<?php echo base_url();?>alternatif" class="list-group-item">
                <span class="glyphicon glyphicon-file" aria-hidden="true" style="margin-left:20px"></span>
                Alternatif
              </a>
              <a href="<?php echo base_url();?>kriteria" class="list-group-item">
                <span class="glyphicon glyphicon-file" aria-hidden="true" style="margin-left:20px"></span>
                Kriteria
              </a>
              <a href="<?php echo base_url();?>rating" class="list-group-item">
                <span class="glyphicon glyphicon-file" aria-hidden="true" style="margin-left:20px"></span>
                Rating
              </a>
              <p class="list-group-item">
                <span class="glyphicon glyphicon-hdd" aria-hidden="true"></span>
                Proses
              </p>
              <a href="<?php echo base_url();?>topsis" class="list-group-item">
                <span class="glyphicon glyphicon-tasks" aria-hidden="true" style="margin-left:20px"></span>
                TOPSIS
              </a>
              <a href="<?php echo base_url();?>promethee" class="list-group-item">
                <span class="glyphicon glyphicon-tasks" aria-hidden="true" style="margin-left:20px"></span>
                PROMETHEE
              </a>
              <a href="<?php echo base_url();?>borda" class="list-group-item">
                <span class="glyphicon glyphicon-tasks" aria-hidden="true" style="margin-left:20px"></span>
                BORDA
              </a>
              <a href="<?php echo base_url();?>evaluasi" class="list-group-item">
                <span class="glyphicon glyphicon-tasks" aria-hidden="true" style="margin-left:20px"></span>
                Evaluasi
              </a>
            </div>
          </div>

          <div class="col-md-10">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title"><?php echo $page_title;?></h3>
              </div>