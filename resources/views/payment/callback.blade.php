<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Callback</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-lg border-0">

                    <div class="card-body text-center p-5">

                        @if($status == 'success')
                            <div class="text-success mb-4">
                                <i class="fa-solid fa-circle-check fa-4x"></i>
                            </div>
                            <h3 class="fw-bold text-success">Payment Successful</h3>
                        @elseif($status == 'failed')
                            <div class="text-danger mb-4">
                                <i class="fa-solid fa-circle-xmark fa-4x"></i>
                            </div>
                            <h3 class="fw-bold text-danger">Payment Failed</h3>
                        @else
                            <div class="text-warning mb-4">
                                <i class="fa-solid fa-circle-exclamation fa-4x"></i>
                            </div>
                            <h3 class="fw-bold text-warning">Payment Status Unknown</h3>
                        @endif

                        <p class="mt-3 fs-5">
                            {{ $status == 'success' ? 'Thank you for your payment. Your transaction was completed successfully.' : ($status == 'failed' ? 'Unfortunately, your payment could not be processed. Please try again.' : 'We could not determine the status of your payment. Please contact support for assistance.') }}
                        </p>

                        <div class="mt-4">
                            <a href="{{ url('/') }}" class="btn btn-primary btn-lg">
                                <i class="fa fa-home me-2"></i> Go Home
                            </a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
