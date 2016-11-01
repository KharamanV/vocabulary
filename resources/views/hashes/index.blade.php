@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Current user</h1>
        <div class=""><strong>IP:</strong> {{ $user->ip }}</div>
        <div class=""><strong>Browser:</strong> {{ $user->browser }}</div>
        <div class=""><strong>Country:</strong> {{ $user->country }}</div>
        <hr>
        <table class="table table-hover" style="background-color: #fff;">
            <thead>
                <th>Word</th>
                <th>Algorithm</th>
                <th>Hash</th>
                <th>Date</th>
            </thead>
            <tbody>
                @foreach($hashes as $hash)
                    <tr>
                        <td>{{ $hash->vocabulary->word }}</td>
                        <td>{{ $hash->hashAlgorithm->name }}</td>
                        <td>{{ $hash->hash }}</td>
                        <td>{{ $hash->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection