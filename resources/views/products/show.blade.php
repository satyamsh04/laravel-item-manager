<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Product</title></head>
<body>
<h1>{{ $product->name }}</h1>

@if (session('ok')) <p style="color:green">{{ session('ok') }}</p> @endif

<p>Price: {{ number_format($product->price, 2) }}</p>
<p>Manufacturer: {{ $product->manufacturer?->name }}</p>

<p>
  <a href="{{ route('products.edit', $product) }}">Edit</a> |
  <a href="{{ route('products.index') }}">All products</a>
</p>
</body>
</html>
