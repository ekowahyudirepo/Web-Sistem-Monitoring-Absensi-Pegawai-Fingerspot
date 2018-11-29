<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Navigation</li>

            <li class="nav-item nav-dropdown">
                <a href="#" class="nav-link nav-dropdown-toggle">
                    <i class="fa fa-calendar"></i> Absensi Hari ini <i class="fa fa-caret-left"></i>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="<?php echo base_url('absensi') ?>" class="nav-link <?php echo $absensi; ?>">
                            <i class="fa fa-calendar"></i> Absensi Hari Ini
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('absensi/pegawai') ?>" class="nav-link <?php echo $absensi; ?>">
                            <i class="fa fa-table"></i> Kelola Absensi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('absensi/periksa') ?>" class="nav-link <?php echo $absensi; ?>">
                            <i class="fa fa-table"></i> Periksa Absen Ganda
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="#" class="nav-link nav-dropdown-toggle">
                    <i class="fa fa-users"></i> Pegawai <i class="fa fa-caret-left"></i>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="<?php echo base_url('pegawai') ?>" class="nav-link <?php echo $pegawai; ?>">
                            <i class="fa fa-table"></i> Data
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('status') ?>" class="nav-link <?php echo $status; ?>">
                            <i class="fa fa-table"></i> Status
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="#" class="nav-link nav-dropdown-toggle">
                    <i class="fa fa-users"></i> Opsi Pegawai<i class="fa fa-caret-left"></i>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="<?php echo base_url('tugas') ?>" class="nav-link <?php echo $tugas ?>">
                            <i class="fa fa-table"></i> Surat Tugas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('cuti') ?>" class="nav-link <?php echo $cuti ?>">
                            <i class="fa fa-table"></i> Cuti
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="#" class="nav-link nav-dropdown-toggle">
                    <i class="fa fa-users"></i> Opsi Absensi<i class="fa fa-caret-left"></i>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="<?php echo base_url('uang_makan') ?>" class="nav-link <?php echo $uang_makan ?>">
                            <i class="fa fa-spoon"></i> Uang Makan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('tukin') ?>" class="nav-link <?php echo $tukin ?>">
                            <i class="fa fa-clock-o"></i> Tukin
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('libur') ?>" class="nav-link <?php echo $libur ?>">
                            <i class="fa fa-calendar-times-o"></i> Hari Libur
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('upload') ?>" class="nav-link <?php echo $upload ?>">
                            <i class="fa fa-upload"></i> Upload Absensi
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="<?php echo base_url('aturan') ?>" class="nav-link <?php echo $aturan ?>">
                    <i class="fa fa-gears"></i> Pengaturan
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo base_url('backup') ?>" class="nav-link <?php echo $backup ?>">
                    <i class="fa fa-refresh"></i> Cadangkan dan Kembalikan
                </a>
            </li>
        </ul>
    </nav>

    <span style="text-align: center;"><label>&copy 2018 - <?php echo date('Y') ?> TRACER | STIE DEWANTARA</label></span>

</div>