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
                  @livewire('birim-sec')
                </div>
              </div>
            </div>

@endsection

