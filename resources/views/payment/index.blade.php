
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

      <!--=============== BOOTSTRAP ===============-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <style>
        body {
            background-color: #ffffff;
        }
        header {
            background-color: #9e2894;
            padding: 10px 0;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff !important;
        }
        .navbar-nav .nav-link {
            margin-right: 20px;
        }
        .navbar-nav .nav-item:last-child .nav-link {
            margin-right: 0;
        }
        .header-buttons .btn {
            margin-left: 10px;
        }
        .billing-data input,
        .billing-data textarea {
            margin-bottom: 10px;
        }
        .order-summary {
            background-color: #f5f5f5;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 20px;
        }
        .order-summary table {
            width: 100%;
        }
        .order-summary th, .order-summary td {
            padding: 10px;
            text-align: left;
        }
        .order-summary th {
            background-color: #9e2894;
            color: #ffffff;
        }
        .order-summary tfoot th {
            font-size: 1.2em;
        }
        .payment-methods label {
            display: flex;
            align-items: center;
        }
        .payment-methods input {
            margin-right: 10px;
        }
        .form-check-label {
            margin-left: 25px;
        }
        footer {
            background-color: #fcd564;
            padding: 20px 0;
        }
        footer h4, footer p, footer a {
            color: #000000;
        }
        footer a {
            margin: 0 10px;
        }
    </style>
</head>
<body>

  <style>
    .spinner-container {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
    }

    .spinner {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

  </style>
  <div class="spinner-container">
      <div class="spinner"></div>
  </div>

  <style>
    .alert {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        display: none;
    }

  </style>
  <div id="successMessage" class="alert alert-success" style="display: none;">
      Đặt hàng thành công!
  </div>

  <div id="errorMessage" class="alert alert-danger" style="display: none;">
      Đã xảy ra lỗi trong quá trình đặt hàng. Vui lòng thử lại!
  </div>

    <!--==============HEADER==================-->
@include ('layout.header')
    @php
        $paymentFormUniqId = 'payment_form_' . uniqId();
    @endphp
    <form form-data="{{ $paymentFormUniqId }}" class="billing-data">
      @include('payment.form')
    </form>

    <script>
        $(() => {
            new PaymentForm({
                self: () => {
                    return $('[form-data="{{ $paymentFormUniqId }}"]')
                },
                spinner: () => {
                    return $('.spinner-container');
                },
                successMessage: () => {
                    return $('#successMessage');
                },
                errorMessage: () => {
                    return $('#errorMessage');
                },
            });
        })

        var PaymentForm = class {
            constructor(options) {
                this.self = options.self;
                this.spinner = options.spinner;
                this.successMessage = options.successMessage;
                this.errorMessage = options.errorMessage;
                this.events();
            }

            submit() {
                const _this = this;

                _this.spinner().show();

                setTimeout(() => {
                  $.ajax({
                      url: "{{ action([App\Http\Controllers\PaymentController::class, 'submit'], ['id' => 1]) }}",
                      method: "POST",
                      data: this.self().serialize()
                  }).done(res => {
                      _this.showSuccessMessage();
                      _this.spinner().hide();
                      setTimeout(() => {
                        window.location.href = '/';
                      }, 700);
                  }).fail(res => {
                      _this.showErrorMessage();

                      _this.self().html(res.responseText)

                      setTimeout(() => {
                        _this.hideErrorMessage();
                      }, 1500);
                      _this.spinner().hide();
                  });
                }, 2000);
            }

            showSuccessMessage() {
                this.successMessage().show();
            }

            hideSuccessMessage() {
                this.successMessage().hide();
            }

            showErrorMessage() {
                this.errorMessage().show();
            }

            hideErrorMessage() {
                this.errorMessage().hide();
            }

            events() {
                const _this = this;

                _this.self().on('submit', e => {
                    e.preventDefault();
                    _this.submit();
                })
            }
        }



    </script>

@include ('layout.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!--=============== MAIN JS ===============-->
  <script src="{{asset('assets/js/main.js')}}"></script>

  <!--=============== BOOSTRAP ===============-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
