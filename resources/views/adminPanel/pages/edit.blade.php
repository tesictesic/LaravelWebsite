@extends('adminPanel.adminlayout')
@section('admin_content')
    <x-admin-edit-component
        :tabelaa="$tabela"
        :korisnik="$objekat"
        :kol="$kolone"
        :ddl1="$ddl1"
        :ddl2="$ddl2"
        :ddl3="$ddl3"
        :ddl4="$ddl4"
        :ddl5="$ddl5"
    />
@endsection
