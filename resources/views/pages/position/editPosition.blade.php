

<!-- Button to Open the Modal -->
<a href="#"data-toggle="modal" data-target="#modal{{$position->id}}"><span class="material-icons text-secondary float-right glyphicon">edit</span></a>

<!-- The Modal -->
<div class="modal" id="modal{{$position->id}}">
<div class="modal-dialog">
    <div class="modal-content" style="border-radius: 20px; width: 350px; margin:0 auto;">
    
    <!-- Modal body -->
    <form action="{{route('editPosition',$position->id)}}" method="post">
        <div class="modal-body">
            @csrf
            @method('PATCH')
            
                <strong><h5>Edit Position</h5></strong>
                <div class="form-group">
                <input type="text" class="form-control" id="position" value="{{$position->position}}" placeholder="Position name" name="position">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn text-warning float-right" data-toggle="modal" data-target="#myModal">EDIT</button>
                    <button type="button" class="btn float-right" data-dismiss="modal">DISCARD</button>
                </div>
             </div>   
           </form> 
        </div>
     </div>
</div>