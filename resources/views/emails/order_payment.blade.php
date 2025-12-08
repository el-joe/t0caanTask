<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>New Order</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6f8;">
  <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background-color:#f4f6f8;padding:20px 0;">
    <tr>
      <td align="center">
        <!-- Email container -->
        <table width="600" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;border-radius:8px;overflow:hidden;font-family:Arial,Helvetica,sans-serif;">
          <!-- Header -->
          <tr>
            <td style="padding:20px 24px;background:#0d6efd;color:#ffffff;">
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td style="font-size:20px;font-weight:700;">YourCompany</td>
                  <td align="right" style="font-size:14px;opacity:0.9;">New Order Created</td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Greeting -->
          <tr>
            <td style="padding:20px 24px 0 24px;color:#333333;">
              <p style="margin:0 0 12px 0;font-size:16px;">
                Hello <strong>{{ $order->user?->name }}</strong>,
              </p>
              <p style="margin:0;font-size:14px;color:#555555;">
                Thank you — a new order has been created. Below are the order details:
              </p>
            </td>
          </tr>

          <!-- Items table -->
          <tr>
            <td style="padding:16px 24px 0 24px;">
              <table width="100%" cellpadding="8" cellspacing="0" role="presentation" style="border-collapse:collapse;font-size:14px;">
                <thead>
                  <tr>
                    <th align="left" style="border-bottom:2px solid #e9eef5;padding:8px 0;">Product</th>
                    <th align="center" style="border-bottom:2px solid #e9eef5;padding:8px 0;">Qty</th>
                    <th align="right" style="border-bottom:2px solid #e9eef5;padding:8px 0;">Price</th>
                    <th align="right" style="border-bottom:2px solid #e9eef5;padding:8px 0;">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Repeat this TR for each item -->
                  @foreach($order->orderItems as $item)
                    <tr>
                        <td style="border-bottom:1px solid #f0f2f5;padding:12px 0;">{{ $item->product->name }}</td>
                        <td align="center" style="border-bottom:1px solid #f0f2f5;padding:12px 0;">{{ $item->qty }}</td>
                        <td align="right" style="border-bottom:1px solid #f0f2f5;padding:12px 0;">{{ $item->price }}</td>
                        <td align="right" style="border-bottom:1px solid #f0f2f5;padding:12px 0;">{{ $item->total_item_price }}</td>
                    </tr>
                  @endforeach
                  <!-- End repeat -->
                </tbody>
                <tfoot>
                  <tr>
                    <td></td>
                    <td align="right" style="padding-top:12px;font-weight:700;">Total</td>
                    <td align="right" style="padding-top:12px;font-weight:700;">{{ $order->grand_total }}</td>
                  </tr>
                </tfoot>
              </table>
            </td>
          </tr>

          <!-- Payment button -->
          <tr>
            <td style="padding:20px 24px;">
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td align="center">
                    <a href="{{ route('payment.show', $order->slug) }}" style="display:inline-block;padding:12px 22px;text-decoration:none;border-radius:6px;background:#198754;color:#ffffff;font-weight:600;">
                      Pay Now
                    </a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Footer / note -->
          <tr>
            <td style="padding:0 24px 20px 24px;color:#6c757d;font-size:13px;">
              <p style="margin:0;">
                If you didn't make this order or think this is a mistake, please contact our support.
              </p>
            </td>
          </tr>

          <!-- Small footer -->
          <tr>
            <td style="background:#f8fafb;padding:12px 24px;font-size:12px;color:#9aa3ac;text-align:center;">
              © {{ now()->year }} YourCompany • <a href="#" style="color:#9aa3ac;text-decoration:underline;">Support</a>
            </td>
          </tr>
        </table>
        <!-- End container -->
      </td>
    </tr>
  </table>
</body>
</html>
