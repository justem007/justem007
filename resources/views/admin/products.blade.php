<h1>Product de exemplo</h1>

<ul>
    @foreach($products as $prod)
        <li>{{ $prod->name }}</li>
        <li>{{ $prod->description }}</li>
        <li>{{ $prod->price }}</li>
        <br />
    @endforeach
</ul>
