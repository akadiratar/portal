@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Sarf Malzeme Birim Sorgula</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>
<!-- Callout -->
      <div class="callout callout-danger fade in">
          <h5>{{$birim->birim_adi}} Sarf Malzeme Kayıtları</h5>
      </div>
            <!-- /callout -->

<!-- Page tabs -->
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#list_view" data-toggle="tab"><i class="icon-yelp"></i> Tüm Kayıtlar</a></li>
                    <li><a href="#birimdekismler" data-toggle="tab"><i class="icon-yelp"></i> Şu An Kayıtlı Sarf Malzemeler</a></li>
                </ul>
                <div class="tab-content">

                  <!-- First tab content -->
                  <div class="tab-pane active fade in" id="list_view">

                  
                  <!-- Default table -->
                  <div class="panel panel-default">
                      <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> Tüm Kayıtlar</h6></div>
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
                              @foreach ($tumkayitlar as $sm_urun_kayit)
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


                  <!-- second tab content -->
                  <div class="tab-pane fade" id="birimdekismler">

                  
                  <!-- Default table -->
                  <div class="panel panel-default">
                      <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> Şu An Kayıtlı Sarf Malzemeler</h6></div>
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Seri No</th>
                                    <th>Alttür</th>
                                    <th>Tür</th>
                                    <th>Durumu</th>
                                    <th>Tarih</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i = 1; ?>
                              @foreach ($birimdekismler as $sm_urun_kayit)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td><a href="{{route('sm_urun_tiklama', $sm_urun_kayit->sm_urun_serino)}}">{{$sm_urun_kayit->sm_urun_serino}}</a></td>
                                    <td>{{$sm_urun_kayit->smalttur->sm_alttur_adi}}</td>
                                    <td>{{$sm_urun_kayit->smalttur->smtur->sm_tur_adi}}</td>
                                    <td>
                                      @if($sm_urun_kayit->sm_urun_durumu == 0)
                                      ÇALIŞIYOR
                                      @elseif ($sm_urun_kayit->sm_urun_durumu == 1)
                                      ARIZALI
                                      @endif
                                    </td>
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
                  <!-- /second tab content -->
              </div>
          </div>
          <!-- /page tabs -->
@stop