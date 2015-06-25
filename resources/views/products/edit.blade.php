@extends('app')

@section('content')
    <div class="container">

        <h1>Edit Category : {{ $product->name }}</h1>

            @if ($errors->any())
                <ul class="alert">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(['route'=>['products.update', $product->id, 'method'=>'post']]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name :') !!}
            {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price :') !!}
            {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('featured', 'Featured :') !!}
            {!! Form::text('featured', $product->featured) !!}
        </div>

        <div class="form-group">
            {!! Form::label('recommend', 'Recommended :') !!}
            {!! Form::text('recommend', $product->recommend) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description :') !!}
            {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Atualizar Product',['class'=>'btn btn-primary']) !!}
        </div>

            {!! Form::close() !!}

    </div>

@endsection