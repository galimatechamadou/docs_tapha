<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>keugui_Immo - Accueil</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('css/docs.css')}}"/>
   <!--  <link rel="stylesheet" href="{{asset('css/all.css')}}"/> -->
</head>

<body class="bg-white" style="font-family:sans-serif;font-size:small" id="page-top">
<!-- Navigation  contenant des boutons -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark " id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Keugui_IMMO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar nav-tabs ml-auto py-2">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="/">ACCUEIL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white " href="/menu/acheter">ACHETER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/menu/louer">LOUER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">
                                <button class="btn btn-secondary">Deposer une Annonce </button>
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white " href="{{ route('login') }}">SE CONNECTER</a>
                            </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a class="nav-link text-white"  href="{{ route('register') }}"> {{ __('Sinscrire') }}</a>
                                    </li>
                                @endif
                        @else
                                <li class= "nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-togggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @can('admin')
                                            <a class="dropdown-item" href="#"><i class="fas fa-shield-alt"></i> Back Office</a>
                                        @endcan
                                        @can('seller')
                                            <a class="dropdown-item" href="#"><i class="fas fa-shield-alt"></i>Mon compte</a>
                                        @endcan
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                    </div>
                                </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="contenu">
        @if(session('success'))
              <div class="alert alert-success">{{session('success')}}</div>
          @endif
          @if($errors->any())
              @foreach($errors->all() as $error)
                  <div class="alert alert-danger">{{$error}}</div>
              @endforeach
          @endif
        @yield("nav")
        </div>
        <!-- Footer -->
            <footer class="py-4 bg-dark">
                <div class="container">
                    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
                </div>
                <!-- /.container -->
            </footer>
                <script src="{{asset('js/app.js')}}"></script>
                <!-- <script src="{{asset('js/scrolling-nav.js')}}"></script> -->
            <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
            <script>
                tinymce.init({
                    selector:'textarea.description',
                    width: 900,
                    height: 300
                });
            </script>

    </body>
</html>
