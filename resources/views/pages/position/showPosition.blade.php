@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4"><h1>Position</h1></div>
        <div class="col-4">
            @include('pages.position.createPosition')
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <table id="myTable" class="table table-borderless glyphicon-hover table-hover">
                <thead>
                    <tr>
                    </tr>
                </thead>
                <br>
                @foreach ($positions as $position)
                <tbody>
                    <tr>
                    <td>
                        <div class="container">
                            {{$position->position}}
                            @include('pages.position.deletePosition')
                            @include('pages.position.editPosition') 
                        </div>   
                     </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection