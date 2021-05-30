@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Sarf Malzeme Model Sorgula</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>
<!-- Callout -->
      <div class="callout callout-danger fade in">
          <h5>{{$alttur->smtur->sm_tur_adi}} - {{$alttur->sm_alttur_adi}}</h5>
      </div>
            <!-- /callout -->

<!-- Page tabs -->
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#list_view" data-toggle="tab"><i class="icon-yelp"></i> Ürünler</a></li>
                </ul>
                <div class="tab-content">

                  <!-- First tab content -->
                  <div class="tab-pane active fade in" id="list_view">

                  
                  <!-- Default table -->
                  <div class="panel panel-default">
                      <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> Ürünler</h6></div>
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>SM Seri No</th>
                                    <th>Durumu</th>
                                    <th>Birimi</th>
                                    <th>Tarih</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i = 1; ?>
                              @foreach ($modelurunler as $urun)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td><a href="{{route('sm_urun_tiklama', $urun->sm_urun_serino)}}">{{$urun->sm_urun_serino}}</a></td>
                                    <td>
                                      @if($urun->sm_urun_durumu == 0)
                                      ÇALIŞIYOR
                                      @elseif ($urun->sm_urun_durumu == 1)
                                      ARIZALI
                                      @endif
                                    </td>
                                    <td>
                                     @if($urun->sm_birim_id == 0)
                                      DEPODA
                                      @elseif($urun->sm_birim_id == 1)
                                      BİRİM SİLİNMİŞ
                                      @else
                                      {{$urun->urunbirim->birim_adi}}
                                      @endif
                                    </td>
                                    <td>{{date("d.m.Y H:i:s", strtotime($urun->created_at))}}</td>
                                </tr>
                                <?php $i= $i+1; ?>
                              @endforeach
                            </tbody>
                        </table>
                      </div>
                </div>
                <!-- /default table -->
                  </div>
                  <!-- /first tab content -->
              </div>
          </div>
          <!-- /page tabs -->
@stop