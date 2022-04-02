<x-app-layout>
  
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
  @include("admin.admincss");
  </head>
  <body>
  <div class="container-scroller">
    <!-- include navbar(users, Foods...) here -->
       @include("admin.navbar")
       <br>
       
       <h1>Chef Admin Area</h1>
       
           <form action="{{url('/uploadchef')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div style="position: relative; top: 100px; margin-left: -190px;">
                <label>Name</label>
                <input style="color:black;" type="text" name="name" required placeholder="Chef name"
            </div>
            <div>
            <br>
                <label>Speciality</label>
                <input style="color:black;" type="text" name="speciality" required placeholder="Chef speciality"
            </div>
            <br><br>
            <div>
                <input type="file" name="image">
            </div>
            <br>
            <div>
                <input style="color:black; border-radius: 5px; padding: 5px;" type="submit" value="Save">
            </div>
        </form>
<br>
<h4>Add, edit or delete Chef's details</h4>
<br>
    <table style="margin-bottom:120px;">
        <tr>
            <th style="padding:20px;">Chef's name</th>
            <th style="padding:20px;">Speciality</th>
            <th style="padding:20px;">Image</th>
            <th style="padding:20px;">Update</th>
            <th style="padding:20px;">Delete</th>
        </tr>
        @foreach($data as $data)
        <tr align="center">
            <td style="padding:20px;">{{$data->name}}</td>
            <td style="padding:20px;">{{$data->speciality}}</td>
            <td style="padding:20px;" height="100" width="100"><img src="/chefimage/{{$data->image}}"></td>
            <td style="padding:20px;"><a href="{{url('/updatechef',$data->id)}}">Update</a></td>
            <td style="padding:20px;"><a href="{{url('/deletechef',$data->id)}}">Delete</a></td>
        </tr>

        @endforeach

    </table>
</div>

       @include("admin.adminscript")
  </body>
</html>