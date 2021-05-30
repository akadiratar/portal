@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Odaya Kayıtlı Olmayan Ürünler</li>
        </ul>
      </div>
<hr>


<div class="block">
    <h6 class="heading-hr"><i class="icon-table"></i> Ürünler</h6>
    <div class="datatable">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tür</th>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Seri No</th>
                    <th>Durumu</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($urunler as $urun) 
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $urun->model->tur->tur_adi }}</td>
                    <td>{{ $urun->model->marka->marka_adi }}</td>
                    <td>{{ $urun->model->model_adi }}</td>
                    <td><a href="{{route('uruntiklama',$urun->seri_no)}}">{{ $urun->seri_no }}</a></td>
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