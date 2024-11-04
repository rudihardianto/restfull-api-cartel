<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            -webkit-line-clamp: 3;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container py-8 mx-auto">
        <h1 class="mb-4 text-3xl font-bold">Products</h1>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($products as $product)
                <div class="overflow-hidden bg-white rounded-lg shadow-md">
                    <div class="p-4">
                        <h2 class="mb-2 text-lg font-medium">{{ $product->name }}</h2>
                        <p class="mb-2 text-gray-600 line-clamp-3">{{ $product->description }}</p>
                        <div class="flex items-center justify-between">
                            <span class="font-medium text-green-500">Rp
                                {{ number_format($product->price, 0, '.', '.') }}</span>
                            <span class="text-gray-500">Stock: {{ $product->stock }}</span>
                        </div>
                        <div class="mt-2 text-gray-500">Category: {{ $product->category->name }}</div>
                        <div class="mt-4">
                            <a class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
                                href="{{ route('products.show', $product) }}">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
