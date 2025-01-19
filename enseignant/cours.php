<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
    <title>Cours - Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

<style>
    @media screen and (max-width: 768px) {
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    }
    html, body {
    height: 100%;
    overflow: hidden; /* Prevent unexpected scrollbars */
}

</style>
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
          <a href="etudient.php" class="flex items-center gap-4 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
            <i class="fas fa-users text-sm"></i>
            <span>Étudiants</span>
          </a>
        </li>
        <li>
          <a href="cours.php" class="flex items-center gap-4 py-2 px-4 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md">
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
        <form action="../logout.php" method="POST">
        <button type="submit" name="submit"  class="flex items-center gap-4 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-sign-out-alt text-sm"></i>
          <span>Log Out</span>
      </button>
        </form>
        
      </div>
    </nav>
  </aside>
  <!-- Main Content -->
  <div class="xl:ml-72 transition-all duration-300 fixed right-0 left-0 top-0 max-h-screen overflow-y-auto">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full flex items-center justify-between bg-white shadow-sm px-4 py-3 z-50">
      <button class="text-gray-800 focus:outline-none xl:hidden" id="menuOpen">
        <i class="fas fa-bars"></i>
      </button>
      <h2 class="text-gray-700 font-semibold pl-80">Home</h2>
      <div class="relative">
        <input type="text" placeholder="Search" class="border rounded-md pl-10 pr-4 py-2 text-gray-700 w-64">
        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
      </div>
    </nav>

    <div class="mt-24 ">
      
    <!-- Content -->
     <!-- Main Content -->
<div class="flex justify-between items-center mx-8  ">
  <div class="p-4">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Welcome to Cours</h1>
    <p class="text-gray-600">Manage your courses, students, and much more.</p>
  </div>
  <div>
    <button id="addCourseButton" class="p-2 bg-indigo-500 rounded-xl font-bold text-white">Add new Cours</button>
  </div>
</div>
<!-- Add Course Modal -->
<div id="addCourseModal" class="fixed inset-0 z-50 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
  <div class="bg-white rounded-lg p-6 w-96 shadow-xl relative">
    <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.72 9.31l.003-.032.004-.032a5.5 5.5 0 00-9.67-3.425m5.663 3.457a5.501 5.501 0 11-.76 8.493m0-8.492V9.06M9.12 16.78l-.003.032a5.501 5.501 0 01-.174-.478M12 3.75V4.25M4.75 12H5.25M19.75 12h-.5M3.03 9.56l.707.707M20.96 9.56l-.707.707M3.03 14.44l.707-.707M20.96 14.44l-.707-.707M3.75 12a9.004 9.004 0 016.17-8.48" />
      </svg>
      Add New Course
      
    </h2>
    <form id="addCourseForm" method="POST" action="add_cours.php" enctype="multipart/form-data">
    <input type="hidden" name="enseignant_id" id="enseignant_id" value="<?php echo intval($_SESSION['id_user']); ?>">
    <!-- Title -->
      <div class="mb-4">
        <label for="titre" class="block text-gray-700 font-bold flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path d="M17 7H3a1 1 0 000 2h14a1 1 0 100-2zM3 11h14a1 1 0 100-2H3a1 1 0 000 2zm14-4H3a1 1 0 000 2h14a1 1 0 100-2z" />
          </svg>
          Title:
        </label>
        <input type="text" id="titre" name="titre" class="w-full p-2 border rounded-lg" placeholder="Enter course title">
      </div>
      <!-- Description -->
      <div class="mb-4">
        <label for="description" class="block text-gray-700 font-bold flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path d="M5 4a3 3 0 016 0h4a1 1 0 011 1v10a1 1 0 01-1 1H5a1 1 0 01-1-1V5a1 1 0 011-1h4a3 3 0 00-3-3z" />
          </svg>
          Description:
        </label>
        <textarea id="description" name="description" class="w-full p-2 border rounded-lg" placeholder="Enter course description"></textarea>
      </div>
      <!-- Type -->
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Type:</label>
        <div class="flex items-center space-x-4">
          <label class="flex items-center">
            <input type="radio" name="type" value="video" checked class="mr-2" onclick="toggleContent('video')">
            <span>Video</span>
          </label>
          <label class="flex items-center">
            <input type="radio" name="type" value="text" class="mr-2" onclick="toggleContent('text')">
            <span>Text</span>
          </label>
        </div>
      </div>
      <!-- Content -->
      <div class="mb-4" id="videoUpload">
        <label for="contenuVideo" class="block text-gray-700 font-bold flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path d="M4.75 3.75A.75.75 0 014 4.5v11a.75.75 0 001.22.56l4.03-3.63a.75.75 0 01.98 0l4.03 3.63a.75.75 0 001.22-.56v-11a.75.75 0 00-.75-.75H4.75zM5 5.5h10v7.9l-3.03-2.73a2.25 2.25 0 00-2.94 0L5 13.4V5.5z" />
          </svg>
          Upload Video:
        </label>
        <input type="file" id="contenuVideo" name="contenuVideo"  class="w-full p-2 border rounded-lg">
      </div>

      <div class="mb-4 hidden" id="textArea">
        <label for="contenuText" class="block text-gray-700 font-bold">Content (Text):</label>
        <textarea id="contenuText" name="contenuText" class="w-full p-2 border rounded-lg" placeholder="Enter text content"></textarea>
      </div>
      <div class="mb-4">
        <label for="categorie_id" class="block text-gray-700 font-bold">Category</label>
        <select name="categorie" id="categorie" class="p-2 rounded  bg-slate-100">
          
        </select>
      </div>
      <div class="flex justify-end">
        <button type="button" id="closeModal" class="mr-2 p-2 bg-gray-500 rounded-xl text-white">Cancel</button>
        <button type="submit" name="submitcours" class="p-2 bg-indigo-500 rounded-xl text-white">Submit</button>
      </div>
    </form>
  </div>
</div>

<div class="container mx-auto p-4 overflow-hidden">
  <h2 class="text-2xl font-semibold mb-4">Courses Video</h2>
  <div class="overflow-x-auto">
    <div class="max-h-64 overflow-y-auto border border-gray-300 rounded-lg shadow-md">
      <table class="min-w-full bg-white">
        <thead class="bg-indigo-600 text-white sticky top-0">
          <tr>
            <th class="px-4 py-2 text-left">ID</th>
            <th class="px-4 py-2 text-left">Title</th>
            <th class="px-4 py-2 text-left">Description</th>
            <th class="px-4 py-2 text-left">Category</th>
            <th class="px-4 py-2 text-left">Date</th>
            <th class="px-4 py-2 text-left">Type</th>
            <th class="px-4 py-2 text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
         
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="container mx-auto p-4">
  <h2 class="text-2xl font-semibold mb-4">Courses Text</h2>
  <div class="overflow-x-auto">
    <div class="max-h-64 overflow-y-auto border border-gray-300 rounded-lg shadow-md">
      <table class="min-w-full bg-white">
        <thead class="bg-green-600 text-white sticky top-0">
          <tr>
            <th class="px-4 py-2 text-left">ID</th>
            <th class="px-4 py-2 text-left">Title</th>
            <th class="px-4 py-2 text-left">Description</th>
            <th class="px-4 py-2 text-left">Category</th>
            <th class="px-4 py-2 text-left">Date</th>
            <th class="px-4 py-2 text-left">Type</th>
            <th class="px-4 py-2 text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </div>
</div>


   
  </div>
</div>


<script>
  // pour type e content 
  function toggleContent(type) {
    const videoUpload = document.getElementById('videoUpload');
    const textArea = document.getElementById('textArea');
    if (type === 'video') {
      videoUpload.classList.remove('hidden');
      textArea.classList.add('hidden');
    } else {
      videoUpload.classList.add('hidden');
      textArea.classList.remove('hidden');
    }
  }
// pour model add cours
  const addCourseButton = document.getElementById('addCourseButton');
  const addCourseModal = document.getElementById('addCourseModal');
  const closeModal = document.getElementById('closeModal');
  const addCourseForm = document.getElementById('addCourseForm');
  addCourseButton.addEventListener('click', () => {
    addCourseModal.classList.remove('hidden');
  });
  closeModal.addEventListener('click', () => {
    addCourseModal.classList.add('hidden');
  });

  //pour responsive
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