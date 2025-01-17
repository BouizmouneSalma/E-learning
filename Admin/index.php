<?php

require_once '../autoload.php'; 
use Classes\Admin;
use Classes\Inscription;
session_start();
try {
       $admin = new Admin(1, "admin", "admin", "admin@gmail.com", 1);
    $result = $admin->ViewStatistic();
    
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.19/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.19/dist/sweetalert2.min.js"></script>

    <link rel="stylesheet" href=".././assets/style.css">
    <script src=".././assets/tailwind.js"></script>
</head>

<body class="">
    <!-- Side Bar -->
    <div class=" fixed top-0 left-0  w-[230px] h-[100%] z-50 overflow-hidden sidebar ">
        <a href="" class="logo text-xl font-bold h-[56px] flex items-center text-[#1976D2] z-30 pb-[20px] box-content">
            <i class=" mt-4 text-xxl max-w-[60px] flex justify-center "><i class="fa-solid fa-car-side"></i></i>
            <div class="logoname ml-2"><span>Drive
            </span>Loc</div>
        </a>
        <ul class="side-menu w-full mt-12">
    <li class="active h-12 bg-transparent ml-2.5 rounded-l-full p-1">
        <a href="./index.php">
            <i class="fa-solid fa-chart-pie"></i> Statistic
        </a>
    </li>
    <li class="h-12 bg-transparent ml-2.5 rounded-l-full p-1">
        <a href="listEtudiants.php">
            <i class="fa-solid fa-graduation-cap"></i> Étudiants
        </a>
    </li>
    <li class="h-12 bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listEnseignants.php">
            <i class="fa-solid fa-chalkboard-teacher"></i> Enseignants
        </a>
    </li>
    <li class="h-12 bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listCours.php">
            <i class="fa-solid fa-book-open"></i> Cours
        </a>
    </li>
    <li class="h-12 bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listCategory.php">
            <i class="fa-solid fa-layer-group"></i> Catégories
        </a>
    </li>
    <li class="h-12 bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listTags.php">
            <i class="fa-solid fa-tags"></i> Tags
        </a>
    </li>
</ul>

        <ul class="side-menu w-full mt-12">
            <li class="h-12 bg-transparent ml-2.5 rounded-l-full p-1">
                <a href="../Visiteur/logout.php" class="logout">
                    <i class='bx bx-log-out-circle'></i> Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->
    <!-- Content -->
    <div class="content ">
        <!-- Navbar -->
        <nav class="flex items-center gap-6 h-14 bg-[#f6f6f9] sticky top-0 left-0 z-50 px-6">
            <i class='bx bx-menu'></i>
            <form action="#" class="max-w-[400px] w-full mr-auto">
                <div class="form-input flex items-center h-[36px]">
                    <input
                        class="flex-grow px-[16px] h-full border-0 bg-[#eee] rounded-l-[36px] outline-none w-full text-[#363949]"
                        type="search" placeholder="Search...">
                    <button
                        class="w-[80px] h-full flex justify-center items-center bg-[#1976D2] text-[#f6f6f9] text-[18px] border-0 outline-none rounded-r-[36px] cursor-pointer"
                        type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle"
                class="theme-toggle block min-w-[50px] h-[25px] bg-grey cursor-pointer relative rounded-full"></label>
            <a href="#" class="notif text-[20px] relative">
                <i class='bx bx-bell'></i>
                <span
                    class="count absolute top-[-6px] right-[-6px] w-[20px] h-[20px] bg-[#D32F2F] text-[#f6f6f6] border-2 border-[#f6f6f9] font-semibold text-[12px] flex items-center justify-center rounded-full ">12</span>
            </a>
            <a href="#" class="profile">
                <img class="w-[36px] h-[36px] object-cover rounded-full" width="36" height="36" src=".././assets/images/img1.jpg">
            </a>
        </nav>

        <!-- end nav -->
        <main class=" mainn w-full p-[36px_24px] max-h-[calc(100vh_-_56px)]">
            <div class="header flex items-center justify-between gap-[16px] flex-wrap">
                <div class="left">
                    <ul class="breadcrumb flex items-center space-x-[16px]">
                        <li class="text-[#363949]"><a class="active" href="listClients.php">
                                index &npr;
                            </a></li>
                        
                        <li class="text-[#363949]"><a href="listCars.php" >Etudients &npr;</a></li> 
                        <li class="text-[#363949]"><a href="listContrat.php">Enseignants &npr;</a></li> 
                        <li class="text-[#363949]"><a href="statistic.php">Cours &npr;</a></li>
                        <li class="text-[#363949]"><a href="statistic.php">Categorys &npr;</a></li>
                        <li class="text-[#363949]"><a href="statistic.php">Tags &npr;</a></li>

                    </ul>

                </div>
                <a  href="#"
                    class="buttonaddd report h-[40px] px-[20px] rounded-[10px] bg-[#1976D2] text-[#f6f6f6] flex items-center justify-center gap-[10px] font-bold p-6">
                    <span>Rapport &npr;</span>
                </a>
            </div>
            <!-- insights-->
            <ul class="insights flex justify-center items-center grid grid-cols-[repeat(3,_minmax(240px,_1fr))] gap-[24px] mt-[36px] w-full mx-auto">
    <li>
        <i class="fa-solid fa-chalkboard-teacher"></i>
        <span class="info">
            <h3>
                <?php
                    if ($result && isset($result['total_enseignant'])) {
                        echo $result['total_enseignant'];
                    } else {
                        echo "No data available.";
                    }
                ?>
            </h3>
            <p>Enseignant</p>
        </span>
    </li>
    <li>
        <i class="fa-solid fa-user-graduate"></i>
        <span class="info">
            <h3>
                <?php
                    if ($result && isset($result['total_etudient'])) {
                        echo $result['total_etudient'];
                    } else {
                        echo "No data available.";
                    }
                ?>
            </h3>
            <p>Étudiants</p>
        </span>
    </li>
    <li>
        <i class="fa-solid fa-book"></i>
        <span class="info">
            <h3>
                <?php
                    if ($result && isset($result['total_cours'])) {
                        echo $result['total_cours'];
                    } else {
                        echo "No data available.";
                    }
                ?>
            </h3>
            <p>Cours</p>
        </span>
    </li>
    <li class="flex items-center gap-3">
        <div class="icon bg-yellow-200 rounded-full">
            <i class="fa-solid fa-users text-xl text-yellow-600"></i>
        </div>
        <span class="info">
            <h3 class="text-lg font-semibold">
                <?php
                    if ($result && isset($result['total_users_activie'])) {
                        echo $result['total_users_activie'];
                    } else {
                        echo "No data available.";
                    }
                ?>
            </h3>
            <p>Total Utilisateurs Actifs</p>
        </span>
    </li>
    <!-- <li class="flex items-center gap-3">
        <div class="icon bg-green-200 rounded-full">
            <i class="fa-solid fa-check text-xl text-green-600"></i>
        </div>
        <span class="info">
            <h3 class="text-lg font-semibold">
                <?php
                    if ($result && isset($result['total_res_acc'])) {
                        echo $result['total_res_acc'];
                    } else {
                        echo "No data available.";
                    }
                ?>
            </h3>
            <p>Réservations Acceptées</p>
        </span>
    </li>
    <li class="flex items-center gap-3">
        <div class="icon bg-red-200 rounded-full">
            <i class="fa-solid fa-times text-xl text-red-600"></i>
        </div>
        <span class="info">
            <h3 class="text-lg font-semibold">
                <?php
                    if ($result && isset($result['total_res_ref'])) {
                        echo $result['total_res_ref'];
                    } else {
                        echo "No data available.";
                    }
                ?>
            </h3>
            <p>Réservations Rejetées</p>
        </span>
    </li> -->
</ul>


           <!-- Data Content -->
<div class="bottom-data flex flex-wrap gap-[24px] mt-[24px] w-full">
    <div class="orders flex-grow flex-[1_0_500px]">
        <div class="header flex items-center gap-[16px] mb-[24px]">
            <i class='bx bx-list-check'></i>
            <h3 class="mr-auto text-[24px] font-semibold">Statistic</h3>
            <i class='bx bx-filter'></i>
            <i class='bx bx-search'></i>
        </div>
        <!-- Tables -->
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">ID Inscription</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Cours</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Description</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Enseignant</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Etudient  </th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Date Inscription</th>
                    <th class="pb-3 px-5 text-sm text-left border-b border-grey">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                try {
                    $cours = new Inscription();
                    $res = $cours->getAllInscriptions();
                    if ($res) {
                        foreach ($res as $r) {
                            echo "<tr class='hover:bg-gray-100 transition-all duration-300'>";
                            echo '<td class="border p-4 text-center text-sm font-medium text-gray-700">' . htmlspecialchars($r['idInscription']) . '</td>';
                            echo '<td class="border p-4 text-center text-sm text-gray-700">' . htmlspecialchars($r['course_title']) . '</td>';
                            echo '<td class="border p-4 text-center text-sm text-gray-700">' . htmlspecialchars($r['course_description']) . '</td>';
                            echo '<td class="border p-4 text-center text-sm text-gray-700">' . htmlspecialchars($r['teacher_name']) . '' . htmlspecialchars($r['teacher_surname']) . '</td>';
                            echo '<td class="border p-4 text-center text-sm text-gray-700">' . htmlspecialchars($r['student_name']) . '' . htmlspecialchars($r['student_surname']) . '</td>';
                            echo '<td class="border p-4 text-center text-sm text-gray-700">' . htmlspecialchars($r['date_inscription']) . '</td>';
                            echo '<td class="border p-4 text-center">';
                            echo '<a href="accepter_res.php?idInscription=' . $r['idInscription'] . '" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-all duration-300 mx-2">Accepter</a>';
                            echo '<a href="refuser_res.php?idInscription=' . $r['idInscription'] . '" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-300 mx-2">Refuser</a>';
                            echo '</td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center p-2'>No Reservation available.</td></tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='8' class='text-center p-2 text-red-500'>Error: " . $e->getMessage() . "</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</div>


        </main>
    </div>

    <div id="addClientForm"
        class="add-client-form fixed  right-[-100%] w-full max-w-[400px] h-[580px] shadow-[2px_0_10px_rgba(0,0,0,0.1)] p-6 flex flex-col gap-5 transition-all duration-700 ease-in-out z-50 top-[166px]">
        <form action=".././controllers/controlCar.php" method="post" class="flex flex-col gap-4">
            <h2 class="text-2xl font-semibold  mb-5">Add Car</h2>
            <div class="form-group flex flex-col">
                <label for="nummatrucle" class="text-sm text-gray-700 mb-1">Registration number </label>
                <input name="NumMatricle" type="text" id="nummatrucle" placeholder="Enter the vehicle Sirie"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
            </div>
            <div class="form-group flex flex-col">
                <label for="marque" class="text-sm text-gray-700 mb-1">Mark</label>
                <input name="Mark" type="text" id="marque" placeholder="Enter the vehicle Mark"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
            </div>
            <div class="form-group flex flex-col">
                <label for="modele" class="text-sm text-gray-700 mb-1">Model</label>
                <input name="Model" type="text" id="modl" placeholder="Enter the vehicle Model"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
            </div>
            <div class="form-group flex flex-col">
                <label for="year" class="text-sm text-gray-700 mb-1">Year</label>
                <input type="number" id="vehicleYear" name="1" min="2008" max="2024" required
                    placeholder="Enter the vehicle year"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
            </div>
            <div class="form-group flex flex-col">
                <label for="carImage" class="text-sm text-gray-700 mb-1">Car Image</label>
                <input type="text" name="carImage" id="carImage" accept="image/*"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
            </div>
            <button type="submit"
                class="submit-btn border-none px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out"
                name="Add">Add</button>
            <button type="button" id="closeForm"
                class="close-btn border-none px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out">Close</button>
        </form>
    </div>

    <div id="editform"
        class="add-client-form fixed  right-[-100%] w-full max-w-[400px] h-[580px] shadow-[2px_0_10px_rgba(0,0,0,0.1)] p-6 flex flex-col gap-5 transition-all duration-700 ease-in-out z-50 top-[166px]">
        <form action=".././controllers/controlCar.php?Numedit=<?php echo $val[0]['NumImmatriculation'] ?>" method="post"
            class="flex flex-col gap-4">
            <h2 class="text-2xl font-semibold  mb-5">Update Car</h2>
            <div class="form-group flex flex-col">
                <label for="nummatrucle" class="text-sm text-gray-700  mb-1">New Registration number</label>
                <input name="NumMatricle" type="text" id="nummatrucle" placeholder="Enter the vehicle Sirie"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm"
                    value="<?php if (isset($val[0]['NumImmatriculation']))
                        echo $val[0]['NumImmatriculation'] ?>">
                </div>
                <div class="form-group flex flex-col">
                    <label for="marque" class="text-sm text-gray-700 mb-1">New Mark</label>
                    <input name="Mark" type="text" id="marque" placeholder="Enter the vehicle Mark"
                        class="p-2 border border-gray-300 rounded-lg outline-none text-sm"
                        value="<?php if (isset($val[0]['Marque']))
                        echo $val[0]['Marque'] ?>">
                </div>
                <div class="form-group flex flex-col">
                    <label for="Model" class="text-sm text-gray-700 mb-1">New Model</label>
                    <input name="Model" type="text" id="Model" placeholder="Enter the vehicle Model"
                        class="p-2 border border-gray-300 rounded-lg outline-none text-sm"
                        value="<?php if (isset($val[0]['Modele']))
                        echo $val[0]['Modele'] ?>">
                </div>
                <div class="form-group flex flex-col">
                    <label for="year" class="text-sm text-gray-700 mb-1">New Year</label>
                    <input type="number" id="vehicleYear" name="vehYear" min="2008" max="2024" required
                        placeholder="Enter the vehicle year"
                        class="p-2 border border-gray-300 rounded-lg outline-none text-sm"
                        value="<?php if (isset($val[0]['Annee']))
                        echo $val[0]['Annee'] ?>">
                </div>
                <div class="form-group flex flex-col">
                    <label for="carImage" class="text-sm text-gray-700 mb-1">Car Image</label>
                    <input type="text" name="carImage" id="carImage" accept="image/*"
                        class="p-2 border border-gray-300 rounded-lg outline-none text-sm"
                        value="<?php if (isset($val[0]['Image']))
                        echo $val[0]['Image'] ?>">
                </div>
                <button type="submit"
                    class="submit-btn border-none px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out"
                    name="editveh">Edit</button>
                <button type="button" id="colseedit"
                    class="close-btn border-none px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out">Close</button>
            </form>
        </div>

        <script>
    
    document.querySelectorAll('.buttonaddd').forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault(); 
        Swal.fire({
            title: '😎 Coming Soon! 🚀',
            html: `
                <p>Oops! Looks like this feature is still in the works! <span>🛠️</span></p>
                <p>We’re not quite ready for it yet, but it will be worth the wait! <span>🍿</span></p>
                <p>Stay tuned! <span>🎉</span></p>
            `,
            icon: 'info',
            showConfirmButton: true,
            confirmButtonText: 'Got it! 😅',
            confirmButtonColor: '#1976D2',
        });
    });
});



</script>
        <script src=".././assets/main.js"></script>
    </body>
    </html>