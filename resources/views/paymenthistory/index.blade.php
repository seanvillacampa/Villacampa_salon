<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Payments History</title>
  </head>
  <body>

<div class="container-xl">
<div class="shadow-lg p-3 mb-5 bg-body rounded mt-5">
<div class="card">
  <div class="card-header">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="/services">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/bookings">Bookings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/payments">Payments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/paymenthistory">Payment History</a>
      </li>
    </ul>
  </div>

  <div class="card-body">
    <h3 class="d-flex justify-content-center">Payment History</h3>
    <hr>

    {{-- TEMPORARY DEBUG: remove this after confirming data shows --}}
    <p class="text-muted">Records found: {{ $payments->count() }}</p>

    @if($payments->isEmpty())
      <div class="alert alert-info text-center">No paid bookings yet.</div>
    @else
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Service</th>
            <th>Date Scheduled</th>
            <th>Time Scheduled</th>
            <th>Amount Paid</th>
            <th>Status</th>
            <th>Paid On</th>
          </tr>
        </thead>
        <tbody>
          @foreach($payments as $p => $payment)
            <tr>
              <td>{{ $p + 1 }}</td>
              <td>{{ $payment->customer_name }}</td>
              <td>{{ $payment->service->service_name ?? '—' }}</td>
              <td>{{ $payment->date_schedule }}</td>
              <td>{{ $payment->time_schedule }}</td>
              <td>₱{{ number_format($payment->total_amount, 2) }}</td>
              <td><span class="badge bg-success">Paid</span></td>
              <td>{{ $payment->created_at->format('M d, Y h:i A') }}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot class="table-light fw-bold">
          <tr>
            <td colspan="5" class="text-end">Total Collected:</td>
            <td>₱{{ number_format($payments->sum('total_amount'), 2) }}</td>
            <td colspan="2"></td>
          </tr>
        </tfoot>
      </table>
    @endif

  </div>
</div>
</div>

  </body>
</html>