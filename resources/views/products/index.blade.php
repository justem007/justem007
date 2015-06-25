@extends('app')

@section('content')
    <div class="container">

        <h1>Products</h1>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>FEATURES</th>
                <th>RECOMMEND</th>
                <th>ACTION</th>
            </tr>
            <tr>
                @foreach($products as $product)
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->featured }}</td>
                <td>{{ $product->recommend }}</td>
                <td>
                    <a href="{{ route('products.destroy',['id'=>$product->id]) }}"> Destroy |</a>
                    <a href="{{ route('products.create') }}"> Create |</a>
                    <a href="{{ route('products.edit',['id'=>$product->id]) }}"> Edit</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection