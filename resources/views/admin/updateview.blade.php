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

       <div style="position: relative; top:60px; right: -150px">
            <form action="{{url('/update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
            
                <div>
                    <label>Title</label>
                    <input style="color:black;" type="text" name="title" value="{{$data->title}}" required>
                </div>

                <div>
                    <label>Price</label>
                    <input type="number" style="color:black;" name="price" value="{{$data->price}}" required>
                </div>
                
                <div>
                    <label>Description</label>
                    <input type="text" style="color:black;" name="description" value="{{$data->description}}" required>
                </div>

                <div>
                    <label>Old Image</label>
                    <img src="/foodimage/{{$data->image}}" height="200" width="200" type="file" name="image" required>
                </div>

                <div>
                    <label>New Image</label>
                    <input type="file" name="image" required>
                </div>

                <div>
                    <input style="color: black" type="submit" value="Save">
                </div>

            </form>
        <div>

    </div>
       @include("admin.adminscript")
  </body>
</html>