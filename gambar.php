<?php
    // Mengambil data dari gambar.json
    $json_data = file_get_contents("json/gambar.json");
    $gambar_array = json_decode($json_data, true);
    
    $ekstensi=".jpg";
    $identitas = $_POST['identitas'];
    $jumlah = $_POST['jumlah'];
    
    // Ambil ukuran files dalam bentuk bytes
    $ukuran_file = $_FILES['gambar']['size'];
    // Ambil tipe gambar berupa JPG / JPEG / PNG
    $tipe_file = $_FILES['gambar']['type'];
    
    // Tentukan ekstensi berdasarkan tipe file yang diunggah
    if($tipe_file == "image/png"){
        $ekstensi=".png";
    }
    
    // Tentukan nama file berdasarkan identitas dan ekstensi
    $nama_file = $identitas . $ekstensi;
    
    // Ambil url path folder
    $tmp_file = $_FILES['gambar']['tmp_name'];
    
    // Set path folder tempat menyimpan gambarnya
    $path = "img/personil/".$nama_file;
    
    // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
    
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan tindakan :
        // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        if($ukuran_file <= 10000000000){
            // Hapus data lama dari json yang memiliki id = $identitas
            foreach($gambar_array as $key => $gambar) {
                if ($gambar['id'] == $identitas) {
                    unset($gambar_array[$key]);
                    break;
                }
            }
    
            // Hapus semua file dengan ID yang sama, berekstensi jpg atau png
            $old_file_jpg = "img/personil/".$identitas.".jpg";
            if (file_exists($old_file_jpg)) {
                unlink($old_file_jpg); // Hapus file jpg
            }
            $old_file_png = "img/personil/".$identitas.".png";
            if (file_exists($old_file_png)) {
                unlink($old_file_png); // Hapus file png
            }
    
            // Proses upload file baru
            if(move_uploaded_file($tmp_file, $path)){
                // Tambahkan data baru ke dalam array
                $gambar_baru = array(
                    'id' => $identitas,
                    'nama' => $nama_file,
                    'tipe' => $tipe_file
                );
                $gambar_array[] = $gambar_baru;
    
                // Simpan kembali data ke dalam file JSON
                file_put_contents('json/gambar.json', json_encode($gambar_array));
    
                // Redirect ke halaman deskripsi.php dengan menyertakan ID dan jumlah
                header("location: deskripsi.php?id=$identitas&jumlah=$jumlah");
                exit;
            } else {
                // Jika gambar gagal diupload
                echo "Maaf, Gambar gagal untuk diupload.";
                echo "<br><a href='form.php'>Kembali Ke Form</a>";
                exit;
            }
        } else {
            // Jika ukuran file lebih dari 1MB
            echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
            echo "<br><a href='form.php'>Kembali Ke Form</a>";
            exit;
        }
    } else {
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG
        echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
        echo "<br><a href='form.php'>Kembali Ke Form</a>";
        exit;
    }
?>
