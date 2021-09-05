@extends('layouts.app')

@section('content')
<form action="/orders" method="post" onsubmit="return checkAdminCart()">
    @csrf
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Tạo đơn hàng</h5>

        </div>

        <div class="card-body">

            <fieldset class="mb-3">
                <!-- <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend> -->

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tên khách hàng</label>
                    <div class="col-md-10">
                        <select class="form-control select-remote-data" data-fouc style="min-height:37px">
                            <option value="">Chọn khách hàng</option>
                        </select>
                        <input name="contact_name" id="contact_name" type="hidden" class="form-control">
                        <input name="email" id="email" type="hidden" class="form-control" required>
                        <input name="customer_id" id="customer_id" type="hidden" class="form-control" required>
                        <input type="hidden" name="cart" id="cart-field">
                        <style>
                            .select2-selection--single {
                                height: 37px;
                            }
                        </style>
                        @error('name')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row"><label class="col-md-2 col-form-label">Số điện thoại</label>
                    <div class="col-md-10">
                        <input name="phone" id="phone" type="text" placeholder="Số điện thoại" class="form-control">
                        @error('phone')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row"><label class="col-md-2 col-form-label">Địa chỉ</label>
                    <div class="col-md-10">
                        <input name="address" id="address" type="text" placeholder="Địa chỉ" class="form-control">
                        @error('address')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row"><label class="col-md-2 col-form-label">Ghi chú</label>
                    <div class="col-md-10">
                        <textarea name="note" rows="5" class="form-control"></textarea>
                        @error('sell_price')
                        <span class="form-text text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Chọn sản phẩm</label>
                    <div class="col-md-10">
                        <select class="form-control query-product" data-fouc style="min-height:37px">
                            <option value="">Chọn sản phẩm</option>
                        </select>
                    </div>
                </div>

            </fieldset>

        </div>
    </div>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Danh sách sản phẩm</h5>
        </div>
        <div class="card-body">
            <div class="max-height:400px;overflow:auto">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên hàng</th>
                                <th>Mã hàng</th>
                                <th>Quy cách</th>
                                <th>Giá bán</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody class="cart-table">

                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Tạo đơn hàng</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $('.select-remote-data').select2({
        ajax: {
            url: '/api/getcustomers',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    name: params.term, // search term
                    page: params.page
                };
            },
            processResults: function(data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;

                return {
                    results: data.data,
                    pagination: {
                        more: (params.page * 30) < data.total
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function(markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });

    function formatRepo(repo) {
        if (repo.loading) return repo.name;

        var markup = `<div class="select2-result-repository clearfix">
            <div class="select2-result-repository__avatar"><img src='/images/user1.png' /></div>
            <div class="select2-result-repository__meta"><strong>${repo.name}</strong></div>
            <div class="select2-result-repository__title">SĐT: ${repo.phone}</div>
            <div class="select2-result-repository__title">Địa chỉ: ${repo.address}</div>
        </div>`;

        return markup;
    }

    // Format selection
    function formatRepoSelection(repo) {
        return repo.name;
    }

    $('.query-product').select2({
        ajax: {
            url: '/getProductByCustomer',
            dataType: 'json',
            delay: 250,
            placeholder: "Nhâp tên hoặc mã sản phẩm",
            data: function(params) {
                return {
                    name: params.term, // search term
                    page: params.page,
                    group_id: 1
                };
            },
            processResults: function(data, params) {
                params.page = params.page || 1;

                data.data.map(item => {
                    item.id = item.pid
                })
                return {
                    results: data.data,
                    pagination: {
                        more: (params.page * 30) < data.total
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function(markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo4, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection4 // omitted for brevity, see the source of this page
    });

    function checkAdminCart() {
        let cart = JSON.parse(localStorage.getItem('cartAdmin'));
        if (cart && cart.items.length > 0) {
            $('#cart-field').val(JSON.stringify(cart));
            return true;
        }
        return false
    }

    function formatRepo4(repo) {
        if (repo.loading) return repo.name;

        var markup = `<div class="select2-result-repository clearfix">
            <div class="select2-result-repository__avatar"><img src='${repo.thumbnail}' /></div>
            <div class="select2-result-repository__meta"><strong>${repo.name}</strong></div>
            <div class="select2-result-repository__title">Mã sản phẩm: ${repo.barcode}</div>
            <div class="select2-result-repository__title">Giá bán: ${formatCash(repo.group_id ? repo.price : repo.sell_price)}</div>
        </div>`;

        return markup;
    }

    // Format selection
    function formatRepoSelection4(repo) {
        return repo.name;
    }

    $('.select-remote-data').on('select2:select', function(e) {
        var data = e.params.data;
        $('#contact_name').val(data.name);
        $('#phone').val(data.phone);
        $('#address').val(data.address);
        $('#email').val(data.user.email);
        $('#customer_id').val(data.id);
    });
    $('.query-product').on('select2:select', function(e) {
        var data = e.params.data;
        let price = parseInt(data.group_id ? data.price : data.sell_price)
        let cartAdmin = JSON.parse(localStorage.getItem('cartAdmin')) ?? {
            items: [],
            total: 0,
            quantity: 0
        };

        let item = cartAdmin.items.find(item => item.id == data.id);
        if (item) {
            item.quantity += 1
            item.rowtotal += price
        } else {
            cartAdmin.items.push({
                id: data.id,
                price,
                quantity: 1,
                thumbnail: data.thumbnail,
                name: data.name,
                rowtotal: price,
                cost_price: data.cost_price,
                product_id: data.pid,
                barcode: data.barcode,
                short_desc: data.short_desc
            })
        }
        cartAdmin.quantity += 1;
        cartAdmin.total += price;


        localStorage.setItem('cartAdmin', JSON.stringify(cartAdmin))
        renderAdminCart()
    });

    function renderAdminCart() {
        let cart = JSON.parse(localStorage.getItem('cartAdmin'));
        if (cart && cart.items.length > 0) {
            let content = ''
            cart.items.map((item, index) => {
                content += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.name}</td>
                    <td>${item.barcode}</td>
                    <td>${item.short_desc}</td>
                    <td>${formatCash(item.price.toString())}</td>
                    <td><input type="number" value='${item.quantity}' data-id='${item.id}' class="row-item" style="width: 50px;"/></td>
                    <td>${formatCash(item.rowtotal.toString())}</td>
                </tr>
                `
            })
            content += `<tr>
                <td colspan="7"><strong>Tổng tiền: ${formatCash(cart.total.toString())}</strong></td>
            </tr>`;
            $('.cart-table').html(content)
        } else {
            let content = `<tr>
                <td colspan="7"><strong>Không có sản phẩm nào trong giỏ hàng</strong></td>
            </tr>`;
        }
    }
    renderAdminCart()

    function formatCash(str) {
        return str.split('').reverse().reduce((prev, next, index) => {
            return ((index % 3) ? next : (next + ',')) + prev
        })
    }

    $(document).on('change', '.row-item', function() {
        let id = $(this).data('id');
        let cart = JSON.parse(localStorage.getItem('cartAdmin'))
        if (cart && cart.items && parseInt($(this).val()) > 0) {
            let item = cart.items.find(item => item.id == id);
            cart.quantity = cart.quantity - item.quantity + parseInt($(this).val())
            cart.total = cart.total - item.rowtotal + parseInt($(this).val()) * item.price
            item.quantity = parseInt($(this).val());
            item.rowtotal = parseInt($(this).val()) * item.price;
        }
        localStorage.setItem('cartAdmin', JSON.stringify(cart))
        renderAdminCart()
    })
</script>
@stop