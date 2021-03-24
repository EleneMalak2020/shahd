@extends('layouts.dashboard')
@section('content')

<div class="card col-md-4 offset-4">
    <div class="card-header">
    <h3 class="card-title">المنتجات</h3>
    </div>
    <div class="card-body p-0">
    <table class="table projects">
        <thead class="thead-dark">
            <tr>
                <th style="width: 15%">
                    الطلب
                </th>
                <th style="width: 15%">
                    العدد
                </th>
                <th style="width: 15%">
                    الاجمالي
                </th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($products as $product)
                <tr>
                    <th>
                        {{ $product->name_ar }}
                    </th>
                    <th>
                        {{ $product->order_count }}
                    </th>
                    <th>
                        {{ $product->price * $product->order_count }}
                    </th>
                </tr>

            @endforeach
        </tbody>
        <tbody>
            <th></th>
            <th></th>
            <th></th>
        </tbody>

        <tfoot id="foot" class="thead-light">
            <tr>
                <th>
                    اجمالي خدمة التوصيل
                </th>
                <th>
                    {{ $deliveries }}
                </th>
                <th>
                </th>
            </tr>
            <tr>
                <th>
                    اجمالي اليوم
                </th>
                <th>
                    {{ $total }}
                </th>
                <th>
                </th>
            </tr>
            <tr>
                <th>
                    تاريخ اليوم
                </th>
                <th>
                    {{ date('Y-m-d') }}
                </th>
                <th>
                </th>
            </tr>
        </tfoot>
    </table>
    </div>
    @if(count(App\Order::where('status', 'waiting')->get()) > 0)
        <p class="bg-red">لا يمكنك اقفال اليوم وهناك طلبات قيد الانتظار</p>
    @else
        <form action="{{ route('dashboard.end.store') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">حفظ واقفال</button>
        </form>
    @endif
</div>


@endsection
