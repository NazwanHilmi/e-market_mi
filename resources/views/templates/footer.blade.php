<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2023 Nazwan.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminlte3') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte3') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte3') }}/dist/js/adminlte.min.js"></script>
{{-- Bootstrap 5 --}}
<script src="{{ asset('bootstrap5') }}/js/bootstrap.min.js"></script>
{{-- FontAwesome --}}
<script src="{{ asset('plugins') }}/fontawesome/js/all.min.js"></script>
{{-- Sweet Alert --}}
<script src="{{ asset('plugins') }}/sweetalert.js"></script>
{{-- DataTables --}}
<script src="{{ asset('plugins') }}/jquery.dataTables.min.js"></script>

@stack('script')
</body>
</html>
