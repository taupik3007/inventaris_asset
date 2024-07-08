<!DOCTYPE html>
<html lang="en">
 @include('layout.sarpras.head')

  <body class="nav-md ">
    <div class="container body">
      <div class="main_container">
        @include('layout.sarpras.navbar')

        <!-- top navigation -->
        @include('layout.sarpras.top_nav')
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
         @include('layout.sarpras.footer')
        
        <!-- /footer content -->
      </div>
    </div>
    
	@include('layout.sarpras.script')
  </body>
</html>
