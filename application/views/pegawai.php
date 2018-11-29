<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $judul; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/vendor/font-awesome/css/fontawesome-all.min.css">
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
                    <h2>Data Pegawai
                        <div title="Mode edit" class="toggle-switch" data-ts-color="danger">
                            <input id="ts7" name="mode" type="checkbox" <?php echo ($this->session->userdata('edit') == 'on')? 'checked' : ''; ?> hidden="hidden">
                            <label for="ts7" class="ts-helper"></label>
                            <label for="ts7" class="ts-label"></label>
                        </div>
                    </h2>
                    <div class="card">

                        <div class="card-header bg-light">
                            <a href="#tambah" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i></a> 
                            <button class="export btn btn-success"><i class="fa fa-file-excel-o"></i></button>
                            <a target="_blank" href="<?php echo base_url('pegawai/pdf') ?>" class="btn btn-warning"><i class="fa fa-file-pdf-o"></i></a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>PIN</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <?php if( $this->session->userdata('edit') == 'on' ){ ?>
                                        <th>Opsi</th>
                                        <?php } ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach( $get_data_pegawai->result() as $row ){ ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->pin; ?></td>
                                        <td><?php echo $row->nik; ?></td>
                                        <td><?php echo $row->nama; ?></td>
                                        <td><?php echo $row->kategori; ?></td>
                                        <td><?php echo $row->status; ?></td>
                                        <?php if( $this->session->userdata('edit') == 'on' ){ ?>
                                        <td>
                                            <a onclick="edit('<?php echo $row->id_pegawai; ?>','<?php echo $row->nik; ?>','<?php echo $row->nama; ?>','<?php echo $row->id_status ?>')" href="#edit" data-toggle="modal" class="btn btn-warning"><i class="fa fa-edit"></i></a>

                                            <a onclick="return confirm('Apakah anda yakin untuk menghapus <?php echo $row->nama; ?> ')" href="<?php echo base_url('pegawai/hapusPegawai/'.$row->id_pegawai.'') ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                                            <a href="<?php echo base_url('pegawai/absensiPegawai/'.$row->id_pegawai.'') ?>" class="btn btn-primary"><i class="fa fa-user"></i> Absensi</a>
                                        </td>
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
<div class="modal fade show" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white bg-primary">
                <h5 class="modal-title">Tambah Pegawai Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url('pegawai/tambahPegawai') ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label class="require">PIN Pegawai</label>
                    <input type="text" id="pin" class="form-control" name="pin" placeholder="Masukkan Pin Pegawai" required="">
                    <small style="color:salmon" name="pin"></small>
                </div>
                <div class="form-group">
                    <label class="require">NIK</label>
                    <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK Pegawai" required="">
                </div>
                <div class="form-group">
                    <label class="require">Nama Pegawai</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pegawai" required="">
                </div>
                <div class="form-group">
                    <label class="require">Status Pegawai</label>
                    <select name="id_status" class="form-control">
                        <option>Pilih Status</option>
                        <?php foreach ($get_status->result() as $j) { ?>
                            <option value="<?php echo $j->id_status; ?>">[ <?php echo $j->kategori ?> ] <?php echo $j->status; ?></option>
                        <?php } ?>
                    </select>
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

<div class="modal fade show" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white bg-warning">
                <h5 class="modal-title">Tambah Pegawai Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url('pegawai/ubahPegawai') ?>">
            <div class="modal-body">
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                    <label class="require">NIK</label>
                    <input type="text" id="nik" class="form-control" name="nik" placeholder="Masukkan NIK Pegawai" required="">
                </div>
                <div class="form-group">
                    <label class="require">Nama Pegawai</label>
                    <input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Nama Pegawai" required="">
                </div>
                <div class="form-group">
                    <label class="require">Status Pegawai</label>
                    <select id="id_status" name="id_status" class="form-control">
                        <option>Pilih Status</option>
                        <?php foreach ($get_status->result() as $ej) { ?>
                            <option value="<?php echo $ej->id_status; ?>">[ <?php echo $ej->kategori ?> ] <?php echo $ej->status; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>dist/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/excelexport.js"></script>

<script>
    function edit(id, nik, nama, id_status) {
        $('input#id').val(id)
        $('input#nik').val(nik)
        $('input#nama').val(nama)
        $('select#id_status').val(id_status)
    }

  $(function() {

    $('input#pin').on('change',function(){

        var pin = $(this).val()

        jQuery.ajax({
          url: '<?php echo base_url() ?>pegawai/cekPin/'+pin+'',
          success: function(rep) {
            //called when successful
            if( rep >= 1 ){

                $('small[name=pin]').html('Pin Telah terdaftar, Coba masukan pin lain')

                $('input#pin').val('')
            } else {
                $('small[name=pin]').html('')
            }

          },
          error: function(xhr, textStatus, errorThrown) {
            //called when there is an error
            alert('error')
          }
        });
        
    })
    
        
    //excel export
    var $exp = $('.export');
  
    $exp.on('click', function () {
        $("#data").excelexportjs({
            containerid: "data", datatype: 'table'
        });
    });

    $('input[name="mode"]').on('click', function(){
            var x = $('input[name="mode"]:checked').length;

            var url = window.location.href;

            function mode(mode){
                jQuery.ajax({
                  url: '<?php echo base_url() ?>mode/'+mode+'',
                  success: function() {
                    window.location = window.location.href;
                  },
                  error: function() {
                    alert('error');
                  }
                });
                
            }

            if( x == 0 ){ mode('off') }else{ mode('on') }
    })

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
