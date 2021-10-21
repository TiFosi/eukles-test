@extends('layouts.app')

@section('content')
<div class="container min-vh-100">
    <div class="card text-center">
        <div class="card-header">
            {{ __('Les clients qui ont plus de 30 matériels, et dont le matériel vendu est supérieur à 30.000 euros') }}
            <br> {{ count($data) }} / {{ $total }}
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Client</th>
                        <th scope="col">Nb. de matériels</th>
                        <th scope="col">Montant des ventes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->mat_count }}</td>
                            <td>{{ $item->ventes_amount }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
