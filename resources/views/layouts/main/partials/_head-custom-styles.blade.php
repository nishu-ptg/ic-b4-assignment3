<style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap");
    body {
        font-family: "Inter", sans-serif;
    }
    .glass {
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
    .dashboard-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    @media (min-width: 768px) {
        .dashboard-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
    @media (min-width: 1024px) {
        .dashboard-grid {
            grid-template-columns: 1fr 1fr 1fr;
        }
    }
    .progress-bar {
        height: 0.5rem;
        border-radius: 9999px;
        background-color: #e5e7eb;
        overflow: hidden;
    }
    .progress-fill {
        height: 100%;
        border-radius: 9999px;
        background: linear-gradient(to right, #4f46e5, #7e22ce);
        transition: width 0.5s ease;
    }
    .sidebar-link {
        transition: all 0.2s ease;
    }
    .sidebar-link:hover,
    .sidebar-link.active {
        background-color: #f3f4f6;
        border-left: 4px solid #4f46e5;
    }
    .dropdown-menu {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.2s ease;
    }
    .dropdown-menu.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
</style>
