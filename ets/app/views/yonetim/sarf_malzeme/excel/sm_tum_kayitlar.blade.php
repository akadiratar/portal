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
			<th>Gelen SM</th>
            <th>Giden SM</th>
            <th>Birimi</th>
            <th>Yazıcı Seri No</th>
            <th>Sayfa Sayısı</th>
            <th>Tarih</th>
		</tr>
	</thead>
	<?php $i = 1; ?>
	@foreach ($kayitlar as $sm_kayit)
		<tr>
			<td>{{ $i }}</td>
			<td>{{$sm_kayit->smgelen->sm_urun_serino}}</td>
            <td>{{$sm_kayit->smgiden->sm_urun_serino}}</td>
            <td>
              @if($sm_kayit->sm_birim_id == 0)
              BİRİM SİLİNMİŞ
              @else
              {{$sm_kayit->smtakipbirim->birim_adi}}
              @endif
            </td>
            <td>{{$sm_kayit->sm_bagli_serino}}</td>
            <td>{{$sm_kayit->sm_bagli_sayfasayisi}}</td>
            <td>{{date("d.m.Y H:i:s", strtotime($sm_kayit->created_at))}}</td>
		</tr>
		<?php $i = $i + 1; ?>
	@endforeach
</table>
</body>
</html>