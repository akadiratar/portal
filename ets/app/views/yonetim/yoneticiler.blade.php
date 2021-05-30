@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Yöneticiler</li>
        </ul>
      </div>
<hr>
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-paragraph-justify"></i> Yöneticiler</h6></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Yönetici Yetkisi</th>
                    <th>Adı Soyadı</th>
                    <th>Sicili</th>
                    <th>Ünvanı</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($yoneticiler as $yonetici)  
                <tr class="success">
                    <td>{{ $i; }}</td>
                    <td><?php if($yonetici->yonetici_tip == 1) { echo "Üst Yönetici"; } elseif ($yonetici->yonetici_tip == 0) {echo "Geçici Yönetici";} elseif ($yonetici->yonetici_tip == 2) {echo "Ziyaretçi";} elseif ($yonetici->yonetici_tip == 3) {echo "Teknisyen";} ?></td>
                    <td>{{ $yonetici->yonetici_adi }}</td>
                    <td>{{ $yonetici->yonetici_sicili }}</td>
                    <td>{{ $yonetici->yonetici_unvani }}</td>
                    <td>
                        <a href="{{ route('yonetici_duzenle',$yonetici->id) }}" class="btn btn-link btn-icon btn-xs tip" title="Düzenle"><i class="icon-pencil"></i></a>
                        <a data-toggle="modal" role="button" href="#default_modal{{ $yonetici->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a>
                    </td>
                </tr>

                <div id="default_modal{{ $yonetici->id; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Yönetici Sil</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h5 class="text-error">{{$yonetici->yonetici_adi}} adlı yöneticiyi silmek istedeğinizden emin misiniz?</h5>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('yonetici_sil',$yonetici->id) }}">Sil</a>
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