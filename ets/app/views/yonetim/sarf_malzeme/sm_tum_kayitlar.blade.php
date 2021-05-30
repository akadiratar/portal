@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Sarf Malzeme Tüm Kayıtlar</li>
        </ul>

        <div class="visible-xs breadcrumb-toggle">
            <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
        </div>

        <ul class="breadcrumb-buttons collapse">
            <li class="language">
                <a href="{{route('smexcelkayitlar')}}" ><span>EXCELE AKTAR</span></a>
            </li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>


<!-- Default datatable -->
<div class="block">
    <h6 class="heading-hr"><i class="icon-table"></i> Sarf Malzeme Tüm Kayıtlar</h6>
    <div class="datatable">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gelen SM</th>
                    <th>Giden SM</th>
                    <th>Birimi</th>
                    <th>Yazıcı Seri No</th>
                    <th>Sayfa Sayısı</th>
                    <th>Tarih</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($sm_tum_kayitlar as $sm_kayit) 
                <tr>
                    <td>{{ $i }}</td>
                    <td><a href="{{route('sm_urun_tiklama', $sm_kayit->smgelen->sm_urun_serino)}}">{{$sm_kayit->smgelen->sm_urun_serino}}</a></td>
                    <td><a href="{{route('sm_urun_tiklama', $sm_kayit->smgiden->sm_urun_serino)}}">{{$sm_kayit->smgiden->sm_urun_serino}}</a></td>
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
                    <td>
                        <a data-toggle="modal" role="button" href="#default_modal{{ $sm_kayit->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a>
                    </td>
                </tr>

                 <!-- Default modal -->
                <div id="default_modal{{ $sm_kayit->id; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Sarf Malzeme Kayıt Sil</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h5 class="text-error">Kayıt Silinecek!</h5><br>
                                <h6>Silmek istedeğinizden emin misiniz?</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('sm_kayit_sil',$sm_kayit->id) }}">Sil</a>
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