<style>
    svg.svg-inline--fa.fa-exclamation-circle.fa-w-16{
        font-size: xxx-large;
        color: red;
    }
</style>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="#">@yield('status-user')</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input hidden class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button hidden class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link trigger-btn"  href="#myModal" data-toggle="modal">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- Modal Confirm Logout-->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center">
            <strong>
                <i class="fas fa-exclamation-circle"></i>
            </strong>
            <br><br>
            <h3>Are your sure wanna exit?</h3>
            <p style="color: #c1c1c1">Do you really wanna exit from this WebApp? if you really wanna exit click <strong>Log Out button</strong> in the bellow of this text!</p>
            <div class="row">
                <div class="col">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="{{ URL::route('logout') }}" class="btn btn-danger">Log out</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
