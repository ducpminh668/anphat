@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Thông tin</h5>
        <!-- <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div> -->
    </div>

    <div class="card-body">
        <form action="#">
            <div class="row">
                <div class="col-md-12">
                    <fieldset>
                        <div class="form-group">
                            <label>Tên nhà cung cấp:</label>
                            <input type="text" class="form-control" value="PO{{date('dmY')}}{{rand(1000,9999)}}" name="code" id="code" placeholder="Nhập tên nhà cung cấp" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tên nhà cung cấp:</label>
                            <input type="text" class="form-control" placeholder="Nhập tên nhà cung cấp" required id="supplier" value="An Phát - sản xuất">
                        </div>

                        <div class="form-group">
                            <label>Nhập ghi chú:</label>
                            <textarea rows="5" cols="5" class="form-control" placeholder="Nhập ghi chú cho phiếu nhập" id="note"></textarea>
                        </div>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal_addProduct">Thêm sản phẩm mới</button>
        <div class="form-group">
            <select class="form-control select-remote-data" data-fouc style="min-height:37px">
                <option value="">Chọn sản phẩm</option>
            </select>

            <style>
                .select2-selection--single {
                    height: 37px;
                }
            </style>
        </div>

        <!-- table responsive -->

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Tồn</th>
                        <th>Đơn vị tính</th>
                        <th>Số lượng</th>
                        <th>Giá nhập</th>
                        <th>Giá vốn</th>
                        <th>Thành tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="box">
                    <!-- <tr>
                        <td>1</td>
                        <td>Van pháo số 1</td>
                        <td>0</td>
                        <td>chiếc</td>
                        <td>
                            <input type="number" />
                        </td>
                        <td>100,000</td>
                        <td>1,000,000</td>
                        <td>Xóa</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <!-- table responsive -->
    </div>
</div>
<div style="float:right">
    <button type="button" class="btn btn-primary" onclick="submitImport()">Tạo phiếu</button>
</div>

<!-- modal add product  -->
<div id="modal_addProduct" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm sản phẩm mới</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="">
                            <div class="form-group row"><label class="col-md-3 col-form-label">Tên sản phẩm</label>
                                <div class="col-md-9">
                                    <input name="name" id="product_name" type="text" placeholder="Tên sản phẩm" class="form-control">
                                    <!-- <span class="form-text text-muted">Here goes your name</span> -->
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-md-3 col-form-label">Nơi sản xuất</label>
                                <div class="col-md-9">
                                    <input name="manufacturer" id="manufacturer" type="text" placeholder="Nơi sản xuất" class="form-control">
                                    <!-- <span class="form-text text-muted">Here goes your name</span> -->
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-md-3 col-form-label">Mã Barcode</label>
                                <div class="col-md-9">
                                    <input name="barcode" id="barcode" type="text" placeholder="Mã barcode" class="form-control">
                                    <!-- <span class="form-text text-muted">Here goes your name</span> -->
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-md-3 col-form-label">Giá bán</label>
                                <div class="col-md-9">
                                    <input name="sell_price" id="sell_price" type="text" placeholder="Giá bán" class="form-control">
                                    <!-- <span class="form-text text-muted">Here goes your name</span> -->
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-md-3 col-form-label">Ảnh sản phẩm</label>
                                <div class="col-md-9">
                                    <input name="thumbnail" id="thumbnail" type="file" class="form-control">
                                    <!-- <span class="form-text text-muted">Here goes your name</span> -->
                                </div>
                            </div>
                            <!-- <div class="form-group row"><label class="col-md-3 col-form-label">How awesome is this?</label>
                                <div class="col-md-9">
                                    <div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="awesomeness" id="awesomeness-0" value="Really awesome" checked="">Really awesomeness</label></div>
                                    <div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="awesomeness" id="awesomeness-1" value="Super awesome">Super awesome</label></div>
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn bg-primary" onclick="submitProduct()">Tạo sản phẩm</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal add product  -->

<script>
    let cart = [];
    $('.select-remote-data').select2({
        ajax: {
            url: '/api/products',
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
            <div class="select2-result-repository__avatar"><img src='${repo.thumbnail}' /></div>
            <div class="select2-result-repository__meta"><strong>${repo.name}</strong></div>
            <div class="select2-result-repository__title">Mã vạch: ${repo.barcode}</div>
            <div class="select2-result-repository__title">Nhà sản xuất: ${repo.manufacturer}</div>
        </div>`;

        return markup;
    }

    // Format selection
    function formatRepoSelection(repo) {
        return repo.code || repo.name;
    }

    $('.select-remote-data').on('select2:select', function(e) {
        var data = e.params.data;
        var item = cart.find(item => item.id == data.id);
        data = {
            ...data,
            count: 1,
            im_price: data.cost_price,
            im_total: data.cost_price,
        }
        if (!item) {
            cart.push(data);
            renderCart()
        }
    });

    function renderCart() {
        let content = ''
        console.log(cart)
        cart.map((item, index) => {
            content += `
            <tr>
                        <td>${index+ 1}</td>
                        <td>${item.name}</td>
                        <td>${item.quantity}</td>
                        <td>chiếc</td>
                        <td>
                            <input type="number" value='${item.count}' data-id='${item.id}' class="im_count" />
                        </td>
                        <td>
                            <input type="number" value='${item.im_price}' data-id='${item.id}' class="im_price" />
                        </td>
                        <td>${item.cost_price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")}</td>
                        <td>${item.im_total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")}</td>
                        <td>Xóa</td>
                    </tr>
        `
        });
        $('.box').html('')
        $('.box').append(content);

    }

    $(document).on('change', '.im_price', function() {
        let id = $(this).data('id');
        let item = cart.find(item => item.id == id);
        item.im_price = parseInt($(this).val())
        item.im_total = item.im_price * item.count
        $('.box').html('')
        renderCart()
    })

    $(document).on('change', '.im_count', function() {
        let id = $(this).data('id');
        let item = cart.find(item => item.id == id);
        item.count = parseInt($(this).val())
        item.im_total = item.im_price * item.count
        $('.box').html('')
        renderCart()
    })
    $('#sell_price').mask("#,##0", {
        reverse: true
    });

    function submitProduct() {
        let name = $('#product_name').val()
        let manufacturer = $('#manufacturer').val()
        let barcode = $('#barcode').val()
        let sell_price = $('#sell_price').val().replaceAll(",", "")
        let thumbnail = $('#thumbnail')[0].files[0]

        let data = new FormData();
        data.append('name', name);
        data.append('manufacturer', manufacturer);
        data.append('barcode', barcode);
        data.append('sell_price', sell_price);
        data.append('thumbnail', thumbnail);

        if (name && parseInt(sell_price) && thumbnail && barcode) {
            $('#modal_addProduct').modal('hide');
            axios.post('/api/products', data).then(res => {
                if (res.data.status == 1) {
                    $('#product_name').val('')
                    $('#manufacturer').val('')
                    $('#sell_price').val('')
                    $('#sell_price').val('')
                    $('#thumbnail').val(null)

                }
            }).catch(err => {
                alert(err.message)
            })
        } else {
            alert('Tên, giá bán và Ảnh là trường bắt buộc')
        }
    }

    function submitImport() {
        let code = $('#code').val()
        let supplier = $('#supplier').val()
        let note = $('#note').val()
        if (!supplier) {
            alert('Nhà cung cấp là trưởng bắt buộc!')
            return
        }
        if (validateCart(cart)) {
            axios.post('/api/imports', {
                code,
                supplier,
                note,
                cart
            }).then(res => {
                console.log(res.data);
            })
        }
    }

    function validateCart(cart) {
        let flag = true;
        if (cart.length <= 0) {
            alert('Chưa có sản phẩm')
            return false;
        }
        for (const item of cart) {
            if (parseInt(item.count) <= 0) {
                alert('Số lượng sản phẩm không hợp lệ')
                flag = false;
                break;
            }
            if (parseInt(item.im_price) <= 0) {
                alert('Giá nhập không hợp lệ')
                flag = false;
                break;
            }
        }
        return flag
    }
</script>
@stop