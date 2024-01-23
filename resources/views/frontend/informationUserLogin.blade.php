@extends('frontend.layout.__index')

@section('title')
    <title>Trang Chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>

    <style type="text/css">
        .dtHorizontalExampleWrapper {
            max-width: 600px;
            margin: 0 auto;
        }
        #table-orders td {
            white-space: none;
            vertical-align: inherit;
        }

        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
        }
    </style>
@endsection

@section('content')
    @if (session('success'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                iconColor:'green',
                html: '<h4 style="color:black;font-weight:500;">'+ <?php echo json_encode( session('success')); ?> +'</h4>',
                background:'#fff',
                toast: true,
                position: 'center',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            })
        </script>
    @endif

    <!-- PERSONAL-DETAIL-AREA -->
    <section class="pessonal-detail section-padding">
        <div class="container">
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="headline">
						<h2>Thông tin cá nhân</h2>
					</div>

                    <form class="form-horizontal" action="{{ route('shop.postChangeInformationUser') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group">
                            <label class="col-sm-2 text-left">Họ Tên :</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="focusedInput" type="text" name="name" value="{{ $user->name }}">
                                @if($errors->has('name'))
                                    <span class="text-danger"><strong>Error : </strong> {{ $errors->first('name') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="disabledInput" class="col-sm-2 text-left">Email : </label>
                            <div class="col-sm-8">
                                <input class="form-control" id="disabledInput" type="text" name="email" value="{{ $user->email }}" disabled>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class=" col-sm-12 text-danger">Thay đổi mật khẩu <input type="checkbox" id="password-change"></label>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput" class="col-sm-2 text-left text-danger">Mật Khẩu Mới : </label>
                            <div class="col-sm-8">
                                <input class="form-control" id="password" name="password" type="password" placeholder="Nhập mật khẩu mới ...." disabled="">
                                @if($errors->has('password'))
                                    <span class="text-danger"><strong>Error : </strong> {{ $errors->first('password') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="disabledInput" class="col-sm-2 text-left text-danger">Nhập Lại Mật Khẩu : </label>
                            <div class="col-sm-8">
                                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" disabled="">
                            </div>
                            @if($errors->has('password_confirmation'))
                                <span class="text-danger"><strong>Error : </strong> {{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <button type="submit" class=" btn btn-warning">Lưu Thay Đổi</button>
                    </form>
                </div>
            </div>


        </div>
    </section>
    <!-- PERSONAL-DETAIL-AREA:END   -->

    <!-- CHANGE-PASSWORD-AREA   -->
    <section class="password-change">
        <div class="container">
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="headline">
                        <h2>Thông tin đơn hàng của bạn :</h2>
                    </div>

                    <div class="container information-order">
                        @if($orders)

                            <table id="table-orders" style="color:black;" class="table table-striped table-bordered table-sm table-hover" cellspacing="0"
                              width="100%">
                                <thead>
                                    <tr class="dark">
                                        <th width="8%">Ngày</th>
                                        <th width="10%">Mã</th>
                                        <th>Họ Tên</th>
                                        <th width="10%">Địa Chỉ Nhận</th>
                                        <th width="10%">Email</th>
                                        <th width="8%">SĐT</th>
                                        <th>Thanh Toán</th>
                                        <th width="10%">Trạng Thái</th>
                                        <th width="3%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key=>$item)
                                        <tr style="font-size:12px; white-space:normal">
                                            <td>{{ date_format($item->created_at," H:i:s a  d-m-Y") }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->fullname }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ number_format($item->total - $item->discount , 0 , ',' , '.') }}<sup>đ</sup></td>
                                            <td>
                                                @if ($item->order_status_id === 1)
                                                    <span class="label label-info">Đặt Hàng</span>
                                                @elseif ($item->order_status_id === 2)
                                                    <span class="label label-warning">Đang Xử Lý</span>
                                                @elseif ($item->order_status_id === 3)
                                                    <span class="label label-success">Hoàn thành</span>
                                                @else
                                                    <span class="label label-danger">Hủy Đơn Hàng</span>
                                                @endif
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-xs btn-success" style="width:35px; margin-bottom:2px;" data-toggle="modal" data-target="#orders_{{ $item->id }}">
                                                    View

                                                </button>
                                                <div class="modal fade" id="orders_{{ $item->id }}" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Thông tin chi tiết hóa đơn <b><u>{{ $item->code }}</u></b></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class=" table table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Ảnh</th>
                                                                            <th>Tên Sản Phẩm</th>
                                                                            <th>SL</th>
                                                                            <th>Giá Bán</th>
                                                                            <th>Tổng Tiền</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($item->orderDetails()->get() as $val)
                                                                            <tr>
                                                                                <td>
                                                                                    <img src="{{ $val->image }}" class="image-order-details">
                                                                                </td>
                                                                                <td>
                                                                                    {{ $val->name }}
                                                                                    {!! ($val->color)?" <br><b>Màu</b> : $val->color":''; !!}
                                                                                    {!! ($val->memory)?" <br><b>Bộ Nhớ</b> : $val->memory ":''; !!}
                                                                                </td>
                                                                                <td>{{ $val->qty }}</td>
                                                                                <td>{{ number_format($val->price , 0 , ',' , '.')  }}<sup>đ</sup></td>
                                                                                <td>{{ number_format($val->total  , 0 , ',' , '.')  }}<sup>đ</sup></td>
                                                                            </tr>

                                                                        @endforeach

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="text-left">


                                                                    @if($item->discount > 0)
                                                                        <p><b>Tổng Giá : </b> {{ number_format($item->total , 0 , ',' , '.') }}<sup>đ</sup></p>
                                                                        <p><b>Giảm Giá : </b> {{ number_format($item->total , 0 , ',' , '.') }}<sup>đ</sup></p>
                                                                    @endif
                                                                        <p><b>Thanh Toán : </b> {{ number_format($item->total - $item->discount , 0 , ',' , '.') }}<sup>đ</sup></p>
                                                                        <p><b>Ghi Chú : </b> {{ $item->note }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if( in_array($item->order_status_id, [1,2] , true))
                                                    <button type="button" class="btn btn-xs btn-danger btn-huy-order" data-id="{{ $item->id }}" style="width:35px;">
                                                        Hủy
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        @else

                            <p class="text-danger text-center"><u>Chưa tồn tại đơn hàng nào</u></p>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CHANGE-PASSWORD-AREA:END -->
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table-orders').DataTable(
            {
                scrollX : 780,
                ordering:  false
            });
        });

        $(document).ready(function () {
            if($('#password-change').prop('checked')){
                $('#password').removeAttr('disabled');
                $('#password_confirmation').removeAttr('disabled');
            }
            $('#password-change').click(function () {
                // body...
                var check = $(this).prop('checked');
                changDisablePassWord(check);
            })
        })

        function changDisablePassWord(val) {
            // body...
            if(val){
                $('#password').removeAttr('disabled');
                $('#password_confirmation').removeAttr('disabled');
            }else{
                $('#password').attr('disabled','disabled');
                $('#password_confirmation').attr('disabled','disabled');
            }
        }


        $(document).on('click', '.btn-huy-order', function(event) {
            event.preventDefault();
            if(confirm('Bạn có chắc muốn hủy đơn hàng này không ???')){
                var id = $(this).data('id');
                window.location.href = '/huy-don-hang/'+id;
            }
        });
    </script>

@endsection
