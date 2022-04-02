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

    <div class="container">

       <h1>Customer Orders</h1>
       <br>

       <!-- Search form -->
       <form action="{{url('/search')}}" method="get">
           @csrf
            <input type="text" name="search" style="color:black; height:28px;" placeholder="Search order by name/food item">
            <input type="submit" value="Search" class="btn btn-primary">
        </form>
<br><br>
       <table>
           <tr align="center">
               <th style="padding:20px;">Name</th>
               <th style="padding:20px;">Phone</th>
               <th style="padding:20px;">Address</th>
               <th style="padding:20px;">Food item</th>
               <th style="padding:20px;">Price</th>
               <th style="padding:20px;">Quantity</th>
               <th style="padding:20px;">Total Price</th>
           </tr>
               @foreach($data as $data)
            <tr align="center">
                <td style="padding:20px;">{{$data->name}}</td>
               <td style="padding:20px;">{{$data->phone}}</td>
               <td style="padding:20px;">{{$data->address}}</td>
               <td style="padding:20px;">{{$data->foodname}}</td>
               <td style="padding:20px;">£{{$data->price}}</td>
               <td style="padding:20px;">{{$data->quantity}}</td>
               <td style="padding:20px;">£{{$data->price * $data->quantity}}</td>
            </tr>
            @endforeach    
       </table>
    </div>
</div>
       @include("admin.adminscript")
  </body>
</html>