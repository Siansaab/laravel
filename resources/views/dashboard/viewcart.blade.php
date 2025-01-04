<x-adminheader />
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Shopping Cart</h4>
                        @if(count($cartItems) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Update</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>${{ $item->price }}</td>
                                        <td>
                                            <form action="{{ URL::to('updatecart') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="number" name="quantity" class="form-control" value="{{ $item->quantity }}" min="1">
                                        </td>
                                        <td>${{ $item->price * $item->quantity }}</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('deletecart/'.$item->id) }}" class="btn btn-danger">Remove</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-right">Total:</th>
                                        <th>${{ $totalPrice }}</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="text-right mt-4">
                            <a href="{{ URL::to('checkout') }}" class="btn btn-success">Proceed to Checkout</a>
                            <a href="{{ URL::to('cart') }}" class="btn btn-primary">Continue Shopping</a>
                        </div>
                        @else
                        <p class="text-center">Your cart is empty. <a href="{{ URL::to('cart') }}">Continue Shopping</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-adminfooter />
</div>
