@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Sarf Malzeme Alttürler</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>
<!-- tablo -->
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-paragraph-justify"></i> Sarf Malzeme Alttürler</h6></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th width="120">#</th>
                    <th>SM Türü</th>
                    <th>SM Alttürü</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($sm_altturler as $sm_alttur)  
                <tr class="success">
                    <td>{{ $i; }}</td>
                    <td>{{ $sm_alttur->smtur->sm_tur_adi }}</td>
                    <td>{{ $sm_alttur->sm_alttur_adi }}</td>
                    <td>
                        <a href="{{ route('sm_alttur_duzenle',$sm_alttur->id) }}" class="btn btn-link btn-icon btn-xs tip" title="Düzenle"><i class="icon-pencil"></i></a>
                        <a data-toggle="modal" role="button" href="#default_modal{{ $sm_alttur->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a>
                    </td>
                </tr>

                <!-- Default modal -->
                <div id="default_modal{{ $sm_alttur->id; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Sarf Malzeme Alttür Sil</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h5 class="text-error">Sarf Malzeme Alttürüne bağlı tüm ürünler silinecek.</h5><br>
                                <h6>{{$sm_alttur->sm_alttur_adi}} adlı Sarf Malzeme Alttürünü silmek istedeğinizden emin misiniz?</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('sm_alttur_sil',$sm_alttur->id) }}">Sil</a>
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
<!-- /tablo -->

@stop