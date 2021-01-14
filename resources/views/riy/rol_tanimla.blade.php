@extends('riy.master')

@section('breadcrumb')
> <a href="{{route('riy_kullanici_detay', $kullanici->id)}}">KULLANICI DETAY</a> > ROL TANIMLA
@endsection

@prepend('css')
  @livewireStyles
@endprepend

@prepend('js')
  <script src="{{ asset('assets/js/pages/components/extended/sweetalert2.js') }}" type="text/javascript"></script>
  @livewireScripts
@endprepend

@section('icerik')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="kt-portlet">
    <div class="kt-portlet__body">
      <div class="kt-widget kt-widget--user-profile-3">
        <div class="kt-widget__top">
          <div class="kt-widget__content">
            <div class="kt-widget__head">
              <h3>
              <span style="color:black;">
                {{$kullanici->kullanici_sicili}} - {{$kullanici->kullanici_adi}} {{$kullanici->kullanici_soyadi}} için Rol tanımla;
              </span></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <livewire:rol-tanimla :kullanici="$kullanici">
</div>
@endsection


