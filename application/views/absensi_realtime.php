<div class="row">
    <div class="col-md-12">
        <h2>Monitoring Absensi Pegawai [ <b><?php echo date('d-m-Y') ?></b> ]</h2>
    </div>
</div>
<div class="row">
    
    <div class="col-md-4">
        <div class="card p-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <span class="h4 d-block font-weight-normal mb-2"><?php echo $jml_pegawai; ?></span>
                    <span class="font-weight-light">Total Pegawai</span>
                </div>

                <div class="h2 text-muted">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <span class="h4 d-block font-weight-normal mb-2"><?php echo $hadir; ?></span>
                    <span class="font-weight-light">Hadir</span>
                </div>

                <div class="h2 text-muted">
                    <i class="fa fa-calendar-check-o"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <span class="h4 d-block font-weight-normal mb-2"><?php echo $jml_pegawai-$hadir; ?></span>
                    <span class="font-weight-light">Tidak Hadir</span>
                </div>
                <div class="h2 text-muted">
                    <i class="fa fa-calendar-times-o"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header bg-light">
                <div class="row">
                    
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="data" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>PIN</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Masuk</th>
                            <th>Pulang</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php foreach( $get_real_absensi as $row ){ ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->pin; ?></td>
                            <td><?php echo $row->nik; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->kategori; ?></td>
                            <td><?php echo $row->status; ?></td>
                            <td><?php echo $row->jam_masuk; ?></td>
                            <td>
                                <?php echo $this->M_absensi->getRealAbsensiPulang($row->pin, date('Y-m-d')); ?>   
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

