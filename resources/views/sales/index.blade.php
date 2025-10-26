@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sales List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Total</th>
                    <th>Items</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->total }}</td>
                        <td>
                            <ul>
                                @foreach($sale->items as $item)
                                    <li>{{ $item->product->name ?? 'N/A' }} (x{{ $item->quantity }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('sales.show', $sale) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('sales.edit', $sale) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('sales.destroy', $sale) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No sales found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('sales.create') }}" class="btn btn-primary">Create New Sale</a>
    </div>
@endsection