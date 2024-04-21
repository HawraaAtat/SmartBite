<html lang="en">
  <head>
    <!-- Title -->
    <title>Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="android, ios, mobile, mobile template, mobile app, ui kit, dark layout, app, delivery, ecommerce, material design, mobile, mobile web, order, phonegap, pwa, store, web app, Ombe, coffee app, coffee template, coffee shop, mobile UI, coffee design, app template, responsive design, coffee showcase, style app, trendy app, modern UI, technology, User-Friendly Interface, Coffee Shop App, PWA (Progressive Web App), Mobile Ordering, Coffee Experience, Digital Menu, Innovative Technology, App Development, Coffee Experience, cafe, bootatrap, Bootstrap Framework, UI/UX Design, Coffee Shop Technology, Online Presence, Coffee Shop Website, Cafe Template, Mobile App Design, Web Application, Digital Presence, Bootstrap, caffine">
    <meta name="description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">
    <meta property="og:title" content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone">
    <meta property="og:description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">
    <meta property="og:image" content="{{ asset('assets/images/app-logo/favicon.png') }}">
    <meta name="format-detection" content="telephone=no">
    <meta name="twitter:title" content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone">
    <meta name="twitter:description" content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence.">
    <meta name="twitter:image" content="{{ asset('assets/images/app-logo/favicon.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/app-logo/favicon.png') }}">
    <!-- PWA Version -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <!-- Global CSS -->
    <link href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="page-wrapper">

      <style>
        .column {
          float: left;
          width: 33.33%;
        }

        /* Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }
      </style>

      <div class="page-content space-top">
        <div class="container">
          <button type="button" class="btn w-100 btn-primary mb-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Large modal</button>
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Filter</h5>
                  <button class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row" id="contentArea">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                          <div class="accordion accordion-primary" id="accordion-one">
                            <div class="accordion-item">
                              <div class="accordion-header collapsed " id="headingOne" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseTwo" aria-expanded="true" role="button">
                                <span class="accordion-header-icon"></span>
                                <span class="accordion-header-text">Cuisine</span>
                                <span class="accordion-header-indicator"></span>
                              </div>
                              <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                                <div class="accordion-body-text">
                                  <div class="row">
                                    <div class="column">
                                      <div class="radio square-radio">
                                        <h4>
                                          <br>
                                        </h4>
                                        <label class="radio-label">African <input type="checkbox" checked="checked" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Asian <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">British <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Carribbean <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Chinese <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">European <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                    </div>
                                    <div class="column">
                                      <div class="radio square-radio">
                                        <h4>
                                          <br>
                                        </h4>
                                        <label class="radio-label">French <input type="checkbox" checked="checked" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">German <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Greek <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Indian <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Italian <input type="checkbox" checked="checked" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Japanese <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                    </div>
                                    <div class="column">
                                      <div class="radio square-radio">
                                        <h4>
                                          <br>
                                        </h4>
                                        <label class="radio-label">Korean <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Mediterranean <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Mexican <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Middle Eastern <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Spanish <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        </label>
                                        <label class="radio-label">Thai <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="accordion accordion-primary" id="accordion-two">
                            <div class="accordion-item">
                              <div class="accordion-header collapsed " id="headingTwo" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo" role="button" aria-expanded="true">
                                <span class="accordion-header-text">Diet</span>
                                <span class="accordion-header-indicator"></span>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion-one">
                                <div class="accordion-body-text">
                                  <div class="row">
                                    <div class="column">
                                      <div class="radio square-radio">
                                        <h4>
                                          <br>
                                        </h4>
                                        <label class="radio-label">Gluten Free <input type="checkbox" checked="checked" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Ketogenic <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Vegetarian <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Lacto-Vegetarian <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                    </div>
                                    <div class="column">
                                      <div class="radio square-radio">
                                        <h4>
                                          <br>
                                        </h4>
                                        <label class="radio-label">Ovo-Vegetarian <input type="checkbox" checked="checked" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Vegan <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Pescetarian <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Paleo <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                    </div>
                                    <div class="column">
                                      <div class="radio square-radio">
                                        <h4>
                                          <br>
                                        </h4>
                                        <label class="radio-label">Primal <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Low FODMAP <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Whole30 <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="accordion accordion-primary" id="accordion-three">
                            <div class="accordion-item">
                              <div class="accordion-header collapsed " id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree" role="button" aria-expanded="true">
                                <span class="accordion-header-text">Type</span>
                                <span class="accordion-header-indicator"></span>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
                                <div class="accordion-body-text">
                                  <div class="row">
                                    <div class="column">
                                      <div class="radio square-radio">
                                        <h4>
                                          <br>
                                        </h4>
                                        <label class="radio-label">Main Course <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Side Dish <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Dessert <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Appetizer <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Salad <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                    </div>
                                    <div class="column">
                                      <div class="radio square-radio">
                                        <h4>
                                          <br>
                                        </h4>
                                        <label class="radio-label">Bread <input type="checkbox" checked="checked" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Breakfast <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Soup <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Beverage <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Sauce <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                    </div>
                                    <div class="column">
                                      <div class="radio square-radio">
                                        <h4>
                                          <br>
                                        </h4>
                                        <label class="radio-label">Marinade <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Fingerfood <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Snack <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-label">Drink <input type="checkbox" name="radio1">
                                          <span class="checkmark"></span>
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-sm btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Page Content End -->
    
    <!--**********************************
    Scripts
***********************************-->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/dz.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Swiper -->
    <script src="{{ asset('index.js') }}"></script>
  </body>
</html>