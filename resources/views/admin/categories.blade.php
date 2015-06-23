<h1>Categorias de exemplo</h1>

<ul>
    @foreach($categories as $category)

    <li>{{ $category->name }}</li>
    <li>{{ $category->description }}</li>
        <br />
    @endforeach
</ul>