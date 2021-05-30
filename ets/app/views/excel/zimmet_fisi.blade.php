<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Zimmet Fişi</title>
</head>
<body>
<table>
	<tr height="75">
		<td colspan="10" align="center" valign="middle"><b>ZİMMET FİŞİ (Demirbaş, makine ve cihaz için)</b></td>
	</tr>
	<tr height="30" >
		<td colspan="3" align="center" valign="bottom">VERİLDİĞİ YER:</td>
		<td colspan="7" align="center" valign="middle"><b>İSTANBUL ANADOLU ADLİYESİ</b></td>
	</tr>
	<tr height="30">
		<td colspan="3"></td>
		<td colspan="7" align="center" valign="middle"><b>{{ $girilenoda->birim->birim_adi }} {{ $girilenoda->aciklama }}</b></td>
	</tr>
	<tr>
		<td colspan="10">&nbsp;</td>
	</tr>
	<tr height="30">
		<td colspan="1" align="center" valign="middle"><b>SIRA NO</b></td>
		<td colspan="3" align="center" valign="middle"><b>SERİ NO</b></td>
		<td colspan="3" align="center" valign="middle"><b>MARKA - MODEL</b></td>
		<td colspan="3" align="center" valign="middle"><b>CİNSİ</b></td>
	</tr>
	<?php $i=1; ?>
	@foreach ($urunler as $urun)
		<tr>
			<td colspan="1" align="center" valign="middle">{{ $i }}</td>
			<td colspan="3" align="center" valign="middle"><b>{{ $urun->urun->seri_no }}</b></td>
			<td colspan="3" align="center" valign="middle">{{ $urun->urun->model->marka->marka_adi }} {{ $urun->urun->model->model_adi }}</td>
			<td colspan="3" align="center" valign="middle">{{ $urun->urun->model->tur->tur_adi }}</td>
		</tr>
		<?php $i=$i+1; ?>
	@endforeach
	<tr>
		<td colspan="10">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="10">Yukarıda sıra ve seri numarası yazılı olan ürün/ürünler sağlam olarak teslim edilmiştir.</td>
	</tr>
	<tr>
		<td colspan="8" align="right" valign="middle">Tarih:</td>
		<td colspan="2" align="center" valign="middle"><b>'=BUGÜN()</b></td>
	</tr>
	<tr>
		<td colspan="10">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5"><b>Teslim Edenin:</b></td>
		<td colspan="5"><b>Teslim Alanın:</b></td>
	</tr>
	<tr>
		<td>Ad Soyad:</td>
		<td colspan="4">{{ Auth::user()->yonetici_adi }}</td>
		<td>Ad Soyad:</td>
		<td colspan="4"></td>
	</tr>
	<tr>
		<td>Sicil No:</td>
		<td colspan="4">{{ Auth::user()->yonetici_sicili }}</td>
		<td>Sicil No:</td>
		<td colspan="4"></td>
	</tr>
	<tr>
		<td>Ünvanı:</td>
		<td colspan="4">{{ Auth::user()->yonetici_unvani }}</td>
		<td>Ünvanı:</td>
		<td colspan="4"></td>
	</tr>
	<tr>
		<td>İmzası:</td>
		<td colspan="4"></td>
		<td>Oda No:</td>
		<td colspan="4"><b>{{ $girilenoda->oda_birlikte }}</b></td>
	</tr>
	<tr>
		<td colspan="5"></td>
		<td>İmzası:</td>
		<td colspan="4"></td>
	</tr>
	<tr  height="<?php echo 420-($i*15); ?>">
		<td colspan="10">&nbsp;</td>
	</tr>
</table>
</body>
</html>