<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    @include("admin.admincss")
</head>
<body>
<div class="container-scroller">
 <!-- include navbar(users, Foods...) here -->
 @include("admin.navbar")

    <h1>Users</h1>
    <div>
    <br><br><br><h4>Below is a list of currently registered users.</h4>

    <div style="position: relative; top: 60px; ">
        <table>
            <tr>
                <th style="padding: 20px;">Name</th>
                <th style="padding: 20px;">Email</th>
                <th style="padding: 20px;">Action</th>
            </tr>

            @foreach($data as $data)
            <tr align="center">
                <td style="padding: 20px;">{{$data->name}}</td>
                <td style="padding: 20px;">{{$data->email}}</td>

                @if($data->usertype=='0')
                <td style="padding: 20px;"><a href="{{url('/deleteuser',$data->id)}}">Delete</a></td>
                @else
                <td style="padding: 20px;"><a href="#">Not allowed</a></td>
                @endif
            </tr>
            @endforeach     
        </table>
    </div>
</div>
</div>

@include("admin.adminscript")

</body>
</html>