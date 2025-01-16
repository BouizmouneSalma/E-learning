<?php
// require_once '../autoload.php';
// use Classes\Category;
// use Classes\Vehicle;
// session_start();

// if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 1)) {
//     header("Location: ../index.html");
//     exit;
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     try {
//         $models = $_POST['model'] ?? [];
//         $prices = $_POST['price_day'] ?? [];
//         $availabilities = $_POST['disponibilite'] ?? [];
//         $transmissionTypes = $_POST['transmissionType'] ?? [];
//         $fuelTypes = $_POST['fuelType'] ?? [];
//         $mileages = $_POST['mileage'] ?? [];
//         $categories = $_POST['category'] ?? [];
//         $images = $_FILES['imageVeh'] ?? [];

//         if (!is_array($models) || !is_array($prices) || !is_array($availabilities)) {
//             throw new Exception("Invalid form submission.");
//         }

//         for ($i = 0; $i < count($models); $i++) {
//             $imageName = null;

//             if (isset($images['tmp_name'][$i]) && $images['error'][$i] === UPLOAD_ERR_OK) {
//                 $imageTmp = $images['tmp_name'][$i];
//                 $originalImageName = basename($images['name'][$i]);
//                 $sanitizedImageName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9\._-]/', '', $originalImageName);
//                 $uploadDir = realpath(__DIR__ . '/../assets/image/') . '/';
//                 $imagePath = $uploadDir . $sanitizedImageName;

//                 if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
//                     throw new Exception('Failed to create upload directory.');
//                 }

//                 if (move_uploaded_file($imageTmp, $imagePath)) {
//                     $imageName = $sanitizedImageName;
//                 } else {
//                     throw new Exception('Failed to move the uploaded image.');
//                 }
//             } else {
//                 throw new Exception('File upload error or no file uploaded.');
//             }

//             $vehicle = new Vehicle(
//                 null,
//                 $models[$i],
//                 $prices[$i],
//                 $availabilities[$i],
//                 $transmissionTypes[$i],
//                 $fuelTypes[$i],
//                 $mileages[$i],
//                 $imageName,
//                 $categories[$i]
//             );

//             if (!$vehicle->addVeh()) {
//                 throw new Exception("Failed to save vehicle $i.");
//             }
//         }

//     } catch (Exception $e) {
//         echo "Error: " . $e->getMessage();
//     }
// }

// $result = Vehicle::showStatistic();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href=".././assets/style.css">
    <script src=".././assets/tailwind.js"></script>
</head>

<body class="">
    <div class=" fixed top-0 left-0  w-[230px] h-[100%] z-50 overflow-hidden sidebar ">
        <a href="" class="logo text-xl font-bold h-[56px] flex items-center text-[#1976D2] z-30 pb-[20px] box-content">
            <i class=" mt-4 text-xxl max-w-[60px] flex justify-center "><i class="fa-solid fa-car-side"></i></i>
            <div class="logoname ml-2"><span>Drive
                </span>Loc</div>
        </a>
        <ul class="side-menu w-full mt-12">
    <li class=" h-12 bg-transparent ml-2.5 rounded-l-full p-1">
        <a href="../index.php">
            <i class="fa-solid fa-chart-pie"></i> Statistic
        </a>
    </li>
    <li class="h-12 bg-transparent ml-2.5 rounded-l-full p-1">
        <a href="listEtudiants.php">
            <i class="fa-solid fa-graduation-cap"></i> Étudiants
        </a>
    </li>
    <li class="h-12  bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listEnseignants.php">
            <i class="fa-solid fa-chalkboard-teacher"></i> Enseignants
        </a>
    </li>
    <li class="h-12 active bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listCours.php">
            <i class="fa-solid fa-book-open"></i> Cours
        </a>
    </li>
    <li class="h-12 bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listCategory.php">
            <i class="fa-solid fa-layer-group"></i> Catégories
        </a>
    </li>
    <li class="h-12  bg-transparent ml-1.5 rounded-l-full p-1">
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
                <img class="w-[36px] h-[36px] object-cover rounded-full" width="36" height="36"
                    src=".././assets/image/charaf.png.jfif">
            </a>
        </nav>

        <main class=" mainn w-full p-[36px_24px] max-h-[calc(100vh_-_56px)]">
            <div class="header flex items-center justify-between gap-[16px] flex-wrap">
                <div class="left">
                    <ul class="breadcrumb flex items-center space-x-[16px]">
                        <li class="text-[#363949]"><a href="listClients.php">
                                index &npr;
                            </a></li>
                        /
                        <li class="text-[#363949]"><a href="listCars.php">Clients &npr;</a></li> /
                        <li class="text-[#363949]"><a href="listContrat.php" class="active">Vehicles &npr;</a></li> /
                        <li class="text-[#363949]"><a href="statistic.php">Categorys &npr;</a></li>

                    </ul>

                </div>
                <a id="buttonadd" href="#"
                    class="report h-[36px] px-[16px] rounded-[36px] bg-[#1976D2] text-[#f6f6f6] flex items-center justify-center gap-[10px] font-medium">
                    <i class="fa-solid fa-car"></i>
                    <span>Add Vehicle</span>
                </a>
            </div>
            <!-- insights-->
            <ul class="insights grid grid-cols-[repeat(auto-fit,_minmax(240px,_1fr))] gap-[24px] mt-[36px]">
                <!-- <li>
                    <i class="fa-solid fa-user-group"></i>
                    <span class="info">
                        <h3>
                            <?php
                            // echo $result['total_clients'];
                            ?>
                        </h3>
                        <p>All Vehicles </p>
                    </span>
                </li> -->
                <li><i class="fa-solid fa-file-signature"></i>
                    <span class="info">
                        <h3>
                            <?php
                            if ($result && isset($result['total_vec_Unavailable'])) {
                                echo $result['total_vec_Unavailable'];
                            } else {
                                echo "No data available.";
                            }
                            ?>
                        </h3>
                        <p>Vehicles Unavailable</p>
                    </span>
                </li>
                <li><i class="fa-solid fa-car-side"></i>
                    <span class="info">
                        <h3>
                            <?php
                            if ($result && isset($result['total_veh_Available'])) {
                                echo $result['total_veh_Available'];
                            } else {
                                echo "No data available.";
                            }
                            ?>
                        </h3>
                        <p>Vehicles Available</p>
                    </span>
                </li>

            </ul>
            <!---- data content ---->
            <div class="bottom-data flex flex-wrap gap-[24px] mt-[24px] w-full">
    <div class="orders flex-grow flex-[1_0_500px]">
        <div class="header flex items-center gap-[16px] mb-[24px]">
            <i class='bx bx-list-check'></i>
            <h3 class="mr-auto text-[24px] font-semibold">List Vehicles</h3>
            <i class='bx bx-filter'></i>
            <i class='bx bx-search'></i>
        </div>
        <!--- tables---->
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Registration number</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Image</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Model</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Category</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Price/day</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Transmission Type</th>
                    <th class="pb-3 px-5 text-sm text-left border-b border-grey">Fuel Type</th>
                    <th class="pb-3 px-5 text-sm text-left border-b border-grey">Mileage</th>
                    <th class="pb-3 px-5 text-sm text-left border-b border-grey">Disponibilite</th>
                    <th class="pb-3 px-5 text-sm text-left border-b border-grey">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $vehicle = Vehicle::ShowVeh();

                    if ($vehicle) {
                        foreach ($vehicle as $vh) {
                            $availabilityColor = $vh['vehicle_availability'] === 'Available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
                            $availabilityText = ucfirst($vh['vehicle_availability']);
                            echo "<tr class='hover:bg-gray-50 transition-all duration-300'>";
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($vh['vehicle_id']) . '</td>';
                            echo '<td class="border p-4"><img src="../assets/image/' . htmlspecialchars($vh['vehicle_image']) . '" alt="Vehicle Image" class="w-24 h-24 rounded-lg shadow-md" /></td>';
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($vh['vehicle_model']) . '</td>';
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($vh['category_name']) . '</td>';
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($vh['vehicle_price_per_day']) . '</td>';
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($vh['vehicle_transmission']) . '</td>';
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($vh['vehicle_fuel_type']) . '</td>';
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($vh['vehicle_mileage']) . '</td>';
                            echo '<td class="border p-4"><span class="' . $availabilityColor . ' px-2 py-1 rounded-full text-center">' . $availabilityText . '</span></td>';
                            echo '<td class="border p-4 flex space-x-2">';
                            echo '<a href="edit_vehicle.php?id=' . $vh['vehicle_id'] . '" class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>';
                            echo '|';
                            echo '<a href="delete_vehicle.php?id_vehicle=' . $vh['vehicle_id'] . '" class="text-red-600 hover:text-red-800 font-semibold" onclick="return confirm(\'Are you sure you want to delete this vehicle?\')">Delete</a>';
                            echo '|';
                            echo '<a href="javascript:void(0);" class="text-green-600 hover:text-green-800 font-semibold" onclick="showVehicleDetails(' . $vh['vehicle_id'] . ')">View</a>';
                            echo '</td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center p-4 text-gray-500'>No vehicles available.</td></tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='8' class='text-center p-4 text-red-500'>Error: " . $e->getMessage() . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

        </main>
    </div>

    <div id="addClientForm"
        class="add-client-form fixed right-[-100%] rounded-xl w-full max-w-[400px] h-[580px] shadow-[2px_0_10px_rgba(0,0,0,0.1)] flex flex-col gap-5 transition-all duration-700 ease-in-out z-50 top-[166px] bg-white">
        <form action="listVehicle.php" method="POST" enctype="multipart/form-data"
            class="flex flex-col gap-4 overflow-y-auto h-full p-6 pb-20" id="vehicleForm">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold">Add Vehicles</h2>
                <button type="button" id="closeForm"
                    class="close-btn bg-red-500 text-white font-extrabold px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out">
                    X
                </button>
            </div>

            <!-- Dynamic Vehicle Sections -->
            <div id="vehicleSections">
                <!-- Template for Vehicle -->
                <div class="vehicle-section border-b-2 pb-4 mb-4">
                    <h3 class="text-lg font-semibold mb-2">Vehicle Details</h3>
                    <div class="form-group flex flex-col">
                        <label for="category" class="text-sm text-gray-700 mb-1">Category</label>
                        <select name="category[]" class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
                            <?php
                            try {

                                $category = new Category(null, null, null);
                                $resultCat = $category->ShowCategory();

                                if ($resultCat) {
                                    foreach ($resultCat as $cat) {
                                        echo '<option class="text-black" value="' . htmlspecialchars($cat['id_category']) . '">' . htmlspecialchars($cat['name']) . '</option>';
                                    }
                                } else {
                                    echo '<option value="">No categories found</option>';
                                }
                            } catch (\PDOException $e) {
                                echo '<option value="">Error loading categories</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group flex flex-col">
                        <label for="model" class="text-sm text-gray-700 mb-1">Model</label>
                        <input name="model[]" type="text" id="model" placeholder="Enter the vehicle model"
                            class="p-2 border border-gray-300 rounded-lg outline-none text-sm" required>
                    </div>

                    <!-- Price Per Day -->
                    <div class="form-group flex flex-col">
                        <label for="price_day" class="text-sm text-gray-700 mb-1">Price/day</label>
                        <input type="number" id="price_day" name="price_day[]" placeholder="Enter the vehicle price/day"
                            class="p-2 border border-gray-300 rounded-lg outline-none text-sm" required>
                    </div>

                    <!-- Availability -->
                    <div class="form-group flex flex-col">
                        <label for="disponibilite" class="text-sm text-gray-700 mb-1">Availability</label>
                        <select name="disponibilite[]" id="disponibilite"
                            class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
                            <option value="available">Available</option>
                            <option value="unavailable">Unavailable</option>
                        </select>
                    </div>

                    <!-- Transmission Type -->
                    <div class="form-group flex flex-col">
                        <label for="transmissionType" class="text-sm text-gray-700 mb-1">Transmission Type</label>
                        <select name="transmissionType[]" id="transmissionType"
                            class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
                            <option value="automatic">Automatic</option>
                            <option value="manual">Manual</option>
                        </select>
                    </div>

                    <!-- Fuel Type -->
                    <div class="form-group flex flex-col">
                        <label for="fuelType" class="text-sm text-gray-700 mb-1">Fuel Type</label>
                        <select name="fuelType[]" id="fuelType"
                            class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
                            <option value="petrol">Petrol</option>
                            <option value="diesel">Diesel</option>
                            <option value="electric">Electric</option>
                        </select>
                    </div>

                    <!-- Mileage -->
                    <div class="form-group flex flex-col">
                        <label for="mileage" class="text-sm text-gray-700 mb-1">Mileage</label>
                        <input type="number" name="mileage[]" id="mileage" placeholder="Enter the vehicle mileage"
                            class="p-2 border border-gray-300 rounded-lg outline-none text-sm" required>
                    </div>

                    <!-- Vehicle Image -->
                    <div class="form-group flex flex-col">
                        <label for="imageVeh" class="text-sm text-gray-700 mb-1">Vehicle Image</label>
                        <input type="file" name="imageVeh[]" multiple id="imageVeh" accept="image/*"
                            class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
                    </div>

                </div>
            </div>

            <!-- Add/Remove Vehicle Buttons -->
            <div class="flex justify-between items-center">
                <button type="button" id="addVehicle"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out">
                    Add Vehicle
                </button>
                <button type="button" id="removeVehicle"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out">
                    Remove Vehicle
                </button>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="submit-btn bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out mt-4"
                name="submit">Submit Vehicles</button>
        </form>
    </div>


    <!-- Edit Car Form -->
    <?php
    if (isset($_GET['id_vehicle'])) {
        $id_vehicle = $_GET['id_vehicle'];

        try {
            $car = Vehicle::ShowDetails($id_vehicle);

        } catch (\PDOException $e) {
            echo '<p class="text-red-500">Error fetching vehicle details: ' . $e->getMessage() . '</p>';
        }
    }


    ?>
    <div id="editCarForm"
        class="edit-car-form hidden fixed right-[-100%] rounded-xl w-full max-w-[400px] h-[580px] shadow-[2px_0_10px_rgba(0,0,0,0.1)] flex flex-col gap-5 transition-all duration-700 ease-in-out z-50 top-[166px] bg-white">
        <form action="" method="post" enctype="multipart/form-data"
            class="flex flex-col gap-4 overflow-y-auto h-full p-6 pb-20">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold">Edit Car</h2>
                <button type="button" id="closeEditForm"
                    class="close-btn bg-red-500 text-white font-extrabold px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out">
                    X
                </button>
            </div>

            <input type="hidden" name="id_vehicle" value="<?php echo htmlspecialchars($car['id_vehicle'] ?? ''); ?>">

            <div class="form-group flex flex-col">
                <label for="category" class="text-sm text-gray-700 mb-1">Category</label>
                <select name="category" id="category"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
                    <?php
                    try {
                        $category = new Category(null, null, null);
                        $resultCat = $category->ShowCategory();

                        if ($resultCat) {
                            foreach ($resultCat as $cat) {
                                $selected = isset($car['category']) && $cat['id_category'] == $car['category'] ? 'selected' : '';
                                echo '<option value="' . htmlspecialchars($cat['id_category']) . '" ' . $selected . '>' . htmlspecialchars($cat['name']) . '</option>';
                            }
                        } else {
                            echo '<option value="">No categories found</option>';
                        }
                    } catch (\PDOException $e) {
                        echo "Error showing Category: " . $e->getMessage();
                    }
                    ?>
                </select>
            </div>

            <div class="form-group flex flex-col">
                <label for="model" class="text-sm text-gray-700 mb-1">Model</label>
                <input name="model" type="text" id="model" value="<?php echo htmlspecialchars($car['model'] ?? ''); ?>"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm" required>
            </div>

            <div class="form-group flex flex-col">
                <label for="price_day" class="text-sm text-gray-700 mb-1">Price/day</label>
                <input type="number" id="price_day" name="price_day"
                    value="<?php echo htmlspecialchars($car['price_per_day'] ?? ''); ?>"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm" required>
            </div>

            <!-- Continue with similar pattern for other fields -->
            <div class="form-group flex flex-col">
                <label for="mileage" class="text-sm text-gray-700 mb-1">Mileage</label>
                <input type="number" name="mileage" id="mileage"
                    value="<?php echo htmlspecialchars($car['mileage'] ?? ''); ?>"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm" required>
            </div>

            <div class="form-group flex flex-col">
                <label for="imageVeh" class="text-sm text-gray-700 mb-1">Vehicle Image</label>
                <input type="file" name="imageVeh" id="imageVeh" accept="image/*"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
                <p class="text-sm text-gray-500 mt-1">Leave empty to keep the current image.</p>
            </div>

            <button type="submit"
                class="submit-btn bg-green-500 text-white px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out"
                name="submit">Save Changes</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttonsEdit = document.querySelectorAll('.buttonedit');
            const editForm = document.getElementById('editCarForm');
            const closeEditForm = document.getElementById('closeEditForm');

            if (editForm) {
                buttonsEdit.forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();

                        editForm.classList.remove('hidden');
                        editForm.style.right = "0";
                    });
                });

                if (closeEditForm) {
                    closeEditForm.addEventListener('click', () => {
                        editForm.style.right = "-100%";
                    });
                }
            } else {
                console.error('Edit form not found');
            }
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showVehicleDetails(id) {
            fetch('view_vehicle.php?id=' + id)
                .then(response => response.text())
                .then(data => {
                    Swal.fire({
                        title: 'Vehicle Details',
                        html: data,
                        icon: 'info',
                        showCloseButton: true,
                        confirmButtonText: 'Close'
                    });
                })
                .catch(error => {
                    console.error('Error fetching vehicle details:', error);
                });
        }
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const vehicleSections = document.getElementById('vehicleSections');
            const addVehicleButton = document.getElementById('addVehicle');
            const removeVehicleButton = document.getElementById('removeVehicle');

            addVehicleButton.addEventListener('click', () => {
                const newSection = vehicleSections.firstElementChild.cloneNode(true);
                vehicleSections.appendChild(newSection);
            });

            removeVehicleButton.addEventListener('click', () => {
                if (vehicleSections.children.length > 1) {
                    vehicleSections.lastElementChild.remove();
                }
            });
        });
    </script>
    <script src=".././assets/main.js"></script>
</body>

</html>