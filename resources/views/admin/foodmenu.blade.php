<x-app-layout>
  
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
  @include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">
    <!-- include navbar(users, Foods...) here -->
       @include("admin.navbar")
       <div>
    <h1>Add to Menu</h1>
       
    <h4>Fill in the form to add a new item to the menu</h4>

    <div style="position: relative; top:60px; right: -150px">
        <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div>
                <label>Title</label>
                <input style="color:black;" type="text" name="title" placeholder="Write a title" required>
            </div>
            <br>
            <div>
                <label>Price</label>
                <input type="number" style="color:black;" name="price" placeholder="price" required>
            </div>
            <br>
            <div>
                <label>Image</label>
                <input type="file" name="image" required>
            </div>
            <br>
            <div>
                <label>Description</label>
                <input type="text" style="color:black;" name="description" placeholder="Description" required>
            </div>
            <br>
            <div>
                <input style="color: black; padding: 5px; border-radius:5px;" type="submit" value="Save">
            </div>
            <br><br>
            </form>
                <div>
                <table>
                    <tr>
                    <th style="padding: 30px">Food item</th>
                    <th style="padding: 30px">Price</th>
                    <th style="padding: 30px">Description</th>
                    <th style="padding: 30px">Image</th>
                    <th style="padding: 30px">Delete</th>
                    <th style="padding: 30px">Update</th>
                    </tr>
                    
                    @foreach($data as $data)
                    <tr align="center">
                    <td>{{$data->title}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->description}}</td>
                    <td><img height="200" width="200" src="/foodimage/{{$data->image}}"</td>
                    <td><a href="{{url('deletemenu',$data->id)}}">Delete</a></td>
                    <td><a href="{{url('updateview',$data->id)}}">Update</a></td>
                    </tr>
                    @endforeach
                </table>
                </div>
        </div>
    </div>
    </div>

       @include("admin.adminscript")

  </body>
</html>