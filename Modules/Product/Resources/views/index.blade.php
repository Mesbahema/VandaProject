@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary btn-block" href="{{ url("product/create") }}">Add New Product</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Cost</th>
            <th scope="col"></th>
            <th scope="col">Actions</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->title}}</td>
            <td>{{$product->cost}}</td>
            <td><a class="btn btn-primary" href="{{ url("product/$product->id") }}">View</a></td>
            <td><a class="btn btn-warning" href="{{ url("product/edit/$product->id") }}">Edit</a></td>
            <td>
                <form method="POST" action="{{ url("/product/$product->id") }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
{{--        <tr>--}}
{{--            <th scope="row">2</th>--}}
{{--            <td>Jacob</td>--}}
{{--            <td>Thornton</td>--}}
{{--            <td>@fat</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th scope="row">3</th>--}}
{{--            <td>Larry</td>--}}
{{--            <td>the Bird</td>--}}
{{--            <td>@twitter</td>--}}
{{--        </tr>--}}
        </tbody>

    </table>
        {{ $products->links() }}
    </div>
@endsection
