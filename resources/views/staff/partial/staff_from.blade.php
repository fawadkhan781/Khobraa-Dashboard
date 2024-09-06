<form action="{{ isset($item->id) ? route('staff.update', $item->id) : route('staff.store')}}"
    id="kt_modal_add_user_form" method="POST" enctype="multipart/form-data" class="g-3 needs-validation" novalidate>
    @csrf
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $item->name ?? '' }}" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $item->email ?? '' }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $item->phone ?? '' }}" required>
        </div>
        <div class="col-md-6">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $item->address ?? '' }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" value="{{ $item->city ?? '' }}" required>
        </div>
        <div class="col-md-6">
            <label for="state" class="form-label">State</label>
            <input type="text" name="state" class="form-control" value="{{ $item->state ?? '' }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="country" class="form-label">Country</label>
            <input type="text" name="country" class="form-control" value="{{ $item->country ?? '' }}" required>
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ $item->description ?? '' }}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="position" class="form-label">Position</label>
            <input type="text" name="position" class="form-control" value="{{ $item->position ?? '' }}" required>
        </div>
        <div class="col-md-6">
            <label for="department" class="form-label">Department</label>
            <input type="text" name="department" class="form-control" value="{{ $item->department ?? '' }}" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="Active" {{ (isset($item->status) && $item->status == 'Active') ? 'selected' : '' }}>
                    Active</option>
                <option value="Inactive" {{ (isset($item->status) && $item->status == 'Inactive') ? 'selected' : '' }}>
                    Inactive</option>
            </select>
        </div>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>