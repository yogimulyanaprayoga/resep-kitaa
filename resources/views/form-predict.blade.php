<!DOCTYPE html>
<html>

<head>
  <title>Prediksi Makanan Tradisional</title>
</head>

<body>
  <h1>Upload Gambar Makanan Tradisional</h1>

  <form action="{{ route('predict') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="image">Pilih Gambar:</label>
    <input type="file" name="image" accept="image/*" required>
    <button type="submit">Prediksi</button>
  </form>
</body>

</html>
