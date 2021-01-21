@extends('layouts/auth')

@section('notifications')
    @if(isset($notifications) && count($notifications))
        <div class="alert alert-warning alert-dismissible fade show animate__animated animate__flash" role="alert">
            <b>Warning!</b>

            @php
                $productList = [];

                foreach($notifications as $productNotifications) {
                    foreach($productNotifications as $notification) {
                        if($notification->type == 'App\Notifications\ShelfLifeEnds') {
                            $productList[] = $notification->data['description'];
                        }
                    }
                }
            @endphp

            @if(count($productList) > 3)
                The shelf life of <b>{{$shelfLifeEnds}}</b> products ends.
            @else
                The shelf life of the products {{implode(', ', $productList)}} ends.
            @endif

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endsection


@section('store')

@if(isset($product))
<form action="/product/{{$product->id}}" method="POST" class="animate__animated animate__fadeIn animate__slow">
@method('PUT')
@csrf
    <h4>Edit a product</h4>
@else
<form action="/product" method="POST" class="animate__animated animate__fadeIn animate__slow">
@csrf
    <h4>Add a product</h4>
@endif

    <div class="row">
        <div class="col-md">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                <input type="text" class="form-control" name="description" required value="{{isset($product->description) ? $product->description : ''}}">
            </div>
        </div>

        <div class="col-md">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Shelf life</span>
                <input type="date" class="form-control" name="shelf_life" required value="{{isset($product->shelf_life) ? $product->shelf_life->format('Y-m-d') : ''}}">
            </div>
        </div>

        <div class="col-md">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
                <input type="number" class="form-control" name="quantity" required value="{{isset($product->quantity) ? $product->quantity : ''}}">
            </div>
        </div>

        <div class="col-md">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>

</form>

@endsection


@section('index')

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>@sortablelink('description', 'Description')</th>
            <th>@sortablelink('shelf_life', 'Shelf life')</th>
            <th>@sortablelink('quantity', 'Quantity')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if ($products->count() == 0)
            <tr>
                <td colspan="5" class="text-center">No products to display.</td>
            </tr>
        @endif

        @foreach($products as $product)
            @php
            $shelfLifeEnds = $product->shelf_life < new DateTime()
            @endphp

            <tr class="{{$shelfLifeEnds ? 'table-danger' : ''}}">
                <td width="50px">{{$product->id}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->shelf_life->format('d/m/Y')}}</td>
                <td>{{$product->quantity}}</td>
                <td width="80px">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="/product/edit/{{$product->id}}" class="btn btn-primary btn-sm">Editar</a>

                        <form action="/product/{{$product->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="row">
    <div class="col-sm col-md-8">
        {{$products->links()}}
    </div>

    <div class="col-sm col-md-4">
        <p align="right" class="text-muted">{{$products->total()}} items found</p>
    </div>
</div>

@endsection
