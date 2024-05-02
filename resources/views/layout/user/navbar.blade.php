<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKgAAACoCAMAAABDlVWGAAAAkFBMVEXw8PAAAAAAABT39/a9vb/r6+xvb3H09PQADyL///8AESUAABcAEyYAABDZ2dr7+/sAABoAAAzS09UAAx4ACB7h4eJHSEjMzc4wMjoUHCs9QEhfYWSLjIxZXWI0OD2bnJ15fIAvMTQ8PUAUFxsnKi4dHyZHSlGztbaOkZWlp6oMEh8zOUNPUlYmJzAWGyZlaW4eZVkfAAAEYElEQVR4nO3aa1ejOhQGYDaBbgiXEC6WKe1Aq/Zmx/7/fzdBnXVmji1RrCEf9vOh6iou3+YKOzoOIYQQQgghhBBCCCGEEEIIIYQQLURkTL1MnWMYCqzmnjKv1LdTp7mKhfm+uat/BMGP+q7Z5yGbOtFFzPeeICnKLHLdKCsLF548376oyLwTlHEE5aKZzZpFCVFcwtZjlg0AxOUx4hJWu7TylSrdrUDy6Li0a1ph9RPi6GHphG/zXX0JneVDFMPPyqKkmC6SGGb5vxMdRd5BnCxSa5Kif4o4tO87GbEFHp2saVN2Ah544tJbwgu4PFky90ULMewu5lRv7tSb+ytvmoXpLw7Lq1HEEviv3IrO72R0GgiCpyiZmUtzFebH4NkbCuo9B0cLmlTsoWgGY+CqsGGUMsmlNzitmacumXziY67WdE2/MrUbTN73am3KVuHwNeEqg3bqvg/PGRw0/coOkJ01H+bb4amAuaZbcQ7F0AJmAjp3HHR7OVbA75xpk74G1V1lTVBdBguCOrgt9WM0hXJrJs51/azf6Wb9Tm1eUy9PYi+TThNCdIm8fntlCPOAH3UL/pHD8C5rAqob4/nwXj9Xl0ye0xHnJOsGZ5PosuQ8dc/3t5sQ1EO3HJjXAQzdsJrinyM5Gwo6k9HZN5fnKubdq2e7q/Mp3KnZplvAzFCjNLhPr0Rh6X1gwwh9tc6KTX4xKcs3RbY2neca5j2W2ca70Puht4nKh+nX0D/6pMV9+//7DnTa+6J8tCdn33J94W7r+f+VyVD43rYv8V1q6emIuQqVJU2bszAUIgxZ3jZJH35uy0R6g7iXWZllj+ttt9932/Vjpn6Ue7vquC9E2tXgBrxIpEwKHrhQd7llzfkKMT80Et7I5pBa2Jyv+rp4vmv3+3aXO/YdiqH4e/1hjAmhXv65wIrIIl9qak/50oKxiuxwlOuhxzus7uB4mPq8Cf0l8KgeOvjAahFxWPqTJkW/SWLQVL4xf4RYnqdMik7tcrfT1RbQn7mxW09XgsBqq9qz1Q8/ZC3EyYTnTaqhoP3I2vOS1J3qyEF06uZIVxv9gx3Uh5qmCiE86Pv9o5f3bQqXj/e+F1abUq4+vjyiOMlyM8EwxU4W9WeWHPTrQg6XKr4Dzl3+/LmHDLY7cldXory5cBtlw+dg72GTRVvDDyYvha/PDjistAW1m2NNIWefbpzwnBRno0FZXvMRh3GYawpqN4dt4s5GFL7Upp+0JoP6TfThPelvan+KGoOVPayy8ueYLsS8LgvtsdTt9Mccq1E92J9IGqxBik4my1ELYtglUneIckPh09h26ftiYW7ND0es9q9e1nxjQdFRf23cg8XLrxpbn77SLOM7YwRMgWdjg2YfOI2+FRU04GODcg7G/v2xb9HRQUsK+h4FvbV+MsXCH0XEZoPGcTcbpYtjw0HdkYwGxXURjFaszRX3Wep9wbWD6O+A7AusOHkghBBCCCGEEEIIIYQQQgghhBAr/AZQAEXJGvRHQAAAAABJRU5ErkJggg==" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>{{Auth::user()->usr_name}}</h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <ul class="nav side-menu">
            <li><a href="/admin/home"><i class="fa fa-laptop"></i>  Home</a></li>
            <li><a><i class="fa fa-windows"></i> Peminjaman<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="/user/borrow">Daftar Peminjaman</a></li>
                <li><a href="/user/borrow/history">Histori Peminjaman</a></li>
                
              </ul>
            </li>
          </ul>
        </div>
        

      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      {{-- <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div> --}}
      <!-- /menu footer buttons -->
    </div>
  </div>