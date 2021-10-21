@extends('layouts.app')

@section('content')
<div class="container min-vh-100">
    <div class="card text-center">
        <div class="card-header">
            {{ __('Les client les plus rentable') }}
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Rang</th>
                        <th scope="col">Client</th>
                        <th scope="col">Montant des ventes</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($clients); $i++)
                        <tr>
                            <th scope="row">{{ $i+1 }}</th>
                            <td>{{ $clients[$i]->name }}</td>
                            <td>{{ $clients[$i]->ventes_amount }} €</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
