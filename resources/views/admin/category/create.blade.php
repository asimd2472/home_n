@extends('admin.layouts.admin')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
        {{-- <h3 class="mb-0">Users</h3> --}}
        </div>
    </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row order-search-sec">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" aria-describedby="" value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Slug</label>
                                        <input type="text" class="form-control" name="slug" id="slug" aria-describedby="" value="{{ old('slug') }}">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Icon</label>
                                        <input type="file" class="form-control" name="image_icon" id="image_icon" aria-describedby="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="file" class="form-control" name="image" id="image" aria-describedby="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="module">
    // generate slug from name input
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    function makeSlug(v) {
        return v.toString().toLowerCase().trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    }

    if (nameInput) {
        nameInput.addEventListener('input', (e) => {
            const s = makeSlug(e.target.value);
            slugInput.value = s;
        });
    }
</script>
@endpush