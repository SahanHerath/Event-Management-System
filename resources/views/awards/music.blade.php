
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="css/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="css/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Evora
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="css/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="css/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a  class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="css/assets/img/logo-small.jpg">
          </div>
        </a>
        <a  class="simple-text logo-normal">
          Evora
          <!-- <div class="logo-image-big">
            <img src="css/assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="/home">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li >
            <a href="/admins">
              <i class="nc-icon nc-key-25"></i>
              <p>Admins</p>
            </a>
          </li>
          <li>
          <li>
            <a href="/comments">
              <i class="nc-icon nc-bulb-63"></i>
              <p>User Review</p>
            </a>
          </li>
          <li>
            <a href="/Profile">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="/users">
              <i class="nc-icon nc-badge"></i>
              <p>Service Providers</p>
            </a>
          </li>
          <li>
            <a href="/complaints">
              <i class="nc-icon nc-globe-2"></i>
              <p>Complaints</p>
            </a>
          </li>
          <li>
            <a href="/suggestions">
              <i class="nc-icon nc-time-alarm"></i>
              <p>Suggestions</p>
            </a>
          </li>
          <li>
            <a href="/Summary">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Summary</p>
            </a>
          </li>
          <li class="active ">
            <a href="/Awards">
              <i class="fa fa-trophy"></i>
              <p>Awards</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Evora Service Providers</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
           
            <ul class="navbar-nav">
            <li class="nav-item">
                                <a class="nav-link" href="{{URL('/Profile')}}" aria-expanded="false" v-pre>
								
								<b>{{ Auth::user()->name }}</b>
                                </a>

                            </li>
							<li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">
                                    <p class="text-black" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </p>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </a>
                            </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Selection</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item"   href="Venue">Venues</a>
                      <a class="dropdown-item"   href="Bridal">Beautician</a>
                      <a class="dropdown-item"   href="Decorator">Decorators</a>
                      <a class="dropdown-item"   href="Music">DJs/Music</a>
                      <a class="dropdown-item"   href="Photography">Photography & Videography</a>
                      <a class="dropdown-item"   href="Dancing">Dancers & Choregraphy</a>
                      <a class="dropdown-item"   href="Cake">Cake Designers</a>
                      <a class="dropdown-item"   href="EventPlanner">Event Planners</a>
                      <a class="dropdown-item"   href="catering">Catering Service</a>
                      <a class="dropdown-item"   href="CostumeDesigner">Costume Designers</a> 
                      <a class="dropdown-item"   href="Poruwa">Poruwa Rituals</a>
                      <a class="dropdown-item"   href="Actor">Presenters & Entertainers</a>
                      <a class="dropdown-item"   href="Transport">Wedding Transport</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="#pablo">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav> 

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
<br><br><br><br>
<a href="/Awards"><button type="button" class="btn btn-primary">All</button></a>
<a href="/HotelAwards"><button type="button" class="btn btn-primary">Hotels & Halls</button></a>
<a href="/PhotographyAwards"><button type="button" class="btn btn-primary">Photography</button></a>
<a href="/SalonAwards"><button type="button" class="btn btn-primary">Beautician</button></a>
<a href="/MusicAwards"><button type="button" class="btn btn-warning">DJ/Band</button></a>
<a href="/CateringAwards"><button type="button" class="btn btn-primary">Catering</button></a>
<a href="/ActorAwards"><button type="button" class="btn btn-primary">Representer & Artist</button></a>
<a href="/CakeAwards"><button type="button" class="btn btn-primary">Cake Designer</button></a>
<a href="/CostumeAwards"><button type="button" class="btn btn-primary">Costume Designer</button></a>
<a href="/DancingAwards"><button type="button" class="btn btn-primary">Dancing</button></a>
<a href="/DecorationAwards"><button type="button" class="btn btn-primary">Decoration</button></a>
<a href="/TransportAwards"><button type="button" class="btn btn-primary">Transport</button></a>
<a href="/EventAwards"><button type="button" class="btn btn-primary">Event Planners</button></a>
<a href="/PoruwaAwards"><button type="button" class="btn btn-primary">Poruwa Rituals</button></a>


    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Service providers -Awards </h4>
            </div>

            

        </div>
        
        @if(count($data) == 0)
            <div class="panel-body text-center">
                <h4>No Users Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">
           
                <table class="table table-striped ">
                    <thead>
                        <tr>
                        <th></th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Platinum</th>
                            <th>Gold</th>
                            <th>Silver</th>
                            <th>Bronze</th>
                            <th>Remove</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $users)
                   
                        <tr>
                        <td></td>
                            <td>{{ $users->userid }}</td>
                            <td>{{$users->name}}</td>
                            
                            <td>{{ $users->email }}</td>
                            @if($users->Platinum==1)
                            <td><a href="{{URL('/RemoveAward'.$users->awardid)}}"><button type="button" style="background-color: #e5e4e2;" class="btn btn-default">Awarded</button></a></td>
                            @endif
                            @if($users->Platinum==0)
                            <td><a href="{{URL('/PlatinumAward'.$users->awardid)}}"><button type="button" class="btn btn-primary">Medal</button></a></td>
                            @endif

                            @if($users->Gold==1)
                            <td><a href="{{URL('/RemoveAward'.$users->awardid)}}"><button type="button" style="background-color: #AF9500;" class="btn btn-default">Awarded</button></a></td>
                            @endif
                            @if($users->Gold==0)
                            <td><a href="{{URL('/GoldAward'.$users->awardid)}}"><button type="button" class="btn btn-primary">Medal</button></a></td>
                            @endif

                            @if($users->Silver==1)
                            <td><a href="{{URL('/RemoveAward'.$users->awardid)}}"><button type="button" style="background-color: #D7D7D7;" class="btn btn-default">Awarded</button></a></td>
                            @endif
                            @if($users->Silver==0)
                            <td><a href="{{URL('/SilverAward'.$users->awardid)}}"><button type="button" class="btn btn-primary">Medal</button></a></td>
                            @endif
                            
                            @if($users->Bronze==1)
                            <td><a href="{{URL('/RemoveAward'.$users->awardid)}}"><button type="button" style="background-color: #6A3805;" class="btn btn-default">Awarded</button></a></td>
                            @endif
                            @if($users->Bronze==0)
                            <td><a href="{{URL('/BronzeAward'.$users->awardid)}}"><button type="button" class="btn btn-primary">Medal</button></a>
                            @endif
                            
                            <td><a href="{{URL('/RemoveAward'.$users->awardid)}}"><button type="button" class="btn btn-danger">Remove Award</button></a></td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>
               

            </div>
        </div>

        
        
        @endif
    
    </div>
