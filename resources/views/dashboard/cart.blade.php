<x-adminheader />
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product List</h4>
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        <h5>{{ $product->name }}</h5>
                                        <p>{{ $product->description }}</p>
                                        <p>Price: ${{ $product->price }}</p>
                                        <form action="{{ URL::to('addtocart') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-adminfooter />
</div>
