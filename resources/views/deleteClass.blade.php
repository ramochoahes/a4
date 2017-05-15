@extends('layouts.master')


  {{ $page->username }}


@section('delete')

    <h1>Confirm deletion</h1>
    <form method='POST' action='deleteClass'>

        {{ csrf_field() }}

        <input type='hidden' name='searchId' value='{{ $page->username }}'?>

        <h2>Are you sure you want to delete <em>{{ $page->username }}</em>?</h2>
        <h2>ID#: {{ $page->id }}<h2>
        <input type='submit' value='Yes, delete this class.' class='btn btn-danger'>

    </form>

@endsection
