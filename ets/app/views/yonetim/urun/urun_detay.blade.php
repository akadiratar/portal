@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Ürün Detayı</li>
        </ul>
        <div class="visible-xs breadcrumb-toggle">
              <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
          </div>

          <ul class="breadcrumb-buttons collapse">
              <li class="language">
                  <a href="{{route('urun_duzenle',$girilenserino->id)}}" ><span>ÜRÜN DÜZENLE</span></a>
              </li>
          </ul>
        </div>
      <!-- /breadcrumbs line -->
<hr>
<!-- Callout -->
      <div class="callout callout-danger fade in">
          <h5>{{$girilenserino->seri_no}} &nbsp;&nbsp;&nbsp;&nbsp;({{$girilenserino->model->model_adi}} - {{$girilenserino->model->marka->marka_adi}} - {{$girilenserino->model->tur->tur_adi}})</h5>
          <h6>
            @if(count($oda)>0)
            <a href="{{route('urunler',$oda->oda->oda_birlikte)}}">{{$oda->oda->oda_birlikte}}</a> NUMARALI {{$oda->oda->birim->birim_adi}} {{$oda->oda->aciklama}} ODASINDA KAYITLI
            @elseif($girilenserino->kayit == 2)
            DÜŞÜM LİSTESİNE ALINMIŞ
            @else
            ÜRÜN HERHANGİ BİR ODAYA KAYITLI DEĞİL
            @endif
            <br>
            @if($girilenserino->durumu == 0)
            ÇALIŞIYOR
            @elseif ($girilenserino->durumu == 1)
            ARIZALI
            @endif
          </h6>
      </div>
            <!-- /callout -->
<!-- Page tabs -->
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#list_view" data-toggle="tab"><i class="icon-paragraph-justify2"></i> Ürün Arızaları</a></li>
                    @if(Auth::user()->yonetici_tip == 1)
                    <li><a href="#table_view" data-toggle="tab"><i class="icon-stack"></i> Ürünün Geçmişi</a></li>
                    @endif
                </ul>
                <div class="tab-content">

                  <!-- First tab content -->
                  <div class="tab-pane active fade in" id="list_view">

                  
                  <!-- Default table -->
                  <div class="panel panel-default">
                      <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> Ürünün Arızaları</h6></div>
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bulunduğu Birim</th>
                                    <th>Arıza Açıklaması</th>
                                    <th>Yapılan İşlem</th>
                                    <th>Tarih</th>
                                    <th>Kontrol</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i = 1; ?>
                              @foreach ($arizalar as $ariza)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$ariza->birim}}</td>
                                    <td>{{$ariza->ariza_aciklamasi}}</td>
                                    <td>{{$ariza->yapilan_islem}}</td>
                                    <td>{{date("d.m.Y H:i:s", strtotime($ariza->updated_at))}}</td>
                                    <td><a data-toggle="modal" role="button" href="#kayit{{ $ariza->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a></td>
                                </tr>
                                <!-- Default modal -->
                                <div id="kayit{{ $ariza->id; }}" class="modal fade" tabindex="-1" role="dialog">
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
                                                <a type="button" class="btn btn-primary" href="{{ route('urunariza_sil',$ariza->id) }}">Sil</a>
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
                <!-- /default table -->
                  </div>
                  <!-- /first tab content -->
@if(Auth::user()->yonetici_tip == 1)
                  <!-- Second tab content -->
                  <div class="tab-pane fade" id="table_view">
                 <!-- Default table -->
                  <div class="panel panel-default">
                      <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> Ürünün Geçmişi</h6></div>
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Oda No</th>
                                    <th>Birimi</th>
                                    <th>Tarih</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $j = 1; ?>
                              @foreach ($gecmis as $gecmis)
                                <tr>
                                    <td>{{$j}}</td>
                                    <td>{{$gecmis->oda_birlikte}}</td>
                                    <td>{{$gecmis->birim}}</td>
                                      @if($gecmis->zimmetFisiTarama == null)
                                      <td>{{date("d.m.Y H:i:s", strtotime($gecmis->created_at))}}</td>
                                    <form action="{{ route('zimmetFisiTarama') }}" method="post" enctype="multipart/form-data">
                                      <td>
                                          <input name="zimmet_fisi" type="file" id="unstyled-file" required>
                                          <input type="submit" value="Kaydet" class="btn btn-default btn-xs"/>
                                          <input type="hidden" name="gecmis_id" class="form-control" value="{{$gecmis->id}}" required>
                                      </td>
                                    </form>
                                      @else
                                        <td><a href="{{URL::to('assets/zimmet_fisleri/'.$gecmis->zimmetFisiTarama)}}" target="_blank">{{date("d.m.Y H:i:s", strtotime($gecmis->created_at))}}</a></td>
                                        <td><a data-toggle="modal" role="button" href="#default_modal{{ $gecmis->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Fotoğrafı Sil">Fotoğrafı Sil</a></td>
                                        
                                      @endif
                                      <td><a data-toggle="modal" role="button" href="#kayit_sil{{ $gecmis->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Kaydı Sil">Kaydı Sil</a></td>
                                </tr>
                                <!-- Default modal -->
                                <div id="default_modal{{ $gecmis->id; }}" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">ZİMMET FİŞİ FOTOĞRAFINI SİL</h4>
                                            </div>

                                            <div class="modal-body with-padding">
                                                <h5 class="text-error">FOTOĞRAF SİLİNECEK!</h5><br>
                                                <h6>{{date("d.m.Y H:i:s", strtotime($gecmis->created_at))}} tarihli ürün geçmişi kaydına ait zimmet fişi fotoğrafını silmek istedeğinizden emin misiniz?</h6>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                                <a type="button" class="btn btn-primary" href="{{ route('zimmetFisiSil',$gecmis->id) }}">Sil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /default modal -->

                                <!-- Default modal -->
                                <div id="kayit_sil{{ $gecmis->id; }}" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">ÜRÜN GEÇMİŞ KAYDINI SİL</h4>
                                            </div>

                                            <div class="modal-body with-padding">
                                                <h5 class="text-error">KAYIT SİLİNECEK!</h5><br>
                                                <h6>{{date("d.m.Y H:i:s", strtotime($gecmis->created_at))}} tarihli ürün geçmişi kaydını silmek istedeğinizden emin misiniz?</h6>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                                <a type="button" class="btn btn-primary" href="{{ route('urunGecmisSil',$gecmis->id) }}">Sil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /default modal -->
                                <?php $j= $j+1; ?>
                              @endforeach
                            </tbody>
                        </table>
                      </div>
                </div>
                <!-- /default table -->

                  </div>
                  <!-- /second tab content -->
@endif
              </div>
          </div>
          <!-- /page tabs -->
@stop