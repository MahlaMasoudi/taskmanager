<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/sweetalert/sweetalert2.css') }}">
    <title>تسک ها</title>
</head>
<body>


    @include('sweetalert.success')
@if(!empty($data))

    
name {{$user->name}}
<br>

<a href="{{route('logout')}}">logout</a>

@endif
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                      تسک ها
                    </h5>
                </section>
    
                <section class="toast-wrapper flex-row-reverse">

                </section>
            
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('task.create') }}" class="btn btn-info btn-sm">ایجاد  تسک</a>
                    <div class="max-width-16-rem">
                      
                    </div>
                </section>


                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>توضیحات</th>
                                <th>وضعیت انجام</th>
                                <th>تاریخ</th>
                               
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tasks as $task)

                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                <label>
                                    <input id="{{ $task->id }}" onchange="changeStatus({{ $task->id }})" data-url="{{ route('task.status', $task->id) }}" type="checkbox" @if ($task->status === 1)
                                    checked
                                    @endif>
                                </label>
                            </td>

                            <td>{{ jalaliDate($task->date )}}</td>
                           
                            
                            <td class="width-16-rem text-left">
                                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline" action="{{ route('task.destroy', $task->id)}}" method="post">
                                    @csrf
                                    {{ method_field('delete') }}
                                <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                            </form>
                            </td>
                        </tr>

                        @endforeach


                    </tbody>
                </table>
            </section>
            </section>
        </section>
    </section>
    
</body>


<script type="text/javascript">
    function changeStatus(id){
        var element = $("#" + id)
        var url = element.attr('data-url')
        var elementValue = !element.prop('checked');

        $.ajax({
            url : url,
            type : "GET",
            success : function(response){
                if(response.status){
                    if(response.checked){
                        element.prop('checked', true);
                        successToast('تسک با موفقیت انجام شد')
                    }
                    else{
                        element.prop('checked', false);
                        successToast('وضعیت تسک باموفقیت تغییر کرد')
                    }
                }
                else{
                    element.prop('checked', elementValue);
                    errorToast('هنگام ویرایش مشکلی بوجود امده است')
                }
            },
            error : function(){
                element.prop('checked', elementValue);
                errorToast('ارتباط برقرار نشد')
            }
        });

        function successToast(message){

            var successToastTag = '<section class="toast" data-delay="5000">\n' +
                '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                        '<span aria-hidden="true">&times;</span>\n' +
                        '</button>\n' +
                        '</section>\n' +
                        '</section>';

                        $('.toast-wrapper').append(successToastTag);
                        $('.toast').toast('show').delay(5500).queue(function() {
                            $(this).remove();
                        })
        }

        function errorToast(message){

            var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                        '<span aria-hidden="true">&times;</span>\n' +
                        '</button>\n' +
                        '</section>\n' +
                        '</section>';

                        $('.toast-wrapper').append(errorToastTag);
                        $('.toast').toast('show').delay(5500).queue(function() {
                            $(this).remove();
                        })
        }
    }
</script>
  <script src="{{ asset('admin-assets/sweetalert/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="{{ asset('admin-assets/js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/grid.js') }}"></script>
</html>






