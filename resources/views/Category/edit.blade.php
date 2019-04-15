@extends('layouts.backend')
@section('title') Category
@endsection
@section('page-title') Edit Category
@endsection
@section('content')
    <div class="row">
    <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POSt" action={{route('category.update',['id'=>$yangdikirim->id])}} enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kategori</label>
                    <input autocomplete="off" value="{{$yangdikirim->category_name}}" type="text" class="form-control {{$errors->first('nama_category') ? "is-invalid" : ""}} " name="category_name" placeholder="Nama_category">
                    <div class="invalid-feedback">
                    {{$errors->first('nama_category')}}
                    </div>
                </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" class="btn btn-primary">Kembali</button>

                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- /.box -->

    
@endsection