

    <!-- Button to Open the Modal -->
    <a href="#"data-toggle="modal" data-target="#myModal{{$position->id}}"><span class="material-icons text-secondary float-right glyphicon">delete</span></a>

    <!-- The Modal -->
    <div class="modal" id="myModal{{$position->id}}">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 20px; width: 350px; margin:0 auto;">
        
        <!-- Modal body -->
        <form action="{{route('deletePosition',$position->id)}}" method="post">
            <div class="modal-body">
                @csrf
                @method('PATCH')
                <h2>Remove position ?</h2>
                <div class="row mt-3">
                    <div class="col">
                        <p>
                            Are you sure you want to reomve the selected position?
                        </p>
                        <button type="submit" class="btn text-warning float-right" data-toggle="modal" data-target="#myModal">REMOVE</button>
                        <button type="button" class="btn float-right" data-dismiss="modal">DON'T REMOVE</button>
                    </div>
                </div>
            </div>
           
                
        </form>
        
        </div>
    </div>
    </div>