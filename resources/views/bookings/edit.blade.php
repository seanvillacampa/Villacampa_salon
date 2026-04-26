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



  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
    
    <h3 class="d-flex justify-content-center">Edit Booking</h3>
    <form action="/bookings/{{ $book->id }}" method="POST">

    @csrf
    @method('PUT')

    <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Customer Name: </span>
  <input value="{{ $book->customer_name }}" name="b_customer_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
    
<div class="input-group mb-3">
<select name="service_id" class="btn btn-outline-secondary dropdown-toggle" >
    <option class="dropdown-menu" value="">Service Name</option>
    @foreach ($serv as $s)
        <option value="{{ $s->id }}" {{ $book->service_id==$s->id ? 'selected' : ''}}> {{ $s->service_name }}</option>
    @endforeach
</select>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Schedule Date: </span>
  <input value="{{ $book->date_schedule }}" name="b_date_schedule" type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Schedule Time: </span>
  <input value="{{ $book->time_schedule }}" name="b_time_schedule" type="time" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<button type="submit" class="btn btn-primary">Edit Booking</button>
<a href="/bookings" class="btn btn-secondary">Cancel</a>
</form>

    </blockquote>
  </div>
</div>


</div>


  </body>
</html>