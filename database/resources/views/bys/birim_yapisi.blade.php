@extends('bys.master')

@section('breadcrumb')
> <a href="{{ route('bys_birimler') }}">BİRİMLER</a> > <a href="{{ route('bys_birim_yapisi') }}">BİRİM YAPISI</a>
@endsection

@if(auth()->user()->can('bys.birim_islemleri'))
@section('sub_header')
<a href="{{route('bys_birim_ekle')}}" class="btn btn-label-brand btn-bold">
  BİRİM EKLE
</a>
@endsection
@endif

@prepend('css')
    <link href="{{ asset('assets/plugins/custom/jstree/jstree.bundle.css') }}" rel="stylesheet" type="text/css" />
@endprepend

@prepend('js')
    <script src="{{ asset('assets/plugins/custom/jstree/jstree.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/components/extended/treeview.js') }}" type="text/javascript"></script>
@endprepend

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Birim Yapısı
          </h3>
        </div>
      </div>
      <div class="kt-portlet__body">
        <div id="kt_tree_2" class="tree-demo jstree jstree-2 jstree-default" role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j2_1" aria-busy="false">
          <ul class="jstree-container-ul jstree-children" role="group">
            <li role="treeitem" aria-selected="false" aria-level="1" aria-labelledby="j2_0_anchor" aria-expanded="true" id="j2_0" class="jstree-node jstree-open">
              <i class="jstree-icon jstree-ocl" role="presentation"></i>
              <a class="jstree-anchor" href="#" tabindex="-1" id="j2_0_anchor">
              <i class="jstree-icon jstree-themeicon fa fa-folder kt-font-warning jstree-themeicon-custom" role="presentation"></i>Temel Birimler
              </a>
              
              {{ \App\Models\Birim::treeview(\App\Models\Birim::birim_yapisi($birimler)) }}

            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection