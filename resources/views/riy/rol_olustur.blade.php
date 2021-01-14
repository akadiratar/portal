@extends('riy.master')

@section('breadcrumb')
> <a href="{{ route('riy_roller') }}">ROLLER</a> > ROL OLUŞTUR
@endsection

@section('sub_header')
<a href="{{route('riy_rol_olustur')}}" class="btn btn-label-brand btn-bold">
  Rol Oluştur
</a>
@endsection

@section('icerik')
<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Rol Oluştur
          </h3>
        </div>
      </div>
      <form class="kt-form" method="POST" action="{{ route('riy_rol_olustur') }}">
        @include('riy.forms.rol_form')
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">Rol Ekle</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection


