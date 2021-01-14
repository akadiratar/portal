@extends('riy.master')

@section('breadcrumb')
> KULLANICI DÜZENLE
@endsection

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Kullanıcı Düzenle
          </h3>
        </div>
      </div>
      <form class="kt-form" method="POST" action="{{ route('riy_kullanici_duzenle', $kullanici->id) }}">
      	@include('riy.forms.kullanici')
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </div>
      </form>
	</div>
  </div>
</div>

@endsection
