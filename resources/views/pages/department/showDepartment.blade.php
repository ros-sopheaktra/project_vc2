@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-4"><h2>Department</h2></div>
        <div class="col-4">
            <button type="button" class="btn btn-warning btn-md text-white float-right" style="border-radius: 20px" data-toggle="modal" data-target="#add">
               <strong>+ Create</strong>
              </button>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-borderless table-hover glyphicon-hover">
                <thead>
                    <tr>
                    </tr>
                </thead> 
                <br>
                <tbody id="myTable">
                    @foreach ($departments as $department)
                    <tr>
                        <td>{{$department->department}}
                          <a href="" data-toggle="modal" data-target="#delete{{$department->id}}"><span class="material-icons text-secondary glyphicon float-right">delete</span></a>
                          <a href="{{route('editDepartment', $department->id)}}" data-toggle="modal" data-target="#updateDepartment{{$department->id}}"><span class="material-icons text-secondary glyphicon float-right">edit</span></a>
                            
                          <!-- Modal edit department -->
                            <div class="modal" id="updateDepartment{{$department->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content" style="border-radius: 20px; width: 350px; margin:0 auto;">
                                  
                                  <!-- Modal body -->
                                  <div class="modal-body">
                                      <form action="{{route('updateDepartment', $department->id)}}" method="POST">
                                          @csrf
                                          @method('patch')
                                        <div class="form-group">
                                            <h5><strong>Edit department</strong></h5>
                                            <input type="text" name="editdname" placeholder="Department name" class="form-control" value="{{$department->department}}" required>
                                        </div>
                                        <div class="from-group">
                                          <button type="submit" class="btn text-warning float-right">UPDATE</button>
                                          <button type="button" class="btn float-right" data-dismiss="modal">DISCARD</button>
                                        </div>
                                    </form>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          <!-- End Modal edit department -->

                          <!-- model delete department -->
                          <div class="modal" id="delete{{$department->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content" style="border-radius: 20px; width: 350px; margin:0 auto;">
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{route('deleteDepartment', $department->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                      <div class="from-group">
                                        <h2>Remove items ?</h2>
                                        <p>Are you sure you want to remove the selected departments ?</p>
                                        <button type="submit" class="btn text-warning float-right">REMOVE</button>
                                        <button type="button" class="btn float-right" data-dismiss="modal">DON'T REMOVE</button>
                                      </div>
                                  </form>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                        <!-- End Modal delete department -->
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>

<!-- Modal add department -->
  <div class="modal" id="add">
    <div class="modal-dialog">
      <div class="modal-content" style="border-radius: 20px; width: 350px; margin:0 auto;">
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{route('addDepartment')}}" method="POST">
                @csrf
              <div class="form-group">
                  <h5><strong>Create department</strong></h5>
                  <input type="text" name="dname" placeholder="Department name" class="form-control" required>
              </div>
              <div class="from-group">
                <button type="submit" class="btn text-warning float-right">CREATE</button>
                <button type="button" class="btn float-right" data-dismiss="modal">DISCARD</button>
              </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
<!-- End Modal add department -->

</div>
@endsection