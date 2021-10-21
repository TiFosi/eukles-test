@extends('layouts.app')

@section('content')
<div class="container min-vh-100">
    <div class="card">
        <div class="card-header text-center">{{ __('Saisir le matériel de chaque client') }}</div>
        <div class="card-body">
            @if ( session()->get('success') )
                <div class="alert alert-success text-center mb-0" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('question-2') }}" name="add-material">
                @csrf
                <div class="form-group">
                    <label for="client_id">{{ __('Client') }} :</label>
                    <select name="client_id" id="client_id" class="custom-select @error('client_id') is-invalid @enderror" name="client_id" value="{{ old('client_id') }}" autofocus>
                        <option selected value="">{{ __('Sélectionner un client') }}</option>
                        @foreach ($clients as $client)
                            <option selected value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="materiel_id">{{ __('Matériel') }} :</label>
                    <div class="row" style="margin-bottom: 15px">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nom" name="name" id="name">
                        </div>
                        <div class="col">
                            <input type="number" min="0" step=".01" class="form-control" placeholder="Prix" name="price" id="price">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <input id="checkbox" type="checkbox">
                            <span style="margin-left: 5px">{{ __('Sélectionner un matériel') }}</span>
                            </div>
                        </div>
                        <select name="materiel_id" id="materiel_id" class="custom-select @error('materiel_id') is-invalid @enderror" name="materiel_id" value="{{ old('materiel_id') }}" autofocus disabled>
                            @foreach ($materiels as $materiel)
                                <option selected value="{{ $materiel->id }}">{{ $materiel->name }} ({{ $materiel->price }} €)</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Ajouter') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @parent
    <script>
        $(function() {
            if ($('#checkbox').is(':checked')) {
                $(this).closest('.form-group').find('.row').hide();
            } else {
                $(this).closest('.form-group').find('.row').show();
            }
        });

        $('#checkbox').click(function() {
            $(this).closest('.form-group').find('.row').toggle();
            if ($(this).is(':checked')) {
                $('#materiel_id').removeAttr('disabled')
            } else {
                $('#materiel_id').attr('disabled', true)
            }
        });

        $('form[name="add-material"]').submit(function () {
            let client_id = $('#client_id').val();
            let materiel_id = $('#materiel_id').val();
            let name = $.trim($('#name').val());
            let price = parseFloat($.trim($('#price').val()));

            if (!client_id) {
                alert('Veuillez sélectionner un client.');
                return false;
            }
            
            if ($('#checkbox').is(':checked')) {
                if(!materiel_id) {
                    alert('Veuillez sélectionner un matériel.');
                    return false;
                }
            } else {
                if(name === '' || !price || price < 0) {
                    alert('Veuillez saisir un nom et un prix supérieur à zéro.');
                    return false;
                }
            }
        });
    </script>
@endsection
