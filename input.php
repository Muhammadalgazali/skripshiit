<?php
// Mendapatkan data dari formulir POST
$id_p = $_POST['identitas'];
$jumlah_p = $_POST['jumlah'];
$judulSkripsi_p = $_POST['judulSkripsi'];
$dospem1_p = $_POST['dospem1'];
$dospem2_p = $_POST['dospem2'];

// Mendapatkan data dari file JSON
$json_data = file_get_contents('json/data.json');

// Mendekode data JSON menjadi array PHP
$data_array = json_decode($json_data, true);

// Mencari data dengan id yang sesuai
foreach ($data_array as &$data) {
    if ($data['id'] == $id_p) {
        // Mengupdate data yang sesuai dengan id
        $data['data'][5] = $judulSkripsi_p; // Update Judul Skripsi
        $data['data'][6] = $dospem1_p; // Update Dosen Pembimbing 1
        $data['data'][7] = $dospem2_p; // Update Dosen Pembimbing 2

        // Menyimpan kembali data ke dalam file JSON
        file_put_contents('json/data.json', json_encode($data_array, JSON_PRETTY_PRINT));

        // Pengalihan ke halaman deskripsi dengan menggunakan data yang sudah diperbarui
        header("Location: deskripsi.php?id=$id_p&jumlah=$jumlah_p");
        exit(); // Penting untuk menghentikan eksekusi skrip setelah header diatur
    }
}
?>
