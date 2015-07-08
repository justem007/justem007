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
            <h2 class="title text-center">Produtos com a tag <span class="">{{ $tag->name }}</span></h2>

            @if(count($products))
            @include('store.partial.product', ['products' => $products])
            @else
                <div class="col-sm-12">
                    <p>Não há mais produtos com essa TAG</p>
                </div>
            @endif

        </div>
        <!--features_items-->

    </div>
@endsection