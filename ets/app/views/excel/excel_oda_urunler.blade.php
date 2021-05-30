<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<table>
	<thead>
		<tr>
			<th>Oda No</th>
			<th>Birim</th>
		</tr>
	</thead>
	<tr>
			<td>{{ $girilenoda->oda_birlikte }}</td>
			<td>{{ $girilenoda->birim->birim_adi }} {{ $girilenoda->aciklama }}</td>
		</tr>
		<tr>
			<td></td>
		</tr>
</table>

<table>
	<thead>
		<tr>
			<th>Tür</th>
			<th>Marka</th>
			<th>Model</th>
			<th>Seri No</th>
		</tr>
	</thead>
	@foreach ($urunler as $urun)
		<tr>
			<td>{{ $urun->urun->model->tur->tur_adi }}</td>
			<td>{{ $urun->urun->model->marka->marka_adi }}</td>
			<td>{{ $urun->urun->model->model_adi }}</td>
			<td>{{ $urun->urun->seri_no }}</td>
		</tr>
	@endforeach
</table>
</body>
</html>