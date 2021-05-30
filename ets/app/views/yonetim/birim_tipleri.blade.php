@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Birim Tipleri</li>
        </ul>
      </div>
<hr>
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-paragraph-justify"></i> Birim Tipleri</h6></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tip Adı</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($birimtipleri as $tip)  
                <tr class="success">
                    <td>{{ $i; }}</td>
                    <td>{{ $tip->tip_adi }}</td>
                    <td>
                        <a href="{{ route('birimtip_duzenle',$tip->id) }}" class="btn btn-link btn-icon btn-xs tip" title="Düzenle"><i class="icon-pencil"></i></a>
                        <a data-toggle="modal" role="button" href="#default_modal{{ $tip->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a>
                    </td>
                </tr>

                <div id="default_modal{{ $tip->id; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Birim Tipi Sil</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h5 class="text-error">Birim Tipine bağlı tüm ÜST BİRİMLER, BİRİMLER, ODALAR ve ODALARDAKİ ÜRÜNLER SİLİNECEK.</h5><br>
                                <h6>{{$tip->tip_adi}} adlı Birim Tipini silmek istedeğinizden emin misiniz?</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('birimtip_sil',$tip->id) }}">Sil</a>
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