<!-- resources/views/items/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
</head>

<body>
    <h1>Perpustakaan</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th> <!-- Menambahkan kolom Deskripsi -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->description }}</td> <!-- Menampilkan Deskripsi -->
                    <td>
                        <a href="{{ route('items.edit', ['item' => $item->id]) }}">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('items.create') }}">Create New Item</a>
</body>

</html>

<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        background-color: #f4f4f9;
        color: #333;
        margin: 0;
        padding: 20px;
    }

    h1 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 20px;
    }

    p {
        background-color: #dff0d8;
        color: #3c763d;
        padding: 10px;
        border: 1px solid #d6e9c6;
        border-radius: 5px;
        max-width: 600px;
        margin: 10px auto;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        background-color: #ffffff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    thead {
        background-color: #2c3e50;
        color: #ffffff;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        text-transform: uppercase;
        font-size: 14px;
    }

    td:hover {
        background-color: #f1f1f1;
    }

    a {
        color: #3498db;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    button {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        cursor: pointer;
    }

    button:hover {
        background-color: #c0392b;
    }

    form {
        display: inline;
    }

    /* Link for creating new items */
    a[href*="create"] {
        display: block;
        width: 150px;
        margin: 20px auto;
        text-align: center;
        background-color: #2ecc71;
        color: white;
        padding: 10px;
        border-radius: 5px;
        text-transform: uppercase;
    }

    a[href*="create"]:hover {
        background-color: #27ae60;
    }