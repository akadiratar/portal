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
            <th>Tür</th>
            <th>Marka</th>
            <th>Model</th>
            <th>Adet</th>
        </tr>
    </thead>
    <tbody>
      <?php $k = 1; ?>
      @foreach ($modeller as $model)
          <?php $m = 0; $arizali = 0; ?>
          @foreach ($urunler as $urun)
            @if ($urun->oda->depokontrol==0)
              @if ($urun->urun->model->id == $model->id)
                  <?php $m = $m + 1; if ($urun->urun->durumu == 1) {
                    $arizali = $arizali + 1;
                  }?>
              @endif
            @endif
          @endforeach
          @if ($m > 0)
	           <tr>
	              <td>{{ $k; }}</td>
	              <td>{{ $model->tur->tur_adi }}</td>
	              <td>{{$model->marka->marka_adi}}</td>
	              <td>{{$model->model_adi}}</td>
	              <td>{{ $m }} Adet ( {{$m-$arizali}} ÇALIŞIYOR - {{$arizali}} ARIZALI )</td>
	          </tr>
	          <?php $k= $k+1; ?>
          @endif
      @endforeach
      <tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
    </tbody>
</table>



@foreach ($odalar as $oda)
<table>
	<thead>
		<tr>
			<th>Oda No</th>
			<th>Açıklama</th>
		</tr>
	</thead>
		<tr>
			<td>{{ $oda->oda_birlikte }}</td>
			<td>{{$birim->birim_adi}} {{$oda->aciklama}}</td>
		</tr>
</table>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Tür</th>
            <th>Markası</th>
            <th>Modeli</th>
            <th>Seri No</th>
            <th>Durumu</th>
        </tr>
    </thead>
    <tbody>
       <?php $i = 1; ?>
      @foreach ($urunler as $urun)
          @if ($urun->oda_id == $oda->id)  
              <tr>
                  <td>{{ $i; }}</td>
                  <td>{{ $urun->urun->model->tur->tur_adi }}</td>
                  <td>{{ $urun->urun->model->marka->marka_adi }}</td>
                  <td>{{ $urun->urun->model->model_adi }}</td>
                  <td>{{ $urun->urun->seri_no }}</td>
                  <td>
                    <?php if ($urun->urun->durumu == 0) {
                    echo "ÇALIŞIYOR";
                  }else {
                    echo "ARIZALI";
                  } ?>
                  </td>
              </tr>
              <?php $i= $i+1; ?>
          @endif
      @endforeach

		<tr>
			<td></td>
		</tr>
    </tbody>
</table>
@endforeach


</body>
</html>