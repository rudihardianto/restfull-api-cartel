@foreach ($products as $product)
    <ul>
        <li>{{ $product->category_id }}</li>
        <li>{{ $product->name }}</li>
        <li>{{ $product->description }}</li>
        <li>{{ $product->price }}</li>
        <li>{{ $product->stock }}</li>
    </ul>
@endforeach
