<!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('admin.index')}}">REACH-News</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive" style="height: auto">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-tachometer-alt"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('theloai.index')}}">
            <i class="fas fa-book-open"></i>
            <span class="nav-link-text">Quản Lí Thể Loại</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('loaitin.index')}}">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Quản Lí Loại Tin</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('user.index')}}">
            <i class="fas fa-user"></i>
            <span class="nav-link-text">Quản Lí Tài Khoản</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('get.page.solieu')}}">
            <i class="fas fa-database"></i>
            <span class="nav-link-text">Quản lí số liệu</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('slide.index')}}">
            <i class="far fa-image"></i>
            <span class="nav-link-text">Quản Lí Slide</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('get.admin.lienhe')}}">
           <i class="fas fa-qrcode"></i>
            <span class="nav-link-text">Thanh niên cần tư vấn</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="far fa-newspaper"></i>
            <span class="nav-link-text">Quản Lí Tin Tức</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages" style="height: auto">
            <li>
              <a href="{{route('tintuc.get.postnew')}}">Đăng Tin</a>
            </li>
            <li>
              <a href="{{route('tintuc.index.public')}}">Tin tức đã đăng</a>
            </li>
            <li>
              <a href="{{route('tintuc.index.private')}}">Tin đang đợi duyệt</a>
            </li>
            <li>
              <a href="{{route('tintuc.getview.hotnews')}}">Quản lý tin nóng</a>
            </li>
            <li>
              <a href="{{route('tintuc.getview.highlightnews')}}">Quản lý tin nổi bật</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        
      </ul>
       <ul class="nav navbar-nav pull-right">
        @if(!Auth::check())
        <li>
            <a href="{{route('get.sign_in')}}">Đăng nhập</a>
        </li>
        @endif
        <li>
          <a id="popup_changepass">
            <span class ="glyphicon glyphicon-user"></span>
            @if(Auth::check())
                        {{Auth::user()->name}}
                @endif   
          </a>
            <div class="popup_content">
                <ul>
                    <li><a href="{{route('get.viewChangepass_user')}}" title="">Đổi mật khẩu</a></li>
                    <li><a href="{{route('get.changeavatar')}}" title="">Đổi avatar</a></li>
                </ul>
            </div>
        </li>
        
        <li>
            @if(Auth::check())
                <!-- <a id="logout_btn" href="{{route('get.sign_in')}}">Đăng Xuất</a> -->
                <p id="dangxuat">Đăng xuất</p>
            @endif  
            <!-- <div id="confirmModal" class="modal show" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h2 class="modal-title">Confirmation</h2>
                      </div>
                      <div class="modal-body">
                          <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                      </div>
                      <div class="modal-footer">
                          <a  name="ok_button" id="ok_button" class="btn btn-danger" href="{{route('get.sign_in')}}">OK
                          </a>
                          <a  class="btn btn-default" data-dismiss="modal">Cancel</a>
                      </div>
                  </div>
              </div>
          </div> -->
        </li>

      </ul>
    </div>
  </nav>