@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Tạo đơn hàng</h5>

    </div>

    <div class="card-body">
        <form action="/customers" method="post">
            @csrf
            <fieldset class="mb-3">
                <!-- <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend> -->

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tên khách hàng</label>
                    <div class="col-md-10">
                        <select class="form-control select-remote-data" data-fouc style="min-height:37px">
                            <option value="">Chọn sản phẩm</option>
                        </select>

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
                <div class="form-group row"><label class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input name="email" id="email" type="text" placeholder="Email" class="form-control" required>
                        @error('email')
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

            </fieldset>


            <div class="text-right">
                <button type="submit" class="btn btn-primary">Tạo mới</button>
            </div>
        </form>
    </div>
</div>

<script>
    // let customers = @json($customers);
    // console.log(customers);

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
        return repo.code || repo.name;
    }
</script>
@stop