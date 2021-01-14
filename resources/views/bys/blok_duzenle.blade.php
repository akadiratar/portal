@extends('bys.master')

@section('breadcrumb')
> <a href="{{ route('bys_bloklar') }}">BLOKLAR</a> > BLOK DÜZENLE
@endsection

@section('icerik')
<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Blok Düzenle
          </h3>
        </div>
      </div>
      <form class="kt-form" method="POST" action="{{ route('bys_blok_duzenle', $blok->id) }}">
      	@include('bys.forms.blok_form')
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