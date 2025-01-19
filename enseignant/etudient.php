
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
    <title>index - Page</title>
</head>
<body>
<div class="min-h-screen bg-gray-50/50">
  <!-- Sidebar -->
  <aside class="bg-gradient-to-br from-gray-800 to-gray-900 fixed inset-y-0 left-0 transform -translate-x-full xl:translate-x-0 transition-transform duration-300 w-64 z-50 p-4 xl:w-72">
    <div class="flex justify-between items-center border-b border-white/20 pb-4">
      <h6 class="text-white font-semibold text-lg">Youdemy</h6>
      <button class="xl:hidden text-white focus:outline-none" id="sidebarToggle">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <nav class="mt-6">
      <ul class="space-y-2">
       
        <li>
          <a href="indexEns.php" class="flex items-center gap-4 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-tachometer-alt text-sm"></i>
          <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="etudient.php" class="flex items-center gap-4 py-2 px-4 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md">
          <i class="fas fa-users text-sm"></i>
          <span>Étudiants</span>
          </a>
        </li>
        
        <li>
          <a href="cours.php" class="flex items-center gap-4 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
            <i class="fas fa-book text-sm"></i>
            <span>Cours</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center gap-4 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
            <i class="fas fa-bell text-sm"></i>
            <span>Notifications</span>
          </a>
        </li>
      </ul>
      <div class="mt-8">
        <p class="text-sm uppercase text-gray-400 mb-4">Auth Pages</p>
        <a href="#" class="flex items-center gap-4 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-sign-out-alt text-sm"></i>
          <span>Log Out</span>
        </a>
      </div>
    </nav>
  </aside>
  <!-- Main Content -->
  <div class="xl:ml-72 transition-all duration-300">
    <!-- Navbar -->
    <nav class="flex items-center justify-between bg-white shadow-sm px-4 py-3">
      <button class="text-gray-800 focus:outline-none xl:hidden" id="menuOpen">
        <i class="fas fa-bars"></i>
      </button>
      <h2 class="text-gray-700 font-semibold">Home</h2>
      <div class="relative">
        <input type="text" placeholder="Search" class="border rounded-md pl-10 pr-4 py-2 text-gray-700 w-64">
        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
      </div>
    </nav>
    <!-- Content -->
     <div class="flex justify-between items-center mx-8">
        <div class="p-4">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Welcome to Etudient</h1>
        </div>
        <div>
            <button class="p-2 bg-indigo-900 rounded-xl font-bold text-white">Rapport</button>
        </div>
     </div>
   
  </div>
</div>

<script>
  const sidebar = document.querySelector("aside");
  const menuOpen = document.getElementById("menuOpen");
  const sidebarToggle = document.getElementById("sidebarToggle");

  menuOpen.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
  });

  sidebarToggle.addEventListener("click", () => {
    sidebar.classList.add("-translate-x-full");
  });
</script>
</body>
</html>