<div class="row">
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="search_like" value="{{ !is_null($userRequest) ? $userRequest->search_like : ''}}" placeholder="Search (Name)">
    </div>
    <div class="form-group col-md-3">
        <select name="popular" class="form-control select">
            <option value="">--Select Popular--</option>
            <option value="Yes"{{ !is_null($userRequest) ? ($userRequest->popular == 'Yes' ? 'selected' : '') : ''}}
                >Yes
            </option>
            <option value="No"{{ !is_null($userRequest) ? ($userRequest->popular == 'No' ? 'selected' : '') : ''}}
                >No
            </option>
        </select>
    </div>
    <div class="form-group col-md-3">
        <button type="submit" class="btn btn-primary w-100">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>