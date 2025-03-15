<div id="sidebar" class="h-full w-72 text-white fixed left-0 top-0 transition-transform ease-out duration-300 transform close -translate-x-[14.5rem]">
    <div class="flex flex-col h-full bg-slate-950 px-4 py-2">
        <!-- Sidebar Header -->
        <div class="flex flex-row items-center justify-between mb-8">
            <!-- Logo -->
            <img id="nav-logo" src="./assets/img/logo_de_labo.png" alt="logo de labo" class="h-12 duration-300 transition-opacity ease-out delay-300 w-auto opacity-0">
            <!-- Title and Description -->
            <div id="nav-title" class=" flex flex-col transition-opacity duration-300 delay-300 ease-out text-center mx-auto opacity-0 text-nowrap">
                <span class="font-bold text-lg">SCADA</span>
                <span class="font-extralight text-xs">Nakayama x ITB de Labo</span>
            </div>
            <!-- Close Button -->
            <button id="toggle-sidebar" class="z-50 mr-0 py-2">
                <svg id="toggle-icon" xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" stroke="currentColor" class="text-white hover:bg-slate-400 h-6 w-6 cursor-pointer rounded-lg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <span class="sr-only">Toggle menu</span>
            </button>

        </div>
        <!-- Sidebar Content -->
        <div id="sidecontent" class="transition-all duration-300 delay-300 ease-out text-nowrap opacity-0">
            <div>
                <!-- Placeholder for additional content -->
                <a href="?page=home">Main Page</a>
            </div>
            <div>
                <!-- Placeholder for additional content -->
                <a href="?page=energy">Energy</a>
            </div>
        </div>
    </div>
</div>






<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sidebar = document.getElementById("sidebar");
        const sideContent = document.getElementById("sidecontent");
        const toggleIcon = document.getElementById("toggle-icon");
        const navLogo = document.getElementById("nav-logo");
        const navTitle = document.getElementById("nav-title");

        // Function to add a class if it's not already present
        function toggleClass(element, className) {
            if (!element.classList.contains(className)) {
                element.classList.add(className);
            } else {
                element.classList.remove(className);
            }
        }

        toggleIcon.addEventListener("click", () => {
            // Toggle the sidebar's visibility
            toggleClass(sidebar, "-translate-x-[14.5rem]");
            toggleClass(sidebar, "close");
            toggleClass(sideContent, "opacity-0");
            toggleClass(navLogo, "opacity-0");
            toggleClass(navTitle, "opacity-0");
            // Update the icon based on the sidebar's state
            if (sidebar.classList.contains("close")) {
                toggleIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                `;
            } else {
                toggleIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                `;
            }
        });
    });

        // Function to load content
        function loadContent(page) {
            fetch(`content.php?page=${page}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('main-content').innerHTML = data;
                })
                .catch(error => console.error('Error fetching content:', error));
        }
</script>