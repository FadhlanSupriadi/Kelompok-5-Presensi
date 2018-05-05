<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Indocement Tunggal Prakarsa Discipline System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url()?>absen/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>absen/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url()?>absen/css/stylesheet.css" rel="stylesheet">
     <script src="<?php echo base_url()?>absen/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url()?>absen/js/jquery-ui-1.10.3.js"></script>
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>
<div id="infodlg" style="display:none"></div> 
    <header class="dark_grey"> <!-- Header start -->
        <a href="#" class="logo_image"><span class="hidden-480">PRESENSI</span></a>
        <ul class="header_actions pull-left hidden-480 hidden-768">
            <li rel="tooltip" data-placement="bottom" title="Hide/Show main navigation" ><a href="#" class="hide_navigation"><i class="icon-chevron-left"></i></a></li>
            <li rel="tooltip" data-placement="right" title="Change navigation color scheme" class="color_pick navigation_color_pick"><a class="iconic" href="#"><i class="icon-th"></i></a>
                <ul>
                    <li><a class="blue" href="#"></a></li>
                    <li><a class="light_blue" href="#"></a></li>
                    <li><a class="grey" href="#"></a></li>
                    <li><a class="dark_grey" href="#"></a></li>
                    <li><a class="pink" href="#"></a></li>
                    <li><a class="red" href="#"></a></li>
                    <li><a class="orange" href="#"></a></li>
                    <li><a class="yellow" href="#"></a></li>
                    <li><a class="green" href="#"></a></li>
                    <li><a class="dark_green" href="#"></a></li>
                    <li><a class="turq" href="#"></a></li>
                    <li><a class="dark_turq" href="#"></a></li>
                    <li><a class="purple" href="#"></a></li>
                    <li><a class="violet" href="#"></a></li>
                    <li><a class="dark_blue" href="#"></a></li>
                    <li><a class="dark_red" href="#"></a></li>
                    <li><a class="brown" href="#"></a></li>
                    <li><a class="black" href="#"></a></li>
                    <a class="dark_navigation" href="#">Dark navigation</a>
                </ul>
            </li>
        </ul>
        <ul class="header_actions">
            <li rel="tooltip" data-placement="left" title="Header color scheme" class="color_pick header_color_pick hidden-480"><a class="iconic" href="#"><i class="icon-th"></i></a>
                <ul>
                    <li><a class="blue set_color" href="#"></a></li>
                    <li><a class="light_blue set_color" href="#"></a></li>
                    <li><a class="grey set_color" href="#"></a></li>
                    <li><a class="dark_grey set_color" href="#"></a></li>
                    <li><a class="pink set_color" href="#"></a></li>
                    <li><a class="red set_color" href="#"></a></li>
                    <li><a class="orange set_color" href="#"></a></li>
                    <li><a class="yellow set_color" href="#"></a></li>
                    <li><a class="green set_color" href="#"></a></li>
                    <li><a class="dark_green set_color" href="#"></a></li>
                    <li><a class="turq set_color" href="#"></a></li>
                    <li><a class="dark_turq set_color" href="#"></a></li>
                    <li><a class="purple set_color" href="#"></a></li>
                    <li><a class="violet set_color" href="#"></a></li>
                    <li><a class="dark_blue set_color" href="#"></a></li>
                    <li><a class="dark_red set_color" href="#"></a></li>
                    <li><a class="brown set_color" href="#"></a></li>
                    <li><a class="black set_color" href="#"></a></li>
                </ul>
            </li>
            
            
            </li>
            <li><a href="<?php echo base_url() ?>login"><i class="icon-signout"></i> <span class="hidden-768 hidden-480">Login</span></a></li>
            <li class="responsive_menu"><a class="iconic" href="#"><i class="icon-reorder"></i></a></li>
        </ul>
    </header>

    <div id="main_navigation" class="dark_grey"> <!-- Main navigation start -->
      <div class="inner_navigation">
        <ul class="main">
          <li><a href="<?php echo base_url() ?>home"><i class="icon-tasks"></i> Masuk</a></li>
          <li><a href="<?php echo base_url() ?>home/pulang"><i class="icon-tasks"></i>Pulang</a></li>
          <!-- <li><a href="<?php echo base_url() ?>home/listabsen"><i class="icon-tasks"></i>History Presensi</a></li> -->
        </ul>
      </div>
    </div>

    <div id="content"> <!-- Content start -->
      <div class="inner_content">
        <div class="widgets_area">
				<br><br>
				<h1><?php echo $judul; ?></h1>
                <div class="row-fluid" id="isiContent">
					 <?php $this->load->view($view); ?>
                </div>
            </div>
        </div>
    </div>

   

  </body>
</html>
