
@if(session('success'))



<div class="success_modal">
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p>  {{session('success')}}</p>
          </div>
        </div>
      </div>
    </div>
</div>

@endif


@if(session('error'))

<div class="success_modal">
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p>  {{session('error')}}</p>
          </div>
        </div>
      </div>
    </div>
</div>
@endif

