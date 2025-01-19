
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
          <a href="indexEns.php" class="flex items-center gap-4 py-2 px-4 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md">
          <i class="fas fa-tachometer-alt text-sm"></i>
          <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="etudient.php" class="flex items-center gap-4 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
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
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Welcome to Home</h1>
        <p class="text-gray-600">Manage your courses, students, and much more.</p>
        </div>
        <div>
            <button class="p-2 bg-indigo-900 rounded-xl font-bold text-white">Rapport</button>
        </div>
     </div>
    <div class=" mx-8 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-3 mt-8">

<div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
  <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-pink-600 to-pink-400 text-white shadow-pink-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
      <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
    </svg>
  </div>
  <div class="p-4 text-right">
    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total Etudients</p>
    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">

    </h4>
  </div>
  <div class="border-t border-blue-gray-50 p-4">
    <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
      <strong class="text-green-500">+3%</strong>&nbsp;than last month
    </p>
  </div>
</div>
<div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
  <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-600 to-green-400 text-white shadow-green-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
      <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
    </svg>
  </div>
  <div class="p-4 text-right">
    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">New Etudients</p>
    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
    </h4>
  </div>
  <div class="border-t border-blue-gray-50 p-4">
    <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
      <strong class="text-red-500">-2%</strong>&nbsp;than yesterday
    </p>
  </div>
</div>
<div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
  <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-orange-600 to-orange-400 text-white shadow-orange-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
      <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"></path>
    </svg>
  </div>
  <div class="p-4 text-right">
    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Cours</p>
    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
    <?php echo $statistiques['total_cours']; ?>
    </h4>
  </div>
  <div class="border-t border-blue-gray-50 p-4">
    <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
      <strong class="text-green-500">+5%</strong>&nbsp;than yesterday
    </p>
  </div>
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