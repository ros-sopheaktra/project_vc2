<!-- model delete leave request -->
<div class="modal" id="deleteLeaves">
    <div class="modal-dialog">
      <div class="modal-content" style="border-radius: 20px; width: 350px; margin:0 auto;">
        
        <!-- Modal body -->
        <div class="modal-body">
            <form id="modelDeleteLeave" method="POST">
                @csrf
                @method('DELETE')
              <div class="from-group">
                <h2>Remove items ?</h2>
                <p>Are you sure you want to remove the the leaves request ?</p>
                <button type="submit" class="btn text-warning float-right">REMOVE</button>
                <button type="button" class="btn float-right" data-dismiss="modal">DON'T REMOVE</button>
              </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
<!-- End Modal delete leave request -->