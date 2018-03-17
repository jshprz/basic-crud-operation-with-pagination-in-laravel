<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    @include('product/notices')
    <div class="container">
        <h2><center>ALL PRODUCTS</h2>
        <br>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Create Product</button>
        <br>
        <br>
        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($product as $products)
    <tr>
      <th>{{$products->id}}</th>
      <td>{{$products->product_name}}</td>
      <td>{{$products->quantity}}</td>
      <td>{{$products->description}}</td>
      <td>
       <button class="btn btn-warning" data-toggle="modal" data-target="#update-{{$products->id}}">Edit</button>
        <button class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-{{$products->id}}">Delete</button>
        
         <div class="modal fade" id="delete-modal-{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <a href="{{route('deleteProduct',['id'=>$products->id])}}" class="btn btn-primary">YES</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="update-{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5><center>{{('Create Item')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('editProduct')}}" method="POST">
        {{ csrf_field() }}
        <label for="product_name">PRODUCT NAME</label>
        <input class="form-control" type="text" name="product_name" value="{{$products->id}}" required/>

        <label for="quantity">QUANTITY</label>
        <input class="form-control" type="number" name="quantity" value="{{$products->quantity}}" required/>
        
        <label for="description">DESCRIPTION</label>
        <input class="form-control" type="text" name="description" value="{{$products->description}}" required/>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">GO UPDATE</button>
        </form>
      </div>
    </div>
  </div>
</div>



      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<br>
<div>{{$product->links()}}</div>
       </div>

       <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5><center>Create Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('addProduct')}}" method="POST">
        {{ csrf_field() }}
        <label for="product_name">PRODUCT NAME</label>
        <input class="form-control" type="text" name="product_name" required/>

        <label for="quantity">QUANTITY</label>
        <input class="form-control" type="number" name="quantity" required/>
        
        <label for="description">DESCRIPTION</label>
        <input class="form-control" type="text" name="description" required/>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">GO SUBMIT</button>
        </form>
      </div>
    </div>
  </div>
</div>

       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
