                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Jurusan</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="tambah_jurusan">Pilih Jurusan</a></li>
                    </ul>
                </li>
				<li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Biodata Diri</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="lihat_biodata">Lihat Biodata Diri</a></li>
                    </ul>
                </li>
				<li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Soal</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <?php
                        // include "../koneksi.php";
                        $sqlselect3="SELECT * from t_jurusan_peserta WHERE no_peserta='$_SESSION[no_peserta]'";
                        $result3=mysqli_query($koneksi,$sqlselect3);
                        $row3 = mysqli_fetch_assoc($result3);
                        if (mysqli_num_rows($result3) == 1) {
                        ?>
                        <li><a href="soal2?kode_jurusan=<?php echo $row3['id_jurusan']; ?>" target="_blank">List Soal</a></li>
                        <?php
                        }else{
                        ?>
                        <li><a href="#">List Soal</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>  
               <!--  <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Nilai</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="kirim_email.php" target="_blank">Kirim Nilai</a></li>
                    </ul>
                </li> -->
                 <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Nilai</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="lihat_nilai" target="_blank">Lihat Nilai</a></li>
                    </ul>
                </li>