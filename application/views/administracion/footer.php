<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <span id="year"></span></span>
          </div>
        </div>
      </footer>
      <script>
        jQuery(document).ready(function($) {

            var year = (new Date).getFullYear();
            $('#year').html(year);

        });
    </script>
      <!-- End of Footer -->