<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Service</title>
  </head>
  <body>

<div class="container-xl">
<div class="shadow-lg p-3 mb-5 bg-body rounded mt-5">
<div class="card">



  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
    
    <h3 class="d-flex justify-content-center">Edit Service</h3>
    <form action="/services/{{ $serv->id }}" method="POST">

    @csrf
    @method('PUT')

    <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Service Name: </span>
  <input value="{{ $serv->service_name }}" name="s_service_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
    
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Price: </span>
  <input value="{{ $serv->price }}" name="s_price" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Duration: </span>
  <input value="{{ $serv->duration }}" name="s_duration" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Description: </span>
  <input value="{{ $serv->description }}" name="s_description" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<button type="submit" class="btn btn-primary">Edit Service</button>
<a href="/services" class="btn btn-secondary">Cancel</a>
</form>

    </blockquote>
  </div>
</div>


</div>


  </body>
</html>