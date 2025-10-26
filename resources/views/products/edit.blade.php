<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <main class="container">
        <h2>Edit Product</h2>
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <label>Name:</label>
            <input type="text" name="name" value="{{ $product->name }}"><br><br>
            <label>Price:</label>
            <input type="number" name="price" step="0.01" value="{{ $product->price }}"><br><br>
            <label>Stock:</label>
            <input type="number" name="stock" value="{{ $product->stock }}"><br><br>
            <button type="submit">Update Product</button>
        </form>
    </main>
</body>

</html>