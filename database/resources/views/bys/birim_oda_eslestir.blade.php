@extends('bys.master')

@section('breadcrumb')
> <a href="{{ route('bys_birim_oda_eslestir') }}">BİRİM ODA EŞLEŞTİRME</a>
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
      <form class="kt-form" method="POST" action="{{ route('bys_birim_oda_eslestir') }}">
      	        @csrf
        <div class="kt-portlet__body">

            <div class="form-group row">
              <label>Oda:</label>
              <select name="oda_id" class="form-control kt-selectpicker @error('oda_id') is-invalid @enderror" data-size="7" data-live-search="true" tabindex="-98">
                <option disabled="disabled" selected="selected">Seçiniz!</option>
                @foreach($odalar as $secili_oda)
                  <option value="{{$secili_oda->id}}" @if(old('oda_id') == $secili_oda->id) selected="selected" @endif>{{$secili_oda->oda_kodu}}</option>
                @endforeach
              </select>
              <span class="form-text text-muted">Lütfen tanımlamak istediğiniz odayı seçin.</span>
              @error('oda_id')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group row">
              <label>Birim:</label>
              <select name="birim_id" class="form-control kt-selectpicker @error('birim_id') is-invalid @enderror" data-size="7" data-live-search="true" tabindex="-98">
                <option disabled="disabled" selected="selected">Seçiniz!</option>
                @foreach($birimler as $secili_birim)
                  <option value="{{$secili_birim->id}}" @if(old('birim_id') == $secili_birim->id) selected="selected" @endif>{{$secili_birim->birim_adi}}</option>
                @endforeach
              </select>
              <span class="form-text text-muted">Lütfen oda tanımlamak istediğiniz birimi seçin.</span>
              @error('birim_id')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group row">
              <label>Oda Tipi:</label>
              <select name="oda_tipi_id" class="form-control kt-selectpicker @error('oda_tipi_id') is-invalid @enderror" data-size="7" data-live-search="true" tabindex="-98">
                <option disabled="disabled" selected="selected">Seçiniz!</option>
                @foreach($oda_tipleri as $secili_oda_tipi)
                  <option value="{{$secili_oda_tipi->id}}" @if(old('oda_tipi_id') == $secili_oda_tipi->id) selected="selected" @endif>{{$secili_oda_tipi->oda_tipi_adi}}</option>
                @endforeach
              </select>
              <span class="form-text text-muted">Lütfen tanımlamak istediğiniz odanın tipini seçin.</span>
              @error('oda_tipi_id')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>

        </div>
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