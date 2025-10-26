<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <main class="container">
        <h2>Products</h2>
        <a href="{{ route('products.create') }}">+ Add Product</a>
        <ul style="list-style: none; padding: 0;">
            @foreach($products as $product)
                <li
                    style="display: flex; align-items: center; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #eee;">
                    <span>
                        {{ $product->name }} (₱{{ $product->price }}) Stock: {{ $product->stock }}
                    </span>
                    <span>
                        <a href="{{ route('products.edit', $product) }}" style="margin-right: 0.5rem;">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    </main>
</body>

</html>