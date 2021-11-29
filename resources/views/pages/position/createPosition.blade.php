<div class="container">
        <!-- Button to Open the Modal -->
        <a href="" data-toggle="modal" data-target="#myModal" class="btn btn-warning float-right text-white btn-lg" style="border-radius: 25px; "><strong>+ Create</strong></a>
    <!-- The Modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content"  style="border-radius: 20px; width: 350px; margin:0 auto;">
        
        <!-- Modal body -->
        <form action="{{route('addPosition')}}" enctype="multipart/form-data" method="post">
            <div class="modal-body">
                @csrf
                @method('POST')
                <h5></strong>Create Position<strong></h5>
                <div class="form-group">
                    <input type="text" class="form-control" id="position" placeholder="Position name" name="position">
                    <span id="message" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn text-warning float-right" data-toggle="modal" data-target="#myModal">CREATE</button>
                    <button type="button" class="btn float-right" data-dismiss="modal">DISCARD</button>
                </div>
            </div>
        </div>
    </form>
    </div>
    </div>
</div>
