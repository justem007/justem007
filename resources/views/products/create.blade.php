@extends('app')

@section('content')
    <div class="container">

        <h1>Products Create</h1>

            @if ($errors->any())
                <ul class="alert">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(['url'=>'admin/products']) !!}

        <div class="form-group">
            {!! Form::label('category', 'Category :') !!}
            {!! Form::select('category_id', $categories, null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name', 'Name :') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price :') !!}
            {!! Form::text('price', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('featured', 'Featured :') !!}
            {!! Form::hidden('featured',0 ); !!}
            {!! Form::checkbox('featured', 1 , null,  ['class'=>'checkbox style-0'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('recommend', 'Recommended :') !!}
            {!! Form::hidden('recommend', 0); !!}
            {!! Form::checkbox('recommend',1 , null,  ['class'=>'checkbox style-0'])!!}
        </div>

        {{--<div class="form-group">--}}
            {{--{!! Form::label('featured', 'Featured :') !!}--}}
            {{--{!! Form::select('featured', array('1' => 'YES', '0' => 'NO'), ['class'=>'select']) !!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--{!! Form::label('recommend', 'Recommended :') !!}--}}
            {{--{!! Form::select('recommend', array('1' => 'YES', '0' => 'NO'), ['class'=>'select']) !!}--}}
        {{--</div>--}}

        <div class="form-group">
            {!! Form::label('description', 'Description :') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Adicionar Produtos',['class'=>'btn btn-primary']) !!}
            <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
        </div>

            {!! Form::close() !!}

    </div>

@endsection