<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>About C173DKX4816</title>
      <!-- CSS Utama -->
      <link rel="stylesheet" href="css/app.css" />
      <link rel="stylesheet" href="style.css">
      <!-- Font Awesome 5.15.4 -->
      <link
         rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
         integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
         crossorigin="anonymous"
         referrerpolicy="no-referrer"
         />
         <style>
            .caption-search-container {
               display: flex;
               justify-content: space-between;
               align-items: center;
               margin-bottom: 10px;
            }

            .caption-container {
               flex-grow: 1;
               text-align: left;
            }

            .search-container {
               display: flex;
               align-items: center;
               /* border: solid black; */
            }

            .search-label {
               margin-right: 10px;
            }

            .search-input {
               padding: 8px;
               border: 1px solid #ccc;
               border-radius: 4px;
               font-size: 14px;
               outline: none;
               width: 300px;
            }

            .captionnya {
               border: solid black;
               margin-left: 25%;
            }

            .search-input:focus {
               border-color: dodgerblue;
               box-shadow: 0 0 0 2px rgba(30, 144, 255, 0.2);
            }


         </style>
   </head>
   <body>
      <header class="navbar-container">
         <div class="logo">
            <button class="google-button" onclick="window.location.href = '#';">
            <i class="fas fa-home"></i>
            </button>
         </div>
         <div class="logo">
            <h2>
               <strong>Expert Problem Solver 2019</strong>
            </h2>
         </div>
         <nav class="nav-list">
            <ul>
               <li>
                  <p>Social Media :</p>
               </li>
               <li><a href="https://www.instagram.com/ex.pose_19/">
                  <img src="./img/logo/instagram.png" alt="Instagram"></a>
               </li>
               <li><a href="#" aria-disabled="true">
                  <img src="./img/logo/linkedin.png" alt="Linkedlin"></a>
               </li>
               <li><a href="#" aria-disabled="true">
                  <img src="./img/logo/facebook.png" alt="Facebook"></a>
               </li>
            </ul>
            </ul>
         </nav>
      </header>
      <!--Main Content-->
      <main>
         <!--#banner-->
         <div class="content mt-2" style="border: 0px">
            <!-- namaku -->
            <div class="content-description" style="margin-top: 30px; border:none; margin-right:7%">
               <div class="table-responsive mt-2">
                  <table class="table table-striped table-hover">
                        <caption class="caption-top" >
                           <div class="caption-search-container">
                              <div class="caption-container">
                                    <span class="caption">Daftar Anggota Personil</span>
                              </div>
                              <div class="search-container">
                                    <label for="searchInput" class="search-label">Cari Mahasiswa:</label>
                                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Masukkan kata kunci..." class="search-input">
                              </div>
                           </div>
                        </caption>
                        <thead class="thead-light">
                           <tr>
                              <th style="width: 14%;">NIM</th>
                              <th style="width: 28%;">Nama</th>
                              <th style="width: 10%;">Judul</th>
                              <th style="width: 15%;">Proposal</th>
                              <th style="width: 9%;">Hasil</th>
                              <th style="width: 10%;">Tutup</th>
                              <th style="width: 15%;">Persentase Progress</th>
                           </tr>
                        </thead>
                        <tbody id="tableBody">
                           <!-- Data rows will be inserted here dynamically -->
                        </tbody>
                  </table>
               </div>
            </div>


            <script>
               function searchTable() {
                  var input, filter, table, tr, td, i, txtValue;
                  input = document.getElementById("searchInput");
                  filter = input.value.toUpperCase();
                  table = document.querySelector(".table");
                  tr = table.getElementsByTagName("tr");

                  for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td");
                        for (var j = 0; j < td.length; j++) {
                           if (td[j]) {
                              txtValue = td[j].textContent || td[j].innerText;
                              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                    break;
                              } else {
                                    tr[i].style.display = "none";
                              }
                           }
                        }
                  }
               }
            </script>

         </div>
         <hr />
         <aside>
            <div class="content" style="margin-top: 10px">
            <!-- my Stories -->
            
            <div class="content-description">
               <div class="table-responsive mt-0" style="margin-right: 7%; padding-bottom:10px">
                  <table class="table table-striped table-hover" id="summaryTable">
                     <caption class="caption-top" style="padding-bottom:10px">Summary</caption>
                     <thead class="thead-light">
                        <tr>
                           <th style="text-align: center;">Persentase</th>
                           <th style="text-align: center;">Status</th>
                           <th style="text-align: center;">Jumlah Orang</th>
                        </tr>
                     </thead>
                     <tbody id="summaryBody" style="text-align: center;">
                        <!-- Summary data will be inserted here dynamically -->
                     </tbody>
                     <tfoot class="table-dark">
                        <tr>
                           <th colspan="2" style="text-align: center;">Total Mahasiswa</th>
                           <th style="text-align: center;">79</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
            
            <!--Keterangan Biodata-->
         </aside>
      </main>
   </body>
   <script src="script/script.js"></script>
   <script>
        </script>
</html>
