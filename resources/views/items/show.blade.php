<!-- resources/views/items/show.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Detail</title>
</head>

<body>
    <h1>Item Detail</h1>

    <p><strong>Name:</strong> {{ $item->name }}</p>
    <p><strong>Price:</strong> {{ $item->price }}</p>
    <p><strong>Description:</strong> {{ $item->description }}</p> <!-- Menampilkan Deskripsi -->

    <a href="{{ route('items.index') }}">Back to Items List</a> | <!-- Tombol kembali ke daftar item -->
    <a href="{{ route('items.edit', $item->id) }}">Edit Item</a> <!-- Tombol untuk edit item -->
</body>

</html>