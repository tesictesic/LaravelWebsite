@extends('adminPanel.adminlayout')
@section('admin_content')
    <x-admin-component
        :columns="$columns"
        :datas="$data"
        :table="$tabela"
    />
@endsection
