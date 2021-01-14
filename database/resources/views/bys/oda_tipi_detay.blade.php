@extends('bys.master')

@section('breadcrumb')
> ODA TİPİ DETAY
@endsection

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            {{$oda_tipi->oda_tipi_adi}}
          </h3>
        </div>
      </div>
      <div class="kt-portlet__body">
        <div class="kt-section">
          <div class="kt-section__content">
            <table class="table table-sm table-head-bg-brand">
              <thead class="thead-inverse">
                <tr>
                  <th>Oda Numarası</th>
                  <th>Birimi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($odalar as $oda)
                <tr>
                  <td><a href="{{route('bys_oda_ara', $oda->oda_kodu)}}">{{$oda->oda_kodu}}</a></td>
                  <td><a href="{{route('bys_birim_detay', $oda->birim->id)}}">{{$oda->birim->birim_adi}}</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection