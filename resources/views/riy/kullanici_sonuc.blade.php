@extends('riy.master')

@section('breadcrumb')
> <a href="{{ route('riy_kullanici_ara') }}">KULLANICI ARA</a> > ARAMA SONUÇ
@endsection

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            KULLANICI ARAMA SONUÇLARI
          </h3>
        </div>
      </div>
    </div>
  </div>
</div>

@foreach($kullanicilar as $kullanici)
<div class="kt-portlet">
  <div class="kt-portlet__body">
    <div class="kt-widget kt-widget--user-profile-3">
      <div class="kt-widget__top">
        <div class="kt-widget__content">
          <div class="kt-widget__head">
            <a href="#" class="kt-widget__username">
              {{$kullanici->kullanici_adi}} {{$kullanici->kullanici_soyadi}}
              <i class="flaticon2-correct kt-font-success"></i>
            </a>
            <div class="kt-widget__action">
              <a href="{{route('riy_kullanici_detay', $kullanici->id)}}" class="btn btn-brand btn-sm btn-upper">DETAY</a>
            </div>
          </div>
          <div class="kt-widget__subhead">
            <a href="#"><i class="flaticon2-calendar-3"></i>{{$kullanici->kullanici_sicili}}</a>
            <a href="#"><i class="flaticon2-tag"></i>{{$kullanici->unvan->unvan_adi}}</a>
            @if($kullanici->birim_id <> null)
            <a href="#"><i class="flaticon2-placeholder"></i>{{$kullanici->birim->birim_adi}}</a>
            @else
            <a href="#"><i class="flaticon2-placeholder"></i>BİRİME TANIMLI DEĞİL</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
