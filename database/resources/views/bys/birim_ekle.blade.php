@extends('bys.master')

@section('breadcrumb')
> <a href="{{ route('bys_birimler') }}">BİRİMLER</a> > <a href="{{ route('bys_birim_ekle') }}">BİRİM EKLE</a>
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
            Birim Ekle
          </h3>
        </div>
      </div>
      <form class="kt-form" method="POST" action="{{ route('bys_birim_ekle') }}">
      	@include('bys.forms.birim_form')
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">Birim Ekle</button>
          </div>
        </div>
      </form>
	</div>
  </div>
</div>

@endsection