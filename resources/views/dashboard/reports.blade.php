@extends('layouts.dashboard')
@section('content')



<div class="card col-md-4 offset-4">
    <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <form action="" method="get">
              <select class="form-control select2 float-md-right choseDate" style="width: 100%;">
                {{-- <option  selected="selected">Alabama</option> --}}
                @foreach ($ends as $end)
                <option value="{{ $end->id }}">{{ $end->created_at->format('Y-m-d') }}</option>
                @endforeach
              </select>
            </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
    </div>

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
            <tbody id="mySproducts">

            </tbody>
            <tbody>
                <th></th>
                <th></th>
                <th></th>
            </tbody>

            <tfoot id="foot" class="thead-light myReport">

            </tfoot>
        </table>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $('.choseDate').change(function (e) {
            e.preventDefault();


            var end_id = $(this).val();

            $.ajax({
                type: "get",
                url: "{{ route('dashboard.report_select') }}",
                data: { 'id': end_id },
                contentType: false,
                cache: false,

                success: function (response) {

                    $('#mySproducts').html(``);
                    $.each(response.products, function (indexInArray, product) {

                        $('#mySproducts').append(`
                            <tr>
                                <th>
                                    ${product.name}
                                </th>
                                <th>
                                    ${product.order_count}
                                </th>
                                <th>
                                    ${product.subtotal}
                                </th>
                            </tr>
                        `);
                    });

                    $('.myReport').html(``);
                    $('.myReport').append(`
                        <tr>
                            <th>
                                اجمالي خدمة التوصيل
                            </th>
                            <th>
                                ${response.report.deliveries}
                            </th>
                            <th>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                اجمالي اليوم
                            </th>
                            <th>
                                ${response.report.total}
                            </th>
                            <th>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                تاريخ اليوم
                            </th>
                            <th>
                                ${response.report_date}
                            </th>
                            <th>
                            </th>
                        </tr>
                    `);
                }
            });
        });
    </script>
@endsection

