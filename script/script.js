document.addEventListener('DOMContentLoaded', function () {
  // Sample data with 10 names
  const names = ["Chintya Mawadhah Sumitro", "Desri Puspita Sari", "Dini Fadilah", "Dwi Hardiansyah", "Frida Mimi Wahyuni", "Mihra Wardana", "Nur Rahmawati Subuh", "Nurul Hajra Hadijah", "Putri Nabilla", "Rahmat Zulwan S.", "Reskal", "Resti", "Resty Saleha", "Syahidatul Islamiyah", "Wa Ode Asrina Yulianti", "Wa Ode Siti Fadila", "Andi Gammad Brilliant Arifzha", "Abdi Aman Bangsa", "Anantha Tisa Audrian", "Andi Khairul Baits Said", "Andi Muhammad Arkan", "Asfan Meliawan", "Fahrul Ardian Nugroho", "Fatma Yulniar", "Gisela Sanggaria", "I Komang Sucita Darma", "Ida Bagus Gede Pala Asmara", "Idham Ar-Rasyid", "Indah Fauzia", "Kadek Rai Rieska Jandwarda", "Muhammad Farhan Saputra", "Muhammad Algazali", "Muhammad Rafli", "Nadaa Qur'atul 'Ain", "Nurhalisa Madukubah", "-", "Rabbil Sukarnas Malid Irman", "Susana Aprilia Maharani", "Abdullah Alhayad Arafah", "-", "Agatha Mega Putri", "Ahmad Ainun Marwan", "Ahmad Dhani Ali", "Al Muhaimin", "Alif Anugrah", "Andi Abdillah Juliardi", "Andi Nurhalisa", "Andri Rozaldin", "Annisaa Dwi Amalia Santoso", "Daniel Jr March Cavallera Lawoliyo", "Diah Ayu Ningtiyas", "Eka Wahyu Hidayati", "Fadli Brilian Daksa", "Farid Muhammad", "Farshaneda Rahim", "Febriana", "Gita Prisilfia", "Ifani Fadillah Putri", "Laode Rahmat Hidayat", "La Ode Zahirul Hikmah", "-", "Lily Karmila", "-", "Muhammad Yasir", "Muhammad Alqadri", "Muhammad Erhan Rafly Setiawan Adam", "Muhammad Farhan", "Muh. Syaban Aditya Marsyawal", "-", "-", "Niken Indryani", "Nurul Niza", "Priyanto Darmansyah", "Queen Isabell Felicya Tatambihe", "Ratri Pramudita", "Ridha Entim Aprilya", "Rizky Khairun Nisa", "Sarmin", "Shafira Khaerunnisa Arifin", "Tunfatul Uzma", "Urif Hermawan", "Wa Ode Kinanti Ayunin Asadih", "Waode Anti", "Winel Dwi Satrini", "-", "Yuyun Rusmianti"];
  // Get the table body element
  const tableBody = document.getElementById('tableBody');
  const summaryBody = document.getElementById('summaryBody');

  // Function to retrieve progress data from local storage
  function retrieveProgressData() {
     const storedData = localStorage.getItem('progressData');
     return storedData ? JSON.parse(storedData) : [];
  }

  // Function to save progress data to local storage
  function saveProgressData(data) {
     localStorage.setItem('progressData', JSON.stringify(data));
  }

  // Function to save progress data to local storage
  function saveProgressData(data) {
     localStorage.setItem('progressData', JSON.stringify(data));
  }

  const skippedIndices = [35, 39, 60, 62, 68, 69, 84];
  // Populate the table with data
  names.forEach((name, index) => {
     // Menentukan indeks yang ingin dilewati


     // Memeriksa apakah indeks saat ini adalah indeks yang ingin dilewati
     if (skippedIndices.includes(index)) {
        return; // Lewati iterasi saat ini
     }
     const row = document.createElement('tr');

     // Column 1: Nomor
     const numberCell = document.createElement('td');
     const number = index + 1;
     const formattedNumber = number < 10 ? 'E1E11900' + number : 'E1E1190' + number;
     numberCell.textContent = formattedNumber;
     row.appendChild(numberCell);

     // Column 2: Name (as a link to description page)
     const nameCell = document.createElement('td');
     const nameLink = document.createElement('a');
     nameLink.textContent = name;

     // Mengambil data progres dari local storage
     const progressData = retrieveProgressData();
     const checkedCount = progressData[index] ? progressData[index].filter(item => item).length : 0;

     // Menambahkan jumlah checkbox tercentang sebagai parameter dalam URL
     nameLink.href = `deskripsi.php?id=${index + 1}&jumlah=${checkedCount}`;
     nameCell.appendChild(nameLink);
     row.appendChild(nameCell);

     // Columns 3-6: Checkboxes
     for (let i = 1; i <= 4; i++) {
        const checkboxCell = document.createElement('td');
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.addEventListener('change', function () {
           updateProgress(row);
           updateCheckboxes(row, i);
           updateSummary();
           saveProgressData(retrieveProgressData());
        });
        checkboxCell.appendChild(checkbox);
        row.appendChild(checkboxCell);
     }

     // Column 7: Progress Percentage
     const progressCell = document.createElement('td');
     progressCell.textContent = '0%';
     row.appendChild(progressCell);

     // Append the row to the table body
     tableBody.appendChild(row);

     // Retrieve progress data and update checkboxes based on the stored data
     const storedData = retrieveProgressData();
     if (storedData[index]) {
        for (let i = 0; i < 4; i++) {
           row.querySelectorAll('input[type="checkbox"]')[i].checked = storedData[index][i];
        }
        updateProgress(row);
        updateSummary();
     }
  });

  // Function to update progress based on checkbox changes
  // Function to update progress based on checkbox changes
  function updateProgress(row) {
     const checkboxes = row.querySelectorAll('input[type="checkbox"]');
     const progressCell = row.lastElementChild;

     // Count the number of checked checkboxes
     const checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;

     // Update the progress percentage
     const progress = checkedCount === 4 ? 100 : checkedCount * 25;
     progressCell.textContent = progress + '%';

     // Apply color based on progress percentage
     progressCell.className = determineColorClass(progress);

     // Update the progress data in local storage
     const rowIndex = Array.from(tableBody.children).indexOf(row);
     const storedData = retrieveProgressData();
     storedData[rowIndex] = Array.from(checkboxes).map(checkbox => checkbox.checked);
     saveProgressData(storedData);
  }

  // Function to determine color class based on progress percentage
  function determineColorClass(progress) {
     if (progress === 25) {
        return 'gray';
     } else if (progress === 50) {
        return 'green';
     } else if (progress === 75) {
        return 'yellow';
     } else if (progress === 100) {
        return 'blue';
     } else {
        return 'red';
     }
  }

  // Function to update summary table
  // Function to update summary table
  function updateSummary() {
     const summaryData = [{
           percentage: '0%',
           description: 'Belum Ada Judul Penelitian',
           count: 0
        },
        {
           percentage: '25%',
           description: 'Sudah Judul, Belum Proposal',
           count: 0
        },
        {
           percentage: '50%',
           description: 'Sudah Proposal, Belum Hasil',
           count: 0
        },
        {
           percentage: '75%',
           description: 'Sudah Hasil, Belum Skripsi',
           count: 0
        },
        {
           percentage: '100%',
           description: 'Sudah WISUDA',
           count: 0
        }
     ];

     const allRows = tableBody.querySelectorAll('tr');

     allRows.forEach(row => {
        const nameLink = row.querySelector('a');
        const name = nameLink.textContent.trim(); // Trim whitespace
        if (name && name !== "") { // Check if name is not empty
           const progressCell = row.lastElementChild;
           const progress = parseInt(progressCell.textContent);

           if (progress === 0) {
              summaryData[0].count++;
           } else if (progress === 25) {
              summaryData[1].count++;
           } else if (progress === 50) {
              summaryData[2].count++;
           } else if (progress === 75) {
              summaryData[3].count++;
           } else if (progress === 100) {
              summaryData[4].count++;
           }
        }
     });

     const summaryBody = document.getElementById('summaryBody');
     summaryBody.innerHTML = '';

     summaryData.forEach(data => {
        const summaryRow = document.createElement('tr');

        const percentageCell = document.createElement('td');
        percentageCell.textContent = data.percentage;
        summaryRow.appendChild(percentageCell);

        const descriptionCell = document.createElement('td');
        descriptionCell.textContent = data.description;
        summaryRow.appendChild(descriptionCell);

        const countCell = document.createElement('td');
        countCell.textContent = data.count;
        summaryRow.appendChild(countCell);

        summaryBody.appendChild(summaryRow);
     });
  }

  // Function to update checkboxes based on changes in other checkboxes
  function updateCheckboxes(row, checkboxNumber) {
     const checkboxes = row.querySelectorAll('input[type="checkbox"]');
     const progressCell = row.lastElementChild;

     // If checkbox 4 is checked, check checkboxes 3, 2, and 1
     if (checkboxNumber === 4 && checkboxes[3].checked) {
        checkboxes[2].checked = true;
        checkboxes[1].checked = true;
        checkboxes[0].checked = true;
     }

     // If checkbox 3 is checked, check checkboxes 2 and 1
     if (checkboxNumber === 3 && checkboxes[2].checked) {
        checkboxes[1].checked = true;
        checkboxes[0].checked = true;
     }

     // If checkbox 2 is checked, check checkbox 1
     if (checkboxNumber === 2 && checkboxes[1].checked) {
        checkboxes[0].checked = true;
     }

     // If checkbox 1 is unchecked, uncheck checkboxes 2, 3, and 4
     if (checkboxNumber === 1 && !checkboxes[0].checked) {
        checkboxes[1].checked = false;
        checkboxes[2].checked = false;
        checkboxes[3].checked = false;
     }

     // If checkbox 2 is unchecked, uncheck checkboxes 3 and 4
     if (checkboxNumber === 2 && !checkboxes[1].checked) {
        checkboxes[2].checked = false;
        checkboxes[3].checked = false;
     }

     // If checkbox 3 is unchecked, uncheck checkbox 4
     if (checkboxNumber === 3 && !checkboxes[2].checked) {
        checkboxes[3].checked = false;
     }

     // Update the progress based on updated checkboxes
     updateProgress(row);
     // Update the summary based on updated checkboxes
     updateSummary();
  }

  // Initial update of the summary table
  updateSummary();


});
