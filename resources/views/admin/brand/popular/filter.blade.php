<div class="row">
    <div class="form-group col-md-9">
        <input type="text" class="form-control" name="search_like" value="{{ !is_null($userRequest) ? $userRequest->search_like : ''}}" placeholder="Search (Name)">
    </div>
    <div class="form-group col-md-3">
        <button type="submit" class="btn btn-primary w-100">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>