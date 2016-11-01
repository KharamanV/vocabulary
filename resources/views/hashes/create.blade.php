@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('hash.store') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-4 col-xs-offset-2">
                    <select name="words[]" class="form-control" multiple>
                        @foreach($vocabularies as $vocabulary)
                            <option value="{{ $vocabulary->id }}">{{ $vocabulary->word }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-4">
                    <select name="algorithms[]" class="form-control" multiple>
                        @foreach($algorithms as $algorithm)
                            <option value="{{ $algorithm->id }}">{{ $algorithm->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-12">
                    <div class="text-center" style="margin-top: 30px;">
                        <button class="btn btn-success">OK</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection