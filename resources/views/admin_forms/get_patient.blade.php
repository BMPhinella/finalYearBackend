@extends('admin_layouts.main')
@section('page_css')
<link href="{{asset('css/select2.css')}}" rel="stylesheet" />
<link href="{{asset('css/style.datatables.css')}}" rel="stylesheet">
<link href="{{asset('cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css')}}" rel="stylesheet">
@endsection
@section('main_content')
@include('admin_layouts.datatables')
@endsection
@section('page_js')
@endsection