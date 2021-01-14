@extends('tys.master')

@section('breadcrumb')
> <a href="{{ route('tys_diger_numaralar') }}">DİĞER NUMARALAR</a> > YENİ NUMARA EKLE
@endsection

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Yeni Numara Ekle
          </h3>
        </div>
      </div>
      <form class="kt-form" method="POST" action="{{ route('tys_yeni_numara_ekle') }}">
      	 @csrf
        <div class="kt-portlet__body">
          <div class="form-group row">
              <label>Numara Tipi:</label>
              <select name="tip" class="form-control @error('tip') is-invalid @enderror" data-size="7" data-live-search="true" tabindex="-98">
                <option disabled="disabled" selected="selected">Seçiniz!</option>
                <option value="FAKS" @if(old('tip') == "FAKS") selected="selected" @endif>FAKS</option>
                <option value="HARİCİ NUMARA" @if(old('tip') == "HARİCİ NUMARA") selected="selected" @endif>HARİCİ NUMARA</option>
              </select>
              <span class="form-text text-muted">Lütfen eklemek istediğiniz numaranın tip seçimini yapın.</span>
              @error('tip')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
          </div>
            <div class="form-group row">
              <label>Numara:</label>
              <input type="text" class="form-control @error('numara') is-invalid @enderror" name="numara" autocomplete="off" value="{{ old('numara') }}" >
              <span class="form-text text-muted">Lütfen yeni numarayı yazın. </span><br>
              @error('numara')
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