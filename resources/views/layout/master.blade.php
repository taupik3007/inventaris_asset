<!DOCTYPE html>
<html lang="en">
 @include('layout.head')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('layout.navbar')

        <!-- top navigation -->
        @include('layout.top_nav')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
         @include('layout.footer')
        
        <!-- /footer content -->
      </div>
    </div>
    
	@include('layout.script')
  </body>
</html>
