// Fungsi untuk menampilkan atau menyembunyikan form saat tombol diklik
function toggleForm() {
  var form = document.getElementById("inputForm");
  if (form.style.display === "none" || form.style.display === "") {
     form.style.display = "block";
  } else {
     form.style.display = "none";
  }
}

// Fungsi untuk menampilkan atau menyembunyikan form saat tombol diklik
function cameraForm() {
  var form = document.getElementById("inputcameraForm");
  if (form.style.display === "none" || form.style.display === "") {
     form.style.display = "block";
  } else {
     form.style.display = "none";
  }
}
