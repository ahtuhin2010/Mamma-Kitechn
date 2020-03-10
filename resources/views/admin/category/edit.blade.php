@extends('layouts.app')

@section('title', 'Edit Category')

@push('css')

@endpush

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Edit Category : {{ $category->name }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update', $category->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('category.index')}}" class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush
