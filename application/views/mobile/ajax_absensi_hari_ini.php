<div class="row">
    <div class="col s12 m12">
        <h6>ABSENSI HARI INI <small class="right"><?php echo $this->format->getHari2(date('l')).', '.date('d-m-Y'); ?></small></h6>
        <?php if( ! $this->M_tukin->cekAbsensiMasuk($this->uri->segment(3), date('Y-m-d') )){ ?>

            <div class="card">
            	<div class="card-content">
            		<h6 class="green-text">Jam Masuk Anda</h6>
            		<h4>--:--:--</h4>
            	</div>
            </div>
            <div class="card">
            	<div class="card-content">
            		<h6 class="red-text">Anda Harus Pulang</h6>
            		<h4>--:--:--</h4>
            	</div>
            </div>
            <div class="card">
            	<div class="card-content">
            		<h6 class="blue-text">Jam Pulang Anda</h6>
            		<h4>--:--:--</h4>
            	</div>
            </div>

        <?php } else { ?>

            <?php foreach ( $this->M_tukin->absensiMasuk($this->uri->segment(3), date('Y-m-d') )->result() as $row ) { ?>
            <div class="card">
            	<div class="card-content">
            		<h6 class="green-text">Jam Masuk Anda</h6>
            		<h4><?php echo ( $row->jam_masuk != '' )? $row->jam_masuk : '--:--:--'; ?></h4>
            	</div>
            </div>
            <div class="card">
            	<div class="card-content">
            		<h6 class="red-text">Anda Harus Pulang</h6>
            		<h4><?php echo $this->M_tukin->harusPulang($this->M_tukin->jamMasukSet($row->jam_masuk), date('Y-m-d') ) ?></h4>
            	</div>
            </div>
            <div class="card">
            	<div class="card-content">
            		<h6 class="blue-text">Jam Pulang Anda</h6>
            		<h4><?php echo ( $this->M_tukin->absensiPulang($this->uri->segment(3), date('Y-m-d') ) != '' )? $this->M_tukin->absensiPulang($this->uri->segment(3), date('Y-m-d') ) : '--:--:--'; ?></h4>
            	</div>
            </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>