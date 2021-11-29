@extends('layouts.app')

@section('content')
         <!-- View of employee-->
<div class="container">
    <div class="row">
      <div class="col-6">
          <h1>Employee</h1>
      </div>
      <div class="col-6">
        <a href="" class="btn btn-warning text-white float-right btn-lg" data-toggle="modal" data-target="#modalCreate" style="border-radius: 20px;"><strong>+ Create</strong></a>
      </div>
      <table class="table table-borderless mt-4" id="employee" class="display" cellspacing="0">
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Department</th>
          <th>Position</th>
          <th>Status</th>
          <th>Manager</th>
          <th>Start Date</th>
        </tr>
        @foreach ($users as $user)
          <tbody id="myTable">
            <tr data-id="{{ $user->id }}">
              <td class="action">{{$user->firstName}}</td>
              <td class="action">{{$user->lastName}}</td>
              <td class="action">{{$user->department->department}}</td> 
              <td class="action">{{$user->position->position}}</td>
              @if ($user->status == 1)
                <td class="action">Active</td>
              @else
                <td class="action">Inactive</td>
              @endif
              
              @if ($user->manager_id == null)
                <td class="action">No manager</td>
              @else
                <td class="action">{{$user->user->firstName}}</td>
              @endif
              <td class="action">{{$user->startDate}}</td>
              <td>
                @if (Auth::user()->role == 2)
                  @if ($user->status == 1)
              <a href="{{route('activate' , $user->id)}}" class="btn btn-default" style="border-radius:20px;border:1px solid">Deactivate</a>
                @else
                 <a href="{{route('deactivate',$user->id)}}" class="btn btn-primary" style="border-radius:20px;">Reactivate</a>
                 @endif
                @endif
              </td>
              <td class="">
                <a href="" data-toggle="modal"  data-target="#deleteEmployee{{$user->id}}"><i  class="material-icons text-danger">delete</i></a>
                <a href="#" data-toggle="modal" data-target="#editEmployee" data-placement="right" title="edit!" data-placement="left"
                  data-id={{$user->id}}  
                  data-firstname={{$user->firstName}}
                  data-lastname={{$user->lastName}}
                  data-departmentid={{$user->department_id}} 
                  data-positionid={{$user->position_id}}
                  data-startdate={{$user->startDate}}
                  data-profile={{$user->profile}}
                  data-manager={{$user->manager_id}}>
                <i class="material-icons">mode_edit</i></a>
              </td>
            </tr>
          </tbody>
        @endforeach
      </table>
    </div>  
</div>

@foreach ($users as $user)
<!-- Start model delete employee -->
<div class="modal" id="deleteEmployee{{$user->id}}">
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius: 20px; width: 350px; margin:0 auto;">
      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" action="{{route('employee.destroy', $user->id)}}">
              @csrf
              @method('DELETE')
            <div class="from-group">
              <h2>Remove items ?</h2>
              <p>Are you sure you want to remove the selected employee?</p>
              <button type="submit" class="btn text-warning float-right">REMOVE</button>
              <button type="button" class="btn float-right" data-dismiss="modal">DON'T REMOVE</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- End modal delete employee -->

<!-- Modal edit employee -->
<div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 20px; width: 500px; margin:0 auto;">
      <div class="modal-body">
        <h3>Edit employee</h3>
        <form method="POST"  id="modalEdit" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <input id="firstName"  type="text" class="form-control" placeholder="Firstname" name="firstName" required autocomplete="firstName">
              </div>
              <div class="form-group">
                <input id="lastName"  type="text" class="form-control" placeholder="LastName" name="lastName" required autocomplete="lastName">
              </div>
              <div class="form-group">
                <select class="form-control" id="deparment" name="department">
                <option selected disabled>Department</option>
                 @foreach($department as $departments)
                    <option value="{{$departments->id}}" {{ ($user->department_id == $departments->id) ? 'selected' : '' }}>{{$departments->department}}</option> 
                  @endforeach
              </select>
              </div>
              <div class="form-group">
                <select class="form-control" id="position" name="position">
                  <option selected disabled>Position</option>
                 @foreach($position as $positions)
                 <option value="{{$positions->id}}" {{ ($user->position_id == $positions->id) ? 'selected' : '' }}>{{$positions->position}}</option> 
                  @endforeach
              </select>
              </div>
              <div class="form-group">
                <select id="manager" name="manager" class="form-control" >
                  <option selected disabled value="">No manager</option>
                   @foreach ($users as $user)
                     <option value="{{$user->id}}" {{ ($user->manager_id == $user->id) ? 'selected' : ''}}>{{$user->firstName}}</option> 
                    @endforeach
                </select>
             </div>
              <div class="form-group">
                <input id="startdate" type="date" data-date="" data-date-format="DD MMMM YYYY" class="form-control" id="startDate" name="startDate">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <img class="card-img-top mb-2" style="width: 90px;height:90px" class="mx-auto d-block" id="showProfile"/>
              </div>
              <div class="form-group">
                <label for="picture" style="cursor: pointer"><i class="material-icons">add</i></label>
                <input type="file" id="picture" name="image" autocomplete="picture" style="display:none">
                <label for="editProfile" style="cursor: pointer"><i class="material-icons">edit</i></label>
                <input type="file" id="editProfile" name="editProfile" autocomplete="editProfile" style="display:none">
                <a style="color: black" id="deleteProfile" onclick="return confirm('Are you sure you want to delete this item')"><i class="material-icons">delete</i></a>
              </div>
            </div>
          </div>
          <div class="form-group">
           <button type="submit" class="btn text-warning float-right">UPDATE</button>
           <button data-dismiss="modal" class="btn text-dark float-right">DISCARD</button>
          <div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--End Modal -->
@endsection
<!-- The Modal add employee -->
 <div class="modal" id="modalCreate">
     <div class="modal-dialog">
         <div class="modal-content" style="border-radius: 20px; width: 600px;">
            <!-- Modal body -->
              <h4 class="mt-4 pl-4">Add employee</h4>
                <div class="modal-body">
                  <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="contianer">
                       <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <input type="text" name="first" placeholder="Firstname" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <input type="text" name="last" placeholder="Lastname" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <input type="email" name="email" placeholder="email" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <input type="password" name="password" placeholder="password" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-6">
                         <div class="form-group">
                          ​​<select name="depart" class="form-control" required>
                            <option selected disabled>Department</option>
                             @foreach ($department as $departments)
                             <option value="{{$departments->id}}">{{$departments->department}}</option>
                             @endforeach
                        </select>
                         </div>
                        </div>
                        ​<div class="col-6">
                          <div class="form-group">
                            <input type="date" name="date" class="form-control" required>
                          </div>
                        </div>
                         <div class="col-6">
                          <div class="form-group">
                             <select name="manager" class="form-control">
                               <option selected disabled>Manager</option>
                                @foreach ($users as $user)
                                  <option value="{{$user->id}}">{{$user->firstName}}</option>
                                @endforeach
                             </select>
                          </div>
                         </div>
                         <div class="col-6">
                          <div class="form-group">
                            <select name="position" class="form-control" required>
                              <option selected disabled>Position</option>
                              @foreach ($position as $positions)
                              <option value="{{$positions->id}}">{{$positions->position}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                          <div class="col-6">
                            <div class="form-group">
                              <select name="role" class="form-control" required>
                              <option selected disabled>role</option>
                              <option value="1">Admin</option>
                              <option value="2">HR Officer</option>
                              <option value="3">Manager</option>
                              <option value="4">Employee</option>
                             </select>
                          </div>
                          </div>
                        <button type="button" class="btn float-right" data-dismiss="modal">DISCARD</button>
                      <button type="submit" class="btn TEXT-warning float-right">CREATE</button>
                    </div>
                </div>
              </form>
            </div>
         </div>
     </div>
</div>
<style>
  .action_hidden{
    display: none;
  }
  .action:hover + .action_hidden{
  display: block;
  }
  
</style>
