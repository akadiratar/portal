<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<table>
	<tr>
		<td>BİRİMLERE KAYITLI MODEL SAYILARI</td>
	</tr>
</table>

<table>
	<thead>
		<tr>
			<th>Tür Adı</th>
			<th>Marka Adı</th>
			<th>Model Adı</th>
			<th>Sayısı</th>
		</tr>
	</thead>
	 @foreach ($modellerinhepsi as $model)
      <?php $j = 0; $arizali = 0; ?>
      @foreach ($urunler as $urun)
          @if ($urun->urun->model->id == $model->id)
              <?php $j = $j + 1; if ($urun->durumu == "ARIZALI") {
                $arizali = $arizali + 1;
              }?>

          @endif
      @endforeach
      @if ($j > 0)
                    <tr>
                        <td>{{ $model->tur->tur_adi }}</td>
                        <td>{{$model->marka->marka_adi}}</td>
                        <td>{{$model->model_adi}}</td>
                        <td>{{ $j }} Adet ( {{$j-$arizali}} ÇALIŞIYOR - {{$arizali}} ARIZALI )</td>
                    </tr>
        @endif
  @endforeach
  <tr></tr>
  <tr></tr>
  <tr></tr>
  <tr></tr>
  <tr></tr>
</table>



<table>
	<tr>
		<td>SİSTEMDE KAYITLI TÜM ÜRÜNLERİN SAYILARI</td>
	</tr>
</table>
<table>
	<thead>
		<tr>
			<th>Tür Adı</th>
			<th>Marka Adı</th>
			<th>Model Adı</th>
			<th>Sayısı</th>
		</tr>
	</thead>
	@foreach ($modeller as $model)
		<tr>
			<td>{{ $model->model->tur->tur_adi }}</td>
			<td>{{ $model->model->marka->marka_adi }}</td>
			<td>{{ $model->model->model_adi }}</td>
			<td>{{ $model->toplam }}</td>
		</tr>
	@endforeach
</table>
</body>
</html>
