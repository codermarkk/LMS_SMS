// Sidebar Toggle
const sidebar = document.getElementById('sidebar');
const sidebarToggle = document.getElementById('sidebarToggle');
const content = document.querySelector('.content');

sidebarToggle.addEventListener('click', () => {
  sidebar.classList.toggle('closed');
  content.classList.toggle('sidebar-closed');
});

// Theme Toggle
document.getElementById('themeToggle').addEventListener('click', () => {
  document.body.classList.toggle('dark');
});

// Smooth Scroll for Navigation Links
const links = document.querySelectorAll('.sidebar nav ul li a');

links.forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault();
    const targetId = this.getAttribute('href').substring(1);
    const targetElement = document.getElementById(targetId);
    if (targetElement) {
      window.scrollTo({
        top: targetElement.offsetTop - 20,
        behavior: 'smooth',
      });
    }
  });
});




