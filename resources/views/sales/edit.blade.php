<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sale</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <main class="container">
        <h2>Edit Sale #{{ $sale->id }}</h2>
        <form action="{{ route('sales.update', $sale) }}" method="POST">
            @csrf
            @method('PUT')
            <label>Total:</label>
            <input type="number" name="total" step="0.01" value="{{ $sale->total }}"><br><br>
            <button type="submit">Update Sale</button>
        </form>
    </main>
</body>

</html>