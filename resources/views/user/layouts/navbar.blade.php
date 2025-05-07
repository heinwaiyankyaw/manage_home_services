   <header id="header" class="header d-flex align-items-center sticky-top">
       <div class="container-fluid container-xl position-relative d-flex align-items-center">

           <a href="index.html" class="logo d-flex align-items-center me-auto">
               <!-- Uncomment the line below if you also wish to use an image logo -->
               <!-- <img src="assets/img/logo.png" alt=""> -->
               <h1 class="sitename">HomeEase</h1>
           </a>

           <nav id="navmenu" class="navmenu">
               <ul>
                   <li><a href="{{ route('user.index') }}" class="active">Home</a></li>
                   <li><a href="#about"><span>About</span></a>
                   </li>
                   <li><a href="#services">Services</a></li>
                   <li><a href="{{ route('user.contact') }}">Contact</a></li>
                   @auth
                       <li><a href="{{ route('user.booking') }}">Bookings</a></li>
                   @endauth
               </ul>
               <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
           </nav>

           @auth
               {{-- <a class="btn-getstarted" href="{{ route('user.login') }}">Logout</a> --}}
               <form method="POST" action="{{ route('user.logout') }}" class="d-inline">
                   @csrf
                   <button type="submit"
                       class="btn btn-link btn-getstarted text-dark text-decoration-none p-2 text-white mr-2">
                       <i class="feather feather-log-out mr-2"></i>
                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                           stroke-linejoin="round" class="feather feather-log-out align-middle">
                           <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                           <polyline points="16 17 21 12 16 7"></polyline>
                           <line x1="21" y1="12" x2="9" y2="12"></line>
                       </svg>
                       <span class="align-middle">Logout</span>
                   </button>
               </form>
           @endauth
           @guest
               <a class="btn-getstarted" href="{{ route('user.login') }}">Get Started</a>
           @endguest


       </div>
   </header>
