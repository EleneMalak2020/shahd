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

                    <form action="" id="updateForm" method="" enctype="multipart/form-data" >
                      @csrf
                      <div class="modal-body">
                            <div class="form-group">
                            <input type="text" id="editName_en" name="name_en" class="form-control" value="">
                            </div>
                            <div class="form-group">
                            <input type="text" id="editName_ar" name="name_ar" class="form-control" value="" >
                            </div>
                            <div class="form-group">
                                <input type="text" id="editPrice" name="price" class="form-control" value="" >
                            </div>
                            <div class="form-group">
                                <div class="btn btn-info btn-file">
                                <i class="fas fa-paperclip"></i> صورة المنتج
                                <input type="file" name="image">
                                </div>
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
                                <th style="width: 15%">
                                    القسم
                                </th>
                                <th style="width: 15%">
                                    الاسم عربي
                                </th>
                                <th style="width: 15%">
                                    الاسم انجليزي
                                </th>
                                <th style="width: 15%">
                                    السعر
                                </th>
                                <th style="width: 10%" class="text-center">
                                    الصورة
                                </th>
                                <th style="width: 25%">
                                </th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $product->category->name_ar }}
                                    </td>
                                    <td>
                                        {{ $product->name_ar }}
                                    </td>
                                    <td>
                                        {{ $product->name_en }}
                                    </td>
                                    <td>
                                        {{ $product->price }}
                                    </td>

                                    <td class="project-state">
                                        <img src="{{ asset('storage/products/'.$product->image) }}" style="width: 100%">
                                    </td>
                                    <td class="project-actions text-right">
                                        <form action="{{ route('dashboard.products.delete', $product->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm float-left" type="submit">
                                                <i class="fas fa-trash">
                                                </i>
                                                مسح
                                            </button>
                                        </form>
                                        <button
                                            product_name_en="{{ $product->name_en }}"
                                            product_name_ar="{{ $product->name_ar }}"
                                            product_price="{{ $product->price }}"
                                            product_id="{{ $product->id }}"
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

                    <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data" id="createForm">
                      @csrf
                        <div class="form-group">
                            <label>القسم التابع له هذا المنتج</label>
                            <select class="custom-select" name="category_id">
                                    <option value="" selected disabled></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}" placeholder="اسم المنتج باللغة الانجليزية" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}" placeholder="اسم المنتج باللغة العربية" required>
                        </div>
                        <div class="form-group">
                            <input type="number" step="any" name="price" class="form-control" value="{{ old('position_en') }}" placeholder="السعر" required>
                        </div>
                        <div class="form-group">
                            <div class="btn btn-info btn-file">
                            <i class="fas fa-paperclip"></i> صورة المنتج
                            <input type="file" name="image" required>
                            </div>
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

    var product_id = $(this).attr('product_id');
    var product_name_en = $(this).attr('product_name_en');
    var product_name_ar = $(this).attr('product_name_ar');
    var product_price = $(this).attr('product_price');


    $('#editName_en').val(product_name_en);
    $('#editName_ar').val(product_name_ar);
    $('#editPrice').val(product_price);
    $('#currentid').val(product_id);


    //store update
    $(document).on('click', '#submitToUpdate', function(e){
    e.preventDefault();

        var formData = new FormData($('#updateForm')[0]);


        $.ajax({
            type:   "post",
            url:    "{{ route('dashboard.products.update') }}",
            data:   formData,

            enctype: 'multipart/form-data',
            processData: false,  // Important!
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

