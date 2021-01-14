@extends('tys.master')

@section('breadcrumb')
> <a href="{{ route('tys_birimler') }}">BİRİMLER</a>
@endsection

@section('icerik')
<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Birimler
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
                  <th>Üst Birimi</th>
                  <th>Birim Adı</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($birimler as $birim)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$birim['ust_birimler']}}</td>
                  <td>{{$birim['birim_adi']}}</td>
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