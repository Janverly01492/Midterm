<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <main class="container">
        <h2>Add Product</h2>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <label>Name:</label>
            <input type="text" name="name"><br><br>
            <label>Price:</label>
            <input type="number" name="price" step="0.01"><br><br>
            <label>Stock:</label>
            <input type="number" name="stock"><br><br>
            <button type="submit">Add Product</button>
        </form>
    </main>
</body>

</html>