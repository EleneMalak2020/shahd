@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">الأدمن</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <table class="table table-bordered table-striped">
                <tr class="bg-info">
                    <th>رقم المستخدم</th>
                    <th>الاسم</th>
                    <th>الايميل</th>
                    <th>رقم الهاتف</th>
                    <th>الصلاحيات</th>
                </tr>
                @foreach ($admins as $index => $admin)
                @if($index == 0)

                @else
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->phone }}</td>

                    <td>
                        @hasrole('superAdmin')
                            <form method="POST" action="{{ Route('dashboard.admins.makeAdmin', $admin->id) }}">
                                @method('PUT')
                                @csrf
                                @if ($admin->hasRole('admin'))
                                    <button type="submit" class="btn btn-secondary waves-effect">ازالة الأدمن</button>
                                @else
                                    <button type="submit" class="btn btn-primary waves-effect">تسجيل كأدمن</button>
                                @endif
                            </form>
                        @endhasrole
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
    </section>




@endsection
