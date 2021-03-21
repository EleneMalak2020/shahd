@extends('layouts.dashboard')
@section('content')
        <!-- Main content -->
        <div class="row">
            <div class="modal" tabindex="-1" role="dialog" id="editProductModal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">تعديل المنتج</h5>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form action="" id="updateForm" >
                      @csrf
                      <div class="modal-body">
                            <div class="form-group">
                            <input type="text" id="editName_en" name="name_en" class="form-control" value="">
                            </div>
                            <div class="form-group">
                            <input type="text" id="editName_ar" name="name_ar" class="form-control" value="" >
                            </div>
                            <div class="form-group">
                                <input type="text" id="editDeliveryCost" name="delivery_cost" class="form-control" value="" >
                            </div>
                      </div>

                      <div class="modal-footer">
                          <input type="text" name="id" id="currentid" class="form-control" value="" hidden>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                          <button type="submit" id="submitToUpdate" class="btn btn-primary" data-dismiss="modal">تعديل</button>
                      </div>
                    </div>
                    </form>
                </div>
            </div>

            <section class="content col-md-8">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">المنتجات</h3>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 5%">
                                    #
                                </th>
                                <th style="width: 25%">
                                    الاسم عربي
                                </th>
                                <th style="width: 25%">
                                    الاسم انجليزي
                                </th>
                                <th style="width: 20%">
                                    خدمة التوصيل
                                </th>
                                <th style="width: 25%">
                                </th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach($arias as $aria)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $aria->name_ar }}
                                    </td>
                                    <td>
                                        {{ $aria->name_en }}
                                    </td>
                                    <td>
                                        {{ $aria->delivery_cost }}
                                    </td>
                                    <td class="project-actions text-right">
                                        <form action="{{ route('dashboard.aria.delete', $aria->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm float-left" type="submit">
                                                <i class="fas fa-trash">
                                                </i>
                                                مسح
                                            </button>
                                        </form>
                                        <button
                                            name_ar="{{ $aria->name_ar }}"
                                            name_en="{{ $aria->name_en }}"
                                            delivery_cost="{{ $aria->delivery_cost }}"
                                            aria_id="{{ $aria->id }}"
                                            type="button" class="editBtn btn btn-sm btn-primary float-right edit-category"
                                            data-toggle="modal" data-target="#editProductModal">تعديل
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
              <!-- /.content -->
            <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h3>اضافة منتج</h3>
                  </div>

                  <div class="card-body">

                    <form action="{{ route('dashboard.aria.store') }}" method="post" id="createForm">
                      @csrf
                        <div class="form-group">
                            <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}" placeholder="اسم الحي باللغة الانجليزية" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}" placeholder="اسم الحي باللغة العربية" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="delivery_cost" class="form-control" value="{{ old('delivery_cost') }}" placeholder="تكلفة خدمة التوصيل" required>
                        </div>
                        <input class="brn btn-primary" type="submit" id="submitToCreate" value="انشاء">
                    </form>
                  </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
<script>
$(document).on('click', '.editBtn', function(e){
    e.preventDefault();

    var name_ar = $(this).attr('name_ar');
    var name_en = $(this).attr('name_en');
    var delivery_cost = $(this).attr('delivery_cost');
    var aria_id =  $(this).attr('aria_id');

    $('#editName_en').val(name_en);
    $('#editName_ar').val(name_ar);
    $('#editDeliveryCost').val(delivery_cost);
    $('#currentid').val(aria_id);



    $(document).on('click', '#submitToUpdate', function(e){
    e.preventDefault();

        var formData = new FormData($('#updateForm')[0]);


        $.ajax({
            type:   "post",
            url:    "{{ route('dashboard.aria.update') }}",
            data:   formData,

            processData: false,
            contentType: false,
            cache: false,

            success: function (response) {
            location.reload();
            toastr.success(response.msg);
            },
        });
    });


});

</script>
@endsection

