<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $judul; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/vendor/font-awesome/css/fontawesome-all.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/dataTable4.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/styles.css">
</head>
<body class="sidebar-hidden header-fixed sidebar-fixed">
<div class="page-wrapper">
    
    <?php echo $head; ?>

    <div class="main-container">
        
        <?php echo $navigasi; ?>

        <div class="content">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php echo $this->session->flashdata('notifikasi'); ?>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    
                    <h2>Data Cuti Pegawai [ <?php echo $this->M_cuti->getLabelPeriode() ?> ]
                    	<div title="Mode Edit" class="toggle-switch" data-ts-color="danger">
                            <input id="ts7" name="mode" type="checkbox" <?php echo ($this->session->userdata('edit') == 'on')? 'checked' : ''; ?> hidden="hidden">
                            <label for="ts7" class="ts-helper"></label>
                            <label for="ts7" class="ts-label"></label>
                        </div>
                        <div class="clearfix"></div>
                    </h2>
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="#tambah" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i></a> 
                                    <button class="export btn btn-success"><i class="fa fa-file-excel-o"></i></button>
                                    <a target="_blank" href="<?php echo base_url('cuti/pdf') ?>" class="btn btn-warning"><i class="fa fa-file-pdf-o"></i></a>
                                </div>
                                <div class="col-md-4">
                                    <form action="<?php echo base_url('cuti/filter') ?>" method="POST">
                                        <div class="input-group">
                                            <input type="text" id="input-group-2" name="filter" class="form-control" value="<?php echo $filter; ?>" required="" >
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Keterangan</th>
                                            <?php if( $this->session->userdata('edit') == 'on' ){ ?>
                                            <th>Opsi</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach( $get_cuti->result() as $row ){ ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($row->mulai))." s/d ". date('d-m-Y', strtotime($row->sampai)); ?></td>
                                            <td><?php echo $row->kategori; ?></td>
                                            <td><?php echo $row->keterangan; ?></td>
                                            <?php if( $this->session->userdata('edit') == 'on' ){ ?>
                                            <td><a onclick="return confirm('Apakah anda yakin akan menghapus baris ini ?')" href="<?php echo base_url('cuti/hapusCuti/'.$row->kode_cuti.'') ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                                            <?php } ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white bg-primary">
                <h5 class="modal-title">Tambah Cuti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url('cuti/tambahCuti') ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label class="require">Nama Pegawai</label>
                    <select class="form-control search" name="pin" style="width: 100%" required="">
                        <option></option>
                        <?php foreach( $get_data_pegawai->result() as $pg ){ ?>
                        <option value="<?php echo $pg->pin; ?>"><?php echo $pg->nama; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="require">Tanggal</label>                  
                    <input type="text" name="tgl_cuti" class="form-control" required="" />
                </div>

                <div class="form-group">
                    <label class="require">Kategori Cuti</label> 
                    <br>
                    <small>Pilihan ini menentukan kedapatan pegawai akan uang makan dan tukin</small>
                    <br>  
                    <br>               
                    <input type="radio" name="kategori" value="negara" checked="" > Negara / Izin Sakit
                    <input type="radio" name="kategori" value="pribadi" > Pribadi
                </div>

                <div class="form-group">
                    <label class="require">Keterangan</label>                  
                    <textarea class="form-control" name="keterangan" rows="3" required=""></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>dist/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/daterangepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.search').select2(
            {
                placeholder: "Cari nama pegawai",
                allowClear: true
            }
        );

        $('input[name="filter"]').daterangepicker();
        $('input[name="tgl_cuti"]').daterangepicker();

        $('input[name="mode"]').on('click', function(){
            var x = $('input[name="mode"]:checked').length;

            var url = window.location.href;

            function mode(mode){
            	jQuery.ajax({
            	  url: '<?php echo base_url() ?>mode/'+mode+'',
            	  success: function(data, textStatus, xhr) {
            	    //called when successful
            	    window.location = window.location.href;
            	  },
            	  error: function(xhr, textStatus, errorThrown) {
            	    //called when there is an error
            	    alert('error');
            	  }
            	});
            	
            }

            if( x == 0 ){ mode('off') }else{ mode('on') }
        })

    });

</script>
<script src="<?php echo base_url(); ?>dist/js/excelexport.js"></script>

<script>
  $(function() {
        
    //excel export
    var $exp = $('.export');
  
    $exp.on('click', function () {
        $("#data").excelexportjs({
            containerid: "data", datatype: 'table'
        });
    });

  })
</script>
<script src="<?php echo base_url(); ?>dist/js/jquery.dataTable4.js"></script>
<script src="<?php echo base_url(); ?>dist/js/dataTable4.js"></script>
<script>
    $(function(){
        $("table").DataTable();
    })
</script>
<script src="<?php echo base_url(); ?>dist/vendor/popper.js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/carbon.js"></script>
</body>
</html>
