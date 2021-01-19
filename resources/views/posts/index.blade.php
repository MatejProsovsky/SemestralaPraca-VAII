@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card" style="color: #c5c6c7">
                    <div class="card-body" style="color: #c5c6c7">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Článok pridaný
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
