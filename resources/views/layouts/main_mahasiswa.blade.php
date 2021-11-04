<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="sidebar">
            <div class="logo-details">
                <img src="{{ URL::asset('assets/images/logo-tedc.png') }}" alt="logo tedc">
                <span class="logo-name">SI Sidang</span>
            </div>
            <ul class="nav-links">
                <li>
                    <div class="icon-link">
                        <a href="{{ route('mahasiswa') }}">
                            <span class="link-name">Beranda</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="{{ route('bimbingan') }}">
                            <span class="link-name">Bimbingan</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="{{ route('daftar') }}">
                            <span class="link-name">Daftar</span>
                        </a>
                    </div>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="icon-link logout">
                            <a href="{{ route('logout') }}">
                                <span class="link-name">Logout</span>
                            </a>
                        </div>
                    </form>
                </li>
            </ul>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <section class="main-section">
            <div class="main_container space">
                <span class="text">Halaman @yield('title')</span>
                <input type="text" class="search" placeholder="Search">
            </div>
            @auth
                <div class="sec_container">
                    <span>Selamat Datang, {{ auth()->user()->nama }}!</span>
                </div>
            @endauth

            @yield('container')

        </section>

        <script>
            let arrow = document.querySelectorAll(".arrow");
            for (var i=0; i<arrow.length; i++){
                arrow[i].addEventListener("click", (e)=>{
                    let arrowParent = e.target.parentElement.parentElement;
                    console.log(arrowParent);
                    arrowParent.classList.toggle("showMenu")
                })
            }
        </script>
        <script src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>
    </body>
</html>