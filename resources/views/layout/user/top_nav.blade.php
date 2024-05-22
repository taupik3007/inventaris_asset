<div class="top_nav ">
    <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
        <ul class=" navbar-right">
          <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
              @if (Auth::user()->usr_profile_picture == null)
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKgAAACoCAMAAABDlVWGAAAAkFBMVEXw8PAAAAAAABT39/a9vb/r6+xvb3H09PQADyL///8AESUAABcAEyYAABDZ2dr7+/sAABoAAAzS09UAAx4ACB7h4eJHSEjMzc4wMjoUHCs9QEhfYWSLjIxZXWI0OD2bnJ15fIAvMTQ8PUAUFxsnKi4dHyZHSlGztbaOkZWlp6oMEh8zOUNPUlYmJzAWGyZlaW4eZVkfAAAEYElEQVR4nO3aa1ejOhQGYDaBbgiXEC6WKe1Aq/Zmx/7/fzdBnXVmji1RrCEf9vOh6iou3+YKOzoOIYQQQgghhBBCCCGEEEIIIYQQLURkTL1MnWMYCqzmnjKv1LdTp7mKhfm+uat/BMGP+q7Z5yGbOtFFzPeeICnKLHLdKCsLF548376oyLwTlHEE5aKZzZpFCVFcwtZjlg0AxOUx4hJWu7TylSrdrUDy6Li0a1ph9RPi6GHphG/zXX0JneVDFMPPyqKkmC6SGGb5vxMdRd5BnCxSa5Kif4o4tO87GbEFHp2saVN2Ah544tJbwgu4PFky90ULMewu5lRv7tSb+ytvmoXpLw7Lq1HEEviv3IrO72R0GgiCpyiZmUtzFebH4NkbCuo9B0cLmlTsoWgGY+CqsGGUMsmlNzitmacumXziY67WdE2/MrUbTN73am3KVuHwNeEqg3bqvg/PGRw0/coOkJ01H+bb4amAuaZbcQ7F0AJmAjp3HHR7OVbA75xpk74G1V1lTVBdBguCOrgt9WM0hXJrJs51/azf6Wb9Tm1eUy9PYi+TThNCdIm8fntlCPOAH3UL/pHD8C5rAqob4/nwXj9Xl0ye0xHnJOsGZ5PosuQ8dc/3t5sQ1EO3HJjXAQzdsJrinyM5Gwo6k9HZN5fnKubdq2e7q/Mp3KnZplvAzFCjNLhPr0Rh6X1gwwh9tc6KTX4xKcs3RbY2neca5j2W2ca70Puht4nKh+nX0D/6pMV9+//7DnTa+6J8tCdn33J94W7r+f+VyVD43rYv8V1q6emIuQqVJU2bszAUIgxZ3jZJH35uy0R6g7iXWZllj+ttt9932/Vjpn6Ue7vquC9E2tXgBrxIpEwKHrhQd7llzfkKMT80Et7I5pBa2Jyv+rp4vmv3+3aXO/YdiqH4e/1hjAmhXv65wIrIIl9qak/50oKxiuxwlOuhxzus7uB4mPq8Cf0l8KgeOvjAahFxWPqTJkW/SWLQVL4xf4RYnqdMik7tcrfT1RbQn7mxW09XgsBqq9qz1Q8/ZC3EyYTnTaqhoP3I2vOS1J3qyEF06uZIVxv9gx3Uh5qmCiE86Pv9o5f3bQqXj/e+F1abUq4+vjyiOMlyM8EwxU4W9WeWHPTrQg6XKr4Dzl3+/LmHDLY7cldXory5cBtlw+dg72GTRVvDDyYvha/PDjistAW1m2NNIWefbpzwnBRno0FZXvMRh3GYawpqN4dt4s5GFL7Upp+0JoP6TfThPelvan+KGoOVPayy8ueYLsS8LgvtsdTt9Mccq1E92J9IGqxBik4my1ELYtglUneIckPh09h26ftiYW7ND0es9q9e1nxjQdFRf23cg8XLrxpbn77SLOM7YwRMgWdjg2YfOI2+FRU04GODcg7G/v2xb9HRQUsK+h4FvbV+MsXCH0XEZoPGcTcbpYtjw0HdkYwGxXURjFaszRX3Wep9wbWD6O+A7AusOHkghBBCCCGEEEIIIYQQQgghhBAr/AZQAEXJGvRHQAAAAABJRU5ErkJggg=="
                                alt="">
                        @else
                        <img src="{{ asset('storage/image/' . Auth::user()->usr_profile_picture) }}"
                                alt="">
                            
                        @endif{{Auth::user()->usr_name}}
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"  href="/{{Auth::user()->usr_id}}/profile"> Profile</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
              {{-- <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a> --}}
              <button class="dropdown-item" ><i class="fa fa-sign-out pull-right"></i> Log Out</button>
            </form>
            </div>
          </li>

         
        </ul>
      </nav>
    </div>
  </div>