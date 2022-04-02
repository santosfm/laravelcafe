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
       @include("admin.navbar");
</div>
       @include("admin.adminscript");
  </body>
</html>