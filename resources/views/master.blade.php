<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content=" @yield('meta_description') ">
	    <meta name="google-signin-client_id" content="@yield('google_profile_id')">
		<title>@yield('title')</title>				
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		@yield('customcss')		
    </head>
	<body>	
	    <nav class="container header">
		    <div class="row">
		    	<div class="col-md-3 col-lg-3 col-xs-12">		
		    		<a class="navbar-brand" href="{{ url('/') }}">TOPALMOVIL</a>
		    		<div class="navbar-header">
			            <button type="button" class="navbar-toggle" data-toggle="collapse"
			                    data-target="#mainNavbar">
			                <span class="fa fa-bars"></span>
			            </button>
			            <button class="navbar-toggle" data-toggle="collapse"
			                    data-target="#socialNavbar">
			            	<span class="fa fa-share-alt"></span>
			            </button>					            
			        </div>
		    	</div>

		    	<div class="col-md-9 col-lg-9 col-xs-12">		    	       		
				    <div class="collapse navbar-collapse" id="socialNavbar">
				    	<ul class="nav navbar-nav navbar-right mobile">
				    		<li id="status">
				    			@if (Auth::user() && Auth::check())	
				    		        <a href="#">
				    		        	<span class="fa">Hola {{ ucfirst(Auth::user()->name) }}</span>
				    		        </a>
				    		    @endif
				    		</li>
				            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
				            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
				            <li><a href="#"><span class="fa fa-pinterest"></span></a></li> 
				            <li><a href="#"><span class="fa fa-google"></span></a></li>
				            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
				            <li><a href="#"><span class="fa fa-skype"></span></a></li>
			            </ul>
				    </div>
                    
	                <nav class="navbar">
					    <div class="container-fluid">
					        
						    <div class="collapse navbar-collapse" id="mainNavbar">
						        <ul class="nav navbar-nav navbar-right">
						            <li @yield('inicio')><a href="{{ url('/') }}">
						            	<span class="fa fa-home"></span>Inicio</a></li>
						            <li @yield('stoc')>
						            	<a href="{{ url('/stoc') }}">
						            		<span class="fa fa-database"></span>Almacen</a>
						            </li>
						            <li @yield('insertar')>
						            	<a href="{{ url('/brand/create') }}" class="dropdown-toggle" 
						            	    data-toggle="dropdown">
						            	    <span class="fa fa-edit"></span>Insertar<span class="caret"></span>
						                </a>
						                <ul class="dropdown-menu">
			                            	<li><a href="{{ url('/brand/create') }}">Nueva categoria</a></li>
			                                <li><a href="{{ url('/provedor') }}">Nuevo provedor</a></li>
			                                <li><a href="{{ url('/product') }}">Nuevo producto</a></li> 
			                             </ul>
						            </li>
						            <li @yield('vender')><a href="{{ url('vender') }}">
						            	<span class="fa fa-shopping-cart"></span>Vender
						            </a></li>
						            <li @yield('comprar')>
						            	<a href="{{ url('comprar') }}" class="dropdown-toggle"
						            	    data-toggle="dropdown">
						            	    <span class="fa fa-money"></span>Comprar<span class="caret"></span>
							            </a>
                                        <ul class="dropdown-menu">
			                            	<li><a href="{{ url('comprar') }}">Comprar a particular</a></li>
			                                <li><a href="{{ url('/buscar/factura-rebu') }}">Buscar factura REBU</a></li>
			                                <li><a href="{{ url('product/to_update') }}">Productos sin actualizar</a></li>
			                             </ul>
							        </li>
						            @if (Auth::user() && Auth::check())						                
						                <li><a href="{{ url('/auth/logout') }}">
						                	<span class="fa fa-user"></span> Logout
						                </a></li>
						            @else
						                <li><a href="{{ url('/auth') }}">
						                	<span class="fa fa-user"></span> Login
						                </a></li>
						            @endif
						        </ul>
						    </div>
					    </div>
					</nav>

		    	</div>		    	
			</div>
		</nav>
		 
					
		@yield('content')
		
	    <footer>
	    	<div class="container">
	    		<div class="row">
					<div class="col-md-4 col-xs-12">
						<p>col-xs-4</p>
					</div>
					<div class="col-md-4 col-xs-12">
						<p>col-xs-4</p>
					</div>
					<div class="col-md-4 col-xs-12">
						<p>col-xs-4</p>
					</div>
				</div>
		    </div>

	    </footer>		    
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	    @yield('customjs')
	</body>
</html>