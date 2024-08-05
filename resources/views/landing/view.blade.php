<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <meta name="csrf-token" content="{{ csrf_token() }}">
   
   <link href="{{ URL::asset('public/property/fonts/icomoon/style.css' ) }}" rel="stylesheet" type="text/css"> 
   <link href="{{ URL::asset('public/property/fonts/flaticon/font/flaticon.css' ) }}" rel="stylesheet" type="text/css"> 
   <link href="{{ URL::asset('public/property/css/tiny-slider.css' ) }}" rel="stylesheet" type="text/css"> 
   <link href="{{ URL::asset('public/property/css/aos.css' ) }}" rel="stylesheet" type="text/css"> 
   <link href="{{ URL::asset('public/property/css/style.css' ) }}" rel="stylesheet" type="text/css"> 


    <title>
     Prime Property &mdash; 
    </title>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
          <a href="index.html" class="logo m-0 float-start">Prime Property</a>


            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class="active"><a href="index.html">Home</a></li>
              <li class="has-children">
                <a href="properties.html">Properties</a>
                <ul class="dropdown">
                  <li><a href="{{route('for.sale')}}">For Sale Property</a></li>
                  <li><a href="#">For Rent Property</a></li>
                  
                </ul>
              </li>
        
              <li><a href="contact.html">Contact Us</a></li>
            </ul>

            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_bg_3.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">
              {{$view->property_name}}
            </h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">
                  <a href="properties.html">Properties</a>
                </li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                {{$view->property_name}}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-7">
            <div class="img-property-slide-wrap">
              <div class="img-property-slide">
                <img src="{{ asset('public/attachment/Property/'. $view->property_no.'/'.$view->image1) }}" alt="Image" class="img-fluid" />
                <img src="{{ asset('public/attachment/Property/'. $view->property_no.'/'.$view->image2) }}" alt="Image" class="img-fluid" />
                <img src="{{ asset('public/attachment/Property/'. $view->property_no.'/'.$view->image3) }}" alt="Image" class="img-fluid" />
                <img src="{{ asset('public/attachment/Property/'. $view->property_no.'/'.$view->image4) }}" alt="Image" class="img-fluid" />
              </div>
            </div>
          </div>
       
<!-- Your existing HTML content here -->

          <div class="col-lg-4">
           
            <h2 class="heading text-primary">{{$view->property_name}}</h2>
            <label class="meta">Address: {{$view->property_address}}</label><br>
            <label class="meta">Square Meter: {{$view->square_meter}}</label><br>
            <label class="meta">Bedrooms: {{$view->bedrooms}}</label><br>
            <label class="meta">Toilet:{{$view->toilet}}</label><br>
            <label class="meta">Price: {{$view->price}}</label><br>
            <label class="meta">Status: {{$view->status}}</label>

            <p class="text-black-50">
            Description: {{$view->quality}}
            </p>
            <!-- <p class="text-black-50">
              Perferendis eligendi reprehenderit, assumenda molestias nisi eius
              iste reiciendis porro tenetur in, repudiandae amet libero.
              Doloremque, reprehenderit cupiditate error laudantium qui, esse
              quam debitis, eum cumque perferendis, illum harum expedita.
            </p> -->

            <div class="d-block agent-box p-5">
              <!-- <div class="img mb-4">
                <img
                  src="images/person_2-min.jpg"
                  alt="Image"
                  class="img-fluid"
                />
              </div> -->
              <div class="text">
              <h5>Customer Detais</h5>
              @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

             <form action="{{route('store.customer')}}" method="post"> 
              @csrf
                <div class="row">
                  <div class="col-md-12">
                  <input type="text" class="form-control" value="{{$view->id}}" name="property_id" hidden>
                    <label>Customer Name</label>
                      <input type="text" class="form-control" name="customer_name" required><br>
                  </div>
                  <div class="col-md-12">
                    <label>Customer Address</label>
                    <input type="text" class="form-control" name="customer_address" required><br>
                  </div>
                  <div class="col-md-12">
                    <label>Contact No#: </label>
                      <input type="text" class="form-control" name="customer_no" required><br>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Buy</button>
                  </div>
                </div>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="widget">
              <h3>Contact</h3>
              <address>43 Raymouth Rd. Baltemoer, London 3910</address>
              <ul class="list-unstyled links">
                <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                <li>
                  <a href="mailto:info@mydomain.com">info@mydomain.com</a>
                </li>
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <div class="widget">
              <h3>Sources</h3>
              <ul class="list-unstyled float-start links">
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Vision</a></li>
                <li><a href="#">Mission</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy</a></li>
              </ul>
              <ul class="list-unstyled float-start links">
                <li><a href="#">Partners</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Creative</a></li>
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <div class="widget">
              <h3>Links</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Our Vision</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact us</a></li>
              </ul>

              <ul class="list-unstyled social">
                <li>
                  <a href="#"><span class="icon-instagram"></span></a>
                </li>
                <li>
                  <a href="#"><span class="icon-twitter"></span></a>
                </li>
                <li>
                  <a href="#"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="#"><span class="icon-linkedin"></span></a>
                </li>
                <li>
                  <a href="#"><span class="icon-pinterest"></span></a>
                </li>
                <li>
                  <a href="#"><span class="icon-dribbble"></span></a>
                </li>
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->

        <div class="row mt-5">
          <div class="col-12 text-center">
            <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              . All Rights Reserved. &mdash; Designed with love by
              <a href="https://untree.co">Untree.co</a>
              <!-- License information: https://untree.co/license/ -->
            </p>
            <div>
              Distributed by
              <a href="https://themewagon.com/" target="_blank">themewagon</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

 
    <script src="{{asset('public/property/js/bootstrap.bundle.min.js')}}" ></script>
    <script src="{{asset('public/property/js/tiny-slider.js')}}" ></script>
    <script src="{{asset('public/property/js/aos.js')}}" ></script>
    <script src="{{asset('public/property/js/navbar.js')}}" ></script>
    <script src="{{asset('public/property/js/counter.js')}}" ></script>
    <script src="{{asset('public/property/js/custom.js')}}" ></script>
 
   
  </body>
</html>
