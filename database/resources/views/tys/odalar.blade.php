@extends('tys.master')

@section('breadcrumb')
> <a href="{{ route('tys_odalar') }}">ODALAR</a>
@endsection

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Odalar
          </h3>
        </div>
      </div>
      <div class="kt-portlet__body">
        <h6>{{ $odalar->links() }}</h6>
        <div class="kt-section">
          <div class="kt-section__content">
            <table class="table table-sm table-head-bg-brand">
              <thead class="thead-inverse">
                <tr>
                  <th>Blok Adı</th>
                  <th>Kat Adı</th>
                  <th>Oda Numarası</th>
                  <th>Oda Kodu</th>
                </tr>
              </thead>
              <tbody>
                @foreach($odalar as $oda)
                <tr>
                  <td>{{$oda->kat->blok->blok_adi}} BLOK</td>
                  <td>{{$oda->kat->kat_adi}}. KAT</td>
                  <td>{{$oda->oda_numarasi}} NUMARALI ODA</td>
                  <td>{{$oda->oda_kodu}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <h6>{{ $odalar->links() }}</h6>
      </div>
    </div>
  </div>
</div>
@endsection