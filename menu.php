 				<?php
                 error_reporting(0);
                 $tampung = $_SESSION['nip'];
                $sqlSelect="select nip from t_pegawai where nip='$tampung'";
               	$result = mysqli_query($koneksi,$sqlSelect);
				$row = mysqli_fetch_assoc($result);
				// if (mysqli_num_rows($result) == 0) {
				if ($row['nip'] == 0) {
                ?>
                 <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Soal</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="list_soal">List Soal</a></li>
                        <!-- <li><a href="tambah_soal.php">Tambah Soal</a></li> -->
                    </ul>
                </li>
				<li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Jurusan</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="list_jurusan">List Jurusan</a></li>
                        <li><a href="tambah_jurusan">Tambah Jurusan</a></li>
                    </ul>
                </li>
				<li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Peserta</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="list_peserta">List Peserta</a></li>
                        <!-- <li><a href="tambah_tunjangan.php">Tambah Peserta</a></li> -->
                    </ul>
                </li>  
				<li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Pegawai</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="list_pegawai">List Pegawai</a></li>
                        <li><a href="tambah_pegawai">Tambah Pegawai</a></li>
                    </ul>
                </li>  
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Hak Akses</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="list_akses">List Panitia / ADMIN</a></li>
                        <li><a href="admin" target="_blank">Tambah Panitia / ADMIN</a></li>
                    </ul>
                </li>                                                        
 				<?php
            	}else{
                ?> 
				<li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Peserta</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="list_peserta">List Peserta</a></li>
                    </ul>
                </li>
				            
				<!-- <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Laporan</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="list_laporan.php">List Laporan</a></li>
                    </ul>
                </li>   -->              
                <?php
            	}
                ?>              
