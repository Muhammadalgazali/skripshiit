<?php
    // Baca isi dari file data.json
    $jsonData = file_get_contents('json/data.json');
    
    // Ubah data JSON menjadi array PHP
    $students = json_decode($jsonData, true);
    
    // Ambil ID dari URL
    $id = $_GET['id'];
    
    $jumlah = $_GET['jumlah'];
    $progress =  $jumlah*25;
    
    // Temukan data siswa dengan ID yang sesuai
    $studentData = null;
    foreach ($students as $student) {
        if ($student['id'] == $id) {
            $studentData = $student['data'];
            break;
        }
    }
    
    // Isi variabel dengan data siswa yang sesuai
    if ($studentData) {
        $nim = $studentData[0];
        $namaLengkap = $studentData[1];
        $namaPanggilan = $studentData[2];
        $namaSaya = $studentData[3];
        $namaUnik = $studentData[4];
        $judulSkripsi = $studentData[5];
        $dospem1 = $studentData[6];
        $dospem2 = $studentData[7];
        $peminatan = $studentData[8];
        $kelas = $studentData[9];
        $noTelpon = $studentData[10];
        $email = $studentData[11];
        $instagram = $studentData[12];
        $linkedin = $studentData[13];
        $facebook = $studentData[14];
    
        if ($judulSkripsi==""){
          $judulSkripsi="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore, aliquam. Officia aliquam tempore est sed. Obcaecati a molestiae eius dolorem necessitatibus ";
        }
    
        if ($dospem1==""){
          $dospem1="John Doe";
        }
    
        if ($dospem2==""){
          $dospem2="Angelina Joulie";
        }
    
        // Dan seterusnya untuk variabel lainnya...
    } else {
        // Jika tidak ada data yang sesuai dengan ID yang diberikan
        // Lakukan penanganan kesalahan di sini, misalnya tampilkan pesan error
        echo "<script>alert('Data tidak ditemukan');</script>";
    }
    
    
    
    
    
    // Jika data siswa tidak ditemukan
    if ($namaLengkap == "") {
      header("Location: index.php");
      exit();
    }
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>About C173DKX4816</title>
        <!-- CSS Utama -->
        <link rel="stylesheet" href="css/app.css" />
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Font Awesome 5.15.4 -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
            integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
            />
    </head>
    <body>
        <header class="navbar-container">
            <div class="logo">
                <button class="google-button" onclick="window.location.href = 'index.php';">
                <i class="fas fa-home"></i>
                </button>
            </div>
            <div class="logo">
                <h2>
                    <strong>Their Personal Information</strong>
                </h2>
            </div>
            <?php
                echo('
                <nav class="nav-list">
                <ul>
                  <li><p>Social Media :</p></li>
                  <li><a href="https://www.instagram.com/'.$instagram.'">
                    <img src="./img/logo/instagram.png" alt="Instagram"></a>
                  </li>
                  <li><a href="https://www.linkedin.com/in/'.$linkedin.'">
                    <img src="./img/logo/linkedin.png" alt="Linkedlin"></a>
                  </li>
                  <li><a href="https://www.facebook.com/'.$facebook.'">
                    <img src="./img/logo/facebook.png" alt="Facebook"></a>
                  </li>
                
                </ul>
                </ul>
                </nav>
                ')
                ?>
        </header>
        <!--Main Content-->
        <main>
            <!--#banner-->
            <div class="content" style="border: 0px; padding-bottom:30px; padding-top:30px">
                <!-- namaku -->
                <div class="content-description" style="border: 0px; width:100%" >
                    <div style="width: 100%; padding-left: 10px; border:groove; padding:5px">
                        <?php
                            // Inisialisasi variabel nilai dan warna
                            $nilai = 0;
                            $warna = '';
                            $gelar= '';
                            
                            
                            // Tentukan nilai dan warna berdasarkan $progress
                            if ($progress == 0) {
                                $nilai = 1;
                                $warna = 'dc3545';
                            } elseif ($progress == 25) {
                                $nilai = 25;
                                $warna = '6c757d';
                            } elseif ($progress == 50) {
                                $nilai = 50;
                                $warna = '28a745';
                            } elseif ($progress == 75) {
                                $nilai = 75;
                                $warna = 'ffc107';
                            } elseif ($progress == 100) {
                                $nilai = 100;
                                $warna = '007bff';
                                $gelar= 'S.T';
                            }
                            
                            // Outputkan div dengan nilai dan warna yang sudah ditentukan
                            echo '<div style="background-color: #' . $warna . '; width: ' . $nilai . '%; padding-left: 10px; margin: -20px -20px -20px 0px">';
                            
                            echo ("<p style='color:white'>".$progress.'%</p> </div>')
                            ?>
                    </div>
                    <?php
                        echo ("<p>".$nim.'</p>')
                        ?>
                    <!--NIM : E1E119032 -->
                    <h1 class="title">
                        <?php
                            echo ($namaLengkap)
                            ?>
                        <span style="color: brown; font-size: 30px ; "> 
                        <?php
                            echo ($gelar)
                            ?>
                        </span> 
                    </h1>
                    <strong style="font-size: 30px" id="text" onclick="rubahKata()">a.k.a 
                    <?php
                        echo ($namaPanggilan)
                        ?>
                    </strong>
                    <div style="margin-top: 30px; ">
                        <button class="custom-google-button" id="showFormButton" onclick="toggleForm()">
                        <i class="fas fa-pencil-alt" style="margin-left: 0px; "></i>   
                        </button>
                        <button class="custom-google-button" style="margin-left: 0px;" id="showFormButton" onclick="cameraForm()">
                        <i class="fas fa-camera-retro" style="margin-left: 0px;"></i>          
                        </button> 
                    </div>
                    <!-- 3 nama lain tersedia -->
                </div>
                <!-- fotoku -->
                <div class="content-image">
                    <span class="center">
                    <?php
                        // Mendefinisikan data dalam format JSON dan mengonversinya menjadi array PHP
                        $json_data = json_decode(file_get_contents("json/gambar.json"), true);
                        
                        // Inisialisasi variabel $result untuk menyimpan hasil
                        $result = '';
                        
                        // Loop untuk mencari data dengan ID yang sesuai dengan variabel $id
                        foreach ($json_data as $data) {
                            if ($data['id'] == $id) {
                                $result .= "<img src='img/personil/".$data['nama']."' alt='Foto ".$data['nama']."' class='center-image'>";
                            }
                        }
                        
                        // Jika tidak ada data yang cocok dengan ID, tambahkan pesan alternatif
                        if (empty($result)) {
                            $result = "<p style='margin-top: 210px;margin-bottom: 150px;'>".$namaLengkap."</p>";
                        }
                        
                        // Menampilkan hasil
                        echo $result;
                        ?>
                    </span>
                </div>
            </div>
            <aside>
                <div class="content" style="margin-top: 0px; padding-top: 0px; padding-bottom:30px" >
                    <!-- my Stories -->
                    <div class="content-description" style=" height:180px; width:100% ; padding-top:0px; padding-bottom:0px">
                        <!-- border:solid black; -->
                        <h5 class="title2">Skripsi</h5>
                        <div style="width: 100%; padding-right: 40px; font-size: 15px; padding-top:0px">
                            <?php
                                echo ($judulSkripsi)
                                ?>
                            <br>
                            <div style="padding-top: 5px; padding-bottom: 0px;">
                                <tr>
                                    <td><b>Dospem 1</b></td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                            echo ($dospem1)
                                            ?>
                                    </td>
                                </tr>
                                <br>
                                <tr>
                                    <td><b>Dospem 2</b></td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                            echo ($dospem2)
                                            ?>
                                    </td>
                                </tr>
                            </div>
                        </div>
                    </div>
                    <!--Keterangan Biodata-->
                    <div class="content-description" style=" margin-right: 7%; height:180px; padding-top:-30px">
                        <!-- border:solid black; -->
                        <h5 class="title2">Personal Biodata
                        </h5>
                        <div >
                            <table style="margin-top:-15px">
                                <tr>
                                    <td style="width:35%"></td>
                                    <td></td>
                                    <td style="width:60%"></td>
                                </tr>
                                <tr>
                                    <td><b>Peminatan</b></td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                            echo ($peminatan)
                                            ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Kelas</b></td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                            echo ($kelas)
                                            ?>
                                    </td>
                                    <!-- jurusan : sama semua-->
                                </tr>
                                <tr>
                                    <td><b>Jurusan</td>
                                    <td>:</td>
                                    <td>Teknik Informatika</td>
                                    <!-- kelas : genap ganjil -->
                                </tr>
                                <tr hidden>
                                    <td><b>Phone Number</b></td>
                                    <td>:</td>
                                    <td><?php
                                        echo ($noTelpon)
                                        ?></td>
                                    <!-- nomor telepon : nomer WA saja -->
                                </tr>
                                <tr hidden>
                                    <td><b>Personal Email</b></td>
                                    <td>:</td>
                                    <td style="word-wrap: break-word;">
                                        <?php
                                            echo ($email)
                                            ?>
                                    </td>
                                    <!-- Email : kita hunting email -->
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- Tombol untuk menampilkan form -->
            <!-- Form inputan -->
            <div id="inputForm" class="overlay">
                <div class="form-container">
                    <span class="close-button" onclick="toggleForm()"><i class="fas fa-archive"></i></span>
                    <h2>Update Skripsi</h2>
                    <form action="input.php" method="POST">
                        <table>
                            <tr>
                                <td style="width: 40%;"></td>
                                <td></td>
                                <td style="width: 60%;"></td>
                            </tr>
                            <tr>
                                <td>Identitas</td>
                                <td>:</td>
                                <td>
                                    <?php
                                        if ($id<=9){
                                          echo("E1E11900".$id);
                                        }
                                        else {
                                          # code...
                                          echo("E1E1190".$id);
                                        }
                                        ?> 
                                    <input type="text" id="identitas" name="identitas" value="<?php echo $id; ?>" hidden>
                                    <input type="text" id="jumlah" name="jumlah" value="<?php echo $jumlah; ?>" hidden>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="judulSkripsi">Judul Skripsi:</label></td>
                                <td>:</td>
                                <td><input class="lebar" type="text" id="judulSkripsi" name="judulSkripsi" value="<?php echo $studentData[5]; ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="dospem1">Dosen Pembimbing 1:</label></td>
                                <td>:</td>
                                <td><input class="lebar" type="text" id="dospem1" name="dospem1" value="<?php echo $studentData[6]; ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="dospem2">Dosen Pembimbing 2:</label></td>
                                <td>:</td>
                                <td><input class="lebar" type="text" id="dospem2" name="dospem2" value="<?php echo $studentData[7]; ?>"></td>
                            </tr>
                            </tr>
                            <tr>
                                <!-- Tambahkan colspan=2 pada tombol submit -->
                                <td colspan="3">
                                    <div style="margin-top:20px">
                                        <input type="submit" class="submit-button" value="Unggah Data" style="width:100%">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <!-- Form Camera -->
            <div id="inputcameraForm" class="overlay">
                <div class="form-container">
                    <span class="close-button" onclick="cameraForm()"><i class="fas fa-archive"></i></span>
                    <h2>Update Gambar
                    </h2>
                    <span class="close-button" onclick="cameraForm()"><i class="fas fa-archive"></i></span>
                    <!-- Form HTML dengan batasan ukuran dan dimensi gambar -->
                    <form action="gambar.php" method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Identitas</td>
                                <td>:</td>
                                <td>
                                    <?php
                                        if ($id<=9){
                                          echo("E1E11900".$id);
                                        }
                                        else {
                                          # code...
                                          echo("E1E1190".$id);
                                        }
                                        ?>
                                    <input  type="text" id="identitas" name="identitas" value="<?php echo $id; ?>" hidden>
                                    <input type="text" id="jumlah" name="jumlah" value="<?php echo $jumlah; ?>" hidden>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="gambar">Pilih Gambar:</label></td>
                                <td>:</td>
                                <td><input type="file" id="gambar" name="gambar" accept=".jpg, .jpeg, .png" require></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div style="margin-top:20px">
                                        <input type="submit" class="submit-button" value="Unggah Gambar" style="width:100%">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </main>
    </body>
    <script src="script/script2.js"></script>
    <script>
        function rubahKata() {
          const text = document.getElementById('text');
          <?php
            echo("
              if (text.innerHTML === 'a.k.a ".$namaPanggilan."') {
                text.innerHTML = 'a.k.a ".$namaSaya."';
              } else if (text.innerHTML === 'a.k.a ".$namaSaya."') {
                text.innerHTML = 'a.k.a ".$namaUnik."';
              } else if (text.innerHTML === 'a.k.a ".$namaUnik."') {
                text.innerHTML = 'a.k.a ".$namaPanggilan."';
              // } else if (text.innerHTML === 'a.k.a Alga') {
              //   text.innerHTML = 'a.k.a Gazali';
              } else {
                text.innerHTML = 'a.k.a ".$namaSaya."';
              }
              ")
            ?>
        }
        
        
    </script>
</html>
