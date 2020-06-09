@extends('index')
@section('content')
<div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            Update_task
        </div>

        <div class="panel-body">
            <!-- New Product Form -->
            <form action="{{url('update/'.$product_edit->name)}}" method="POST" class="form-horizontal">        
                @csrf
                <!-- Product Name -->
                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">Product</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="Product-name" class="form-control" value={{$Product_edit->name}}>
                    </div>
                </div>

                <!-- Update Product Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-li fa fa-check-square"></i> Update Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Current Product -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Product
            </div>

            <div class="panel-body">
                <table class="table table-striped product-table">
                    <thead>
                        <th>Product</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)

                            <tr>
                               <td class="table-text">
                                   <div>{{$product->name}}</div>
                               </td>

                               <!-- product Delete Button --> 
                               <td>
                               <form action="{{url('delete/'.$product->name)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                       <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                       </button>
                                 </form>

                               </td>
                               
                               <!-- Product Update Button -->
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
                                <form action="{{url('edit/'.$product->name)}}" method="POST">
                                         @csrf
                                        <button type="submit" class="btn btn-success">
                                             <i class="fa-li fa fa-check-square"></i>Edit
                                        </button>
                                  </form>
                                  
                                </td>
                            </tr>
                      
                        @endforeach
                            
                    </tbody>
                </table>
            </div>
        </div>
</div>
    
@endsection