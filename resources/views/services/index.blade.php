<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Services</title>
  </head>
  <body>

<div class="container-xl">
<div class="shadow-lg p-3 mb-5 bg-body rounded mt-5">
<div class="card">
  <div class="card-header">
    
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/services">Services</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/bookings">Bookings</a>
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
    
    <h3 class="d-flex justify-content-center">Add a Service</h3>

    <form action="/services_form" method="POST">

    @csrf
    
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Service Name</span>
  <input name="s_service_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Price (₱)</span>
  <input name="s_price" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Duration (in minutes)</span>
  <input name="s_duration" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
  <input name="s_description" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<button type="submit" class="btn btn-primary">Save Service</button>
</form>
    </blockquote>
  </div>
</div>

<hr>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Service Name</th>
      <th scope="col">Price</th>
      <th scope="col">Duration</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($servs as $s)
    <tr>
    <td>{{ $s->id }}</td>
    <td>{{ $s->service_name }}</td>
    <td>₱ {{ $s->price }}</td>
    <td>{{ $s->duration }} minutes</td>
    <td>{{ $s->description }}</td>
    <td>
    <a href="/services/{{ $s->id}}/edit" class="btn btn-success">Edit</a>
    <form action="/services/{{ $s->id }}" method="POST">
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