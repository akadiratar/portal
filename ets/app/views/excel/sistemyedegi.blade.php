<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Blok</th>
			<th>Kat</th>
			<th>Oda No</th>
			<th>Birim</th>
			<th>Tür</th>
			<th>Marka</th>
			<th>Model</th>
			<th>Seri No</th>
		</tr>
	</thead>
	<?php $i = 1; ?>
	@foreach ($urunler as $urun)
		<tr>
			<td>{{ $i }}</td>
			<td>{{ $urun->oda->blok }}</td>
			<td>{{ $urun->oda->kat }}</td>
			<td>{{ $urun->oda->oda_no }}</td>
			<td>{{ $urun->oda->birim->birim_adi }} {{ $urun->oda->aciklama }}</td>
			<td>{{ $urun->urun->model->tur->tur_adi }}</td>
			<td>{{ $urun->urun->model->marka->marka_adi }}</td>
			<td>{{ $urun->urun->model->model_adi }}</td>
			<td>{{ $urun->urun->seri_no }}</td>
		</tr>
		<?php $i = $i + 1; ?>
	@endforeach
</table>
</body>
</html>