@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="col-12">
          <div class="row">
              <div class="col-6">
                  <h2>Your leave requests</h2>
            </div>
              <div class="col-6">
                <button class="btn btn-warning float-right text-white btn-lg" data-toggle="modal" data-target="#addLeave" style="border-radius: 20px;">Request a leave</button>
              </div>
          </div>
          
        <br>
        
            <table class="table table-borderless table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Duration</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($leaves as $leave)
                <tbody>
                    <tr>
                    
                        <td class="action">{{$leave->startDate}}</td>
                        <td class="action">{{$leave->endDate}}</td>
                        <td class="action">{{$leave->duration}}</td>
                        <td class="action">{{$leave->types}}</td>
                        <td class="action">
                            @if ($leave->status == 1)
                            <a href=""><button class="bnt btn-primary">Requested</button></a>
                            @endif
                            @if($leave->status == 2) 
                            <a href=""><button class="bnt btn-danger">Cancelled</button></a>
                            @elseif($leave->status == 3)
                            <a href=""><button class="bnt btn-danger">Rejected</button></a>

                            @elseif($leave->status == 4)
                            <a href=""><button class="bnt btn-success">Accepted</button></a>
                            @endif
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#deleteLeaves"
                            data-id={{$leave->id}}
                            ><i class="material-icons text-danger">delete</i></a>
                            @if ($leave->status == 1)
                              <a href="#" 
                              data-toggle="modal" data-target="#editLeaves"
                              data-id={{$leave->id}}
                              data-startdate={{$leave->startDate}}
                              data-enddate={{$leave->endDate}}
                              data-duration={{$leave->duration}}
                              data-type={{$leave->types}}
                              data-comment={{$leave->comment}}
                              ><i class="material-icons text-success">edite</i></a>
                         @endif
                    </td>
                 </tr>
              </tbody>
             @endforeach
        </table>
    </div> 
</div>
    <!-- The Modal add leave request-->
  <div class="modal" id="addLeave">
    <div class="modal-dialog">
      <div class="modal-content" style="border-radius: 20px; width: 600px; margin:0 auto;">
      
        <!-- Modal body -->
        <div class="modal-body">
          <h4>Create a request</h4>
          <br>
          <form action="{{route('addLeaves')}}" method="POST">
            @csrf
          <div class="row">
              <div class="col-7">

                <div class="form-group">
                  <input type="date" placeholder="Strat date" class="form-control" id="txtFromDate" name="startDate" required>
                </div>

                <div class="form-group">
                  <input type="date" placeholder="End date" class="form-control" id="txtToDate" onchange="dateDiff();" name="endDate" required>
                </div>

                <div class="form-group">
                  <p><strong>Doration: </strong><input type="text" id="demo" name="duration" style="border: none; background-color: white;"></p>
                  <p id="danger"></p>
                </div>

                <div class="form-group" class="form-control">
                  <select name="type" class="form-control" required>
                      <option selected disabled>Leave type</option>
                      <option value="paid">Paid</option>
                      <option value="sick">Sick</option>
                      <option value="unpaid">Un paid</option>
                      <option value="wedding">Wedding</option>
                      <option value="maternity">Maternity</option>
                  </select>
                </div>

                <div class="form-group">
                  <textarea name="comment" cols="42" rows="3" placeholder="Comment"></textarea>
                </div>

              </div>

              <div class="col-5">

                <div class="form-group">
                  <select name="start" id="start" class="form-control" onchange="dateDiff();" >
                      <option value="1" >MORNING</option>
                      <option value="2">AFTERNOON</option>
                  </select>
                </div>

                <div class="form-group">
                  <select name="end" id="end" class="form-control" onchange="dateDiff();" >
                      <option value="1">MORNING</option>
                      <option value="2">AFTERNOON</option>
                  </select>
                </div>

              </div> 
          </div>

            <button class="btn text-warning" style="float: right;" id="mail">CREATE</button>
            <button type="button" class="btn" data-dismiss="modal" style="float: right;">DISCARD</button>

        </form>
        </div>
        
      </div>
    </div>
  </div>
  <!-- End The Modal add leave request-->

@include('pages.yourLeave.updateLeaves')
@include('pages.yourLeave.deleteLeave')

  
@endsection
<style>
  .action_hidden{
    display: none;
  }
  .action:hover + .action_hidden{
  display: block;
  }
  
</style>
<script>
  function dateDiff() { 
  var dtFrom = document.getElementById('txtFromDate').value;
  var dtTo = document.getElementById('txtToDate').value;
  var startPeriod = document.getElementById('start').value;
  var endPeriod = document.getElementById('end').value;
  
  var dt1 = new Date(dtFrom);
  var dt2 = new Date(dtTo);
  var diff = dt2.getTime() - dt1.getTime();
  var days = diff/(1000 * 60 * 60 * 24);
  var period = 0;

if(startPeriod == 1) {
  if(endPeriod == 1){
    period = 0.5;
  }else{
    period = 1;
  }  
}else {
  if(endPeriod == 1){  
    period = 0;
  }else{
    period = 0.5;
  }
}


if(dtFrom > dtTo){
  $('#danger').html('<div class="alert alert-danger"><strong>Error! </strong>End date cannot be before start date.</div>');
}else if(dtFrom == dtTo && startPeriod == 2 && endPeriod == 1){
  $('#danger').html('<div class="alert alert-danger"><strong>Error! </strong>Start date and end date cannot be selected in the past.</div>');
}else{
  document.getElementById("demo").value = (days + period)+" days";
  $('#danger').html('');
}
  return false;
}
function isNumeric(val) {
  var ret = parseInt(val);
}

  function dateDiffEdit() { 
  var dtFrom = document.getElementById('editTxtFromDate').value;
  var dtTo = document.getElementById('TeditxtToDate').value;
  var startPeriod = document.getElementById('EditStart').value;
  var endPeriod = document.getElementById('editEnd').value;
  
  var dt1 = new Date(dtFrom);
  var dt2 = new Date(dtTo);
  var diff = dt2.getTime() - dt1.getTime();
  var days = diff/(1000 * 60 * 60 * 24);
  var period = 0;

if(startPeriod == 1) {
  if(endPeriod == 1){
    period = 0.5;
  }else{
    period = 1;
  }  
}else {
  if(endPeriod == 1){  
    period = 0;
  }else{
    period = 0.5;
  }
}


if(dtFrom > dtTo){
  $('#editDanger').html('<div class="alert alert-danger"><strong>Error! </strong>End date cannot be before start date.</div>');
}else if(dtFrom == dtTo && startPeriod == 2 && endPeriod == 1){
  $('#editDanger').html('<div class="alert alert-danger"><strong>Error! </strong>Start date and end date cannot be selected in the past.</div>');
}else{
  document.getElementById("editDemo").value = (days + period)+" days";
  $('#editDanger').html('');
}
  return false;
}
function isNumeric(val) {
  var ret = parseInt(val);
}
  </script>