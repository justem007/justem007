@extends('app')

@section('content')
    <div class="container">

        <h1>Categories</h1>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>ACTION</th>
            </tr>
            <tr>
                @foreach($categories as $category)
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.destroy',['id'=>$category->id]) }}">Destroy |</a>
                    <a href="{{ route('categories.create') }}"> Create |</a>
                    <a href="{{ route('categories.edit',['id'=>$category->id]) }}"> Edit</a>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $categories->render() !!}

    </div>

@endsection