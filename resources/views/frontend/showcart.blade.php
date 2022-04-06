@extends('layouts.app')

@section('content')

<div id="top">
    <div class="row">
        <div class="col-md-8 offset-2 pt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $carts)
                    <tr>
                        <td>{{ $carts->title }}</td>
                        <td>{{ $carts->price }}</td>
                        <td>{{ $carts->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection