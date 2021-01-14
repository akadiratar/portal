@extends('bys.master')

@section('breadcrumb')
> <a href="{{ route('bys_katlar') }}">KATLAR</a> > KAT DÜZENLE
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
            Kat Düzenle
          </h3>
        </div>
      </div>
      <form class="kt-form" method="POST" action="{{ route('bys_kat_duzenle', $kat->id) }}">
      	@include('bys.forms.kat_form')
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