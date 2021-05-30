@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Üst Birimler</li>
        </ul>
      </div>
<hr>
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-paragraph-justify"></i> Üst Birimler</h6></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Birim Tipi</th>
                    <th>Üst Birim Adı</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($ustbirimler as $ustbirim)  
                <tr class="success">
                    <td>{{ $i; }}</td>
                    <td>{{ $ustbirim->birimtip->tip_adi }}</td>
                    <td>{{ $ustbirim->ust_birim_adi }}</td>
                    <td>
                        <a href="{{ route('ustbirim_duzenle',$ustbirim->id) }}" class="btn btn-link btn-icon btn-xs tip" title="Düzenle"><i class="icon-pencil"></i></a>
                        <a data-toggle="modal" role="button" href="#default_modal{{ $ustbirim->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a>
                    </td>
                </tr>

                <div id="default_modal{{ $ustbirim->id; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Üst Birim Sil</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h5 class="text-error">Üst Birime bağlı tüm BİRİMLER, ODALAR ve ODALARDAKİ ÜRÜNLER SİLİNECEK.</h5><br>
                                <h6>{{$ustbirim->ust_birim_adi}} adlı Üst Birimi silmek istedeğinizden emin misiniz?</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('ustbirim_sil',$ustbirim->id) }}">Sil</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i= $i+1; ?>
            @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@stop