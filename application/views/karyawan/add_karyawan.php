<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <?php $this->load->view('inc/head'); ?>
  
</head>
<body class="skin-blue">
  <!-- wrapper di bawah footer -->
  <div class="wrapper">

    <?php $this->load->view('inc/head2'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php $this->load->view('inc/sidebar'); ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA KARYAWAN</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM TAMBAH KARYAWAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>karyawan/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">NIK</label>
                        <input type="text" class="form-control" value="" id="" name="nik" placeholder="" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nama</label>
                        <input type="text" class="form-control" value="" id="" name="nama_kar" placeholder="" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">NO HP</label>
                        <input type="text" class="form-control" value="" id="" name="nohp" placeholder="" required>                        
                    </div>                    
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Divisi</label>
                        <select name="id_div" class="form-control" required>
                          <option>--Pilih Divisi--</option>
                          <?php foreach($optdivisi as $row) { ?>
                              <option value="<?php echo $row['id_div'] ?>"><?php echo $row['divisi'] ?></option>
                          <?php } ?>
                        </select> 
                    </div>
                    <div class="form-group">
                      <label for="">Pekerjaan</label>
                        <input type="text" class="form-control" value="" id="" name="pekerjaan" placeholder="" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">Foto</label>
                        <input type="file" class="form-control" value="" id="" name="file_upload" placeholder="">                        
                    </div>
                    
                  </div>
                  
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>karyawan" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.0 -->
      </div>
      <strong>Copyright &copy; 2018 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->
  

    
    <?php $this->load->view('inc/footer'); ?>
</body>
</html>