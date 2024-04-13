<!DOCTYPE html>
<html lang="en">
 @include('layout.admin.head')

  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        @include('layout.admin.navbar')

        <!-- top navigation -->
        @include('layout.admin.top_nav')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
         @include('layout.admin.footer')
        
        <!-- /footer content -->
      </div>
    </div>
    
	@include('layout.admin.script')
  </body>
</html>
