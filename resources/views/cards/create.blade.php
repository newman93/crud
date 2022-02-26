@extends('app')

@section('content')
    <div class="row">
        <br/ >
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Card</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('cards.index')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('cards.store')}}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>card_number:</strong>
                    <input type="number" name="card_number" class="form-control" placeholder="card_number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>pin:</strong>
                    <input type="number" class="form-control" name="pin"
                        placeholder="pin">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>activation_date:</strong>
                    <input type="datetime-local" name="activation_date" class="form-control" placeholder="activation_date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>expiration_date:</strong>
                    <input type="date" name="expiration_date" class="form-control" placeholder="expiration_date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>balance:</strong>
                    <input type="number" step="0.01" class="form-control"name="balance"
                        placeholder="balance">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection