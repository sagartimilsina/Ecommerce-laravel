@extends('backend.layouts.main')
@section('title', 'Ecommerce ')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-lg-12 mb-4 order-0">
                            <div class="col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <h4 class="page-title text-left">Category Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Category
                                                    List</a></li>

                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col-12">
                                        <div class="card-body">
                                            <form action="{{ route('categories.store') }}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="category_name" class="form-label">Category Name</label>
                                                    <input type="text" class="form-control" name="category_name"
                                                        id="category_name" value="{{ old('category_name') }}"
                                                        placeholder="Enter Category Name" />
                                                    <div class="text-danger">
                                                        @error('category_name')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="category_description"
                                                        class="form-label text-primary">Category Description:</label>
                                                    <textarea id="editor" class="form-control" name="category_description" placeholder="Enter description">{{ old('category_description') }}</textarea>
                                                    <div class="text-danger m-2">
                                                        @error('category_description')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="datatable-buttons"
                                                                class="table table-striped table-bordered dt-responsive nowrap"
                                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th data-priority="1">SN</th>
                                                                        <th data-priority="4">Category Name</th>
                                                                        <th data-priority="7">Actions</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($categories as $category)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $category->category_name }}</td>

                                                                            {{-- <td>{{ $category->category_status }}</td> --}}
                                                                            <td class="text-center">
                                                                                <a href="#" class="text-primary mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#sociallinkModalEdit_{{ $category->id }}"><i
                                                                                        class="fa fa-eye "></i></a>
                                                                                <!-- Modal -->
                                                                                <div class="modal fade"
                                                                                    id="sociallinkModalEdit_{{ $category->id }}"
                                                                                    tabindex="-1" sociallink="dialog"
                                                                                    aria-labelledby="sociallinkModalLabel_{{ $category->id }}"
                                                                                    aria-hidden="true">
                                                                                    <div
                                                                                        class="modal-dialog modal-xl  modal-dialog-centered">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title"
                                                                                                    id="categoryModalLabel{{ $category->id }}">
                                                                                                    category Description
                                                                                                </h5>
                                                                                                <button type="button"
                                                                                                    class="btn-close"
                                                                                                    data-bs-dismiss="modal"><i
                                                                                                        class="fa fa-times fs-5 text-danger"
                                                                                                        aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        for="category_description"
                                                                                                        class="form-label text-primary">category
                                                                                                        Description:</label>
                                                                                                    <textarea id="editor{{ $category->id }}" class="form-control" name="category_description"
                                                                                                        placeholder="Enter description">{{ old('category_description', $category->category_description) }}</textarea>
                                                                                                    <div
                                                                                                        class="text-danger m-2">
                                                                                                        @error('category_description')
                                                                                                            {{ $message }}
                                                                                                        @enderror
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button"
                                                                                                        class="btn btn-secondary bg-danger"
                                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                                </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a href="#" class="text-info"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#editCategoryModal{{ $category->id }}">
                                                                                    <i class="fa fa-edit px-1"></i>
                                                                                </a>

                                                                                <div class="modal fade"
                                                                                    id="editCategoryModal{{ $category->id }}"
                                                                                    tabindex="-1"
                                                                                    aria-labelledby="editCategoryModalLabel{{ $category->id }}"
                                                                                    aria-hidden="true">
                                                                                    <div class="modal-dialog modal-xl">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title"
                                                                                                    id="editCategoryModalLabel{{ $category->id }}">
                                                                                                    Edit Category</h5>
                                                                                                <button type="button"
                                                                                                    class="btn-close"
                                                                                                    data-bs-dismiss="modal">
                                                                                                    <i class="fa fa-times fs-5 text-danger"
                                                                                                        aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                            <form
                                                                                                action="{{ route('categories.update', $category->id) }}"
                                                                                                method="POST">
                                                                                                @csrf
                                                                                                @method('PUT')
                                                                                                <div class="modal-body">
                                                                                                    <div class="mb-3">
                                                                                                        <label
                                                                                                            for="categoryName{{ $category->id }}"
                                                                                                            class="form-label text-primary">Category
                                                                                                            Name <span
                                                                                                                class="text-danger">*</span></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="categoryName{{ $category->id }}"
                                                                                                            name="category_name"
                                                                                                            value="{{ $category->category_name }}"
                                                                                                            required>
                                                                                                    </div>
                                                                                                    <div class="mb-3">
                                                                                                        <label
                                                                                                            for="categoryDescription{{ $category->id }}"
                                                                                                            class="form-label text-primary">Category
                                                                                                            Description</label>
                                                                                                        <textarea class="form-control" id="categoryDescription{{ $category->id }}" name="category_description">{{ $category->category_description }}</textarea>
                                                                                                    </div>
                                                                                                    <!-- Add more fields as needed -->
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button"
                                                                                                        class="btn btn-danger bg-danger"
                                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                                    <button type="submit"
                                                                                                        class="btn btn-primary bg-primary">Save
                                                                                                        changes</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <form
                                                                                    action="{{ route('categories.destroy', $category->id) }}"
                                                                                    method="post" class="d-inline">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <button
                                                                                        class="text-danger delete btn-flat"
                                                                                        onclick="return confirm('Are you sure to delete ')"><i
                                                                                            class='fa fa-trash px-1'></i>
                                                                                    </button>

                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="py-1 px-4">
                                                            {{ $categories->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @foreach ($categories as $category)
                CKEDITOR.replace('editor{{ $category->id }}', {
                    readOnly: true
                });
            @endforeach
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @foreach ($categories as $category)
                CKEDITOR.replace('categoryDescription{{ $category->id }}', {});
            @endforeach
        });
    </script>

@endsection
