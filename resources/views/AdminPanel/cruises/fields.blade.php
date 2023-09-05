@isset($cruise)
    @method('PUT')
    <input type="hidden" value="{{ $cruise->id }}" name="id">
@endisset
@csrf
<div class="card-body border-top p-9">
    <ul class="nav nav-light-success nav-pills" id="myTab" role="tablist">

        @foreach ( LaravelLocalization::getSupportedLocales() as $name => $value)

        <li class="nav-item" data-bs-toggle="tab">
            <a class="nav-link {{LaravelLocalization::getCurrentLocale() == $name ?'active':''}}" id="{{$name}}-tab"
                data-bs-toggle="tab" href="#{{$name}}" role="tab" aria-controls="{{$name}}"
                aria-selected="{{ LaravelLocalization::getCurrentLocale() == $name  ? 'true' : 'false'}}">{{$value['native']}}</a>
        </li>

        @endforeach
    </ul>
    <div class="tab-content mt-5" id="myTabContent">
        @foreach ( LaravelLocalization::getSupportedLocales() as $name => $value)
        <div class="tab-pane fade {{(LaravelLocalization::getCurrentLocale() == $name) ? 'show active':''}}" id="{{$name}}"
            role="tabpanel" aria-labelledby="{{$name}}-tab">

            <!--begin::Input group-->
            <div class="row mb-3">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.info') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <textarea name="{{$name}}[info]" class="summernote"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                                placeholder="{{ __('lang.info') }}">{{ isset($cruise)? $cruise->getTranslation($name)->info : '' }} </textarea>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-3">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.features') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <textarea name="{{$name}}[features]" class="summernote"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                                placeholder="{{ __('lang.features') }}">{{ isset($cruise)? $cruise->getTranslation($name)->features : '' }} </textarea>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-3">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.dinning') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <textarea name="{{$name}}[dinning]" class="summernote"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                                placeholder="{{ __('lang.dinning') }}">{{ isset($cruise)? $cruise->getTranslation($name)->dinning : '' }} </textarea>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

        </div>
        @endforeach


        <!--begin::Input group-->
        <div class="row mb-3">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.name') }}</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                        <input name="name"
                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                            placeholder="{{ __('lang.name') }}" value="{{ $cruise->name ?? '' }}">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-3">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.location') }}</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                        <input name="location" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                            placeholder="{{ __('lang.location') }}" value="{{ $cruise->location ?? '' }}">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-3">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.media') }}</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                        <input name="media_link" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                            placeholder="https://www.youtube.com" value="{{ $cruise->media_link ?? '' }}">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.facilite') }}</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                        <select id="kt_select2_3"
                            class="js-example-basic-multiple form-control select2 select2-hidden-accessible"
                            name="facility_id[]" multiple="multiple">
                            <option value='all'>{{ __('lang.selectall') }}</option>
                            @foreach ($facilites as $facility)
                            <option value="{{ $facility->id }}" {{ isset($cruisFacility) && in_array($facility->id,
                                $cruisFacility) ? 'selected' : '' }}>
                                {{$facility->title }}
                            </option>
                            @endforeach

                        </select>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <hr>
            <!--begin::Input group-->
            <div class="row mb-3">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.capines') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                        <!--begin::Col-->
                        <div class="fv-row mb-8 col-2">
                            <div class="btn btn-secondary btn-xs add-select py-0" counter="{{ isset($cruise)? $cruise->capines->pluck('pivot')->sortByDesc('id')->first()->id:0 }}">+</div>
                        </div>
                        <!--end::Col-->
                <!--end::Col-->
                <div class="row mb-3 capines">
                    @isset($cruise->capines)
                        @foreach ($cruise->capines as $capine )
                            <div class="row">
                                <input type="hidden" name="capines[{{$capine->pivot->id}}][id]" value="{{$capine->pivot->id}}">
                                <div class="fv-row mb-8 col-3">
                                    <input type="number" step="1" placeholder="{{__('lang.number')}}" name="capines[{{$capine->pivot->id}}][number]" value="{{$capine->pivot->number}}"
                                        autocomplete="off" class="form-control bg-transparent" />
                                    <!--end::Name-->
                                </div>

                                <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                    <select class="form-select form-select-solid " data-control="select2" data-hide-search="true"
                                        data-placeholder="Select a Team Member" name="capines[{{$capine->pivot->id}}][type]"
                                        data-select2-id="select2-data-72-ljg2" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                        <option value="{{$capine->id}}" selected data-select2-id="select2-data-74-kng8">{{$capine->type}}</option>
                                        @foreach ($capines as $capin )
                                        <option value="{{$capin->id}}" data-select2-id="select2-data-74-kng8">{{$capin->type}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="fv-row mb-8 col-3">
                                    <input type="number" step="1" placeholder="{{__('lang.capacity')}}" name="capines[{{$capine->pivot->id}}][capacity]"
                                        value="{{$capine->pivot->capacity}}" autocomplete="off" class="form-control bg-transparent" />
                                    <!--end::Name-->
                                </div>

                                <div class="fv-row mb-8 col-3">
                                    <span class="btn btn-danger btn-xs pull-right btn-del-select py-0 del-capine" data-capine-id="{{ $capine->pivot->id }}" ><i class="bi bi-file-x-fill"></i></span>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
            <!--end::Input group-->
        <hr>
        <!--begin::Input group-->
        <div class="row mb-3">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.iteneraries') }}</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="fv-row mb-8 col-2">
                <div class="btn btn-secondary btn-xs add-select-itenerarie py-0"
                    counter="{{ (isset($cruise) && $cruise->iteneraries->count()>0)? $cruise->iteneraries->sortByDesc('id')->first()->id:0 }}">+</div>
            </div>
            <!--end::Col-->
            <div class="row mb-3 iteneraries">
                @if(isset($cruise) && isset($cruise->iteneraries))
                    @foreach ($cruise->iteneraries as $i=>$itenerarie)
                        <div class="row">
                            <input type="hidden" name="iteneraries[{{$i}}][id]" value="{{$itenerarie->id}}">
                            <div class="col-8 d-flex">
                                @foreach ( LaravelLocalization::getSupportedLocales() as $name => $value)
                                            <input name="iteneraries[{{$i}}][{{$name}}][name]" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0  mr-5"
                                                placeholder="{{ __('lang.name') }}" value="{{ $itenerarie->getTranslationOrNew($name)->name ?? '' }}">
                                @endforeach
                            </div>
                            <!--end::Input group-->
                            <div class="col-4">
                                <span class="btn btn-danger btn-xs pull-right btn-del-select py-0 del-itenerarie"
                                    data-itenerarie-id="{{ $itenerarie->id }}"><i class="bi bi-file-x-fill"></i></span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <!--end::Input group-->

        <hr>
        <!--begin::Input group-->
        <div class="fv-row mb-10 fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-block fw-semibold fs-6 mb-5">
                <span class="required">{{__('lang.main_photo')}}</span>
            </label>
            <!--end::Label-->
            <!--begin::Image input placeholder-->
            <style>
                .image-input-placeholder {
                    background-image: url({{asset('assets/media/svg/files/blank-image.svg')}})
                }

                [data-bs-theme="dark"] .image-input-placeholder {
                    background-image: url({{asset('assets/media/svg/files/blank-image-dark.svg')}});
                }
            </style>
            <!--end::Image input placeholder-->
            <!--begin::Image input-->
            <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper w-125px h-125px" @isset($cruise->main_photo)
                    style='background-image:url({{$cruise->main_photo}})'@endisset>
                </div>
                <!--end::Preview existing avatar-->
                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar"
                    data-bs-original-title="Change avatar" data-kt-initialized="1">
                    <i class="ki-duotone ki-pencil fs-7">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <!--begin::Inputs-->
                    <input type="file" name="main_photo" accept=".png, .jpg, .jpeg">
                    <input type="hidden" name="avatar_remove">
                    <!--end::Inputs-->
                </label>
                <!--end::Label-->
                <!--begin::Cancel-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar"
                    data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                    <i class="ki-duotone ki-cross fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </span>
                <!--end::Cancel-->
                <!--begin::Remove-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar"
                    data-bs-original-title="Remove avatar" data-kt-initialized="1">
                    <i class="ki-duotone ki-cross fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </span>
                <!--end::Remove-->
            </div>
            <!--end::Image input-->
            <!--begin::Hint-->
            <div class="form-text">{{__('lang.allowedsettingtypes')}}</div>
            <!--end::Hint-->
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <!--end::Input group-->

        <!--begin:inputGroup-->
        <div class="fv-row mb-8">
            <!--begin::Label-->
            <label class="d-block fw-semibold fs-6 mb-5">
                <span class="required">{{__('lang.photos')}}</span>
            </label>
            <!--end::Label-->
            <!--begin::Dropzone-->
            <div class="dz-clickable dropzone" id="kt_modal_create_project_settings_logo">
                <!--begin::Message-->
                <div class="dz-message needsclick">
                </div>
                    @if(isset($cruise) && count($cruise->photos) > 0 )
                        @foreach ($cruise->photos as  $photo)
                            <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                <div class="dz-image"><img data-dz-thumbnail="" alt="{{$cruise->title}}" src="{{$photo->photo}}" >
                                </div>
                                {{-- <div class="dz-details">
                                    <div class="dz-size"><span data-dz-size=""><strong>0.3</strong> MB</span></div>
                                    <div class="dz-filename"><span data-dz-name="">LOGO-04.png</span></div>
                                </div> --}}
                                <div class="dz-progress"> <span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span> </div>
                                <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                                <div class="dz-success-mark"> <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>Check</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <path
                                                d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                                                stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path>
                                        </g>
                                    </svg> </div>
                                <div class="dz-error-mark"> <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>Error</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                                <path
                                                    d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <a class="btn btn-danger btn-sm mt-1 delete-button delete" data-image-id="{{$photo->id}}"><i
                                        class="bi bi-file-x-fill"></i></a>
                            </div>
                        @endforeach

                    @else
                        <!--begin::Icon-->
                        <i class="ki-duotone ki-file-up fs-3hx text-primary">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <!--end::Icon-->
                        <!--begin::Info-->
                        <div class="ms-4">
                            <h3 class="dfs-3 fw-bold text-gray-900 mb-1">{{ __('lang.dropfiles') }}</h3>
                            {{-- <span class="fw-semibold fs-4 text-muted">Upload up to 10 files</span> --}}
                        </div>
                        <!--end::Info-->
                    @endif
            </div>
            <!--end::Dropzone-->
        </div>
        <!-- end::inputGroup-->


        <!--begin:inputGroup-->
        <div class="fv-row mb-8">
            <!--begin::Label-->
            <label class="d-block fw-semibold fs-6 mb-5">
                <span class="required">{{__('lang.feature_photos')}}</span>
            </label>
            <!--end::Label-->
            <!--begin::Dropzone-->
            <div class="dz-clickable dropzone" id="kt_modal_create_project_settings_2_logo">
                <!--begin::Message-->
                <div class="dz-message needsclick">
                </div>
                @if(isset($cruise) && count($cruise->featurePhotos) > 0 )
                @foreach ($cruise->featurePhotos as $photo)
                <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                    <div class="dz-image"><img data-dz-thumbnail="" alt="{{$cruise->title}}" src="{{$photo->photo}}">
                    </div>
                    {{-- <div class="dz-details">
                        <div class="dz-size"><span data-dz-size=""><strong>0.3</strong> MB</span></div>
                        <div class="dz-filename"><span data-dz-name="">LOGO-04.png</span></div>
                    </div> --}}
                    <div class="dz-progress"> <span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span>
                    </div>
                    <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                    <div class="dz-success-mark"> <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>Check</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <path
                                    d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                                    stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF">
                                </path>
                            </g>
                        </svg> </div>
                    <div class="dz-error-mark"> <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>Error</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                    <path
                                        d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <a class="btn btn-danger btn-sm mt-1 delete-button delete-feature" data-image-id="{{$photo->id}}"><i
                            class="bi bi-file-x-fill"></i></a>
                </div>
                @endforeach

                @else
                <!--begin::Icon-->
                <i class="ki-duotone ki-file-up fs-3hx text-primary">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <!--end::Icon-->
                <!--begin::Info-->
                <div class="ms-4">
                    <h3 class="dfs-3 fw-bold text-gray-900 mb-1">{{ __('lang.dropfiles') }}</h3>
                    {{-- <span class="fw-semibold fs-4 text-muted">Upload up to 10 files</span> --}}
                </div>
                <!--end::Info-->
                @endif
            </div>
            <!--end::Dropzone-->
        </div>
        <!-- end::inputGroup-->


    </div>

    <script>
        Dropzone.autoDiscover = false;
        var uploadedDocumentMap = {};
        var myDropzone = new Dropzone("#kt_modal_create_project_settings_logo", {
            url: '{{url(LaravelLocalization::getCurrentLocale()."/image/upload/cruises")}}',
            paramName: "photo",
            //maxFilesize: 2,
            acceptedFiles: ".jpg,.png,.gif",
            init: function () {

                // Get the CSRF token from the meta tag
                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                var _this = this; // Save the reference to Dropzone instance to access it in other functions

                this.on("sending", function (file, xhr, formData) {
                    formData.append("_token", csrfToken);
                });

                this.on("success", function (file, response) {
                    $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
                    uploadedDocumentMap[file.name] = response.name
                    // Save the image ID returned from the server to a data attribute on the delete button
                    var deleteButton = file.previewElement.querySelector(".delete-button");
                    deleteButton.setAttribute("data-image-id", response.name);
                });

                this.on("error", function (file, errorMessage) {
                    console.error(errorMessage);
                });

                this.on("addedfile", function (file) {
                    // Create a delete button and append it to the file preview element
                    var deleteButton = Dropzone.createElement("<button class='btn btn-danger btn-sm mt-1 delete-button'><i class='bi bi-file-x-fill'></i></button>");

                    // Add event listener to the delete button
                    deleteButton.addEventListener("click", function () {
                        // Retrieve the image ID from the data attribute and use it for deletion
                        var imageId = this.getAttribute("data-image-id");

                        // Remove the file from Dropzone and delete the preview
                        _this.removeFile(file);
                        $('form').find('input[name="photos[]"][value="' + imageId + '"]').remove()
                        // Additional code to handle server-side image deletion
                        // You can make an AJAX call to delete the image from the server
                    });

                    file.previewElement.appendChild(deleteButton);
                });

                this.on("removedfile", function (file) {
                    // Additional code to handle server-side image deletion
                    // You can make an AJAX call to delete the image from the server
                });
            },
        });
    </script>

    <script>
        Dropzone.autoDiscover = false;
            var uploadedDocumentMap = {};
            var myDropzone = new Dropzone("#kt_modal_create_project_settings_2_logo", {
                url: '{{url(LaravelLocalization::getCurrentLocale()."/image/upload/cruises")}}',
                paramName: "photo",
                //maxFilesize: 2,
                acceptedFiles: ".jpg,.png,.gif",
                init: function () {

                    // Get the CSRF token from the meta tag
                    var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                    var _this = this; // Save the reference to Dropzone instance to access it in other functions

                    this.on("sending", function (file, xhr, formData) {
                        formData.append("_token", csrfToken);
                    });

                    this.on("success", function (file, response) {
                        $('form').append('<input type="hidden" name="feature_photos[]" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                        // Save the image ID returned from the server to a data attribute on the delete button
                        var deleteButton = file.previewElement.querySelector(".delete-button");
                        deleteButton.setAttribute("data-image-id", response.name);
                    });

                    this.on("error", function (file, errorMessage) {
                        console.error(errorMessage);
                    });

                    this.on("addedfile", function (file) {
                        // Create a delete button and append it to the file preview element
                        var deleteButton = Dropzone.createElement("<button class='btn btn-danger btn-sm mt-1 delete-button'><i class='bi bi-file-x-fill'></i></button>");

                        // Add event listener to the delete button
                        deleteButton.addEventListener("click", function () {
                            // Retrieve the image ID from the data attribute and use it for deletion
                            var imageId = this.getAttribute("data-image-id");

                            // Remove the file from Dropzone and delete the preview
                            _this.removeFile(file);
                            $('form').find('input[name="feature_photos[]"][value="' + imageId + '"]').remove()
                            // Additional code to handle server-side image deletion
                            // You can make an AJAX call to delete the image from the server
                        });

                        file.previewElement.appendChild(deleteButton);
                    });

                    this.on("removedfile", function (file) {
                        // Additional code to handle server-side image deletion
                        // You can make an AJAX call to delete the image from the server
                    });
                },
            });
    </script>

    <script>
        $('.delete').each(function(e){
            $(this).on('click',function(){
                let button = this;
                $.ajax({
                url :"{{ url(LaravelLocalization::getCurrentLocale().'/cruise/image/delete/') }}/" + this.getAttribute('data-image-id'),
                type: 'GET',
                headers: {
                '__token':'{{csrf_token()}}',
                },
                dataType: 'json',
                success: function(data) {
                button.parentElement.remove();
                },
                error: function(error) {
                console.error(error);
                }
                });
            });

        });
    </script>

    <script>
        $('.delete-feature').each(function(e){
                $(this).on('click',function(){
                    let button = this;
                    $.ajax({
                    url :"{{ url(LaravelLocalization::getCurrentLocale().'/cruise/feature/image/delete/') }}/" + this.getAttribute('data-image-id'),
                    type: 'GET',
                    headers: {
                    '__token':'{{csrf_token()}}',
                    },
                    dataType: 'json',
                    success: function(data) {
                    button.parentElement.remove();
                    },
                    error: function(error) {
                    console.error(error);
                    }
                    });
                });

            });
    </script>


    <script>
        $('.del-capine').each(function(e){
                $(this).on('click',function(){
                    let button = this;
                    $.ajax({
                    url :"{{ url(LaravelLocalization::getCurrentLocale().'/cruise/capine/delete/') }}/" + this.getAttribute('data-capine-id'),
                    type: 'GET',
                    headers: {
                    '__token':'{{csrf_token()}}',
                    },
                    dataType: 'json',
                    success: function(data) {
                    button.parentElement.parentElement.remove();
                    },
                    error: function(error) {
                    console.error(error);
                    }
                    });
                });

            });
    </script>
    <script>
        $('.del-itenerarie').each(function(e){
                    $(this).on('click',function(){
                        let button = this;
                        $.ajax({
                        url :"{{ url(LaravelLocalization::getCurrentLocale().'/cruise/itenerarie/delete/') }}/" + this.getAttribute('data-itenerarie-id'),
                        type: 'GET',
                        headers: {
                        '__token':'{{csrf_token()}}',
                        },
                        dataType: 'json',
                        success: function(data) {
                        button.parentElement.parentElement.remove();
                        },
                        error: function(error) {
                        console.error(error);
                        }
                        });
                    });

                });
    </script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "{{ __('lang.select') }}",
                allowClear: true
            });

            // Add event listener for the "Select All" option
            $('.js-example-basic-multiple').on('select2:select', function(e) {
                if (e.params.data.id === 'all') {
                    $(this).find('option').prop('selected', true);
                    $(this).trigger('change');
                }
            });
        });
    </script>

    <script>
            $(document).on('click','.add-select', function(){
                var counter = $('.add-select').attr('counter');
                ++counter;
                $('.capines').append(`
                <div class="row">
                    <div class="fv-row mb-8 col-3">
                        <input type="hidden" name="capines[${counter}][id]" value="${counter}">
                        <input type="number" step="1" placeholder="{{__('lang.number')}}" name="capines[${counter}][number]" autocomplete="off"
                            class="form-control bg-transparent" />
                        <!--end::Name-->
                    </div>

                    <div class="col-lg-3 fv-row fv-plugins-icon-container">
                        <select class="form-select form-select-solid " data-control="select2" data-hide-search="true"
                            data-placeholder="Select a Team Member" name="capines[${counter}][type]" data-select2-id="select2-data-72-ljg2" tabindex="-1"
                            aria-hidden="true" data-kt-initialized="1">
                            @foreach ($capines as $capine )
                                <option value="{{$capine->id}}" data-select2-id="select2-data-74-kng8">{{$capine->type}}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="fv-row mb-8 col-3">
                            <input type="number" step="1" placeholder="{{__('lang.capacity')}}" name="capines[${counter}][capacity]"
                                autocomplete="off" class="form-control bg-transparent" />
                            <!--end::Name-->
                        </div>

                    <div class="fv-row mb-8 col-3">
                        <span class="btn btn-danger btn-xs pull-right btn-del-select py-0"><i class="bi bi-file-x-fill"></i></span>
                    </div>
                </div>
                `)
                $('.add-select').attr('counter',counter);

                $(this).parent().parent().find(".btn-del-select").click(function(e) {
                    $(this).parent().parent().remove();
                });
            });
    </script>

    <script>
                $(document).on('click','.add-select-itenerarie', function(){
                    var counter = $('.add-select-itenerarie').attr('counter');
                    ++counter;
                    $('.iteneraries').append(`
                    <div class="row">
                        <input type="hidden" name="iteneraries[${counter}][id]" value="${counter}">
                        <div class="col-8 d-flex">
                            @foreach ( LaravelLocalization::getSupportedLocales() as $name => $value)
                                <input name="iteneraries[${counter}][{{$name}}][name]"
                                        class="form-control  form-control-lg form-control-solid mb-3 mb-lg-0 mr-5 "
                                        placeholder="{{ __('lang.name') }} {{$name}}">
                            @endforeach
                        </div>
                        <div class="col-2">
                            <span class="btn btn-danger btn-xs pull-right btn-del-select-itenerarie py-0 del" data-itenerarie-id="${counter}"><i
                                    class="bi bi-file-x-fill"></i></span>
                        </div>
                    </div>
                    `)
                    $('.add-select-itenerarie').attr('counter',counter);

                    $(this).parent().parent().find(".btn-del-select-itenerarie").click(function(e) {
                        $(this).parent().parent().remove();
                    });
                });
    </script>
