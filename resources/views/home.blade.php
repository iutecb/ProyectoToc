@extends('layouts.app')
@section('content')
    <datos-perfil user="{{ Auth::user() }}"></datos-perfil>
@endsection
