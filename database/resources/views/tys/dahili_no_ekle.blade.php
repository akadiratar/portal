@extends('tys.master')

@section('breadcrumb')
> ODA NUMARA EŞLEŞTİRME
@endsection

@prepend('js')
  <script src="{{ asset('assets/js/pages/crud/forms/widgets/tagify.js') }}" type="text/javascript"></script>
@endprepend

@section('icerik')

<div class="row">
  <div class="col-lg-12">
      <div class="kt-portlet">
        <form class="kt-form kt-form--label-right" method="POST" action="{{ route('tys_dahili_no_ekle_post', $oda->id) }}">
          <div class="kt-portlet__body">
            <code style="font-size: 30px;">
              @if($oda->birim_id == NULL)
                  {{$oda->oda_kodu}} >> Kayıtlı Değil
              @else
                {{$oda->oda_kodu}} >> {{$oda->birim->birim_adi}} {{$oda->tip->oda_tipi_adi}}
              @endif 
            </code><br>

            @csrf

            <div class="form-group form-group-last row" style="display: none;">
              <label class="col-form-label col-lg-3 col-sm-12"></label>
              <div class="col-lg-6 col-md-9 col-sm-12">
                <input id="kt_tagify_1">
                <div class="kt-margin-t-10">
                  <a href="javascript:;" id="kt_tagify_1_remove" class="btn btn-label-brand btn-bold"></a>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label>Yeni Eklenecek Numaralar:</label>
              <input id="kt_tagify_3" name='dahililer' class='tagify tagify--outside' placeholder='Numara yazarak Enter a basın...'>
            </div>
          </div>
          <div class="kt-portlet__foot">
            <div class="kt-form__actions">
              <button type="submit" class="btn btn-primary">Kaydet</button> <a href="{{route('tys_ara', $oda->oda_kodu)}}" style="color: white;" class="btn btn-danger">İptal</a>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection