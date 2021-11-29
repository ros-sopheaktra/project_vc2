   <!-- The Modal edit leave request-->
   <div class="modal" id="editLeaves">
    <div class="modal-dialog">
      <div class="modal-content" style="border-radius: 20px; width: 600px; margin:0 auto;">
      
        <!-- Modal body -->
        <div class="modal-body">
          <h4>Update a request</h4>
          <br>
          <form method="POST" id="modalEditLeave">
            @csrf
            @method('PATCH')
          <div class="row">
              <div class="col-7">

                <div class="form-group">
                  <input type="date" placeholder="Strat date" class="form-control" id="editTxtFromDate" name="startDate">
                </div> 

                <div class="form-group">
                  <input type="date" placeholder="End date" class="form-control" id="TeditxtToDate" onchange="dateDiffEdit();" name="endDate">
                </div>

                <div class="form-group">
                  <p><strong>Duration: </strong><input type="text" id="editDemo" name="duration" value="" style="border: none; background-color: white;"></p>
                <p id="editDanger"></p>
                </div>

                <div class="form-group" class="form-control">
                  <select name="type" class="form-control" id="editType">
                      <option selected disabled>Leave type</option>
                      <option value="paid">Paid</option>
                      <option value="sick">Sick</option>
                      <option value="unpaid">Un paid</option>
                      <option value="wedding">Wedding</option>
                      <option value="maternity">Maternity</option>
                  </select>
                </div>

                <div class="form-group">
                  <textarea name="comment" cols="42" rows="3" placeholder="Comment" id="EditComment"></textarea>
                </div>

              </div>

              <div class="col-5">

                <div class="form-group" onchange="dateDiffEdit();">
                  <select name="start" id="EditStart" class="form-control">
                      <option value="1" >MORNING</option>
                      <option value="2">AFTERNOON</option>
                  </select>
                </div>

                <div class="form-group" onchange="dateDiffEdit();">
                  <select name="end" id="editEnd" class="form-control">
                      <option value="1">MORNING</option>
                      <option value="2">AFTERNOON</option>
                  </select>
                </div>

              </div> 
          </div>

            <button class="btn text-warning" style="float: right;">UPDATE</button>
            <button type="button" class="btn" data-dismiss="modal" style="float: right;">DISCARD</button>

        </form>
        </div>
        
      </div>
    </div>
  </div>
  <!-- End The Modal edit leave request-->