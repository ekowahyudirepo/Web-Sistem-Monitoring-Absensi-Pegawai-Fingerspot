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
                    <h2>Data Status
                        <div title="Mode Edit" class="toggle-switch" data-ts-color="danger">
                            <input id="ts7" name="mode" type="checkbox" <?php echo ($this->session->userdata('edit') == 'on')? 'checked' : ''; ?> hidden="hidden">
                            <label for="ts7" class="ts-helper"></label>
                            <label for="ts7" class="ts-label"></label>
                        </div>
                        <div class="clearfix"></div>
                    </h2>
                    <div class="card">

                        <div class="card-header bg-light">
                            <a href="#tambah" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Urut</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <?php if( $this->session->userdata('edit') == 'on' ){ ?>
                                        <th>Opsi</th>
                                        <?php } ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach( $get_status->result() as $row ){ ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->no_urut; ?></td>
                                        <td><?php echo $row->kategori; ?></td>
                                        <td><?php echo $row->status; ?></td>
                                        <?php if( $this->session->userdata('edit') == 'on' ){ ?>
                                        <td>
                                            <a onclick="edit('<?php echo $row->id_status; ?>','<?php echo $row->kategori; ?>','<?php echo $row->status; ?>','<?php echo $row->no_urut; ?>')" href="#edit" data-toggle="modal" class="btn btn-warning"><i class="fa fa-edit"></i></a>
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
                <h5 class="modal-title">Tambah Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url('status/tambahStatus') ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label class="require">Kategori</label>
                    <select class="form-control" name="kategori">
                        <option value="PNS">PNS</option>
                        <option value="non PNS">non PNS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="require">Status</label>
                    <input type="text" class="form-control" name="status" placeholder="Masukkan Nama Status" required="">
                </div>
                <div class="form-group">
                    <label class="require">No Urut</label>
                    <input type="number" min="1" class="form-control" name="no_urut">
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
                <h5 class="modal-title">Edit Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url('status/ubahStatus') ?>">
            <div class="modal-body">
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                    <label class="require">Kategori</label>
                    <select id="kategori" class="form-control" name="kategori">
                        <option value="PNS">PNS</option>
                        <option value="non PNS">non PNS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="require">Status</label>
                    <input type="text" id="status" class="form-control" name="status" placeholder="Masukkan Nama Status" required="">
                </div>
                <div class="form-group">
                    <label class="require">Nomor Urut</label>
                    <input type="text" id="no_urut" class="form-control" name="no_urut" min="1" required="">
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
<script>
    function edit(id, kategori, status, no_urut) {
        $('input#id').val(id)
        $('select#kategori').val(kategori)
        $('input#status').val(status)
        $('input#no_urut').val(no_urut)
    }

  $(function() {

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
