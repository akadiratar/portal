@extends('bys.master')

@section('breadcrumb')
> BİRİM ODA EŞLEŞTİRME
@endsection

@prepend('js')
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
@endprepend

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Birim Oda Eşleştirme
          </h3>
        </div>
      </div>
      <form class="kt-form" method="POST" action="{{ route('bys_birim_oda_guncelle', $oda->id) }}">
      	@include('bys.forms.birim_oda_form')
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