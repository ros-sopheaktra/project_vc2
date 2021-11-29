@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="col-3"></div>
  <div class="col-6">
      <div class="card">
          <div class="card-header text-center">Add employee</div>
          <div class="card-body">
              <form action="{{route('employee.store')}}" method="POST">
                @csrf
                  <div class="form-group">
                    <input type="text" name="first" placeholder="Firstname" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="text" name="last" placeholder="Lastname" class="form-control">
                  </div>
                  <div class="form-group">
                  ​​<select name="depart" class="form-control">
                    <option selected disabled>--Department--</option>
                     @foreach ($depart as $departs)
                     <option value="{{$departs->id}}">{{$departs->department}}</option>
                     @endforeach
                </select>
                  </div>
                  <div class="form-group">
                ​​  <select name="position" class="form-control">
                    <option selected disabled>--Position--</option>
                    @foreach ($position as $positions)
                    <option value="{{$positions->id}}">{{$positions->position}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                   ​<input type="date" name="date" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-success float-right">Add</button>
                  <button type="button" class="btn btn-secondary">Cancel</button>
              </form>
          </div>
      </div>
  </div>
  <div class="col-3"></div>
</div>
@endsection