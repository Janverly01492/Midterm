<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Sale</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <main class="container">
        <h2>New Sale</h2>
        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <form method="POST" action="{{ route('sales.store') }}">
            @csrf
            <label>Product:</label>
            <select name="product_id">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} - ₱{{ $product->price }} (Stock:
                        {{ $product->stock }})
                    </option>
                @endforeach
            </select><br><br>
            <label>Quantity:</label>
            <input type="number" name="quantity" min="1" value="1"><br><br>
            <button type="submit">Complete Sale</button>
        </form>
    </main>
</body>

</html>