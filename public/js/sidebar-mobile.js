const mainSidebar = document.getElementById('main-sidebar');
const sidebar = document.getElementById('sidebar');
const sidebarMenu = document.getElementById('sidebar-menu');

const openButton = document.getElementById('open-sidebar-button');
const closeButton = document.getElementById('close-sidebar-button')

function openSidebar() {
    mainSidebar.style.transform = 'translateX(0)';
    sidebar.style.transform = 'translateX(0)';
    sidebarMenu.style.transform = 'translateX(0)';
    openButton.style.visibility = 'hidden';
    closeButton.style.visibility = 'visible';
    closeButton.style.transform = 'translateX(-75px)';
}

function closeSidebar() {
    mainSidebar.style.transform = 'translateX(-230px)';
    sidebar.style.transform = 'translateX(-230px)';
    sidebarMenu.style.transform = 'translateX(-230px)';
    openButton.style.visibility = 'visible';
    closeButton.style.visibility = 'hidden';
}