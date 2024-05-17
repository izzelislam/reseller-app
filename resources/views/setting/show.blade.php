@extends('layouts.app')

@section('template_title')
    {{ $setting->name ?? __('Show') . " " . __('Setting') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Setting</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('settings.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Show Landing Page:</strong>
                                    {{ $setting->show_landing_page }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Can Register:</strong>
                                    {{ $setting->can_register }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Monitor Stock:</strong>
                                    {{ $setting->monitor_stock }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Company Logo:</strong>
                                    {{ $setting->company_logo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Company Name:</strong>
                                    {{ $setting->company_name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Company Email:</strong>
                                    {{ $setting->company_email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Company Phone:</strong>
                                    {{ $setting->company_phone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Company Address:</strong>
                                    {{ $setting->company_address }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
