@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Sarf Malzeme Türler</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>
<!-- tablo -->
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-paragraph-justify"></i> Sarf Malzeme Türler</h6></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th width="120">#</th>
                    <th>Sarf Malzeme Tür Adı</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($sm_turler as $sm_tur)  
                <tr class="success">
                    <td>{{ $i; }}</td>
                    <td>{{ $sm_tur->sm_tur_adi }}</td>
                    <td>
                        <a href="{{ route('sm_tur_duzenle',$sm_tur->id) }}" class="btn btn-link btn-icon btn-xs tip" title="Düzenle"><i class="icon-pencil"></i></a>
                        <a data-toggle="modal" role="button" href="#default_modal{{ $sm_tur->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a>
                    </td>
                </tr>

                <!-- Default modal -->
                <div id="default_modal{{ $sm_tur->id; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Sarf Malzeme Tür Sil</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h5 class="text-error">Sarf Malzeme Türüne bağlı tüm modeller ve ürünler silinecek.</h5><br>
                                <h6>{{$sm_tur->sm_tur_adi}} adlı Sarf Malzeme Türünü silmek istedeğinizden emin misiniz?</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('sm_tur_sil',$sm_tur->id) }}">Sil</a>
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