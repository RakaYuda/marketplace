<!doctype html>
<html>

<head>
   <meta charset="utf-8">
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>User | Dashboard</title>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="container py-5" style="min-height: 100vh">

   <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">Marketplace</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
               <li class="nav-item d-flex">
                  <a class="nav-link active" aria-current="page" href="#">User</a>
                  <a href="<?php echo base_url(); ?>user/login/logout" class="btn btn-outline-success">Logout</a>
               </li>
            </ul>
            <!-- <form class="d-flex">
               <a class="nav-link active" aria-current="page" href="#">My Marketplace</a>
               <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
         </div>
      </div>
   </nav>

   <div class="card w-full">
      <div class="card-header">
         List of Items
      </div>
      <ul class="list-group list-group-flush">
         <li class="list-group-item d-flex align-items-center justify-content-between">
            <p class="m-0" aria-current="page" href="#">User</p>
            <button class="btn btn-outline-success" type="submit">Add to Cart</button>
         </li>
         <li class="list-group-item">An item</li>
         <li class="list-group-item">A second item</li>
         <li class="list-group-item">A third item</li>
      </ul>
   </div>



   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   <script type="text/javascript">


   </script>


</body>

</html>
