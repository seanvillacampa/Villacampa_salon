<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Payments</title>
  </head>
  <body>

<div class="container-xl">
<div class="shadow-lg p-3 mb-5 bg-body rounded mt-5">
<div class="card">
  <div class="card-header">
    
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('services') ? 'active' : '' }}" href="/services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('bookings') ? 'active' : '' }}" href="/bookings">Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('payments') ? 'active' : '' }}" href="/payments">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('paymenthistory') ? 'active' : '' }}" href="/paymenthistory">Payment History</a>
                    </li>
                </ul>
            </div>

  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
    
    <h3 class="d-flex justify-content-center">Payments</h3>


<hr>

 <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $b => $booking)
                        <tr>
                            <td>{{ $b + 1 }}</td>
                            <td>{{ $booking->customer_name }}</td>
                            <td>{{ $booking->service->service_name  }}</td>
                            <td>{{ $booking->date_schedule }}</td>
                            <td>{{ $booking->time_schedule }}</td>
                            <td>₱{{ $booking->service->price }}</td>
                            <td>
                                <span class="badge bg-warning text-dark">Unpaid</span>
                            </td>
                            <td>
                                <form action="{{ route('payments.markAsPaid', $booking->id) }}"
                                      method="POST"
                                  >
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Mark as Paid
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

</div>
</div>

  </body>
</html>