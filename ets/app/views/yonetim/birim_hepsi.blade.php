@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
            <li><a href="{{route('birimler',$birim->ustbirim->id)}}">{{ $birim->ustbirim->ust_birim_adi }}</a></li>
            <li><a href="{{route('birimhepsi',$birim->id)}}">{{ $birim->birim_adi }}</a></li>
        </ul>
      
      <div class="visible-xs breadcrumb-toggle">
            <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
        </div>

        <ul class="breadcrumb-buttons collapse">
            <li class="language">
                <a href="{{route('sm_birimde_sorgulama',$birim->id)}}" ><span>BİRİM SARF MALZEMELERİ</span></a>
            </li>
            <li class="language">
                <a href="{{route('excel_birim_urunler',$birim->id)}}" ><span>EXCELE AKTAR</span></a>
            </li>
        </ul>
      </div>
<hr>

  <div class="callout callout-danger fade in">
      <h5>{{ $birim->birim_adi }} Odaları</h5>
  </div>
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#list_model" data-toggle="tab"><i class="icon-yelp"></i>Model Sayıları</a></li>
                  <?php $i=0; ?>
                  @foreach ($odalar as $oda)
                      <li><a href="#list_oda{{$i}}" data-toggle="tab"><i class="icon-yelp"></i>{{$oda->oda_birlikte}} - {{$oda->aciklama}}</a></li>
                    <?php $i=$i+1; ?>
                  @endforeach
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active fade in" id="list_model">
                      <div class="panel panel-default">
                          <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i>{{$birim->birim_adi}} Model Sayıları</h6></div>
                          <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tür</th>
                                        <th>Marka</th>
                                        <th>Model</th>
                                        <th>Adet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $k = 1; ?>
                                  @foreach ($modeller as $model)
                                      <?php $m = 0; $arizali = 0; ?>
                                      @foreach ($urunler as $urun)
                                        @if ($urun->oda->depokontrol==0)
                                            @if ($urun->urun->model->id == $model->id)
                                                <?php $m = $m + 1; if ($urun->urun->durumu == 1) {
                                                  $arizali = $arizali + 1;
                                                }?>
                                            @endif
                                        @endif
                                      @endforeach
                                      @if ($m > 0)
                                       <tr>
                                          <td>{{ $k; }}</td>
                                          <td>{{ $model->tur->tur_adi }}</td>
                                          <td>{{$model->marka->marka_adi}}</td>
                                          <td>{{$model->model_adi}}</td>
                                          <td>{{ $m }} Adet ( {{$m-$arizali}} ÇALIŞIYOR - {{$arizali}} ARIZALI )</td>
                                      </tr>
                                      <?php $k= $k+1; ?>
                                      @endif
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                    </div>
                  </div>
                  <?php $j=0; ?>
                  @foreach ($odalar as $oda)
                  <div class="tab-pane fade" id="list_oda{{$j}}">
                      <div class="panel panel-default">
                          <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i>{{$birim->birim_adi}} {{$oda->aciklama}}</h6></div>
                          <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tür</th>
                                        <th>Markası</th>
                                        <th>Modeli</th>
                                        <th>Seri No</th>
                                        <th>Durumu</th>
                                        <th>Kontrol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $i = 1; ?>
                                  @foreach ($urunler as $urun)
                                      @if ($urun->oda_id == $oda->id)  
                                          <tr class="success">
                                              <td>{{ $i; }}</td>
                                              <td>{{ $urun->urun->model->tur->tur_adi }}</td>
                                              <td>{{ $urun->urun->model->marka->marka_adi }}</td>
                                              <td>{{ $urun->urun->model->model_adi }}</td>
                                              <td><a href="{{route('uruntiklama',$urun->urun->seri_no)}}" >{{ $urun->urun->seri_no }}</a></td>
                                              <td>
                                                <?php if ($urun->urun->durumu == 0) {
                                                echo "ÇALIŞIYOR";
                                              }else {
                                                echo "ARIZALI";
                                              } ?>
                                              </td>
                                              <td>
                                                <a data-toggle="modal" role="button" href="#default_modal{{ $urun->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a>
                                              </td>
                                          </tr>
                                          <div id="default_modal{{ $urun->id; }}" class="modal fade" tabindex="-1" role="dialog">
                                              <div class="modal-dialog">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                          <h4 class="modal-title">Odadan Ürün Sil</h4>
                                                      </div>

                                                      <div class="modal-body with-padding">
                                                          <h6>Ürünü silmek istedeğinizden emin misiniz?</h6>
                                                      </div>

                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                                          <a type="button" class="btn btn-primary" href="{{ route('odaurun_sil',array($urun->id, $oda->birim->id)) }}">Sil</a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <?php $i= $i+1; ?>
                                      @endif
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                    </div>
                  </div>
                    <?php $j=$j+1; ?>
                  @endforeach
              </div>
          </div>
          
@stop