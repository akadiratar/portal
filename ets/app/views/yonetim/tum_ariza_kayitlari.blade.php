@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Tüm Arıza Kayıtları</li>
        </ul>
        <div class="visible-xs breadcrumb-toggle">
              <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
          </div>

          <ul class="breadcrumb-buttons collapse">
              <li class="language">
                  <a href="{{route('tum_ariza_kayitlari_excel')}}" ><span>TÜM KAYITLARI EXCELE DÖK</span></a>
              </li>
          </ul>
      </div>
<hr>


<div class="block">
    <h6 class="heading-hr"><i class="icon-table"></i> Tüm Kayıtlar</h6>
    <div class="datatable">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Bulunduğu Birim</th>
                    <th>Seri No</th>
                    <th>Arıza Açıklaması</th>
                    <th>Yapılan İşlem</th>
                    <th>Tarih</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach ($tumkayitlar as $kayit) 
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $kayit->birim }}</td>
                    <td>{{ $kayit->urun->seri_no }}</td>
                    <td>{{ $kayit->ariza_aciklamasi }}</td>
                    <td>{{ $kayit->yapilan_islem }}</td>
                    <td>{{date("d.m.Y H:i:s", strtotime($kayit->updated_at))}}</td>
                    <td><a data-toggle="modal" role="button" href="#kayit{{ $kayit->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a></td>
                </tr>

                <div id="kayit{{ $kayit->id; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Ürün Arıza Kaydı Sil</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h6>Ürüne ait arıza kaydını silmek istedeğinizden emin misiniz?</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('urunariza_sil',$kayit->id) }}">Sil</a>
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