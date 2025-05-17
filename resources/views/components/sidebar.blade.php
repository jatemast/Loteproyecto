<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standalone Sidebar</title>
    <!-- Load Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles for transitions and animations */
        .sidebar-transition {
            transition: all 0.3s ease-in-out;
        }
        
        .menu-item span {
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
        
        /* Additional styles */
        body {
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        /* Content area */
        .content-area {
            transition: margin-left 0.3s ease-in-out;
            margin-left: 4rem; /* Default with collapsed sidebar */
            padding: 1rem;
        }
        
        .content-area.expanded {
            margin-left: 16rem;
        }
    </style>
</head>
<body>
    <!-- Sidebar Container -->
    <div id="sidebar-container" class="fixed inset-0 pointer-events-none z-[9999]">
        <div id="sidebar-overlay" class="absolute inset-0 hidden bg-black opacity-50 pointer-events-auto"></div>

        <aside id="default-sidebar"
            class="fixed top-0 left-0 w-16 h-screen sidebar-transition pointer-events-auto"
            aria-label="Sidebar">
            <div class="flex flex-col h-full px-3 py-4 bg-gradient-to-br from-[#0F293E] to-[#1a3b5c]">
                <div class="mb-4 ml-0 text-center" id="logo-container">
                    <i id="sidebar-logo" class="fa fa-power-off text-white text-3xl mx-auto sidebar-transition" aria-hidden="true"></i>
                       
                </div>
                <div class="h-10"></div>

                <ul id="sidebar-menu" class="flex-grow space-y-2 font-medium">
                    <li>
                        <a href="{{ route('dashboard') }}" onclick="loadContent('dashboard')"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#5989d1] group menu-item">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                                </svg>
                            </div>
                            <span class="flex-1 transform opacity-0 ms-3 whitespace-nowrap">HOME</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('labor_tasks.index') }}" onclick="loadContent('presupuestos')"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#bbbaba] group menu-item">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </div>
                            <span class="flex-1 transform opacity-0 ms-3 whitespace-nowrap">PRESUPUESTOS MO </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('role_permission.index') }}" onclick="loadContent('roles')"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#5989d1] group menu-item">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                </svg>
                            </div>
                            <span class="flex-1 transform opacity-0 ms-3 whitespace-nowrap">GESTIONAR ROLES</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('materials.index') }}" onclick="loadContent('liquidaciones')"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#5989d1] group menu-item">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                </svg>
                            </div>
                            <span class="flex-1 transform opacity-0 ms-3 whitespace-nowrap">Presupuesto MA</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reporte.index') }}" onclick="loadContent('reporte')"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#bbbaba] group menu-item">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                            </div>
                            <span class="flex-1 transform opacity-0 ms-3 whitespace-nowrap">REPORTE</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('pepp')"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#5989d1] group menu-item">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                            </div>
                            <span class="flex-1 transform opacity-0 ms-3 whitespace-nowrap">PEPP PRINCIPAL</span>
                        </a>
                    </li>
                </ul>
                
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="#" onclick="loadContent('soporte')"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#5989d1] group menu-item">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                            </div>
                            <span class="flex-1 transform opacity-0 ms-3 whitespace-nowrap">SOPORTE</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
    </div>

    <!-- Toggle button -->
    <div class="fixed z-[10000] top-4 left-4">
        <input id="toggle-sidebar" type="checkbox" class="hidden">
        <label for="toggle-sidebar" class="flex flex-col items-center justify-center space-y-1 cursor-pointer w-7 h-7">
            <!-- Line 1 -->
            <div id="line1"
                class="w-1/2 h-1 bg-white rounded-lg transition-all duration-300 origin-right">
            </div>
            <!-- Line 2 -->
            <div id="line2"
                class="w-full h-1 transition-all duration-300 origin-center bg-blue-400 rounded-lg">
            </div>
            <!-- Line 3 -->
            <div id="line3"
                class="w-1/2 h-1 bg-white rounded-lg transition-all duration-300 origin-right">
            </div>
        </label>
    </div>

    <!-- Content Area -->
    <div id="content-area" class="content-area">
        <div id="content" class="p-4 bg-white rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard</h1>
            <p class="text-gray-600">Bienvenido al panel de administración.</p>
        </div>
    </div>

    <script>
        // DOM Elements
        const sidebar = document.getElementById('default-sidebar');
        const sidebarLogo = document.getElementById('sidebar-logo');
        const toggleButton = document.getElementById('toggle-sidebar');
        const menuItems = document.querySelectorAll('.menu-item span');
        const line1 = document.getElementById('line1');
        const line2 = document.getElementById('line2');
        const line3 = document.getElementById('line3');
        const contentArea = document.getElementById('content-area');
        const contentDiv = document.getElementById('content');

        // Toggle sidebar
        toggleButton.addEventListener('change', () => {
            // Toggle sidebar width
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-16');
            
            // Toggle content margin
            contentArea.classList.toggle('expanded');

            if (sidebar.classList.contains('w-16')) {
                // Collapse sidebar
                menuItems.forEach(item => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateX(-10px)';
                });
                
                // Resize logo
                sidebarLogo.classList.remove('w-[70px]', 'h-[70px]');
                sidebarLogo.classList.add('w-[50px]', 'h-[50px]');
                
                // Reset hamburger
                line1.classList.remove('w-full', 'rotate-[-30deg]', 'translate-y-[-4px]');
                line2.classList.remove('rotate-90', 'translate-x-2');
                line3.classList.remove('w-full', 'rotate-[30deg]', 'translate-y-[4px]');
            } else {
                // Expand sidebar
                menuItems.forEach(item => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateX(0)';
                });
                
                // Resize logo
                sidebarLogo.classList.remove('w-[50px]', 'h-[50px]');
                sidebarLogo.classList.add('w-[70px]', 'h-[70px]');
                
                // Animate hamburger to X
                line1.classList.add('w-full', 'rotate-[-30deg]', 'translate-y-[-4px]');
                line2.classList.add('rotate-90', 'translate-x-2');
                line3.classList.add('w-full', 'rotate-[30deg]', 'translate-y-[4px]');
            }
        });

        // Load content function (simulates page navigation)
        function loadContent(page) {
            let title, content;
            
            // Set content based on page
            switch(page) {
                case 'dashboard':
                    title = 'Dashboard';
                    content = 'Bienvenido al panel de administración.';
                    break;
                case 'presupuestos':
                    title = 'Presupuestos y Mano de Obra';
                    content = 'Gestione sus presupuestos y mano de obra aquí.';
                    break;
                case 'roles':
                    title = 'Gestionar Roles';
                    content = 'Administre los roles de usuarios del sistema.';
                    break;
                case 'liquidaciones':
                    title = 'Gestionar Liquidaciones';
                    content = 'Gestione las liquidaciones de la empresa.';
                    break;
                case 'reporte':
                    title = 'Reportes';
                    content = 'Visualice y genere reportes del sistema.';
                    break;
                case 'pepp':
                    title = 'PEPP Principal';
                    content = 'Panel principal de PEPP.';
                    break;
                case 'soporte':
                    title = 'Soporte';
                    content = 'Contacte con soporte técnico para resolver problemas.';
                    break;
                default:
                    title = 'Dashboard';
                    content = 'Bienvenido al panel de administración.';
            }
            
            // Update content
            contentDiv.innerHTML = `
                <h1 class="text-2xl font-bold text-gray-800 mb-4">${title}</h1>
                <p class="text-gray-600">${content}</p>
            `;
            
            // Close sidebar on mobile after clicking (optional)
            if (window.innerWidth < 640) {
                toggleButton.checked = false;
                toggleButton.dispatchEvent(new Event('change'));
            }
        }
    </script>
</body>
</html>