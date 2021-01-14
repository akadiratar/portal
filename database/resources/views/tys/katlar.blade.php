@extends('tys.master')

@section('breadcrumb')
> <a href="{{ route('tys_katlar') }}">KATLAR</a>
@endsection

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Katlar
          </h3>
        </div>
      </div>
      <div class="kt-portlet__body">
        <div class="kt-section">
          <div class="kt-section__content">
            <table class="table table-sm table-head-bg-brand">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>Blok Adı</th>
                  <th>Kat Adı</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($katlar as $kat)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$kat->blok->blok_adi}} BLOK</td>
                  <td>{{$kat->kat_adi}}. KAT</td>
                </tr>
                <?php $i = $i + 1; ?>
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