<!DOCTYPE html>
<html>
<head>
    <title></title>
 <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <style type="text/css">
    .list-group-horizontal .list-group-item
{
  display: inline-block;
}
.list-group-horizontal .list-group-item
{
  margin-bottom: 0;
  margin-left:-4px;
  margin-right: 0;
  border-right-width: 0;
}
.list-group-horizontal .list-group-item:first-child
{
  border-top-right-radius:0;
  border-bottom-left-radius:4px;
}
.list-group-horizontal .list-group-item:last-child
{
  border-top-right-radius:4px;
  border-bottom-left-radius:0;
  border-right-width: 1px;
}
  </style>
   
</head>
<body>
<!--navigation bar-->
  <div >
      <nav class="navbar navbar-expand-lg navbar-fixed-top  "style="background-color:#001f33;" >
        <a href="{{url('/')}}" class="navbar" style="color: #fff" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
             
            </li>
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" style="color: #fff" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                  </form>

            </li>
           </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
  </div>
  <br><br>  
<!--end navigation bar-->
<div class="container">
    <div >
             @if (session('status'))
                <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                </div>
                    @endif
                <div class="item slides active">
                  <div class="slide-1"></div>
                  <div class="hero" style="text-align: center;">
                    <hgroup>
                        <h1>CV Builder</h1>        
                        <h3>Present Your Skills And Knowelege With Effective CV </h3>
                    </hgroup>
                    
                  </div>
                </div><hr>
                        <div class="row">

                <div class="col-sm-6" >
                  <a href="/home/CV/{{Auth::user()->id}}">
                    <div class="card-header" style="text-align: center; background-color:#4ddbff;color: #000"><i class='fas fa-edit'></i>Editer</div>
                  </a>
                 </div>

                <div class="col-sm-6" >
                <a href="/Preview/all_pages/CV/{{Auth::user()->id}}">
                    <div class="card-header"  style="text-align: center; background-color:#00ace6; color: #000"><i class='fas fa-search'></i>Preview/See Your CV</div>
                </a>
                </div>
            </div>
    </div>
    <br><br>
    <div class="container-fluid">
      <center>
        <ul class="list-group list-group-horizontal" style="width: 100%">
          <li class="list-group-item"><a href="/home/CV/{{Auth::user()->id}}">Contact</a></li>
          <li class="list-group-item"><a href="/summery/CV/{{Auth::user()->id}}">Summary</a></li>
          <li class="list-group-item"><a href="/education_preview/CV/{{Auth::user()->id}}">Education Details</a></li>
          <li class="list-group-item"><a href="/preview/cv/{{Auth::user()->id}}">Hobby and Interest</a></li>
          <li class="list-group-item"><a href="/skills/CV/{{Auth::user()->id}}">Skills</a></li>
          <li class="list-group-item"><a href="/language_action/CV/{{Auth::user()->id}}">Language Details</a></li>
          <li class="list-group-item"><a href="/refrence/CV/{{Auth::user()->id}}">Refrence Details</a></li>
        </ul>
      </center>
    </div>
<br>
<div class="container">
 
    <div>
       <main class="py-4">
            @yield('content')
            
    </main> 
    </div>
    
  </div>
</div>

</body>
</html>
