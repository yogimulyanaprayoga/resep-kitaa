<!DOCTYPE html>
<html>

<head>
  <title>Hasil Prediksi</title>
</head>

<body>
  <h1>Hasil Prediksi Makanan Tradisional</h1>

  <p><strong>Label:</strong> {{ $prediction }}</p>
  <p><strong>Tingkat Keyakinan:</strong> {{ number_format($confidence * 100, 2) }}%</p>
  <p><strong>Resep:</strong><br>{!! nl2br(e($recipe)) !!}</p>
</body>

</html>
