<!-- header -->
<header>
    <!-- header inner -->
    <div class="header">
       <div class="container-fluid">
          <div class="row">
             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                <div class="full">
                   <div class="center-desk">
                      <div class="pl-5 logo">
                         <a href="/"><img src="images/logo.png" alt="#" /></a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                <nav class="navigation navbar navbar-expand-md navbar-dark">
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarsExample04">
                      <ul class="mr-auto navbar-nav">
                         <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="/room">Our room</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="/gallery">Gallery</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="/blog">Blog</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact Us</a>
                         </li>
                         @if (Route::has('login'))
                            <li class="nav-item">
                                @auth
                                   <x-app-layout>

                                   </x-app-layout>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="nav-link">
                                        Log in
                                    </a>
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="nav-link">
                                            Register
                                        </a>
                                    @endif
                                </li>
                                @endauth
                            </li>
                        @endif
                      </ul>
                   </div>
                </nav>
             </div>
          </div>
       </div>
    </div>
 </header>
