<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<table>
	<thead>
		<tr>
            <th>Bulunduğu Birim</th>
            <th>Seri No</th>
            <th>Arıza Açıklaması</th>
            <th>Yapılan İşlem</th>
            <th>Tarih</th>
		</tr>
	</thead>
            @foreach ($tumkayitlar as $kayit) 
                <tr>
                    <td>{{ $kayit->birim }}</td>
                    <td>{{ $kayit->urun->seri_no }}</td>
                    <td>{{ $kayit->ariza_aciklamasi }}</td>
                    <td>{{ $kayit->yapilan_islem }}</td>
                    <td>{{date("d.m.Y H:i:s", strtotime($kayit->updated_at))}}</td>
                </tr>
            @endforeach
</table>

</body>
</html>
