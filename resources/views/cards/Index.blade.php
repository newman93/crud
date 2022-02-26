@extends('app')

@section('content')
    <div class="row">
        <br/>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel Cards</h2>
            </div>
        
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('cards.create')}}" title="Create a product"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>
    <br/>

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>card_number</th>
            <th>pin</th>
            <th>activation_date</th>
            <th>expiration_date</th>
            <th>balance</th>
        </tr>
        @foreach ($cards as $card)
            <tr>
                <td>{{ $card->id }}</td>
                <td>{{ $card->card_number }}</td>
                <td>{{ $card->pin }}</td>
                <td>{{ $card->activation_date }}</td>
                <td>{{ $card->expiration_date }}</td>
                <td>{{ $card->balance }}</td>
                <td>
                    <form action="{{route('cards.destroy', $card->id)}}" method="POST">
                        <a href="{{route('cards.edit', $card->id)}}">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $cards->links() !!}

@endsection
