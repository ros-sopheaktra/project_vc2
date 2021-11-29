
@extends('layouts.app')
@section('content')
       <div class="container">
           <div class="col-12">
            @if ($auth != 4)   
            <h3>Leave request submit to me</h3>
            <table class="table table-borderless mt-3">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Duration</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @if ($auth != 3)
                    @foreach ($leave as $leaves)
                        <tr>
                            <td>{{$leaves->user->firstName." "}}{{" ".$leaves->user->lastName}}</td>
                            <td>{{$leaves->startDate}}</td>
                            <td>{{$leaves->endDate}}</td>
                            <td>{{$leaves->duration}}</td>
                            <td>{{$leaves->types}}</td>
                            @if ($leaves->status == 1)
                            <td>
                                <a href="{{route('accepted', $leaves->id)}}" class="btn btn-primary" style="border-radius: 20px">Accept</a>
                                <a href="{{route('rejected', $leaves->id)}}" class="btn btn-white" style="border: 1px solid;border-radius: 20px">Reject</a>
                            </td>
                            @else
                                @if ($leaves->status == 4)
                                    <td>Accepted</td>
                                @endif
                                @if ($leaves->status == 3)
                                    <td>Rejected</td>
                                @endif
                            @endif
                           </tr>
                       @endforeach
                       @else
                       @foreach ($leave as $leaves)
                       
                       @if ($log == $leaves->user->manager_id)
                       <tr>
                        <td>{{$leaves->user->firstName." "}}{{" ".$leaves->user->lastName}}</td>
                        <td>{{$leaves->startDate}}</td>
                        <td>{{$leaves->endDate}}</td>
                        <td>{{$leaves->duration}}</td>
                        <td>{{$leaves->types}}</td>
                        @if ($leaves->status == 1)
                            <td>
                                <a href="{{route('accepted', $leaves->id)}}" class="btn btn-primary">Accept</a>
                                <a href="{{route('rejected', $leaves->id)}}" class="btn btn-white" style="border: 1px solid">Reject</a>
                            </td>
                            @else
                                @if ($leaves->status == 4) 
                                    <td>Accepted</td>
                                @endif
                                @if ($leaves->status == 3)
                                    <td>Rejected</td>
                                @endif
                            @endif
                       </tr>
                       @endif
                       @endforeach
                       @endif
                  </tbody>
            </table>
            @else
            @endif
           </div>
       </div>
       <script>
</script>
@endsection