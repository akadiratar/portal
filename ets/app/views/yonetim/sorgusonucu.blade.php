@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Detaylı Sorgu</li>
        </ul>
      </div>
<hr>

<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-paragraph-justify"></i> 
        @if(Session::has("tur"))

        {{$tur->tur_adi}} türündeki tüm ürünler

        @endif

        @if(Session::has("model"))

        {{$model->marka->marka_adi}} - {{$model->model_adi}} model Ürünler

        @endif
        </h6></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Oda</th>
                    <th>Birim</th>
                    <th>Markası</th>
                    <th>Modeli</th>
                    <th>Seri No</th>
                    <th>Durumu</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($urunler as $urun)
                        <tr class="success">
                            <td>{{ $i; }}</td>
                            @if ($urun->kayit == 1)
                            <td>{{ $urun->odaUrun($urun->id)->oda->oda_birlikte }}</td>
                            <td>{{ $urun->odaUrun($urun->id)->oda->birim->birim_adi }} {{ $urun->odaUrun($urun->id)->oda->aciklama }}</td>
                            @elseif ($urun->kayit == 0)
                            <td></td>
                            <td></td>
                            @endif
                            <td>{{ $urun->model->marka->marka_adi }}</td>
                            <td>{{ $urun->model->model_adi }}</td>
                            <td><a href="{{route('uruntiklama',$urun->seri_no)}}" >{{ $urun->seri_no }}</a></td>
                            <td>
                              <?php if ($urun->durumu == 0) {
                                echo "ÇALIŞIYOR";
                              }else {
                                echo "ARIZALI";
                              } ?>
                            </td>
                        </tr>
                <?php $i= $i+1; ?>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop