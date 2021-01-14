@extends('riy.master')

@section('breadcrumb')
> <a href="{{ route('riy_unvanlar') }}">KULLANICI ÜNVANLARI</a> > KULLANICI ÜNVANI EKLE
@endsection

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Kullanıcı Ünvanı Ekle
          </h3>
        </div>
      </div>
      <form class="kt-form" method="POST" action="{{ route('riy_unvan_ekle') }}">
      	@include('riy.forms.unvan')
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">Ünvan Ekle</button>
          </div>
        </div>
      </form>
	</div>
  </div>
</div>

@endsection

