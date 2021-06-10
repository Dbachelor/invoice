 @extends('layouts.app')

@section('content')


<style>
    #signArea
    {
      width:304px;
      margin: 15px auto;
    }
    .sign-container
    {
      width: 90%;
      margin: auto;
    }
    .sign-preview
    {
      width: 150px;
      height: 50px;
      border: solid 1px #CFCFCF;
      margin: 10px 5px;
    }
    .tag-ingo
    {
      font-family: cursive;
      font-size: 12px;
      text-align: left;
      font-style: oblique;
    }
    .center-text
    {
      text-align: center;
    }
  </style>



<div class="row" style="">
    <div class="col-lg-12">
        <div class="box m-b-20">
            <div class="box-header with-border">
                <div class="box-body" id="exTab1">

                    <section class="container">
                      <div class="form-group custom-input-space has-feedback">
                        <div class="page-heading">
                          <h3 class="post-title"></h3>
                        </div>
                        <div class="page-body clearfix">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="panel panel-default">
                                <div class="panel-heading">User Details</div>
                                <div class="panel-body center-text">

                                    <div class="col-md-6">
                                        <form id="profileForm" action="upload-profile" enctype="multipart/form-data" method="POST">  @csrf
                                            <div class="form-group">
                                                <label for="phone" class="col-md-12 col-form-label" style="text-align: left !important;"> Phone Number </label>
                                                <div class="col-md-12">
                                                    <input type="tel" class="form-control" name="phone" id="phone"> <br>
                                                </div>
                                            </div>

                                            <div class="form-group" style="margin-top: 30px">
                                                <label for="profile" class="col-md-12 col-form-label" style="text-align: left !important;"> Upload Your Profile </label>
                                                <div class="col-md-12">
                                                    <input type="file" class="" name="profile" id="profile">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary" id="profileBtn">Save Details</button>
                                        </form>
                                    </div>


                                    <div class="col-md-6">
                                        <form id="signForm" action="{{route('saveSignature')}}" enctype="multipart/form-data" method="POST">  @csrf
                                            <input name="signature" id="signature" type="hidden">
                                            <div id="signArea" >
                                                <h2 class="tag-ingo">Put signature below,</h2>
                                                <div class="sig sigWrapper" id="holder" style="height:auto;">
                                                    <div class="typed"></div>
                                                    <canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
                                                </div>
                                            </div>


                                            <button type="submit" class="btn btn-primary" id="btnSaveSign">Save Signature</button>
                                            <button type="button" class="btn btn-default" id="btnCleared" >Clear</button>

                                            <div class="sign-container">

                                            </div>
                                        </form>
                                    </div>



                                </div>
                              </div>
                            </div>


                          </div>
                        </div>
                      </div>
                    </section>

                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

















@endsection



@section('script')


<script>
  $(function(e)
  {
    $(function()
    {
      $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
    });

   /* $("#btnSaveSign").click(function(e)
   {
    */
      e.preventDefault();
      html2canvas([document.getElementById('sign-pad')],
      {
        onrendered: function (canvas)
        {
          var canvas_img_data = canvas.toDataURL('image/png');
          var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
          //ajax call to save image inside folder
          $.ajax({
            url: '{{route('saveSignature')}}',
            data: { img_data:img_data, _token:'{{csrf_token()}}' },
            type: 'post',
            dataType: 'json',
            success: function (response)
            {
               // window.location.reload();
            }
          });
        }
      });
    });
*/

    //clear signature
    $("#btnCleared").click(function(e)
    {
       $('#signArea').signaturePad().clearCanvas();
    });

  });
</script>


<script>
    function updateCanvasToSignature(){
        var canvas = document.getElementById("sign-pad");
        document.getElementById('signature').value = canvas.toDataURL("image/png");
    }
    $(function ()
    {
        //function to process form data
        function processForm(formid, route)
        {
            formdata= new FormData($('#'+formid)[0]);
            formdata.append('_token','{{csrf_token()}}');

            $.ajax(
                {
                    // Your server script to process the upload
                    url: route,
                    type: 'POST',
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(data, status, xhr)
                    {
                        if(data.status=='success')
                        {
                            toastr.success(data.message, {timeOut:10000});
                            return;
                        }
                        return toastr.error(data.message, {timeOut:10000});
                    }
                });
        }



        //PROCESSING FORM DATA
        $("#profileForm").on('submit', function(e)
        {
            e.preventDefault();
            processForm('profileForm', "{{url('/upload-profile')}}");
        });

    });
</script>




<script>
    $(function ()
    {
        //function to process form data
        function processForm(formid, route)
        {
            formdata= new FormData($('#'+formid)[0]);
            formdata.append('_token','{{csrf_token()}}');

            $.ajax(
            {
                // Your server script to process the upload
                url: route,
                type: 'POST',
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        toastr.success(data.message, {timeOut:10000});
                        return;
                    }
                    return toastr.error(data.message, {timeOut:10000});
                }
            });
        }

    });
</script>



    @if(Session::has('info'))
        <script>
            $(function()
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            $(function()
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif

@endsection
