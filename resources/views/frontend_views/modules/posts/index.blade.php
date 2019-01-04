@extends('frontend_views.layouts.master_page')

@section('content')

@include('frontend_views.modules.posts._index')

@endsection

@section('script')
    {{-- video tutorial not yet finish, search pa lang ito.. --}}
  <script src="{{ asset('javascriptPractices/ajaxcrudi.js') }}"></script>
@endsection

