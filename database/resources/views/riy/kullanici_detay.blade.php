@extends('riy.master')

@section('breadcrumb')
> KULLANICI DETAY
@endsection

@section('icerik')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
              <div class="kt-portlet">
                <div class="kt-portlet__body">
                  <div class="kt-widget kt-widget--user-profile-3">
                    <div class="kt-widget__top">
                      <div class="kt-widget__content">
                        <div class="kt-widget__head">
                          <h1>
                          <span style="color:black;">
                            {{$kullanici->kullanici_adi}} {{$kullanici->kullanici_soyadi}}
                            <i class="flaticon2-correct kt-font-success"></i>
                          </span></h1>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="kt-portlet kt-portlet--tabs">
                
                <div class="kt-portlet__body">
                  <form action="" method="">
                    <div class="tab-content">
                      <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">

                        <div class="kt-invoice__container">
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th style="width: 50%;"><h4>ÖZLÜK BİLGİLERİ</h4></th>
                                  <th style="width: 50%; text-align: right;">
                                    <div class="kt-portlet__head-toolbar">
                                      <a href="#" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
                                        İşlemler
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <!--begin::Nav-->
                                        <ul class="kt-nav">
                                          <li class="kt-nav__item">
                                            <a href="{{route('riy_kullanici_duzenle', $kullanici->id)}}" class="kt-nav__link">
                                              <i class="kt-nav__link-icon fa fa-user-edit"></i>
                                              <span class="kt-nav__link-text">Kullanıcı Düzenle</span>
                                            </a>
                                          </li>
                                          <li class="kt-nav__item">
                                            <a href="{{route('riy_kullanici_sil', $kullanici->id)}}" class="kt-nav__link">
                                              <i class="kt-nav__link-icon fa fa-user-times"></i>
                                              <span class="kt-nav__link-text">Kullanıcı Sil</span>
                                            </a>
                                          </li>
                                        </ul>
                                        <!--end::Nav-->
                                      </div>
                                    </div>
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>ADI</td>
                                  <td>{{$kullanici->kullanici_adi}}</td>
                                </tr>
                                <tr>
                                  <td>SOYADI</td>
                                  <td>{{$kullanici->kullanici_soyadi}}</td>
                                </tr>
                                <tr>
                                  <td>SİCİLİ</td>
                                  <td>{{$kullanici->kullanici_sicili}}</td>
                                </tr>
                                <tr>
                                  <td>ÜNVANI</td>
                                  <td><code>{{$kullanici->unvan->unvan_adi}}</code></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>

                      <div class="kt-invoice__container">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th style="width: 50%;"><h4>BİRİM BİLGİLERİ</h4></th>
                                <th style="width: 50%; text-align: right;">
                                    <a href="{{route('riy_kullanici_birim_degistir', $kullanici->id)}}" class="kt-nav__link" style="color:#22B9FF;">
                                      <i class="kt-nav__link-icon fa fa-user-edit"></i>
                                      <span class="kt-nav__link-text">Birim Değiştir</span>
                                    </a>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>BİRİMİ</td>
                                @if($kullanici->birim_id <> null)
                                <td>{{$kullanici->birim->birim_adi}}</td>
                                @else
                                <td>BİRİME TANIMLI DEĞİL</td>
                                @endif
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="kt-invoice__container">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th style="width: 50%;"><h4>TANIMLI ROLLER</h4></th>
                                <th style="width: 50%; text-align: right;">
                                    <a href="{{route('riy_rol_tanimla', $kullanici->id)}}" class="kt-nav__link" style="color:#22B9FF;">
                                      <i class="kt-nav__link-icon flaticon2-user"></i>
                                      <span class="kt-nav__link-text">Rol Tanımla</span>
                                    </a>
                                  </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td colspan="2">
                                  @if(count($kullanici->roles) == 0)
                                  <div><h6 style="color: black;">Tanımlı Rol Bulunmamaktadır.</h6></div>
                                  @else
                                      @foreach($kullanici->roles as $role)
                                        <div class="row">
                                          <div class="col-md-12 col-sm-12">
                                            @if($role->name=="administrator")
                                            <label data-toggle="kt-popover" data-html="true" data-original-title="Role Tanımlı İzinler" data-content="Sistemdeki tüm izinlere sahip rol">
                                            @else
                                            <label data-toggle="kt-popover" data-html="true" data-original-title="Role Tanımlı İzinler" data-content="@foreach($role->permissions as $permission)
                                              <li>{{ $permission->name }}</li>
                                            @endforeach">
                                            @endif
                                             <h5>{{ $role->name }}</h5>
                                            </label>
                                          </div>
                                        </div>
                                      @endforeach
                                  @endif
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="kt-invoice__container">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th style="width: 50%;"><h4>TANIMLI DİREKT İZİNLER</h4></th>
                                <th style="width: 50%; text-align: right;">
                                    <a href="{{route('riy_direkt_izin_tanimla', $kullanici->id)}}" class="kt-nav__link" style="color:#22B9FF;">
                                      <i class="kt-nav__link-icon flaticon-star"></i>
                                      <span class="kt-nav__link-text">Direkt İzin Tanımla</span>
                                    </a>
                                  </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td colspan="2">
                                  @if(count($kullanici->getDirectPermissions()) == 0)
                                  <div><h6 style="color: black;">Direkt Olarak Tanımlanmış İzin Bulunmamaktadır.</h6></div>
                                  @else
                                      @foreach($kullanici->getDirectPermissions() as $permission)
                                        <div class="row">
                                          <div class="col-md-12 col-sm-12">
                                            <h5>{{ $permission->name }}</h5>
                                          </div>
                                        </div>
                                      @endforeach
                                  @endif
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      </div>
                      
                    </div>
                  </form>
                </div>
              </div>
            </div>
@endsection

