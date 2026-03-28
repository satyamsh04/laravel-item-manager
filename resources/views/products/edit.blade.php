<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Edit Product</title></head>
<body>
<h1>Edit Product #{{ $product->id }}</h1>

<form method="POST" action="{{ route('products.update', $product) }}">
  @csrf @method('PUT')

  <p>
    Name:
    <input name="name" value="{{ old('name', $product->name) }}">
    @error('name') <small style="color:red">{{ $message }}</small> @enderror
  </p>

  <p>
    Price:
    <input name="price" type="number" step="0.01" value="{{ old('price', $product->price) }}">
    @error('price') <small style="color:red">{{ $message }}</small> @enderror
  </p>

  <p>
    Manufacturer:
    <select name="manufacturer_id">
      @foreach($manufacturers as $id => $name)
        <option value="{{ $id }}" @selected(old('manufacturer_id', $product->manufacturer_id) == $id)>
          {{ $name }}
        </option>
      @endforeach
    </select>
    @error('manufacturer_id') <small style="color:red">{{ $message }}</small> @enderror
  </p>

  <button type="submit">Update</button>
  <a href="{{ route('products.show', $product) }}">Back</a>
</form>
</body>
</html>
