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
			<th>Seri No</th>
			<th>Tür</th>
			<th>Alttür</th>
			<th>Durumu</th>
			<th>Kayıtlı Yer</th>
		</tr>
	</thead>
	<?php $i = 1; ?>
	@foreach ($urunler as $sm_urun)
		<tr>
			<td>{{ $i }}</td>
			<td>{{ $sm_urun->sm_urun_serino }}</td>
			<td>{{ $sm_urun->smalttur->smtur->sm_tur_adi }}</td>
			<td>{{ $sm_urun->smalttur->sm_alttur_adi }}</td>
			<td><?php if($sm_urun->sm_urun_durumu == 0) {echo "ÇALIŞIYOR";} else { echo "ARIZALI";} ?></td></td>
			<td>
				@if($sm_urun->sm_birim_id == 0)
                DEPODA
                @elseif($sm_urun->sm_birim_id == 1)
                BİRİMİ SİLİNMİŞ
                @else
                {{$sm_urun->urunbirim->birim_adi}}
                @endif
			</td>
		</tr>
		<?php $i = $i + 1; ?>
	@endforeach
</table>
</body>
</html>