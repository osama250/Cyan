    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
        <!--begin::Scroll wrapper-->
        <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">{{ __('lang.dashboard') }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu link-->
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion special rounded w-100">
                                <!--begin:Menu link-->
                                <span class="menu-link ">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-element-plus fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">{{ __('lang.facilite_activity') }}</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <!--end:Menu link-->
                                <!--begin:Menu sub-->
                                <div class="menu-sub menu-sub-accordion" kt-hidden-height="375" style="display: none; overflow: hidden;">
                                    <!--begin:Menu item-->
                                    @if (auth()->user()->can('View Facilite'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('facilites.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.facilite') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                    <!--end:Menu item-->

                                    <!--begin:Menu item-->
                                    @if (auth()->user()->can('View Activity'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('activities.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.activity') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                    <!--end:Menu item-->

                                </div>
                                <!--end:Menu sub-->
                            </div>
                            <!--end:Menu link-->
                            <!--begin:Menu link-->
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion special rounded w-100">
                                <!--begin:Menu link-->
                                <span class="menu-link ">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-element-plus fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">{{ __('lang.pages') }}</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <!--end:Menu link-->
                                <!--begin:Menu sub-->
                                <div class="menu-sub menu-sub-accordion" kt-hidden-height="375" style="display: none; overflow: hidden;">
                                    @if (auth()->user()->can('View Social'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('socials.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.socials') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                    @if (auth()->user()->can('View Messages'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('contactus.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.messages') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                    @if (auth()->user()->can('View Aboutus'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('aboutus.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.aboutus') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                    @if (auth()->user()->can('View Term'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('terms.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.terms') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                    @if (auth()->user()->can('View Policy'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('policies.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.policy') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                    @if (auth()->user()->can('View ContactUs'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('contacts.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.contactus') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                    @if (auth()->user()->can('View Newsletter'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('newsletters.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.newsletter') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                    @if (auth()->user()->can('View Blog'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('blogs.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.blogs') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                    @if (auth()->user()->can('View Cancellation_Policy'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('cancellation_-policies.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.cancel') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link active" href="{{ route('chooseuses.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">{{ __('lang.choose') }}</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link active" href="{{ route('services.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">{{ __('lang.services') }}</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    @if (auth()->user()->can('View Dining'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('dinings.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.dining') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                    @if (auth()->user()->can('View Accommodation'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('accommodations.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.accommodation') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    @endif
                                </div>
                                <!--end:Menu sub-->
                            </div>
                            <!--end:Menu link-->
                            <!--begin:Menu link-->
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion special rounded w-100">
                                <!--begin:Menu link-->
                                <span class="menu-link ">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-element-plus fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">{{ __('lang.users') }}</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <!--end:Menu link-->
                                <!--begin:Menu sub-->
                                <div class="menu-sub menu-sub-accordion" kt-hidden-height="375" style="display: none; overflow: hidden;">
                                        @if ( auth()->user()->can('View Admins') )
                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link active" href="{{ route('admins.index') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">{{ __('lang.admin') }}</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        @endif
                                        @if (auth()->user()->can('View Roles'))
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link active" href="{{ route('role.index') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">{{ __('lang.role') }}</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        @endif
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        @if (auth()->user()->hasRole('superadmin'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('permessions.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.permession') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        @endif
                                        @if (auth()->user()->can('View User'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('users.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.users') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        @endif

                                        @if (auth()->user()->can('View Subscriber'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('subscribers.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.subscribers') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        @endif

                                        @if (auth()->user()->can('View Age'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('ages.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.ages') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        @endif
                                </div>
                                <!--end:Menu sub-->
                            </div>
                            <!--end:Menu link-->

                            <!--begin:Menu link-->
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion special rounded w-100">
                                <!--begin:Menu link-->
                                <span class="menu-link ">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-element-plus fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">{{ __('lang.trips') }}</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <!--end:Menu link-->
                                <!--begin:Menu sub-->
                                <div class="menu-sub menu-sub-accordion" kt-hidden-height="375" style="display: none; overflow: hidden;">
                                        @if (auth()->user()->can('View Capine'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('capines.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.capines') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        @endif

                                        @if (auth()->user()->can('View Cruise'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('cruises.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.cruises') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        @endif


                                        @if (auth()->user()->can('View Trip'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('trips.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.trips') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        @endif

                                        @if (auth()->user()->can('View Offer'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('offers.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.offers') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        @endif

                                        @if (auth()->user()->can('View Coupon'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('coupons.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.coupons') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        @endif

                                        @if (auth()->user()->can('View Excursion'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('excursions.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.excursion') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        @endif



                                        @if (auth()->user()->can('View SideSeeing'))
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link active" href="{{ route('side-seeings.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('lang.sideseeing') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        @endif
                                </div>
                                <!--end:Menu sub-->
                            </div>
                            <!--end:Menu link-->

                            <!--begin:Menu link-->
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion special rounded w-100">
                                <!--begin:Menu link-->
                                <span class="menu-link ">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-element-plus fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">{{ __('lang.galleries') }}</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <!--end:Menu link-->
                                <!--begin:Menu sub-->
                                <div class="menu-sub menu-sub-accordion" kt-hidden-height="375" style="display: none; overflow: hidden;">
                                  @if (auth()->user()->can('View Slider'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active" href="{{ route('sliders.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.sliders') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                @endif

                                @if (auth()->user()->can('View Gallery'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active" href="{{ route('galleries.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.galleries') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                @endif
                                </div>
                                <!--end:Menu sub-->
                            </div>
                            <!--end:Menu link-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Scroll wrapper-->
    </div>
    <!--end::Menu wrapper-->
