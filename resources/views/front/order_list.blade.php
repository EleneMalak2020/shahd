@extends('layouts.master')

@section('content')
@include('front.inc.mini-nav')
<table class="table">
    <thead class="thead-dark">
        <small>يمكن الغاء الطلب فقط قبل ان يدخل في عملية التحضير</small>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Aria</th>
        <th scope="col">Address</th>
        <th scope="col">Phone</th>
        <th scope="col">Price</th>
        <th scope="col">Delivery Cost</th>
        <th scope="col">Total Price</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <th scope="row">1</th>
                <td>{{ $order->aria }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->delivery_cost }}</td>
                <td>{{ $order->total }}</td>
                @if($order->status == 1)
                    <td><div class="bg-info color-palette"><span class="text-dark">قيد الانتظار</span></div></td>
                @elseif($order->status == 2)
                    <td><div class="bg-warning color-palette"><span class="text-dark">جاري التحضير</span></div></td>
                @elseif($order->status == 3)
                    <td><div class="bg-success color-palette"><span class="text-dark">جاري التوصيل</span></div></td>
                @else
                    <td><div class="bg-danger color-palette"><span class="text-dark">تم الغاء الاوردر</span></div></td>
                @endif

                @if($order->status == 1)
                <td>
                    <form action="{{ route('cancel_order', $order->id) }}" method="POST">
                        @csrf
                        <Button type="submit" class="btn btn-danger">الغاء</Button>
                    </form>
                </td>
                @else
                @endif
            </tr>
        @endforeach
    </tbody>
  </table>

@endsection
