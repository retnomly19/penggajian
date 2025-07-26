</div> <!-- End content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main-content');
    sidebar.classList.toggle('d-none');
    main.classList.toggle('hide-sidebar');
  }

  function toggleSubmenu(menu) {
    const menuGroup = document.getElementById('menu-' + menu);
    menuGroup.classList.toggle('menu-expanded');
  }
</script>

</body>
</html>
