@extends('riy.master')

@section('breadcrumb')
> KULLANICI ARA
@endsection

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Kullanıcı Ara
          </h3>
        </div>
      </div>
      <form class="kt-form" method="POST" action="{{ route('riy_kullanici_ara') }}">
        @csrf
        <div class="kt-portlet__body">
            <div class="form-group">
                <label>Sicil veya Ad Soyad:</label>
                <input type="text" class="form-control @error('search') is-invalid @enderror" name="search" autocomplete="off" value="{{ old('search') }}">
                <span class="form-text text-muted">Lütfen kullanıcı sicili veya Ad Soyadı ile arama yapın.</span>
                @error('search')
                <div class="error" style="color: red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">Kullanıcı Ara</button>
          </div>
        </div>
      </form>
	</div>
  </div>
</div>

@endsection