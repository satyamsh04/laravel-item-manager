<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Create Product</title></head>
<body>
<h1>Create Product</h1>

<form method="POST" action="{{ route('products.store') }}">
  @csrf
  <p>
    Name:
    <input name="name" value="{{ old('name') }}">
    @error('name') <small style="color:red">{{ $message }}</small> @enderror
  </p>

  <p>
    Price:
    <input name="price" type="number" step="0.01" value="{{ old('price') }}">
    @error('price') <small style="color:red">{{ $message }}</small> @enderror
  </p>

  <p>
    Manufacturer:
    <select name="manufacturer_id">
      <option value="">-- choose --</option>
      @foreach($manufacturers as $id => $name)
        <option value="{{ $id }}" @selected(old('manufacturer_id') == $id)>{{ $name }}</option>
      @endforeach
    </select>
    @error('manufacturer_id') <small style="color:red">{{ $message }}</small> @enderror
  </p>

  <button type="submit">Save</button>
  <a href="{{ route('products.index') }}">Cancel</a>
</form>
</body>
</html>
