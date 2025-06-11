<!-- Modal -->

<style type="text/css">
  .headerRegister, .header-primary {
    background: rgb(0,40,100);;
    color: #fff;
  }

  .headerUpdate {
    background: #11cdef;
    color: #fff; 
  }

  .notBlock {
    display: none;
  }

  #map {
  height: 100%;
  width: 100%;
}
</style>
<div class="modal fade" id="modalGoogleMaps" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title text-white" id="titleModal">Mapa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="map"></div>
      </div>
      
    </div>
  </div>
</div>


