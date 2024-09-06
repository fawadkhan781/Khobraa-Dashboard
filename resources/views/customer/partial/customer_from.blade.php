<form action="{{ isset($item->id) ? route('customer.update', $item->id) : route('customer.store')}}"
    id="kt_modal_add_user_form" method="POST" enctype="multipart/form-data" class="g-3 needs-validation" novalidate>
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name"
                value="{{ isset($item->name) ? $item->name : '' }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                value="{{ isset($item->email) ? $item->email : '' }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone"
                value="{{ isset($item->phone) ? $item->phone : '' }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address"
                value="{{ isset($item->address) ? $item->address : '' }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city"
                value="{{ isset($item->city) ? $item->city : '' }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" id="state" name="state"
                value="{{ isset($item->state) ? $item->state : '' }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country"
                value="{{ isset($item->country) ? $item->country : '' }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description"
                value="{{ isset($item->description) ? $item->description : '' }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="rate_type" class="form-label">Contract Type</label>
            <select class="form-select" id="rate_type" name="rate_type" required>
                <option value="monthly"
                    {{ isset($item->rate_type) && $item->rate_type == 'monthly' ? 'selected' : '' }}>Monthly</option>
                <option value="job_based"
                    {{ isset($item->rate_type) && $item->rate_type == 'job_based' ? 'selected' : '' }}>Job Based
                </option>
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="rate_option" class="form-label">Rate Option</label>
            <select class="form-select" id="rate_option" name="rate_option" required>
                <option value="fixed"
                    {{ isset($item->rate_option) && $item->rate_option == 'fixed' ? 'selected' : '' }}>Fixed</option>
                <option value="dynamic"
                    {{ isset($item->rate_option) && $item->rate_option == 'dynamic' ? 'selected' : '' }}>Dynamic
                </option>
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="rate" class="form-label">Rate</label>
            <div class="input-group">
                <input type="text" class="form-control" id="rate" name="rate"
                    value="{{ isset($item->rate) ? $item->rate : '' }}" required>
                <select class="form-select py-2" id="rate_type" name="rate_type" required>
                    <option value="monthly"
                        {{ isset($item->rate_type) && $item->rate_type == 'monthly' ? 'selected' : '' }}>
                        Monthly
                    </option>
                    <option value="job" {{ isset($item->rate_type) && $item->rate_type == 'job' ? 'selected' : '' }}>
                        Job
                    </option>
                    <option value="hourly"
                        {{ isset($item->rate_type) && $item->rate_type == 'hourly' ? 'selected' : '' }}>
                        Hourly
                    </option>
                </select>
            </div>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary btn-sm float-end" type="submit">Save</button>
        </div>
    </div>
</form>