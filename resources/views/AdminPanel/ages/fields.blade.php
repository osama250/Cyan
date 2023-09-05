@isset($age)
@method('PUT')
<input type="hidden" value="{{ $age->id }}" name="id">
@endisset
@csrf
<div class="card-body border-top p-9">
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.from') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <input type="number" step="1" name="from" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                value="{{ $age->from ?? '' }}" placeholder="{{__('lang.from')}}">
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
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.to') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <input type="number" step="1" name="to"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ $age->to ?? '' }}"
                                placeholder="{{__('lang.to')}}">
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
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.value') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <input type="number" step="1" name="value" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                value="{{ $age->value ?? '' }}" placeholder="{{__('lang.value')}}">
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
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.type') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <select class="form-select form-select-solid " data-control="select2" data-hide-search="true"
                                data-placeholder="Select a Team Member" name="type" data-select2-id="select2-data-72-ljg2"
                                tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                <option value="1" data-select2-id="select2-data-74-kng8" {{isset($age) && $age->type =='1'?
                                    'selected':''}} >{{__('lang.amount')}}</option>
                                <option value="0" data-select2-id="select2-data-131-9yfh" {{isset($age) && $age->type =='0'?
                                    'selected':''}} >{{__('lang.percentage')}}</option>

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
</div>

