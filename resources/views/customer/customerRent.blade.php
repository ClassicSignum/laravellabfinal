<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/traveliaStyle.css">
  <link rel="stylesheet" href="/css/animate.css"> <!-- included in wow js -->
  <link rel="stylesheet" href="/css/all.min.css">
  <title>TRAVELIA!</title>
</head>


<style>
    .item{
        width: 50%;
        margin: 0 auto;
        border: 1px solid #222;
    }
</style>

<body>

  <!-- header part starts -->

  <header class="header-part">
    <div class="items container-fluid bg-dark">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/customer">
          <img class="wow rotateIn" src="/images/travelia/logo.png" data-wow-duration="3s" data-wow-iteration="40"
            height="50" width="60" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto">
            <li class="nav-item active pr-4">
              <a class="" href="/customer">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="dhover1 nav-item dropdown pr-4 pb-0">
              <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                cars
              </a>
              <div class="dropdown-menu bg-dark dmenu1" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/customer/customerPrivateCar">PRIVATE CARS</a>
                <a class="dropdown-item" href="/customer/customerMicro">MICROBUS</a>
                <a class="dropdown-item" href="/customer/customerPickup">PICK-UP</a>



              </div>
            </li>

            <li class="nav-item pr-4">
              <a class="" href="howitworks.html">how it works <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item pr-4">
              <a class="" href="help.html">help <span class="sr-only">(current)</span></a>
            </li>

            <li class="dhover2 nav-item dropdown pr-4 pb-0">
              <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Account
              </a>
              <div class="dropdown-menu bg-dark dmenu2" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/customer/customerProfile">My info</a>
                <a class="dropdown-item" href="/customer/customerRentHistory">My rent history</a>




              </div>
            </li>


          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a href="/logout" class="btn btn-outline-success mr-4">Log out</a>
          </form>
        </div>
      </nav>
    </div>
  </header>

  <!-- header part ends -->


 <!-- rent this car starts -->
 <section>

    <div class="container">
            <div class="item mt-5 mb-5 text-center">

                <h4 class="mt-3 font-italic">invoice</h4>

                <form action="" method="post">

                    <input type="hidden" name="cartitle" value="{{ $rentinfo[2]->cartitle }}">
                    <input type="hidden" name="carrentdays" value="{{ $rentinfo[0] }}">
                    <input type="hidden" name="carrentcost" value="{{ $rentinfo[1] }}">

                    
                    <h3>{{ $rentinfo[2]->cartitle }}</h3>
                    <br>
                    <h3>Rent for : {{ $rentinfo[0] }} days</h3>
                    <br>
                    <h3 class="mb-4">Total rent : {{ $rentinfo[1] }} tk</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <input type="submit" value="cancel" name="submit" class="btn btn-warning mr-4">
                            <a href="#rentModal" data-toggle="modal" class="btn btn-success" > rent now</a>
                            
                        </div>
                    </div>
                </form>

            </div>

    </div>

 </section>
 <!-- rent this car ends -->


 <!-- login part starts -->


 <div id="rentModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Rent</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form class="form" action="" method="POST">
          <input type="hidden" name="totaldays" value="{{ $rentinfo[0] }}">
          <input type="hidden" name="totalcost" value="{{ $rentinfo[1] }}">
          <input type="hidden" name="cartitle" value="{{ $rentinfo[2]->cartitle }}">
          <div class="form-group">

            <label for="">Date from : </label>
            <input type="date" name="datefrom">
            
          </div>
          <div class="form-group">

            <label for="">Date to : </label>
            <input type="date" name="dateto">
            
          </div>

          <div class="form-group">

            <label for="">Payment options : </label>
            <select name="paymentoption" id="">
                <option value="bkash">B-kash</option>
                <option value="dbbl">DBBL</option>
                <option value="cash-on-delivary">Cash-on-delivery</option>
            </select>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control form-control-lg" id="loginpassword" name="password">

            <div class="invalid-feedback">Enter your password too!</div>
          </div>
         
          <div class="form-group py-4">
            <button class="btn btn-outline-secondary btn-lg" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <input type="submit" name="submit" value="submit" class="btn btn-success btn-lg float-right"
              id="btnLogin"></input>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- login part ends -->






  <!-- footer part starts -->
  <section class="footer-part">
    <div class="container">
      <div class="items text-center">
        <img src="/images/travelia/logo.png" alt="">
        <div class="info">
          <div class="row">
            <div class="col-md-7 text-white">
              <h4>More Info</h4>
              <h6>OUR AGREEMENT</h6>
              <br>
              <h6>BOOK NOW!</h6>
              <H4>Follow Us</H4>
              <div class="icons">
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-google-plus"></i>
              </div>
            </div>
            <div class="col-md-5 text-white">
              <h4>Have Any Question ?</h4>
              <h6>VISIT HELP CENTER</h6>
              <br>
              <h6>CONTACT US</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- footer part ends -->









  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <!-- <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> -->
  <script src="/js/jquery-3.4.1.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/wow.js"></script>
  <script src="/js/jquery.hover3d.js"></script>




  <script>

    $(document).ready(function () {

    }); // document .ready ends





    $('.dhover1, .dmenu1').mouseenter(function () {
      $('.dmenu1').fadeIn();
    });
    $('.dhover1').mouseleave(function () {
      $('.dmenu1').fadeOut();
    });


    $('.dhover2, .dmenu2').mouseenter(function () {
      $('.dmenu2').fadeIn();
    });
    $('.dhover2').mouseleave(function () {
      $('.dmenu2').fadeOut();
    });

    var wow = new WOW();
    wow.init();


  </script>
  <script></script>


</body>

</html>