@extends('layouts.app')

@section('title', 'Edit Item')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">

@endpush

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Edit Item : {{ $item->name }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('item.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    @include('layouts.partial.msg')
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Category Name</label>
                                        <select class="form-control" name="category_id" id="category">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ($category->id == $item->category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description" type="hidden" name="description" value="{{ $item->description }}">
                                <trix-editor input="description"></trix-editor>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Price</label>
                                        <input type="umber" class="form-control" name="price" value="{{ $item->price }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="bmd-label-floating">Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>

                            <a href="{{ route('item.index')}}" class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" max-width="100%" height="300px" src="{{ asset($item->image) }}" alt="{{$item->image}}">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>

@endpush
