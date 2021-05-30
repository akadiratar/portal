@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Not Arşivi</li>
        </ul>
        <ul class="breadcrumb-buttons collapse">
          <li class="language dropdown">
            <a href="{{route('notArsivi')}}"><span>Arşiv</span><i class="icon-stack"></i></a>
          </li>
        </ul>
      </div>
<hr>

<?php $i=1; ?>
@foreach ($notlar as $not)

                <div class="col-md-6">
                  <div class="block task task-high">
                    <div class="row with-padding">
                      <div class="col-sm-10">
                        <div class="task-description" style="height: 60px;">
                          <span>{{ $not->aciklama }}</span>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="task-info">
                        @if($not->durum == 0)
                          <span class="label label-info" style="color:white;">Beklemede</span>
                        @elseif($not->durum == 1)
                          <span class="label label-success" style="color:white;">Tamamlandı</span>
                        @else
                          <span class="label label-danger" style="color:white;">Arşiv</span>
                        @endif
                        </div>
                      </div>
                    </div>
                    <div class="panel-footer">
                      <div class="pull-left">
                        <span>{{ $not->created_at }}</span>
                      </div>
                      <div class="pull-right">
                        <ul class="footer-icons-group">
                          
                          <li class="dropup"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-wrench"></i></a>
                            <ul class="dropdown-menu icons-right dropdown-menu-right">
                              <li><a data-toggle="modal" role="button" href="#form_duzenle{{$i}}"><i class="icon-pencil"></i> Düzenle</a></li>
                              <li><a data-toggle="modal" role="button" href="#form_sil{{$i}}"><i class="icon-remove3"></i> Sil</a></li>
                              <li><a data-toggle="modal" role="button" href="#form_tamamla{{$i}}"><i class="icon-checkmark3"></i> Tamamla</a></li>
                              <li><a data-toggle="modal" role="button" href="#form_arsivle{{$i}}"><i class="icon-stack"></i> Arşivle</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="form_tamamla{{$i}}" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Notu Tamamla</h4>
                      </div>

                      <div class="modal-body with-padding">
                        <p>{{$not->aciklama}}</p>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <a type="button" class="btn btn-primary" href="{{ route('notuTamamla', $not->id) }}">Tamamla</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="form_arsivle{{$i}}" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Notu Arşivle</h4>
                      </div>

                      <div class="modal-body with-padding">
                        <p>{{$not->aciklama}}</p>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <a type="button" class="btn btn-primary" href="{{ route('notuArsivle', $not->id) }}">Arşivle</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="form_sil{{$i}}" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Notu Sil</h4>
                      </div>

                      <div class="modal-body with-padding">
                        <p>{{$not->aciklama}}</p>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <a type="button" class="btn btn-primary" href="{{ route('notuSil', $not->id) }}">Sil</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="form_duzenle{{$i}}" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                      <form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('notuDuzenle', $not->id)}}" method="post">

                        <div class="modal-body with-padding">
                          <div class="form-group">
                            <div class="row">
                            <div class="col-sm-12">
                              <input type="text" name="aciklama" class="form-control" value="{{$not->aciklama}}" required>
                            </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning" data-dismiss="modal">Kapat</button>
                          <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
<?php $i=$i+1; ?>    
@endforeach       

@stop