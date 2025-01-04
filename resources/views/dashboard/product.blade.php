<x-adminheader />
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
           
        
       
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Product
</button> 

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="{{ URL::to('addnewproduct') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name">Product Name</label>
    <input type="text" name="name" class="form-control mb-2" id="name" placeholder="Enter product name" required>

    <label for="description">Description</label>
    <textarea name="description" class="form-control mb-2" id="description" placeholder="Enter product description"></textarea>

    <label for="price">Price</label>
    <input type="number" name="price" class="form-control mb-2" id="price" step="0.01" placeholder="Enter product price" required>

    <label for="stock">Stock</label>
    <input type="number" name="stock" class="form-control mb-2" id="stock" placeholder="Enter available stock" required>

    <label for="sku">SKU</label>
    <input type="text" name="sku" class="form-control mb-2" id="sku" placeholder="Enter unique SKU" required>

    <label for="category_id">Category</label>
    <select name="category_id" class="form-control mb-2" id="category_id" required>
        <option value="">Select a category</option>
        <option value="1">Category 1</option>
        <option value="2">Category 2</option>
        <option value="3">Category 3</option>
        <!-- Add more categories as needed -->
    </select>

    <label for="is_active">Is Active</label>
    <select name="is_active" class="form-control mb-2" id="is_active">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>

    <button type="submit" name='submit' class="btn btn-primary mt-3">Submit</button>
</form>

      </div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>

                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Product name</th>
                          <th>Price</th>
                          <th>Stock</th>
                          <th>Status</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>  
                      </thead>
                      <tbody>
                        @php
                        $i=0;
                        @endphp
                        @foreach($products as $item)
                        @php
                        $i++;
                        @endphp
                        <tr>
                          <td>{{ $item->name }}</td>
                          <td class="font-weight-bold">{{ $item->price }}</td>
                          <td>{{ $item->stock }}</td>
                          <td class="font-weight-medium"><div class="badge badge-success">{{ $item->is_active }}</div></td>
                       <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{ $i }}">
  Update
</button> 



<div class="modal" id="updateModal{{ $i }}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Products</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="{{ URL::to('updateproduct') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name">Product Name</label>
    <input type="text" name="name" class="form-control mb-2" value='{{ $item->name }}' id="name" placeholder="Enter product name" required>

    <label for="description">Description</label>
    <textarea name="description" class="form-control mb-2" id="description" placeholder="Enter product description">{{ $item->description }}</textarea>

    <label for="price">Price</label>
    <input type="number" name="price" class="form-control mb-2" id="price"  value='{{ $item->price }}' step="0.01" placeholder="Enter product price" required>

    <label for="stock">Stock</label>
    <input type="number" name="stock" class="form-control mb-2" id="stock" value='{{ $item->stock }}' placeholder="Enter available stock" required>

    <label for="sku">SKU</label>
    <input type="text" name="sku" class="form-control mb-2" id="sku" value='{{ $item->sku }}' placeholder="Enter unique SKU" required>

    <label for="category_id">Category</label>
    <select name="category_id" class="form-control mb-2" id="category_id" required>
    <option value=' '>Select your category</option>
        <option value="1" {{ $item->category_id == 1 ? 'selected' : '' }}>Category 1</option>
        <option value="2" {{ $item->category_id == 2 ? 'selected' : '' }}>Category 2</option>
        <option value="3" {{ $item->category_id == 3 ? 'selected' : '' }}>Category 3</option>
        <!-- Add more categories as needed -->
    </select>

    <label for="is_active">Is Active</label>
<select name="is_active" class="form-control mb-2" id="is_active">
    <option value="1" {{ $item->is_active == 1 ? 'selected' : '' }}>Yes</option>
    <option value="0" {{ $item->is_active == 0 ? 'selected' : '' }}>No</option>
</select>

<input type='hidden' name='id' value='{{ $item->id }}'>
    <button type="submit" name='submit' class="btn btn-primary mt-3">Update</button>
</form>

      </div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>




</td>
                       <td>
                        <a href='{{ URL::to("deleteproduct/".$item->id) }}'>Delete</a>
                       </td>
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
             
          </div>
         
        <x-adminfooter />