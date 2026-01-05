<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Code Rebuilt CRM</title>
    
    <!-- Google Fonts: Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: {
                light: '#46ACD7',
                dark: '#2D6FAA',
              },
              dark: '#000000',
            },
            fontFamily: {
              sans: ['Montserrat', 'sans-serif'],
            }
          }
        }
      }
    </script>
    <style>
        body { font-family: 'Montserrat', sans-serif; }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #ccc; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #bbb; }
    </style>
</head>
<body class="flex flex-col h-screen bg-gray-50 overflow-hidden">

    <!-- Top Navigation -->
    <nav class="bg-dark text-white h-14 flex items-center justify-between px-4 shrink-0 z-20">
        <!-- Left: Brand & Search -->
        <div class="flex items-center space-x-6">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-gray-700 rounded flex items-center justify-center text-xs text-gray-400">Logo</div>
                <div class="leading-tight">
                    <div class="font-bold text-sm">Code Rebuilt</div>
                    <div class="text-[10px] text-gray-400">MedSpa</div>
                </div>
            </div>
            <div class="text-gray-400 hover:text-white cursor-pointer">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>

        <!-- Center: Nav Links -->
        <div class="hidden md:flex items-center space-x-1 h-full">
            <a href="#" class="px-3 h-full flex items-center text-sm font-medium text-white border-b-2 border-primary-light bg-white/5">Front Desk</a>
            <a href="#" class="px-3 h-full flex items-center text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 transition-colors">Calendar</a>
            <a href="#" class="px-3 h-full flex items-center text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 transition-colors">Messages</a>
            <a href="#" class="px-3 h-full flex items-center text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 transition-colors">Sales</a>
            <a href="#" class="px-3 h-full flex items-center text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 transition-colors">Clients</a>
            <a href="#" class="px-3 h-full flex items-center text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 transition-colors">Reports</a>
            <a href="#" class="px-3 h-full flex items-center text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 transition-colors">Marketing</a>
            <a href="#" class="px-3 h-full flex items-center text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 transition-colors">Manage</a>
        </div>

        <!-- Right: Actions -->
        <div class="flex items-center space-x-4 text-gray-400">
            <button class="hover:text-white transition-colors"><i class="fa-regular fa-clock text-lg"></i></button>
            <button class="hover:text-white transition-colors relative">
                <i class="fa-solid fa-bell text-lg"></i>
                <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full"></span>
            </button>
            <button class="hover:text-white transition-colors"><i class="fa-solid fa-phone text-lg"></i></button>
            <button class="hover:text-white transition-colors"><i class="fa-solid fa-gear text-lg"></i></button>
            
            <!-- User Profile Dropdown -->
            <div class="relative group">
                <button class="flex items-center space-x-2 hover:text-white transition-colors focus:outline-none">
                    <div class="w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center text-white font-bold text-xs border-2 border-gray-500">
                        <?php echo strtoupper(substr($_SESSION['email'], 0, 1)); ?>
                    </div>
                </button>
                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 text-gray-700 hidden group-hover:block border border-gray-200 z-50">
                    <div class="px-4 py-2 border-b border-gray-100">
                        <p class="text-xs text-gray-500">Signed in as</p>
                        <p class="text-xs font-bold truncate"><?php echo $_SESSION['email']; ?></p>
                    </div>
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50">My Settings</a>
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-50">Support Center</a>
                    <a href="logout.php" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Sign Out</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sub-Header / Toolbar -->
    <div class="bg-white border-b border-gray-200 h-14 flex items-center justify-between px-4 shrink-0 shadow-sm z-10">
        <!-- Left: Date & View -->
        <div class="flex items-center space-x-4">
            <div class="flex flex-col">
                <span class="text-[10px] text-gray-500 font-semibold uppercase tracking-wider">Today's Date</span>
                <div class="flex items-center cursor-pointer group">
                    <span class="text-sm font-bold text-gray-800 group-hover:text-primary-dark transition-colors">
                        <?php echo date('D, M j'); ?>
                    </span>
                    <i class="fa-solid fa-chevron-down text-xs ml-2 text-gray-400 group-hover:text-primary-dark"></i>
                </div>
            </div>
            <div class="h-8 w-px bg-gray-200 mx-2"></div>
            <!-- Search Clients -->
            <div class="relative">
                <input type="text" placeholder="Filter clients" class="pl-2 pr-4 py-1.5 text-sm border-none focus:ring-0 text-gray-600 bg-transparent placeholder-gray-400 w-48">
            </div>
        </div>

        <!-- Right: Controls -->
        <div class="flex items-center space-x-3">
            <div class="flex items-center text-sm text-gray-600 mr-2">
                <span class="mr-2 text-gray-500">Staff:</span>
                <button class="font-semibold hover:text-primary-dark flex items-center">
                    All <i class="fa-solid fa-chevron-down text-xs ml-1.5 text-gray-400"></i>
                </button>
            </div>
            
            <div class="flex items-center bg-gray-100 rounded-md p-0.5 border border-gray-200">
                <button class="px-3 py-1 bg-white text-gray-800 text-xs font-bold rounded shadow-sm border border-gray-200">Today</button>
                <div class="flex items-center mx-1">
                    <button class="p-1 px-2 text-gray-500 hover:text-primary-dark"><i class="fa-solid fa-chevron-left text-xs"></i></button>
                    <button class="p-1 px-2 text-gray-500 hover:text-primary-dark"><i class="fa-solid fa-chevron-right text-xs"></i></button>
                </div>
            </div>

            <div class="flex items-center bg-gray-100 rounded-md p-0.5 border border-gray-200">
                <button class="px-3 py-1.5 bg-white text-gray-800 text-xs font-bold rounded shadow-sm">Schedule</button>
                <button class="px-3 py-1.5 text-gray-500 text-xs font-medium hover:text-gray-800">Cancellations</button>
                <button class="px-3 py-1.5 text-gray-500 text-xs font-medium hover:text-gray-800">Waitlist (0)</button>
            </div>

            <button class="bg-primary-dark hover:bg-primary-light text-white text-xs font-bold px-4 py-2 rounded shadow transition-colors duration-200 flex items-center">
                New Appointment
            </button>
        </div>
    </div>

    <!-- Main Content Board -->
    <main class="flex-1 overflow-x-auto overflow-y-hidden p-4">
        <div class="flex h-full space-x-4 min-w-[1024px]">
            
            <!-- Column 1: Unconfirmed -->
            <div class="flex-1 flex flex-col bg-white rounded-lg shadow-sm border border-gray-200 h-full">
                <div class="p-3 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-gray-800 text-sm">Unconfirmed</h3>
                    <span class="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full font-medium">0</span>
                </div>
                <!-- Empty State -->
                <div class="flex-1 p-4 bg-gray-50/50 flex flex-col items-center justify-center text-gray-400">
                     <i class="fa-regular fa-calendar-xmark text-3xl mb-2 opacity-20"></i>
                     <span class="text-xs">No appointments</span>
                </div>
            </div>

            <!-- Column 2: Confirmed -->
            <div class="flex-1 flex flex-col bg-white rounded-lg shadow-sm border border-gray-200 h-full">
                <div class="p-3 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-gray-800 text-sm">Confirmed</h3>
                    <span class="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full font-medium">0</span>
                </div>
                <div class="flex-1 p-4 bg-gray-50/50 flex flex-col items-center justify-center text-gray-400">
                     <i class="fa-regular fa-calendar-check text-3xl mb-2 opacity-20"></i>
                     <span class="text-xs">No confirmed appointments</span>
                </div>
            </div>

            <!-- Column 3: Arrived -->
            <div class="flex-1 flex flex-col bg-white rounded-lg shadow-sm border border-gray-200 h-full">
                <div class="p-3 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-gray-800 text-sm">Arrived</h3>
                    <span class="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full font-medium">0</span>
                </div>
                <div class="flex-1 p-4 bg-gray-50/50 flex flex-col items-center justify-center text-gray-400">
                     <i class="fa-solid fa-person-walking-arrow-right text-3xl mb-2 opacity-20"></i>
                     <span class="text-xs">No arrivals yet</span>
                </div>
            </div>

            <!-- Column 4: Completed -->
            <div class="flex-1 flex flex-col bg-white rounded-lg shadow-sm border border-gray-200 h-full">
                <div class="p-3 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-gray-800 text-sm">Completed</h3>
                    <span class="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full font-medium">1</span>
                </div>
                <div class="flex-1 p-2 bg-gray-50/50 overflow-y-auto">
                    <!-- Example Card -->
                   <div class="bg-white p-3 rounded border border-gray-200 shadow-sm mb-2 hover:shadow-md transition-shadow cursor-pointer flex items-start space-x-3">
                       <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden flex-shrink-0">
                           <img src="https://i.pravatar.cc/150?u=a042581f4e29026024d" alt="User" class="w-full h-full object-cover">
                       </div>
                       <div class="flex-1 min-w-0">
                           <div class="flex justify-between items-start">
                               <h4 class="text-sm font-bold text-gray-800 truncate">Jodie X</h4>
                               <div class="flex space-x-1">
                                   <i class="fa-solid fa-star text-yellow-400 text-[10px]"></i>
                                   <i class="fa-solid fa-star text-yellow-400 text-[10px]"></i>
                               </div>
                           </div>
                           <p class="text-xs text-gray-500 mb-1">12:30pm - 12:40pm</p>
                           <div class="flex items-center space-x-2">
                               <span class="inline-block w-2 h-2 rounded-full bg-green-500"></span>
                               <span class="text-[10px] text-gray-400 uppercase tracking-wide">Consultation</span>
                           </div>
                       </div>
                   </div>
                </div>
            </div>

        </div>
    </main>
    
    <!-- Floating Action / Footer if needed -->
    <div class="absolute bottom-6 left-6">
        <button class="bg-black text-white text-xs px-4 py-2 rounded-full shadow-lg hover:bg-gray-800 flex items-center space-x-2">
            <span>Onboarding Checklist</span>
        </button>
    </div>

</body>
</html>
<?php
}else{
     header("Location: ../index.html");
     exit();
}
?>
