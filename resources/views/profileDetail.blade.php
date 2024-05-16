@extends('layout.admin.master')

@push('link')
<link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endpush
@section('headTitle')
  Profile
@endsection
@section('title')
  Profile
@endsection
@section('content')
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>User Report <small>Activity report</small></h2>
              <ul class="nav navbar-right panel_toolbox">
               
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-3 col-sm-3  profile_left">
                <div class="profile_img">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKgAAACoCAMAAABDlVWGAAAAkFBMVEXw8PAAAAAAABT39/a9vb/r6+xvb3H09PQADyL///8AESUAABcAEyYAABDZ2dr7+/sAABoAAAzS09UAAx4ACB7h4eJHSEjMzc4wMjoUHCs9QEhfYWSLjIxZXWI0OD2bnJ15fIAvMTQ8PUAUFxsnKi4dHyZHSlGztbaOkZWlp6oMEh8zOUNPUlYmJzAWGyZlaW4eZVkfAAAEYElEQVR4nO3aa1ejOhQGYDaBbgiXEC6WKe1Aq/Zmx/7/fzdBnXVmji1RrCEf9vOh6iou3+YKOzoOIYQQQgghhBBCCCGEEEIIIYQQLURkTL1MnWMYCqzmnjKv1LdTp7mKhfm+uat/BMGP+q7Z5yGbOtFFzPeeICnKLHLdKCsLF548376oyLwTlHEE5aKZzZpFCVFcwtZjlg0AxOUx4hJWu7TylSrdrUDy6Li0a1ph9RPi6GHphG/zXX0JneVDFMPPyqKkmC6SGGb5vxMdRd5BnCxSa5Kif4o4tO87GbEFHp2saVN2Ah544tJbwgu4PFky90ULMewu5lRv7tSb+ytvmoXpLw7Lq1HEEviv3IrO72R0GgiCpyiZmUtzFebH4NkbCuo9B0cLmlTsoWgGY+CqsGGUMsmlNzitmacumXziY67WdE2/MrUbTN73am3KVuHwNeEqg3bqvg/PGRw0/coOkJ01H+bb4amAuaZbcQ7F0AJmAjp3HHR7OVbA75xpk74G1V1lTVBdBguCOrgt9WM0hXJrJs51/azf6Wb9Tm1eUy9PYi+TThNCdIm8fntlCPOAH3UL/pHD8C5rAqob4/nwXj9Xl0ye0xHnJOsGZ5PosuQ8dc/3t5sQ1EO3HJjXAQzdsJrinyM5Gwo6k9HZN5fnKubdq2e7q/Mp3KnZplvAzFCjNLhPr0Rh6X1gwwh9tc6KTX4xKcs3RbY2neca5j2W2ca70Puht4nKh+nX0D/6pMV9+//7DnTa+6J8tCdn33J94W7r+f+VyVD43rYv8V1q6emIuQqVJU2bszAUIgxZ3jZJH35uy0R6g7iXWZllj+ttt9932/Vjpn6Ue7vquC9E2tXgBrxIpEwKHrhQd7llzfkKMT80Et7I5pBa2Jyv+rp4vmv3+3aXO/YdiqH4e/1hjAmhXv65wIrIIl9qak/50oKxiuxwlOuhxzus7uB4mPq8Cf0l8KgeOvjAahFxWPqTJkW/SWLQVL4xf4RYnqdMik7tcrfT1RbQn7mxW09XgsBqq9qz1Q8/ZC3EyYTnTaqhoP3I2vOS1J3qyEF06uZIVxv9gx3Uh5qmCiE86Pv9o5f3bQqXj/e+F1abUq4+vjyiOMlyM8EwxU4W9WeWHPTrQg6XKr4Dzl3+/LmHDLY7cldXory5cBtlw+dg72GTRVvDDyYvha/PDjistAW1m2NNIWefbpzwnBRno0FZXvMRh3GYawpqN4dt4s5GFL7Upp+0JoP6TfThPelvan+KGoOVPayy8ueYLsS8LgvtsdTt9Mccq1E92J9IGqxBik4my1ELYtglUneIckPh09h26ftiYW7ND0es9q9e1nxjQdFRf23cg8XLrxpbn77SLOM7YwRMgWdjg2YfOI2+FRU04GODcg7G/v2xb9HRQUsK+h4FvbV+MsXCH0XEZoPGcTcbpYtjw0HdkYwGxXURjFaszRX3Wep9wbWD6O+A7AusOHkghBBCCCGEEEIIIYQQQgghhBAr/AZQAEXJGvRHQAAAAABJRU5ErkJggg==" alt="Avatar" title="Change the avatar">
                  </div>
                </div>
                <h3>{{$user->usr_name}}</h3>

            
                

                
                <br />

                <!-- start skills -->
                
                <!-- end of skills -->

              </div>
              <div class="col-md-9 col-sm-9 ">

               

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    
                   
                    <li role="presentation" class="active"><a href="#tab_content1" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                    </li>
                    <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                    </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                   
                    <div role="tabpanel" class="tab-pane active" id="tab_content1" aria-labelledby="profile-tab">
                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Email</label>
                        <div class="col-md-1 col-sm-1 ">
                          <p>:</p>
                     
                      </div>
                        <div class="col-md-8 col-sm-8 ">
                            <p>{{$user->email}}</p>
                       
                        </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-3 col-sm-3 ">NIS</label>
                      <div class="col-md-1 col-sm-1 ">
                        <p>:</p>
                   
                    </div>
                      <div class="col-md-8 col-sm-8 ">
                          <p>{{$user->usr_regis_number}}</p>
                     
                      </div>
                  </div>

                  <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Kelas</label>
                    <div class="col-md-1 col-sm-1 ">
                      <p>:</p>
                 
                  </div>
                    <div class="col-md-8 col-sm-8 ">
                        <p>{{$user->usr_class}}</p>
                   
                    </div>
                </div>
                <div class="form-group row ">
                  <label class="control-label col-md-3 col-sm-3 ">Gender</label>
                  <div class="col-md-1 col-sm-1 ">
                    <p>:</p>
               
                </div>
                  <div class="col-md-8 col-sm-8 ">
                      <p>{{$user->usr_gender}}</p>
                 
                  </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-3 col-sm-3 ">Telepon</label>
                <div class="col-md-1 col-sm-1 ">
                  <p>:</p>
             
              </div>
                <div class="col-md-8 col-sm-8 ">
                    <p>{{$user->usr_phone}}</p>
               
                </div>
            </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   
@endsection

@push('script')
    <!-- morris.js -->
    <script src="{{asset('vendors/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('vendors/morris.js/morris.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
@endpush