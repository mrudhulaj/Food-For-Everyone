<!doctype html>
<html lang="en">

<head>
    <title>Food For Everyone</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{url('images/hand.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/feedkeralahome.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-md customnavcolor" style="height: 70px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
            <div>
                <a class="navbar-brand" href="/home" style="margin-right: -180px;">
                    <img src="{{url('images/hand.png')}}" alt="Logo" width="20%" style="background-color: white;">
                </a>
            </div>
            <ul class="navbar-nav" style="font-family: Calistoga;font-size: 20px;font-weight: bold;">
                <li class="nav-item">
                    <a class="nav-link" href="/home" onMouseOver="this.style.color='green'"
                        onMouseOut="this.style.color='rgb(50, 66, 216)'" style="color:rgb(50, 66, 216);">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/availablefoods" onMouseOver="this.style.color='green'"
                        onMouseOut="this.style.color='rgb(50, 66, 216)'" style="color:rgb(50, 66, 216);">AVAILABLE
                        FOODS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/otheritems" onMouseOver="this.style.color='green'"
                        onMouseOut="this.style.color='rgb(50, 66, 216)'" style="color:rgb(50, 66, 216);">OTHER ITEMS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/volunteers" onMouseOver="this.style.color='green'"
                        onMouseOut="this.style.color='rgb(50, 66, 216)'" style="color:rgb(50, 66, 216);">VOLUNTEERS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login" onMouseOver="this.style.color='green'"
                        onMouseOut="this.style.color='rgb(50, 66, 216)'" style="color:rgb(50, 66, 216);">LOGIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/signup" onMouseOver="this.style.color='green'"
                        onMouseOut="this.style.color='rgb(50, 66, 216)'" style="color:rgb(50, 66, 216);">SIGNUP</a>
                </li>
            </ul>
        </div>
    </nav>
		<!-- End of header -->
		<!-- Begin Section -->
		@yield('content')
		<!-- End Section -->
    <!-- footer begin -->
    <footer id="sticky-footer" class="py-1" style="margin-top: 20px;color: black;">
        <div class="container text-center">
            <hr style="border: 0.5px solid lightblue;">
            <p>Registered as FoodForEveryone &copy.
            </p>
            <p style="margin-top: -10px;">All donations are tax-exempted as eligible under section 80G of the Income Tax
                Act, 1961.</p>

        </div>
    </footer>
    <!-- footer end -->






















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>