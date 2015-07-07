@extends('store.store')

@section('sidebar')
    <div class="col-sm-3">
        <div class="left-sidebar">
            @include('store.partial.categories')
            {{--@include('store.partial.tags')--}}

        </div>
    </div>
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">{{ $category->name }}</h2>

            {{--products aqui--}}
            @include('store.partial.product', ['products'=>$products])

        </div>
        <!--features_items-->

    </div>
@endsection