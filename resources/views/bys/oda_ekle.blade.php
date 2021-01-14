@extends('bys.master')

@section('breadcrumb')
> <a href="{{ route('bys_odalar') }}">ODALAR</a> > <a href="{{ route('bys_oda_ekle') }}">ODA EKLE</a>
@endsection

@prepend('js')
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/components/extended/sweetalert2.js') }}" type="text/javascript"></script>
@endprepend

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Oda Ekle
          </h3>
        </div>
      </div>
      <form class="kt-form" method="POST" action="{{ route('bys_oda_ekle') }}">
      	@include('bys.forms.oda_form')
        <div class="form-group row">
          <label></label>
          <fieldset class="checkboxsas">
            <label><input type="checkbox" value="1" name="checkbox" id="kt_sweetalert_oda_sayisi"> Bu numaraya kadar odaları ekle</label>
          </fieldset>
        </div>
      </div>
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">Oda Ekle</button>
          </div>
        </div>
      </form>
	</div>
  </div>
</div>

@endsection