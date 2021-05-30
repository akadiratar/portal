@extends('yonetim.kalip')

@section('icerik')

<script type="text/javascript">
jQuery(document).ready(function ($) {

  $("#secili_ust_birim").change(function(event) {
        var deger = $(this).val();

         $.ajax({

             url: deger, 

             type: "GET", 

             contentType: false, 

             cache: false, 

             processData:false, 

             success: function(data) 

             {

                $("#birimler").html(data); 
          }
        });

        return false;
    });
});

</script>

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
            <li>Sarf Malzeme Birim Sorgula</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >

  <div class="form-group">
    <label class="col-sm-2 control-label">Üst Birim: </label>
    <div class="col-sm-10">
      <select name="sm_ustbirim_id" class="form-control" id="secili_ust_birim" required>
          <option disabled selected value="">Seçiniz</option>
          @foreach ($ustbirimler as $ustbirim)
            <option value="{{ route('secili_ust_birim',$ustbirim->id) }}">{{ $ustbirim->ust_birim_adi }}</option>
          @endforeach
      </select>
    </div>
  </div>

  <div class="form-group" id="birimler">

  </div>
  <div class="form-actions text-right">
    <button type="submit" class="btn btn-primary">Sorgula</button>
  </div>
</form>
@stop