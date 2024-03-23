<form action="{{ route('admin.store') }}" method="POST" class="form-group" enctype="multipart/form-data" >
    @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" class="form-control border" value="{{ old('name') }}" placeholder="Product name" name="name">
        </div>
        <div class="col">
            <input type="text" class="form-control border" value="{{ old('price') }}" placeholder="Price" name="price">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <textarea class="form-control border"  placeholder="Description" name="description">{{ old('Description') }}</textarea>
        </div>
        <div class="col">
            <input type="number" class="form-control border" value="{{ old('quantity') }}" placeholder="Quantity" name="quantity">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="file" class="form-control border" name="image">
        </div>
        <div class="col">
            <select class="form-control border"  name="category_id">
                <option value="">Select Category</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
