<div>
    <div class="row">
        <div class="col-lg-12">
          <div class="kt-portlet">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                  ROL TANIMLAMA
                </h3>
              </div>
            </div>
            <div class="dual-listbox kt-dual-listbox-4">
              <input class="dual-listbox__search dual-listbox__search--hidden" placeholder="Search">
              <div class="dual-listbox__container">
                <div class="dual-listbox__buttons">
                </div>
                <div>
                  <div class="dual-listbox__title">Eklenmeyen Roller</div>
                  <ul class="dual-listbox__available">
                    @if($unselectedList<>null)
                        @foreach($unselectedList as $selected)
                            <li wire:click="selectedItem('{{ $selected }}')" class="dual-listbox__item dual-listbox__item">{{ $selected }}</li>
                        @endforeach
                    @endif
                  </ul>
                </div>
                <div class="dual-listbox__buttons">
                </div>
                <div>
                  <div class="dual-listbox__title">Eklenecek Roller</div>
                  <ul class="dual-listbox__selected">
                    @if($selectedList<>null)
                        @foreach($selectedList as $selected)
                            <li wire:click="unselectedItem('{{ $selected }}')" class="dual-listbox__item dual-listbox__item">{{ $selected }}</li>
                        @endforeach
                    @endif
                  </ul>
                </div>
              </div>
            </div>
            <div class="kt-portlet__foot">
              <div class="kt-form__actions">
                <button wire:click="gonder" class="btn btn-info" id="kt_sweetalert_rol_kaydet">Kaydet</button>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
