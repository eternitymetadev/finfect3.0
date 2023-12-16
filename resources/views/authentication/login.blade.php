<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Finfect - Finance Perfect</title>

    <!-- Layout CSS File -->
    <link href="{{asset('assets/css/global/globalStyle.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/colors/colors.css')}}" rel="stylesheet" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="{{asset('assets/css/font/font.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />

    <!-- bootstrap -->
    <link href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/bootstrap/bootstrap-icons.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet"
    />

    <link rel="stylesheet" href="{{asset('assets/css/pages/auth-page/auth-page.css')}}">

    <!-- animation.style CSS File -->
    <link href="{{asset('assets/css/animation/animateStyle.css')}}" rel="stylesheet" />

    <!-- jquery-3.7.1 -->
    <script src="{{asset('assets/js/jquery/jquery-3-7-1.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery/jquery-validate-1-19-5.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery/additional-validate-jq.min.js')}}"></script>
</head>

  <body>
    <main class="login">
      <section class="content">
        <div class="illustration">
          <img src="../../assets/images/vendor.svg" alt="illustration" />
        </div>

        <div class="loginBlock">
          <div class="loginFormBlock relative overflow-hidden">
            <img src="{{asset('assets/images/logo.svg')}}" alt="demo" class="logo" />
            <div
              class="formContainer col-12 d-flex flex-column align-items-stretch justify-content-between flex-grow-1 px-3"
            >
              <div id="textContainer" class="textContainer">
                <p class="title">Login</p>
                <p class="description">
                  Please enter your mobile number to continue
                </p>
              </div>

              <form
                class="col-12 d-flex flex-grow-sm-1 flex-column align-items-stretch justify-content-end needs-validation"
                novalidate
              >
              @csrf
                <div id="formFields">
                  <div class="form-group">
                    <label for="email" class="form-label">
                      Email
                    </label>
                    <input
                        autofocus
                        id="email"
                        type="text"
                        class="form-control"
                        value=""
                        placeholder="email@your.domain"
                        pattern="^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$"
                        required
                    />
                    <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                    <div class="invalid-feedback">Email address not found</div>
                  </div>
                </div>

                <button
                  class="btn btn-primary mt-2 loadingButton"
                  type="submit"
                  id="submitButton"
                >
                  <span class="btnText">Proceed</span>
                  <span class="loadingText">Processing...</span>
                </button>
              </form>

              <span id="helpLineBottom" class="helpLineBottom">
                Need help? <a href="#">Support</a> 
              </span>
            </div>

            <div class="loaderContainer" id="loaderContainer">
              <div class="loader"></div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- custom js -->
    <script src="{{asset('assets/js/pages/auth-page/auth-page.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/common.js')}}"></script>

  </body>
</html>
