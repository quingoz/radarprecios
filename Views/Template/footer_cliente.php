 <footer class="footer pt-3  ">
        <div class="container-fluid pb-4">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                Desarrollado por 
                <a href="https://sistemasadn.com" class="font-weight-bold" target="_blank">ADN Software</a>
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://sistemasadn.com/software-gestion/" class="nav-link text-muted" target="_blank">Software de Gestión</a>
                </li>
                <li class="nav-item">
                  <a href="https://sistemasadn.com/contacto/" class="nav-link text-muted" target="_blank">Contacto</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>


  <!--   Core JS Files   -->
  <script src="<?= media(); ?>/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= media(); ?>/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?= media(); ?>/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?= media(); ?>/js/plugins/select2.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>


  <script src="<?= media(); ?>/js/core/popper.min.js"></script>
  <script src="<?= media(); ?>/js/core/bootstrap.min.js"></script>
  <script src="<?= media(); ?>/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= media(); ?>/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= media(); ?>/js/plugins/chartjs.min.js"></script>
  <script src="<?= media();?>/js/<?= $data['page_functions_js'] ?>"></script>

  <script type="text/javascript" src="<?= media();?>/js/plugins/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?= media();?>/js/plugins/dataTables.bootstrap.min.js"></script>
<script src="<?= media(); ?>/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  
  

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"> </script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/plug-ins/1.10.25/api/sum().js"></script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script src="https://code.highcharts.com/maps/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/maps/modules/map.js"></script>

 
  <script>
    /*var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }*/

    // Se ejecuta después de que el DOM cargue completamente
    document.addEventListener("DOMContentLoaded", function () {

        const element = document.getElementById("divLoading");
        if (element) {
            element.style.display = "none";
        }

        // Obtener el elemento de loading
        const loadingElement = document.getElementById('divLoading');

        // Escuchar clics en el documento
        document.addEventListener('click', function (event) {
            let target = event.target;

            while (target && target.tagName !== 'A') {
                target = target.parentElement;
            }

            // Verificar si el elemento clicado es una etiqueta <a>
            if (target && target.tagName === 'A') {

                const href = target.getAttribute('href'); // Obtener la ruta del atributo href

                // Evitar activar el loading para enlaces locales o vacíos (como anclas locales)
                if (href.startsWith('#') || href.trim() === '' || href.startsWith('javascript:;')) {
                    return; // No hacemos nada para anclas o enlaces vacíos
                }

                event.preventDefault(); // Prevenir la acción predeterminada del enlace

                // Mostrar el loading
                loadingElement.style.display = 'flex';

                // Redirigir después de un breve retraso para mostrar el loading
                setTimeout(() => {
                    window.location.href = href;
                }, 50); // Breve retraso para permitir que el overlay se renderice
            }
        });
    });
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
  
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= media(); ?>/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script type="text/javascript" src="<?= media();?>/js/functions_theme_dark.js"></script>
</body>

</html>

