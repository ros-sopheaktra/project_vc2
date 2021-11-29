<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container{
            margin-left: 20px;
        }
        table {
          border-collapse: collapse;
          width: 70%;
        }
        
        table, td {
          border: 1px solid black;
          padding: 10px;
        }
        </style>
</head>
<body>
   <div class="container">
       <h4>Leave Request</h4>
       <p>Dear {{ $verify['firstName'] }} {{ $verify['lastName'] }}</p>
       <p>The time off your requested has been rejected.</p>
       <table>
           <tr>
               <td>From</td>
               <td>{{ $verify['startDate'] }}</td>
           </tr>
           <tr>
               <td>To</td>
               <td> {{ $verify['endDate'] }}</td>
           </tr>
           <tr>
               <td>Type</td>
               <td>{{ $verify['type'] }}</td>
           </tr>
           <tr>
               <td>Last Comment</td>
               <td>{{ $verify['comment'] }}</td>
           </tr>
       </table>
   </div>
</body>
</html>