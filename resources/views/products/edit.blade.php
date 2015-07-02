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
            {!! Form::label('category', 'Category :') !!}
            {!! Form::select('category_id', $categories, $product->category->id, ['class'=>'form-control']) !!}
        </div>

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
            {!! Form::hidden('featured',0 ); !!}
            {!! Form::checkbox('featured', 1, ($product->featured == '1') ? 1 : 0) !!}
        </div>

        <div class="form-group">
            {!! Form::label('recommend', 'Recommended :') !!}
            {!! Form::hidden('recommend',0 ); !!}
            {!! Form::checkbox('recommend', 1, ($product->recommend == '1') ? 1 : 0) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description :') !!}
            {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tags', 'Tags já cadastradas para este produto:') !!}
            @foreach($product->tags as $tag)
                <div class="btn btn-sm btn-default">{{ $tag->name }}</div>
            @endforeach
        </div>

        <div class="form-group">
            {!! Form::label('tags','Tags:') !!}
            {!! Form::textarea('tags', $product->tagList, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Atualizar Product', ['class'=>'btn btn-primary']) !!}
        </div>

            {!! Form::close() !!}

    </div>

@endsection