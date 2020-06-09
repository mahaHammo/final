@section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Final Exam 2020</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Products - ERP System</a>
      </div>
    </nav>

    <main class="container p-4">
    <div class="row">
        <div class="col-md-4">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                 @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
                 @endforeach
              </ul>
            </div>
             @endif
        <!-- MESSAGES -->

        
        <!-- ADD Product FORM -->
        <div class="card card-body">
            <form action="{{route('store')}}" method="POST">
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Product Title" autofocus>
            </div>
            <div class="form-group">
                <textarea name="description" rows="2" class="form-control" placeholder="Product Description"></textarea>
            </div>
            <div class="form-group">
                <input type="number" name="price" class="form-control" placeholder="Product Price" min="0">
            </div>
            <input type="submit" name="save_product" class="btn btn-success btn-block" value="Save Product">
            </form>
        </div>
        </div>
        <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
           
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                        <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->descriptoion}}</td>
                <td>$ {{$product->price}}</td>
                <td>{{$product->time}}</td>
                <td>
                    <!-- Product Delete Button -->
                    <td>
                        <form action="delete/{{product->name}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                    <!-- Product update Button -->
                    <td>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                             @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                             @endforeach
                          </ul>
                        </div>
                         @endif
                        <form action="edit/{{product->name}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Edit
                            </button>
                        </form>
                    </td>
                </tr>
        @endforeach
                <a href="#" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="#" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                </a>
                </td>
            </tr>
                    </tbody>
        </table>
        </div>
    </div>
    <div class="container">
        @yield('content') 
  </div>
  
    </main>

    <!-- BOOTSTRAP 4 SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   </body>
</html>
@endsection
