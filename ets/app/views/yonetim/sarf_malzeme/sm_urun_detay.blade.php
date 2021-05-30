@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Sarf Malzeme Ürün Detayı</li>
        </ul>
         <div class="visible-xs breadcrumb-toggle">
              <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
          </div>

          <ul class="breadcrumb-buttons collapse">
              <li class="language">
                  <a href="{{route('sm_urun_duzenle',$sm_urun->id)}}" ><span>SARF MALZEMEYİ DÜZENLE</span></a>
              </li>
          </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>
<!-- Callout -->
      <div class="callout callout-danger fade in">
          <h5>{{$sm_urun->sm_urun_serino}} &nbsp;&nbsp;&nbsp;&nbsp;({{$sm_urun->smalttur->sm_alttur_adi}} - {{$sm_urun->smalttur->smtur->sm_tur_adi}})</h5>
          <h6>
            @if($sm_urun->sm_urun_durumu == 0)
            ÇALIŞIYOR
            @elseif ($sm_urun->sm_urun_durumu == 1)
            ARIZALI
            @endif
            <br>
            @if($sm_urun->sm_birim_id == 0)
            DEPODA
            @elseif($sm_urun->sm_birim_id == 1)
            BİRİM SİLİNMİŞ
            @else
            {{$sm_urun->urunbirim->birim_adi}}
            @endif
          </h6>
      </div>
            <!-- /callout -->

<!-- Page tabs -->
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#list_view" data-toggle="tab"><i class="icon-paragraph-justify2"></i> SM Ürün Geçmişi</a></li>
                </ul>
                <div class="tab-content">

                  <!-- First tab content -->
                  <div class="tab-pane active fade in" id="list_view">

                  
                  <!-- Default table -->
                  <div class="panel panel-default">
                      <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> SM Ürün Geçmişi</h6></div>
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gelen SM</th>
                                    <th>Giden SM</th>
                                    <th>Birimi</th>
                                    <th>Yazıcı Seri No</th>
                                    <th>Sayfa Sayısı</th>
                                    <th>Tarih</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i = 1; ?>
                              @foreach ($sm_urun_kayitlar as $sm_urun_kayit)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td><a href="{{route('sm_urun_tiklama', $sm_urun_kayit->smgelen->sm_urun_serino)}}">{{$sm_urun_kayit->smgelen->sm_urun_serino}}</a></td>
                                    <td><a href="{{route('sm_urun_tiklama', $sm_urun_kayit->smgiden->sm_urun_serino)}}">{{$sm_urun_kayit->smgiden->sm_urun_serino}}</a></td>
                                    <td>
                                      @if($sm_urun_kayit->sm_birim_id == 0)
                                      BİRİM SİLİNMİŞ
                                      @else
                                      {{$sm_urun_kayit->smtakipbirim->birim_adi}}
                                      @endif
                                    </td>
                                    <td>{{$sm_urun_kayit->sm_bagli_serino}}</td>
                                    <td>{{$sm_urun_kayit->sm_bagli_sayfasayisi}}</td>
                                    <td>{{date("d.m.Y H:i:s", strtotime($sm_urun_kayit->created_at))}}</td>
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