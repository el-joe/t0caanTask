<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details #{{ $order->id }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body class="bg-light">

    <div class="container py-4">

        <!-- Page Title -->
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold">Order Details #{{ $order->id }}</h3>
            </div>
        </div>

        <div class="row">

            <!-- Order Card -->
            <div class="col-12 col-lg-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Order Information</h5>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <strong>Customer Name:</strong> {{ $order->user?->name }} <br>
                            <strong>Email:</strong> {{ $order->user?->email }}
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-end">Price</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($order->orderItems as $item)
                                        <tr>
                                            <td>{{ $item->product_name }}</td>
                                            <td class="text-center">{{ $item->qty }}</td>
                                            <td class="text-end">{{ $item->price }}</td>
                                            <td class="text-end">{{ $item->total_item_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">Total:</th>
                                        <th class="text-end">{{ $order->grand_total }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>

                    <div class="card-footer bg-light">
                        <small class="text-muted">
                            Order created at: {{ $order->created_at->format('Y-m-d H:i') }}
                        </small>
                    </div>

                </div>
            </div>

            <!-- Payment Card -->
            <div class="col-12 col-lg-4">

                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Payment</h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('payment.payNow', $order->id) }}" method="POST">
                            @csrf

                            <label class="form-label fw-bold mb-2">Select Payment Method</label>

                            @foreach($payment_methods as $method)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio"
                                           name="payment_method" value="{{ $method->id }}"
                                           id="method_{{ $method->id }}" required>

                                    <label class="form-check-label" for="method_{{ $method->id }}">
                                        {{ $method->name }}
                                    </label>
                                </div>
                            @endforeach

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fa fa-credit-card me-2"></i>
                                    Pay Now
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
