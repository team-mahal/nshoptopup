     <!-- Footer -->
	 <footer class="footer pl-4 pr-4 bg-primary">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted text-white">
              &copy; 2020 <a href="" class="font-weight-bold ml-1 text-white" target="_blank">Kmf</a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-right  text-muted text-white fr">
                Design & Developed by <a href="https://github.com/team-mahal" class="font-weight-bold ml-1 text-white" target="_blank">Team Mahal</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('admin/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <!-- Chart JS -->
     <script src="{{ asset('admin/js/components/charts/chart-bars.js') }}"></script>
  <!-- Argon JS -->
    <script src="{{ asset('admin/js/argon.js?v=1.2.0') }}"></script>
</body>

</html>


<script>
// Toggle Search Form
  $(document).ready(function() {
      $('#search_toggole').click(function() {
        $(this).siblings("#item").toggle();
      });
  });
</script>
