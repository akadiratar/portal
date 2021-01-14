@extends('bys.master')

@section('breadcrumb')
> <a href="{{ route('bys_oda_tipleri') }}">ODA TİPLERİ</a> > <a href="{{ route('bys_oda_tipi_ekle') }}">ODA TİPİ EKLE</a>
@endsection

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Oda Tipi Ekle
          </h3>
        </div>
      </div>
      <form class="kt-form" method="POST" action="{{ route('bys_oda_tipi_ekle') }}">
      	@include('bys.forms.oda_tipi_form')
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">Oda Tipi Ekle</button>
          </div>
        </div>
      </form>
	</div>
  </div>
</div>

@endsection