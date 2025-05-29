document.addEventListener('DOMContentLoaded', function () {
  const menuToggle = document.getElementById('menu-toggle');
  const sidebar = document.getElementById('sidebar-menu');
  const overlay = document.querySelector('.menu-overlay');
  const closeSidebar = document.getElementById('close-sidebar');

  menuToggle.addEventListener('click', function () {
    sidebar.classList.add('open');
    overlay.classList.add('active');
  });

  closeSidebar.addEventListener('click', function () {
    sidebar.classList.remove('open');
    overlay.classList.remove('active');
  });

  overlay.addEventListener('click', function () {
    sidebar.classList.remove('open');
    overlay.classList.remove('active');
  });

  document.querySelectorAll('.sidebar-nav').forEach(function(nav) {
    nav.addEventListener('click', function(e) {
      if (e.target.classList.contains('menu-label')) {
        const li = e.target.parentElement;
        if (li.classList.contains('menu-category')) {
          li.classList.toggle('open');
        }
      }
    });
  });
});