<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="row">
            <div class="col">
                <div class="form-group mb-2 mb20">
                    <label for="show_landing_page" class="form-label">{{ __('Tampilkan Landing Page') }}</label>
                    <select name="show_landing_page" class="form-control @error('show_landing_page') is-invalid @enderror" id="show_landing_page">
                        <option value="1" {{ old('show_landing_page', $setting?->show_landing_page) == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('show_landing_page', $setting?->show_landing_page) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                    {!! $errors->first('show_landing_page', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="can_register" class="form-label">{{ __('Reseller bisa melakukan pendaftaran mandiri ?') }}</label>
                    <select name="can_register" class="form-control @error('can_register') is-invalid @enderror" id="can_register">
                        <option value="1" {{ old('can_register', $setting?->can_register) == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('can_register', $setting?->can_register) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                    {!! $errors->first('can_register', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="monitor_stock" class="form-label">{{ __('Monitor Stock') }}</label>
                    <select name="monitor_stock" class="form-control @error('monitor_stock') is-invalid @enderror" id="monitor_stock">
                        <option value="1" {{ old('monitor_stock', $setting?->monitor_stock) == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('monitor_stock', $setting?->monitor_stock) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                    {!! $errors->first('monitor_stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="company_logo" class="form-label">{{ __('Logo perusahaan') }}</label>
                    <input type="file" name="company_logo_file" class="form-control @error('company_logo') is-invalid @enderror" value="{{ old('company_logo', $setting?->company_logo) }}" id="company_logo" placeholder="Company Logo">
                    {!! $errors->first('company_logo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-2 mb20">
                    <label for="company_name" class="form-label">{{ __('Nama perusahaan') }}</label>
                    <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name', $setting?->company_name) }}" id="company_name" placeholder="Company Name">
                    {!! $errors->first('company_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="company_email" class="form-label">{{ __('Email perusahaan') }}</label>
                    <input type="text" name="company_email" class="form-control @error('company_email') is-invalid @enderror" value="{{ old('company_email', $setting?->company_email) }}" id="company_email" placeholder="Company Email">
                    {!! $errors->first('company_email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="company_phone" class="form-label">{{ __('Telepon perusahaan') }}</label>
                    <input type="text" name="company_phone" class="form-control @error('company_phone') is-invalid @enderror" value="{{ old('company_phone', $setting?->company_phone) }}" id="company_phone" placeholder="Company Phone">
                    {!! $errors->first('company_phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="company_address" class="form-label">{{ __('Alamat perusahaan') }}</label>
                    <input type="text" name="company_address" class="form-control @error('company_address') is-invalid @enderror" value="{{ old('company_address', $setting?->company_address) }}" id="company_address" placeholder="Company Address">
                    {!! $errors->first('company_address', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>
        


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save me-2"></i> {{ __('Simpan') }}</button>
    </div>
</div>