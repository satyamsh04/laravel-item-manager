<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Products</title></head>
<body>
<h1>Products</h1>

@if (session('ok')) <p style="color:green">{{ session('ok') }}</p> @endif

<p><a href="{{ route('products.create') }}">+ New Product</a></p>

<table border="1" cellpadding="6" cellspacing="0">
  <tr>
    <th>ID</th><th>Name</th><th>Price</th><th>Manufacturer</th><th>Actions</th>
  </tr>
  @foreach ($products as $p)
    <tr>
      <td>{{ $p->id }}</td>
      <td><a href="{{ route('products.show', $p) }}">{{ $p->name }}</a></td>
      <td>{{ number_format($p->price, 2) }}</td>
      <td>{{ $p->manufacturer?->name }}</td>
      <td>
        <a href="{{ route('products.edit', $p) }}">Edit</a>
        <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline">
          @csrf @method('DELETE')
          <button type="submit" onclick="return confirm('Delete this product?')">Delete</button>
        </form>
      </td>
    </tr>
  @endforeach
</table>

<div style="margin-top:10px">
  {{ $products->links() }}
</div>
</body>
</html>
