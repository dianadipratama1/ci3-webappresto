<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Resto Kita</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/bootstrap.min.css" /><!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>font-awesome/4.5.0/css/font-awesome.min.css" /><!-- bootstrap & fontawesome -->

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/fonts.googleapis.com.css" /><!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" /><!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/ace-rtl.min.css" />

    <script src="<?php echo base_url('assets/');?>js/ace-extra.min.js"></script>
  </head>

  <body class="no-skin">
    <div id="navbar" class="navbar navbar-default          ace-save-state">
      <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
          <span class="sr-only">Toggle sidebar</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
          <a href="template/blank.php" class="navbar-brand">
            <small>
              <i class="fa fa-leaf"></i>
                Resto Kita
            </small>
          </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
          <li class="light-blue dropdown-modal">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
              <img class="nav-user-photo" src="<?php echo base_url('assets/');?>images/avatars/user3.png" alt="Jason's Photo" />
              <span class="user-info">
                <?php if ($this->session->userdata('id_level')==1) {?>
                <!-- <?php echo "<font color='white'>Admin</font>"?>; -->
                <small><?php echo "<font color='white'>Admin</font>" ?></small>
                <?php }else{ ?>
                <!-- <?php echo "<font color='white'>Kasir</font>"?>; -->
                <small><?php echo "<font color='white'>Kasir</font>" ?></small>
                <?php }?>
                
                  <?php echo "<font color='white'>".strtoupper($this->session->userdata('nama_user'))."</font>";?>
              </span>
              <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
              <li>
                <a href="#">
                  <i class="ace-icon fa fa-cog"></i>
                  Settings
                </a>
              </li>

              <li>
                <a href="profile.html">
                  <i class="ace-icon fa fa-user"></i>
                  Profile
                </a>
              </li>

              <li class="divider"></li>
                <li>
                  <a href="<?php echo base_url('index.php/Login/logout') ?>">
                    <i class="ace-icon fa fa-power-off"></i>
                    Logout
                  </a>
                </li>
            </ul>
          </li>
        </div>
      </div> <!--/navbar-container-->
    </div>

    