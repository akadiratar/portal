@extends('bys.master')

@section('breadcrumb')
> <a href="{{ route('bys_oda_tipleri') }}">ODA TİPLERİ</a> > ODA TİPİ DÜZENLE
@endsection

@section('icerik')
<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Oda Tipi Düzenle
          </h3>
        </div>
      </div>
      <form class="kt-form" method="POST" action="{{ route('bys_oda_tipi_duzenle', $oda_tipi->id) }}">
      	@include('bys.forms.oda_tipi_form')
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