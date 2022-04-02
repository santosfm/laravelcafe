<x-app-layout>
  
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
  @include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">
    <!-- include navbar(users, Foods...) here -->
       @include("admin.navbar")

    <form action="{{url('/updatefoodchef',$data->id)}}" method="post" enctype="multipart/form-data">
    @csrf    
    <div>
            <label>Chef name</label>
            <input style="color:black;" type="text" name="name" value="{{$data->name}}">
        </div>

        <div>
            <label>Speciality</label>
            <input style="color:black;" type="text" name="speciality" value="{{$data->speciality}}">
        </div>

        <div>
            <label>Old Image</label>
            <img height="200" width="200" src="/chefimage/{{$data->image}}">
        </div>

        <div>
            <label>New image</label>
            <input type="file" name="image">
        </div>

        <div>
            <input type="submit" style="color:black; border-radius: 5px; padding: 5px;" value="Update Chef">
        </div>
    </form>
</div>
       @include("admin.adminscript")
  </body>
</html>