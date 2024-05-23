<!DOCTYPE html>
<html lang="en">
 @include('layout.user.head')

  <body class="nav-md ">
    <div class="container body">
      <div class="main_container">
        @include('layout.user.navbar')

        <!-- top navigation -->
        @include('layout.user.top_nav')
        <!-- /top navigation -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>@yield('title')</h3>
              </div>
      
              
            </div>
            
            <div class="clearfix"></div>

            @if(Auth::user()->usr_status == 0)
            <div class="alert alert-danger alert-dismissible " role="alert">
          
              Akun anda belum di aktivasi mohon hubungi admin agar bisa meminjam
             </div>
             @endif
        <!-- page content -->
        @yield('content')

        
        <!-- /page content -->
          </div>
        </div>
        <!-- footer content -->
         @include('layout.user.footer')
        
        <!-- /footer content -->
      </div>
    </div>
    
	@include('layout.user.script')
  </body>
</html>
