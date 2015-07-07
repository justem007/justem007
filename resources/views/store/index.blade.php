@extends('store.store')

@section('sidebar')
    <div class="col-sm-3">
        <div class="left-sidebar">
    @include('store.partial.categories')
    @include('store.partial.tags')

        </div>
    </div>
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>

            {{--products aqui--}}
            @include('store.partial.product', ['products'=>$pFeatured])

        </div><!--features_items-->

        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

            {{--products recommend aqui--}}
            @include('store.partial.product', ['products'=>$pRecommend])

        </div><!--recommended-->

    </div>
@endsection