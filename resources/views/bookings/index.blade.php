<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Booking</title>
  </head>
  <body>

<div class="container-xl">
<div class="shadow-lg p-3 mb-5 bg-body rounded mt-5">
<div class="card">
  <div class="card-header">
    
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link"  href="/services">Services</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/bookings">Bookings</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/payments">Payments</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="/paymenthistory">Payment History</a>
  </li>
</ul>

  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
    
    <h3 class="d-flex justify-content-center">Schedule a Booking</h3>
    <form action="/bookings_form" method="POST">

    @csrf

    <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Customer Name: </span>
  <input name="b_customer_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
    
<div class="input-group mb-3">
<select name="service_id" class="btn btn-outline-secondary dropdown-toggle" >
    <option class="dropdown-menu" value="">Service Name</option>
    @foreach ($servs as $s)
        <option value="{{ $s->id }}">{{ $s->service_name }}</option>
    @endforeach
</select>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Schedule Date: </span>
  <input name="b_date_schedule" type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Schedule Time: </span>
  <input name="b_time_schedule" type="time" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<button type="submit" class="btn btn-primary">Save Booking</button>
</form>

    </blockquote>
  </div>
</div>

<hr>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Service Name</th>
      <th scope="col">Scheduled Date</th>
      <th scope="col">Scheduled Time</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($books as $b)
    <tr>
    <td>{{ $b->id }}</td>
    <td>{{ $b->customer_name }}</td>
    <td>{{ $b->service->service_name }}</td>
    <td>{{ $b->date_schedule }}</td>
    <td>{{ $b->time_schedule }}</td>
    <td>₱ {{ $b->service->price }}</td>
    <td>
    <a href="/bookings/{{ $b->id}}/edit" class="btn btn-success">Edit</a>
    <form action="/bookings/{{ $b->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>

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