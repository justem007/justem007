@extends('app')

@section('content')
    <div class="container">

        <h1>Images of {{ $products->name }}</h1>

        <a href="#" class="btn btn-default btn-primary"> New Image </a>
            <br /> <br />
        <table class="table">
            <tr>
                <th>ID</th>
                <th>IMAGES</th>
                <th>EXTENSION</th>
                <th>ACTION</th>
            </tr>
            <tr>
                @foreach($products->images as $image)

                <td>{{ $image->id }}</td>
                <td><img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" width="80"></td>
                <td>{{ $image->extension }}</td>
                <td></td>
            </tr>
            @endforeach
        </table>
        {{--{!! $products->images->render() !!}--}}
    </div>

@endsection