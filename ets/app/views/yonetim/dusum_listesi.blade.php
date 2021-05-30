@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Düşüm Listesi</li>
        </ul>
      </div>
<hr>
    <form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('dusum_listesine_ekle')}}" method="post">
        <div class="panel panel-default">
          <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Düşüm Listesine Ürün Ekle</h6></div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Seri No: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="seri_no"  autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Açıklama: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="aciklama" required autocomplete="off">
                  </div>
                </div>
                <div class="form-actions text-right">
                  <button type="submit" class="btn btn-primary">DÜŞÜM LİSTESİNE EKLE</button>
                </div>
              </div>
        </div>
    </form>

<hr>

<div class="block">
    <h6 class="heading-hr"><i class="icon-table"></i> Düşüm Listesi</h6>
    <div class="datatable">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tür</th>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Seri No</th>
                    <th>Açıklama</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($kayitlar as $kayit) 
                <tr>
                    <td>{{ $i; }}</td>
                    <td>{{ $kayit->urun->model->tur->tur_adi }}</td>
                    <td>{{ $kayit->urun->model->marka->marka_adi }}</td>
                    <td>{{ $kayit->urun->model->model_adi }}</td>
                    <td>{{ $kayit->urun->seri_no }}</td>
                    <td>{{ $kayit->aciklama }}</td>
                    <td>
                        <a href="" class="btn btn-link btn-icon btn-xs tip" title="Düzenle"><i class="icon-pencil"></i></a>
                        <a data-toggle="modal" role="button" href="#default_modal{{$i}}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a>
                    </td>
                </tr>

                <div id="default_modal{{$i}}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Düşüm Listesinden Çıkar</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h6> {{ $kayit->urun->seri_no }} seri numaralı Ürünü listeden çıkarmak istediğinizden emin misiniz?</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{route('dusum_sil',$kayit->id)}}">Listeden Çıkar</a>
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