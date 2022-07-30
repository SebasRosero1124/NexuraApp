<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('img/favicons/favicon-16x16.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/plantilla.css')}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    @yield('css')

    <title>Nexura Company</title>
</head>
<body>

    {{-- ============================NavBar========================= --}}

    <section class="navbar">

        <div class="nav__container">

            <div class="nav__logo">
                <a href="{{route('main')}}">
                    <img src="{{asset('img/logo.png')}}" alt="Logo"> 
                    <span>NEXURA</span></a>
            </div>

            <div class="nav__content">
                <ul class="nav__links">
                    <a href="{{route('main')}}"><li class="nav__item">Crear empleado</li>
                    </a>
                    <a href="{{route('lista_empleados')}}"><li class="nav__item">Ver empleados</li></a>
                </ul>
            </div>

        </div>


    </section>

    {{-- ===================================End===================== --}}

    
    
    <section class="main">
      
      
      <div class="content">
        
        @yield('content')

           


        </div>


    </section>

    {{-- ================Footer==================--}}

    <footer class="footer">
        <div class="footer__addr">
          <h1 class="footer__logo">Nexura</h1>
              
          <h2>Contacto</h2>
          
          <address>
            0000000000000 contacto Sebastian Rosero Lopez<br>
                
            <a class="footer__btn" href="http://sebasportafolio.com">Email</a>
          </address>
        </div>
        
        <ul class="footer__nav">
          <li class="nav__item">
            <h2 class="nav__title">Media</h2>
      
            <ul class="nav__ul">
              <li>
                <a href="#">prueba</a>
              </li>
      
              <li>
                <a href="#">prueba</a>
              </li>
                  
              <li>
                <a href="#">Nexus Prueba</a>
              </li>
            </ul>
          </li>
          
          <li class="nav__item nav__item--extra">
            <h2 class="nav__title">Technology</h2>
            
            <ul class="nav__ul nav__ul--extra">
              <li>
                <a href="#">Hardware Design</a>
              </li>
              
              <li>
                <a href="#">Software Design</a>
              </li>
              
              <li>
                <a href="#">Digital Signage</a>
              </li>
              
              <li>
                <a href="#">Automation</a>
              </li>
              
              <li>
                <a href="#">Artificial Intelligence</a>
              </li>

            </ul>
          </li>
          
          <li class="nav__item">
            <h2 class="nav__title">Legal</h2>
            
            <ul class="nav__ul">
              <li>
                <a href="#">Terminos y condiciones</a>
              </li>
              
              <li>
                <a href="#">Terminos de uso</a>
              </li>

            </ul>
          </li>
        </ul>
        
        <div class="legal">
          <p>&copy; 2022 <a href="http://sebasportafolio.com">Sebastian Rosero Lopez</a>. Todos los derechos reservados.</p>
        </div>
      </footer>


    {{-- =======================End======================== --}}


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
</body>
</html>