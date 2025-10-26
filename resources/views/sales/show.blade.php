<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Receipt</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <main class="container">
        <h2>Sale Receipt #{{ $sale->id }}</h2>
        <table>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
            @foreach($sale->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>₱{{ $item->subtotal }}</td>
                </tr>
            @endforeach
        </table>
        <h3>Total: ₱{{ $sale->total }}</h3>
        <a href="{{ route('sales.edit', $sale) }}">Edit Sale</a>
        <form action="{{ route('sales.destroy', $sale) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Sale</button>
        </form>
    </main>
</body>

</html>