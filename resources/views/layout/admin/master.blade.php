<!DOCTYPE html>
<html lang="en">
 @include('layout.admin.head')

  <body class="nav-md ">
    <div class="container body">
      <div class="main_container">
        @include('layout.admin.navbar')

        <!-- top navigation -->
        @include('layout.admin.top_nav')
        <!-- /top navigation -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>@yield('title')</h3>
              </div>
      
              
            </div>
            
            <div class="clearfix"></div>
        <!-- page content -->
        @yield('content')
        <!-- /page content -->
          </div>
        </div>
        <!-- footer content -->
         @include('layout.admin.footer')
        
        <!-- /footer content -->
      </div>
    </div>
    
	@include('layout.admin.script')
  </body>
</html>
