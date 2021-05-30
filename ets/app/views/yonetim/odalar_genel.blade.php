@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Odalar</li>
        </ul>
      </div>
<hr>
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-paragraph-justify"></i> Odalar</h6></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Oda No</th>
                    <th>Birim Adı</th>
                    <th>Açıklama</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($odalar as $oda)  
                <tr class="success">
                    <td>{{ $i; }}</td>
                    <td>{{ $oda->oda_birlikte }}</td>
                    <td>{{ $oda->birim->birim_adi }}</td>
                    <td>{{ $oda->aciklama }}</td>
                    <td>
                        <a href="{{ route('oda_duzenle',$oda->id) }}" class="btn btn-link btn-icon btn-xs tip" title="Düzenle"><i class="icon-pencil"></i></a>
                        <a data-toggle="modal" role="button" href="#default_modal{{ $oda->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a>
                    </td>
                </tr>

                <div id="default_modal{{ $oda->id; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Oda Sil</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h5 class="text-error">Odada ekli bütün kayıtlar SİLİNECEK.</h5><br>
                                <h6>{{$oda->oda_birlikte}} numaralı odayı silmek istedeğinizden emin misiniz?</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('oda_sil',$oda->id) }}">Sil</a>
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