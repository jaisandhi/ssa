    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>SSA DASHBOARD | Dashboard</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="/css/toastr.min.css">
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <style>
.error{
    color:red;
}
      </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SSA</b> DASHBOARD</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">@php $notifycount = \App\Helper\NotifyHelper::getcount(); echo count($notifycount);@endphp</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have @php echo count($notifycount); @endphp notifications</li>
                  <li>
                    <ul class="menu">
                        @foreach($notifycount as $count)
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> New User {{$count->name}} Was Registered
                        </a>
                      </li>
                      @endforeach
                    </ul>
                  </li>
                  @if(count($notifycount) >= 5)
                  <li class="footer"><a href="#">View all</a></li>
                  @endif
                </ul>
              </li>

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Mohan</span>
                </a>
                
              </li>

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Mohan</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview menu-open">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="/ssa"><i class="fa fa-circle-o"></i> Menu 1</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Layout</span>
                <span class="pull-right-container">
                  <span class="label label-primary pull-right">0</span>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=""><i class="fa fa-circle-o"></i> Navigation</a></li>

              </ul>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
            <section class="content">
            <div class="col-md-10 col-md-offset-1">
                
                    <div class=" box box-info ">
              <form method="post" action="/notify/userregister" name="registration" style="border:1px solid #ccc;padding:30px;" id="user_register">
                  <!-- <h4 class="text-center">User Register</h4> -->
                  @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                  @endif
                  {{csrf_field()}}
                  <!-- <hr style="width: 173px;border: 1px solid #8c8383;"> -->
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="usr">Name:</label>
                      <input type="text" class="form-control name" name="name" id="usr" value="{{ old('name')}}">
                      @if ($errors->has('name'))
                          <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                      @endif
                  </div>
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="mail">Email:</label>
                      <input type="email" class="form-control email" name="email" id="mail" value="{{ old('email')}}">
                      @if ($errors->has('email'))
                          <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="pwd">Password:</label>
                      <input type="password" class="form-control password" name="password" id="pwd" value="{{ old('password')}}">
                      @if ($errors->has('password'))
                          <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                  </div>
                  <div class="form-group text-center">
                      <button type="submit" class="btn btn-primary" id="sub_butt">Submit</button>
                      <button type="reset" class="btn btn-danger" id="reset_but">Reset</button>
                  </div>
              </form>
          </div>
            </div>
          

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer"> 
        <strong>Copyright &copy; 2017-2018 <a href="/ssa">SSA DASHBOARD</a>.</strong> All rights reserved.
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3.1.1 -->
    <script src="/plugins/jQuery/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <script src="/js/validate.js"></script>
    <script src="/js/toastr.min.js"></script>
    <script>        
          $("form[name='registration']").validate({
            rules: {
              name: "required",
              email: {
                required: true,
                email: true
              },
              password: {
                required: true,
                minlength: 5
              }
            },
            messages: {
              name: "Please enter your firstname",
              password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
              },
              email: "Please enter a valid email address"
            },
            submitHandler: function(form) {  
              if (validateEmail($('.email').val()) && $('.password').val().length != 6) {
                  $('#mail-error').css('display','none');
                  $('#mail-error').text('');
                  $('#pwd-error').css('display','none');
                  $('#pwd-error').text('');   
                   $.ajax({
                        type : "POST",
                        url : '/notify/userregister',
                        data : {
                            'name' : $('.name').val(),
                            'email' : $('.email').val(),
                            'password' : $('.password').val(),
                            '_token' : $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType : 'json',
                        success : function( data ) {
                            var count = +$('.notifications-menu').find('span').text() + +1;
                            $('.notifications-menu').find('span').text(+count);
                            $('.notifications-menu').find('.header').text('you have ' + count + ' notifications');
                            $('.notifications-menu').find('ul.menu:last').append('<li><a href="#"><i class="fa fa-users text-aqua"></i> New User '+ data.storeuser.name +' Was Registered</a></li>')
                            $('#user_register').trigger("reset");
                            toastr.success('Sucessfully User Registered in your site')
                        },
                        error:function(error){
                            var json = JSON.parse(error.responseText);
                            console.log(json.email);
                            console.log(json.password);
                        }
                  });
              }
              else {
                  $('#mail-error').css('display','block');
                  $('#mail-error').text('The email must be a valid email address.');       
                  $('#pwd-error').css('display','block');
                  $('#pwd-error').text('greater than six characters.');                 
              }              
            }
          });

        $('#reset_but').on('click',function(){
                $('label.error').remove();
        });

      function validateEmail(mail) {
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if (filter.test(mail)) {
           return true;
        }else {
           return false;
        }
      }
    </script>

    </body>
    </html>
