<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .col-table{
            width: 50%;
        }
        table, td, th {  
            border: 2px solid rgb(56, 55, 55);
            text-align: left;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h4>Leave Request</h4>
                <p>Dear {{ $accepts['firstName'] }} {{ $accepts['lastName'] }},</p>
                <br>
                <p>This time off your request has been approved.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-table">
                <table>
                    <tr>
                        <td>From </td>
                        <td>{{ $accepts['startDate'] }}</td>
                    </tr>
                    <tr>
                        <td>To </td>
                        <td>{{ $accepts['endDate'] }}</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>{{ $accepts['type'] }}</td>
                    </tr>
                    <tr>
                        <td>Reason</td>
                        <td>{{ $accepts['type'] }}</td>
                    </tr>
                    <tr>
                        <td>Last comment</td>
                        <td>{{ $accepts['comment'] }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</body>
</html>