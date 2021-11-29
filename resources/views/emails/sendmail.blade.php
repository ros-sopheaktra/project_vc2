<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <style>
        .row-body{
            width:80%;
	        margin:0 auto;
            border: 2px solid rgb(43, 42, 42);
            background-color: rgb(223, 222, 222);
            display: flex;
        }
        .col1-6{
            width:40%;
	        padding:10px;
	        margin-left:30px;
        }
        .col2-6{
            width:40%;
	        padding:10px;
	        margin-left:30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
               <br>
               <p>Employee {{ $details['firstName'] }} {{ $details['lastName'] }} has submitted the following leave request for approval:</p>
            </div>
        </div>
    <div class="card p-3 bg-light ml-5" style="width: 700px">
        <div class="row-body">
            <div class="col1-6">
                <p><strong>Start date </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $details['startdate'] }}</p>
                <p><strong>Emd date </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $details['enddate'] }}</p>
                <p><strong>Duration </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $details['duration'] }}</p>
                <p><strong>Leave type </strong> &nbsp;&nbsp;&nbsp;&nbsp;{{ $details['type'] }}</p>
            </div>
            <div class="col2-6">
                <p><strong>Comment </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $details['comment'] }}</p>
                <p><strong>Employee </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $details['firstName'] }} {{ $details['lastName'] }}</p>
                <p><strong>Staus </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Request</p>
            </div>   
        </div>
    </div>
<<<<<<< HEAD
=======

>>>>>>> 673360867ba573adee7b2609eaeb9ae0276b0296
    <div class="row">
        <div class="col-12">
            <br>
            <p>Can you please ACCEPT or REJECT this leave request .You can also access to 
            <a href="http://127.0.0.1:8000">leave request details</a> to review this request</p>
            <p>Thanks & regards,</p>
            <p><strong>{{ $details['firstName'] }} {{ $details['lastName'] }}</strong></p>
        </div>
    </div>

    </div>
</body>
</html>