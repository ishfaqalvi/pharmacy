<!DOCTYPE html>
<html lang="en">

<head>  
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- <meta name="description" content="Gurdeep singh osahan">
   <meta name="author" content="Gurdeep singh osahan"> -->
   <title>@yield('page_title')</title>
   <!-- Favicon Icon -->
   <link rel="icon" type="image/png" href="img/fav-icon.png">
   <!-- Bootstrap core CSS -->
   <link href="{{ asset('assets/web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
   <!-- Slider CSS -->
   <link rel="stylesheet" href="{{ asset('assets/web/vendor/slider/slider.css') }}">
   <!-- Select2 CSS -->
   <link href="{{ asset('assets/web/vendor/select2/css/select2-bootstrap.css') }}" />
   <link href="{{ asset('assets/web/vendor/select2/css/select2.min.css') }}" rel="stylesheet) }}" />
   <!-- Font Awesome-->
   <link href="{{ asset('assets/web/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">
   <link href="{{ asset('assets/web/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
   <!-- Custom styles for this template -->
   <link href="{{ asset('assets/web/css/style.css') }}" rel="stylesheet">
   <!-- Owl Carousel -->
   <link rel="stylesheet" href="{{ asset('assets/web/vendor/owl-carousel/owl.carousel.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/web/vendor/owl-carousel/owl.theme.css') }}">
</head>

<body>
   <div class="btn-primary pt-2 pb-2">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12 text-center">
               <a href="shop.html" class="mb-0 text-white">
                  40% CASHBACK FOR NEW USERS | CODE: <strong><span class="text-light">GURDEEPOSAHAN40 <span
                           class="mdi mdi-tag-faces"></span></span> </strong>
               </a>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade login-modal-main" id="login">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-body">
               <div class="login-modal">
                  <div class="row">
                     <div class="col-lg-6 d-flex align-items-center">
                        <div class="login-modal-left p-4 text-center pl-5">
                           <img src="img/login.jpg" alt="Gurdeep singh osahan">
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <button type="button" class="close close-top-right position-absolute" data-dismiss="modal"
                           aria-label="Close">
                           <span aria-hidden="true"><i class="icofont-close-line"></i></span>
                           <span class="sr-only">Close</span>
                        </button>
                        <form class="position-relative">
                           <ul class="mt-4 mr-4 nav nav-tabs-login float-right position-absolute" role="tablist">
                              <li>
                                 <a class="nav-link-login active" data-toggle="tab" href="#login-form" role="tab"><i
                                       class="icofont-ui-lock"></i> LOGIN</a>
                              </li>
                              <li>
                                 <a class="nav-link-login" data-toggle="tab" href="#register" role="tab"><i
                                       class="icofont icofont-pencil"></i> REGISTER</a>
                              </li>
                           </ul>
                           <div class="login-modal-right p-4">
                              <!-- Tab panes -->
                              <div class="tab-content">
                                 <div class="tab-pane active" id="login-form" role="tabpanel">
                                    <h5 class="heading-design-h5 text-dark">LOGIN</h5>
                                    <fieldset class="form-group mt-4">
                                       <label>Enter Email/Mobile number</label>
                                       <input type="text" class="form-control" placeholder="+91 123 456 7890">
                                    </fieldset>
                                    <fieldset class="form-group">
                                       <label>Enter Password</label>
                                       <input type="password" class="form-control" placeholder="********">
                                    </fieldset>
                                    <fieldset class="form-group">
                                       <button type="submit" class="btn btn-lg btn-primary btn-block">Enter to your
                                          account</button>
                                    </fieldset>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="customCheck1">
                                       <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div>
                                    <div class="login-with-sites mt-4">
                                       <p class="mb-2">or Login with your social profile:</p>
                                       <div class="row text-center">
                                          <div class="col-6 pr-1">
                                             <button class="btn-facebook btn-block login-icons btn-lg"><i
                                                   class="icofont icofont-facebook"></i> Facebook</button>
                                          </div>
                                          <div class="col-6 pl-1">
                                             <button class="btn-google btn-block login-icons btn-lg"><i
                                                   class="icofont icofont-google-plus"></i> Google</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="register" role="tabpanel">
                                    <h5 class="heading-design-h5 text-dark">REGISTER</h5>
                                    <fieldset class="form-group mt-4">
                                       <label>Enter Email/Mobile number</label>
                                       <input type="text" class="form-control" placeholder="+91 123 456 7890">
                                    </fieldset>
                                    <fieldset class="form-group">
                                       <label>Enter Password</label>
                                       <input type="password" class="form-control" placeholder="********">
                                    </fieldset>
                                    <fieldset class="form-group">
                                       <label>Enter Confirm Password </label>
                                       <input type="password" class="form-control" placeholder="********">
                                    </fieldset>
                                    <fieldset class="form-group">
                                       <button type="submit" class="btn btn-lg btn-primary btn-block">Create Your
                                          Account</button>
                                    </fieldset>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="customCheck2">
                                       <label class="custom-control-label" for="customCheck2">I Agree with <a
                                             href="#">Term and Conditions</a></label>
                                    </div>
                                    <div class="login-with-sites mt-4">
                                       <p class="mb-2">or Login with your social profile:</p>
                                       <div class="row text-center">
                                          <div class="col-6 pr-1">
                                             <button class="btn-facebook btn-block login-icons btn-lg"><i
                                                   class="icofont icofont-facebook"></i> Facebook</button>
                                          </div>
                                          <div class="col-6 pl-1">
                                             <button class="btn-google btn-block login-icons btn-lg"><i
                                                   class="icofont icofont-google-plus"></i> Google</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="bg-light">   
      @yield('content')
   </div>
   @include('web.include.footer.footer')
   @include('web.include.body.cart-sidebar')

   <!-- Bootstrap core JavaScript -->
   <script src="{{ asset('assets/web/vendor/jquery/jquery.min.js ') }}"></script>
   <script src="{{ asset('assets/web/vendor/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
   <!-- select2 Js -->
   <script src="{{ asset('assets/web/vendor/select2/js/select2.min.js ') }}"></script>
   <!-- Owl Carousel -->
   <script src="{{ asset('assets/web/vendor/owl-carousel/owl.carousel.js ') }}"></script>
   <!-- Slider Js -->
   <script src="{{ asset('assets/web/vendor/slider/slider.js ') }}"></script>
   <!-- Custom scripts for all pages-->
   <script src="{{ asset('assets/web/js/custom.js ') }}"></script>
</body>

</html>