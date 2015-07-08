@extends('store.store')

@section('sidebar')
    <div class="col-sm-3">
        <div class="left-sidebar">
            @include('store.partial.categories')
        </div>
    </div>
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Você esta na Categoria {{ $category->name }}</h2>

            {{--products aqui--}}
            @if(count($products))
                @include('store.partial.product',['products' => $products])
            @else
                <div class="col-sm-12">
                    <p>Não há produtos com essa Categoria</p>
                </div>
            @endif

        </div>
        <!--features_items-->

    </div>
@endsection