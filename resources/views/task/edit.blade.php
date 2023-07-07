<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
    <title>ایجاد تسک</title>
</head>
<body>



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                      ویرایش تسک
                    </h5>
                </section>
    
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('task.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
    
                <section>
                    <form action="{{ route('task.update',$task->id) }}" method="post" enctype="multipart/form-data" id="form">
                        {{method_field('put')}}
                        @csrf
                        <section class="row">
    
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="name">نام </label>
                                    <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{ old('name',$task->name) }}">
                                </div>
                                @error('name')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">


                                <div class="form-group">
                                    <label for="date">تاریخ</label>
                                    <input type="text" class="form-control form-control-sm d-none" name="date" id="date" value="{{ old('date') }}">
                                    <input type="text" class="form-control form-control-sm " id="date_view" value="{{ old('date') }}">
                                </div>
                                @error('date')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
    
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">توضیحات</label>
                                    <textarea name="description" id="description"  class="form-control form-control-sm" rows="6">
                                        {{ old('description',$task->description) }}
                                    </textarea>
                                </div>
                                @error('description')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                            </section>
    
                        
                            <section class="col-12 col-md-6 my-2">


                                <div class="form-group">
                                    <label for="status">وضعیت انجام</label>
                                    <select name="status" class="form-control form-control-sm">
                                        <option value="1" @if(old('status',$task->status)==1) selected  @endif>انجام شده</option>
                                        <option value="0" @if(old('status',$task->status)==0) selected  @endif>انجام نشده</option>


                                    </select>
                                </div>
                               
                            </section>
    
        
    
    
                            <section class="col-12 my-3">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
    
            </section>
        </section>
    </section>
    
    
    
</body>

<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
<script src="{{ asset('admin-assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="{{ asset('admin-assets/js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/grid.js') }}"></script>




<script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>


<script>
    $(document).ready(function () {
        $('#date_view').persianDatepicker({
            format: 'YYYY/MM/DD',
            altField: '#date'
        })
    });
</script>
</html>






  