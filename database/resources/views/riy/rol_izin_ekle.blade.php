@extends('riy.master')

@section('breadcrumb')
> <a href="{{ route('riy_roller') }}">ROLLER</a> > ROLE İZİN EKLE
@endsection

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <form class="kt-form" id="kt_form" method="POST" action="{{ route('riy_rol_izin_ekle', $rol->id) }}">
      @csrf
    <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" style="color:white; background: #263238; !important" id="kt_page_portlet">
      <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
          <h3 style="color:#22B9FF;">{{$rol->name}} rolü için tanımlı izinler</h3>
        </div>
        <div class="kt-portlet__head-toolbar">
          <div class="btn-group">
            <button type="submit" class="btn btn-brand">
              <i class="la la-check"></i>
              <span class="kt-hidden-mobile">Kaydet</span>
            </button>
          </div>
        </div>
      </div>
      <div class="kt-portlet__body">
          <div class="row">
            <div class="col-xl-2"></div>
            <div class="col-xl-8">
              <div class="kt-section">
                <div class="kt-section__body">
                  <div class="form-group row">
                    <div class="col-8">
                      <h3 class="kt-section__title kt-section__title-lg" style="color:white;">Envanter Takip Sistemi'nde Bulunan İzinler:</h3>
                    </div>
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--gold" data-toggle="kt-popover" data-content="Envanter Takip Sistemi içerisindeki herhangi bir izne sahip olan kullanıcının sahip olması gereken üst izin." data-original-title="İzin Açıklaması">
                        <input type="checkbox" name="permission[]" value="6" <?php echo ($rol->hasPermissionTo('ets.goster')) ? 'checked' : ''; ?>> Envanter Takip Sistemi Göster
                        <span></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    @foreach($ets_permissions as $permission)
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand" data-toggle="kt-popover" data-content="{{$permission->description}}" data-original-title="İzin Açıklaması">
                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}" <?php echo ($rol->hasPermissionTo($permission->name)) ? 'checked' : ''; ?>> {{$permission->display_name}}
                        <span></span>
                      </label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
              <div class="kt-section">
                <div class="kt-section__body">
                  <div class="form-group row">
                    <div class="col-8">
                      <h3 class="kt-section__title kt-section__title-lg" style="color:white;">Rol ve İzin Yönetimi'nde Bulunan İzinler:</h3>
                    </div>
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--gold" data-toggle="kt-popover" data-content="Rol ve İzin Yönetimi içerisindeki herhangi bir izne sahip olan kullanıcının sahip olması gereken üst izin." data-original-title="İzin Açıklaması">
                        <input type="checkbox" name="permission[]" value="7" <?php echo ($rol->hasPermissionTo('riy.goster')) ? 'checked' : ''; ?>> Rol ve İzin Yönetimi Göster
                        <span></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    @foreach($riy_permissions as $permission)
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand" data-toggle="kt-popover" data-content="{{$permission->description}}" data-original-title="İzin Açıklaması">
                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}" <?php echo ($rol->hasPermissionTo($permission->name)) ? 'checked' : ''; ?>> {{$permission->display_name}}
                        <span></span>
                      </label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
              <div class="kt-section">
                <div class="kt-section__body">
                  <div class="form-group row">
                    <div class="col-8">
                      <h3 class="kt-section__title kt-section__title-lg" style="color:white;">SEGBİS Takip Sistemi'nde Bulunan İzinler:</h3>
                    </div>
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--gold" data-toggle="kt-popover" data-content="SEGBİS Takip Sistemi içerisindeki herhangi bir izne sahip olan kullanıcının sahip olması gereken üst izin." data-original-title="İzin Açıklaması">
                        <input type="checkbox" name="permission[]" value="9" <?php echo ($rol->hasPermissionTo('segbis.goster')) ? 'checked' : ''; ?>> SEGBİS Takip Sistemi Göster
                        <span></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    @foreach($segbis_permissions as $permission)
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand" data-toggle="kt-popover" data-content="{{$permission->description}}" data-original-title="İzin Açıklaması">
                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}" <?php echo ($rol->hasPermissionTo($permission->name)) ? 'checked' : ''; ?>> {{$permission->display_name}}
                        <span></span>
                      </label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
              <div class="kt-section">
                <div class="kt-section__body">
                  <div class="form-group row">
                    <div class="col-8">
                      <h3 class="kt-section__title kt-section__title-lg" style="color:white;">Büro Personeli Yönetim Sistemi'nde Bulunan İzinler:</h3>
                    </div>
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--gold" data-toggle="kt-popover" data-content="SEGBİS Takip Sistemi içerisindeki herhangi bir izne sahip olan kullanıcının sahip olması gereken üst izin." data-original-title="İzin Açıklaması">
                        <input type="checkbox" name="permission[]" value="8" <?php echo ($rol->hasPermissionTo('buro.goster')) ? 'checked' : ''; ?>> Büro Personeli Yönetim Sistemi Göster
                        <span></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    @foreach($buro_permissions as $permission)
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand" data-toggle="kt-popover" data-content="{{$permission->description}}" data-original-title="İzin Açıklaması">
                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}" <?php echo ($rol->hasPermissionTo($permission->name)) ? 'checked' : ''; ?>> {{$permission->display_name}}
                        <span></span>
                      </label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
              <div class="kt-section">
                <div class="kt-section__body">
                  <div class="form-group row">
                    <div class="col-8">
                      <h3 class="kt-section__title kt-section__title-lg" style="color:white;">Bina Yönetim Sistemi'nde Bulunan İzinler:</h3>
                    </div>
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--gold" data-toggle="kt-popover" data-content="Bina Yönetim Sistemi içerisindeki herhangi bir izne sahip olan kullanıcının sahip olması gereken üst izin." data-original-title="İzin Açıklaması">
                        <input type="checkbox" name="permission[]" value="11" <?php echo ($rol->hasPermissionTo('bys.goster')) ? 'checked' : ''; ?>> Bina Yönetim Sistemi Göster
                        <span></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    @foreach($bys_permissions as $permission)
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand" data-toggle="kt-popover" data-content="{{$permission->description}}" data-original-title="İzin Açıklaması">
                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}" <?php echo ($rol->hasPermissionTo($permission->name)) ? 'checked' : ''; ?>> {{$permission->display_name}}
                        <span></span>
                      </label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
              <div class="kt-section">
                <div class="kt-section__body">
                  <div class="form-group row">
                    <div class="col-8">
                      <h3 class="kt-section__title kt-section__title-lg" style="color:white;">Telefon Yönetim Sistemi'nde Bulunan İzinler:</h3>
                    </div>
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--gold" data-toggle="kt-popover" data-content="Telefon Yönetim Sistemi içerisindeki herhangi bir izne sahip olan kullanıcının sahip olması gereken üst izin." data-original-title="İzin Açıklaması">
                        <input type="checkbox" name="permission[]" value="19" <?php echo ($rol->hasPermissionTo('tys.goster')) ? 'checked' : ''; ?>> Telefon Yönetim Sistemi Göster
                        <span></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    @foreach($tys_permissions as $permission)
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand" data-toggle="kt-popover" data-content="{{$permission->description}}" data-original-title="İzin Açıklaması">
                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}" <?php echo ($rol->hasPermissionTo($permission->name)) ? 'checked' : ''; ?>> {{$permission->display_name}}
                        <span></span>
                      </label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2"></div>
          </div>
        
      </div>
    </div>

    </form>
  </div>
</div>

@endsection


