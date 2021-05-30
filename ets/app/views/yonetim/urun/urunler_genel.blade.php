@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Tüm Ürünler</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>


<!-- Default datatable -->
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
                    <th>Kontrol</th>
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
                    <td><a href="{{route('uruntiklama',$urun->seri_no)}}" >{{ $urun->seri_no }}</a></td>
                    <td><?php if($urun->durumu == 0) {echo "ÇALIŞIYOR";} else { echo "ARIZALI";} ?></td>
                    <td>
                        <a href="{{ route('urun_duzenle',$urun->id) }}" class="btn btn-link btn-icon btn-xs tip" title="Düzenle"><i class="icon-pencil"></i></a>
                        <a data-toggle="modal" role="button" href="#default_modal{{ $urun->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a>
                    </td>
                </tr>

                 <!-- Default modal -->
                <div id="default_modal{{ $urun->id; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Ürün Sil</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h5 class="text-error">Ürün ekli olduğu odadan da SİLİNECEK.</h5><br>
                                <h6>Ürünü silmek istedeğinizden emin misiniz?</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('urun_sil',$urun->id) }}">Sil</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /default modal -->
            <?php $i= $i+1; ?>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /default datatable -->

@stop