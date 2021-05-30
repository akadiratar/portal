@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Birimlerin Kullandığı Sarf Malzeme Sayıları</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>


<!-- Default table -->
<div class="panel panel-default">
<div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i> Birimlerin Kullandığı Sarf Malzeme Sayıları</h6></div>
<div class="table-responsive">
  <table class="table">
      <thead>
          <tr>
              <th>#</th>
              <th>Birim Adı</th>
              <th>Kullandığı Adet</th>
          </tr>
      </thead>
      <tbody>
         <?php $i = 1; ?>
        @foreach ($smbirimsayilari as $birim)
          <tr>
              <td>{{$i}}</td>
              <td>{{$birim->smtakipbirim->birim_adi}}</td>
              <td>{{$birim->toplam}}</td>
          </tr>
          <?php $i= $i+1; ?>
        @endforeach
      </tbody>
  </table>
</div>
</div>
<!-- /default table -->
             
@stop