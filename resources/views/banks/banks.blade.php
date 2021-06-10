@extends('layouts.app')
@section('content')


    <div class="row" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">All Banks
                        <button data-target="#addBank" onclick="createBankForm()" data-toggle="modal"
                                style="margin-left:10px" class="btn btn-sm"><i class="fa fa-plus"></i></button>
                    </h3>

                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped table-hover" id="user_table">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Bank Name</th>
                            <th>Account Name</th>
                            <th>Account Number</th>
                            <th>Currency</th>
                            <th>Type</th>
                            <th>Details</th>
                            <th>Change</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($banks as $bank)
                                <tr>
                                    <td>{{$bank->id }}</td>
                                    <td>{{$bank->bank_name}}</td>
                                    <td>{{$bank->account_name}}</td>
                                    <td>{{$bank->account_no}}</td>
                                    <td>{{$bank->currency}}</td>
                                    <td>{{$bank->type}}</td>
                                    <td>{{$bank->details}}</td>
                                    <td class="pull-right">
                                        <a data-toggle="modal" class="btn btn-info" data-target="#addBank"
                                           onclick="return editBankForm({{$bank}})">
                                            <i class="fa fa-edit"></i></a>

                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal in" id="addBank" style="padding-right: 17px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><span id="headername">Add Bank</span></h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <!-- Modal body -->
                <form method="POST" action='{{route('banks.store')}}'>
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="col-sm-12" for="">Bank Name</label><br>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control col-sm-12" name="bank_name" id="bank_name" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-sm-12" for="">Account Name</label><br>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control col-sm-12" name="account_name" id="account_name" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-sm-12" for="">Account Number</label><br>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control col-sm-12" name="account_no" id="account_no" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-sm-12" for="">Currency</label><br>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="currency">
                                            <option value="naira">Naira (NGN)</option>
                                            <option value="dollars">Dollars (USD)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-sm-12" for="">Type</label><br>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="type">
                                            <option value="others">OTHERS</option>
                                            <option value="csp/license">CSP/ LICENSES</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="col-sm-12" for="">Details</label><br>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="details" id="details" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" id="submit_text" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
      
    </script>
    <!-- page script -->
    <script>
        $(function () {
            $('#user_table').DataTable()
            $('#user_').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        });
        function createBankForm() {
            $('#headername').html('Add Bank');
            $('#submit_text').html('Create');
            $('#id').val('');
            $('#bank_name').val('');
            $('#account_name').val('');
            $('#account_no').val('');
            $('#currency').val('');
            $('#type').val('');
            $('#details').val('');
        }
        function editBankForm(bank) {
            $('#headername').html('Edit Bank');
            $('#submit_text').html('Update');
            $('#id').val(bank.id);
            $('#bank_name').val(bank.bank_name);
            $('#account_name').val(bank.account_name);
            $('#account_no').val(bank.account_no);
            $('[name=currency]').val(bank.currency);
            $('[name=type]').val(bank.type);
            $('#details').val(bank.details);
        }
        
    </script>
@endsection