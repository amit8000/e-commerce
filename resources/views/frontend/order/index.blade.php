@extends('layouts.front')

@section('title')

My orders



@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Tracking Number</th>
                    <th>Total Price</th>

                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $item)
                    <tr>
                        <td>{{$item->tracking_no}}</td>
                        <td>Rs{{$item->total_price}}</td>
                        <td>
                            <a href="" class="btn btn-primary">View</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection