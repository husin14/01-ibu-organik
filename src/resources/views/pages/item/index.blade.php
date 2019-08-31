@extends('adminlte::page')

@section('title', 'Item')

@section('content_header')
@if(session()->get('message'))
<div class="row">
  <div class="col-md-6">
    <div class="alert alert-success">
      {{session()->get('message')}}
    </div>
  </div>
</div>
@endif
<div class="row">
  <div class="col-md-6">
    <h3>Item</h3>
  </div>
  <div class="col-md-6 text-right">
    <h3>
      <a class="btn btn-info" href="{{route('item.create')}}">
        Tambah Item
      </a>
    </h3>
  </div>
</div>
@stop

@section('content')
{{ $items }}
<div class="box box-danger">
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <table class="data-table table table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Stok</th>
              <th class="text-center">Terjual</th>
              <th class="text-center">Kategori</th>
              <th class="text-center">Kategori</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
  $(document).ready(function() {
    $('.data-table').dataTable({
      data: {!! $items !!},
      columns: [{
          data: 'id'
        },
        {
          data: 'name'
        },
        {
          data: 'price'
        },
        {
          data: 'stock'
        },
        {
          data: 'sold'
        },
        {
          data: 'category.name'
        },
        {
          data: 'supplier.name'
        },
        {
          data: 'id',
          render: function(data) {
            const link = "{{route('category')}}"+"/"+data;
            const detail = '<a class="btn btn-primary btn-xs" stlye="margin: 0 3px" href="' + link + ' ">edit</a>';
            const hapus = '<form role="form" action="' + link + '" stlye="margin: 0 3px;display:inline" method="POST">{{ csrf_field()}}{{method_field('delete ')}}<button class="btn btn-danger btn-xs">delete</button></form>';
            return '<div class="text-center">' + detail + hapus + '</div>';
          }
        },
      ]
    });
  });
</script>
@stop