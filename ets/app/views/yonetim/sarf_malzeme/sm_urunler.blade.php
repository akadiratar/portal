@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Sarf Malzeme Tüm Ürünler</li>
        </ul>

        <div class="visible-xs breadcrumb-toggle">
            <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
        </div>

        <ul class="breadcrumb-buttons collapse">
            <li class="language">
                <a href="{{route('smexcel')}}" ><span>EXCELE AKTAR</span></a>
            </li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>


<!-- Default datatable -->
<div class="block">
    <h6 class="heading-hr"><i class="icon-table"></i> Sarf Malzeme Tüm Ürünler</h6>
    <div class="datatable">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Seri No</th>
                    <th>Tür</th>
                    <th>Alttür</th>
                    <th>Durumu</th>
                    <th>Kayıtlı Yer</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($sm_urunler as $sm_urun) 
                <tr>
                    <td>{{ $i }}</td>
                    <td><a href="{{route('sm_urun_tiklama', $sm_urun->sm_urun_serino)}}">{{ $sm_urun->sm_urun_serino }}</a></td>
                    <td>{{ $sm_urun->smalttur->smtur->sm_tur_adi }}</td>
                    <td>{{ $sm_urun->smalttur->sm_alttur_adi }}</td>
                    <td><?php if($sm_urun->sm_urun_durumu == 0) {echo "ÇALIŞIYOR";} else { echo "ARIZALI";} ?></td>
                    <td>

                        @if($sm_urun->sm_birim_id == 0)
                        DEPODA
                        @elseif($sm_urun->sm_birim_id == 1)
                        BİRİMİ SİLİNMİŞ
                        @else
                        {{$sm_urun->urunbirim->birim_adi}}
                        @endif
                        
                    </td> 
                    <td>
                        <a href="{{ route('sm_urun_duzenle',$sm_urun->id) }}" class="btn btn-link btn-icon btn-xs tip" title="Düzenle"><i class="icon-pencil"></i></a>
                        <a data-toggle="modal" role="button" href="#default_modal{{ $sm_urun->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a>
                    </td>
                </tr>

                 <!-- Default modal -->
                <div id="default_modal{{ $sm_urun->id; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Sarf Malzeme Ürün Sil</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h5 class="text-error">Sarf Malzeme silinecek!</h5><br>
                                <h6>Silmek istedeğinizden emin misiniz?</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('sm_urun_sil',$sm_urun->id) }}">Sil</a>
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