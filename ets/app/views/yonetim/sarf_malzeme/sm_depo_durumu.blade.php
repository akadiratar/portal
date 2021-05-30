@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Sarf Malzeme Depo Durumu</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>

<!-- Page tabs -->
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#list_view" data-toggle="tab"><i class="icon-yelp"></i> Çalışan Ürünler</a></li>
                    <li><a href="#list_arizali" data-toggle="tab"><i class="icon-yelp"></i> Arızalı Ürünler</a></li>
                </ul>
                <div class="tab-content">

                  <!-- First tab content -->
                  <div class="tab-pane active fade in" id="list_view">

                    <!-- Default datatable -->
                    <div class="block">
                        <h6 class="heading-hr"><i class="icon-table"></i> Ürünler</h6>
                        <div class="datatable">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>SM Seri No</th>
                                        <th>Alttür</th>
                                        <th>Tür</th>
                                        <th>Durumu</th>
                                        <th>Güncelleme Tarihi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($calisansm as $urun)
                                      <tr>
                                          <td>{{$i}}</td>
                                          <td><a href="{{route('sm_urun_tiklama', $urun->sm_urun_serino)}}">{{$urun->sm_urun_serino}}</a></td>
                                          <td>{{$urun->smalttur->sm_alttur_adi}}</td>
                                          <td>{{$urun->smalttur->smtur->sm_tur_adi}}</td>
                                          <td>
                                            @if($urun->sm_urun_durumu == 0)
                                            ÇALIŞIYOR
                                            @elseif ($urun->sm_urun_durumu == 1)
                                            ARIZALI
                                            @endif
                                          </td>
                                          <td>{{date("d.m.Y H:i:s", strtotime($urun->updated_at))}}</td>
                                      </tr>
                                      <?php $i= $i+1; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /default datatable -->
                  </div>
                  <!-- /first tab content -->


                  <!-- second tab content -->
                  <div class="tab-pane fade" id="list_arizali">


                    <!-- Default datatable -->
                    <div class="block">
                        <h6 class="heading-hr"><i class="icon-table"></i> Ürünler</h6>
                        <div class="datatable">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>SM Seri No</th>
                                        <th>Alttür</th>
                                        <th>Tür</th>
                                        <th>Durumu</th>
                                        <th>Güncelleme Tarihi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($arizalism as $urun)
                                      <tr>
                                          <td>{{$i}}</td>
                                          <td><a href="{{route('sm_urun_tiklama', $urun->sm_urun_serino)}}">{{$urun->sm_urun_serino}}</a></td>
                                          <td>{{$urun->smalttur->sm_alttur_adi}}</td>
                                          <td>{{$urun->smalttur->smtur->sm_tur_adi}}</td>
                                          <td>
                                            @if($urun->sm_urun_durumu == 0)
                                            ÇALIŞIYOR
                                            @elseif ($urun->sm_urun_durumu == 1)
                                            ARIZALI
                                            @endif
                                          </td>
                                          <td>{{date("d.m.Y H:i:s", strtotime($urun->updated_at))}}</td>
                                      </tr>
                                      <?php $i= $i+1; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /default datatable -->

                  </div>
                  <!-- /second tab content -->
              </div>
          </div>
          <!-- /page tabs -->
@stop