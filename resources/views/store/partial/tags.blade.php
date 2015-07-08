@if(count($tags))
    <h2>Tags</h2>
    <div class="panel-group category-products" id="">
        @foreach($tags as $tag)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{ route('store.tags', $tag->id) }}">{{ $tag->name }}</a>
                    </h4>
                </div>
            </div>
        @endforeach
    </div>
@endif