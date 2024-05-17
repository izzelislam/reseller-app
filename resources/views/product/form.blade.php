<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="category_id" class="form-label">{{ __('Category ') }}</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">-- Pilih --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product?->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('category_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nama Produk') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="describtion" class="form-label">{{ __('Deskripsi Produk') }} <small class="ms-2">*optional</small></label>
            <input type="text" name="describtion" class="form-control @error('describtion') is-invalid @enderror" value="{{ old('describtion', $product?->describtion) }}" id="describtion" placeholder="Describtion">
            {!! $errors->first('describtion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Gambar') }}</label>
            <input type="file" name="image_file" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $product?->image) }}" id="image" placeholder="Image">
            {!! $errors->first('image_file', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="price" class="form-label">{{ __('Harga') }}</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product?->price) }}" id="price" placeholder="Price">
            {!! $errors->first('price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="reseller_price" class="form-label">{{ __('Harga Reseller') }}</label>
            <input type="number" name="reseller_price" class="form-control @error('reseller_price') is-invalid @enderror" value="{{ old('reseller_price', $product?->reseller_price) }}" id="reseller_price" placeholder="Reseller Price">
            {!! $errors->first('reseller_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="reseller_comission" class="form-label">{{ __('Komisi Reseller') }}</label>
            <input type="number" name="reseller_comission" class="form-control @error('reseller_comission') is-invalid @enderror" value="{{ old('reseller_comission', $product?->reseller_comission) }}" id="reseller_comission" placeholder="Reseller Comission">
            {!! $errors->first('reseller_comission', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="stock" class="form-label">{{ __('Stok') }} <small class="ms-2">*optional</small></label>
            <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $product?->stock) }}" id="stock" placeholder="Stock">
            {!! $errors->first('stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="category_id" class="form-label">{{ __('Status') }}</label>
            <select name="status" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">-- Pilih --</option>
                <option value="available" {{ old('status', $product?->status) === 'available' ? 'selected' : '' }}>Available</option>
                <option value="unavailable" {{ old('status', $product?->status) === 'unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
            {!! $errors->first('status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>