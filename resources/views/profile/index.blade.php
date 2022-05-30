@extends('layouts.app')
    @section('content')
    @hasrole('lansia')
        @include('profile.lansia.index')
    @elserole('pimpinan')
        @include('profile.pimpinan.index')
    @elserole('pembimbing')
        @include('profile.pendamping.index')
    @endhasrole
@endsection
