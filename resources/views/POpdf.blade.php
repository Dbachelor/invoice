<!DOCTYPE html>
<html>
<head>
	<title>Snapnet | Purchase Order</title>
</head>
<body>
	<div style="width: 730px">	
<table style="width: 100%">
	
		<thead> 
	<th style ="width: 60%;font-size: 48px;text-align: left"><img src="dist/img/logo.png" class="img" alt="User Image"></th>

	<th style="width: 40%;font-size: 16px;color: black;text-align: center; font-family:sans-serif; ">1B Abayomi Shonuga Crescent <br>Off Dele Adedeji Street, <br> Lekki Phase 1, <br> Lagos Nigeria. <br> </th>
	</thead>
	
</table>
<hr style="color: black">
<table  width="100%">
	<div>
		<thead> 
	<th style ="width: 60%;font-size: 16px;text-align: left;">P.O No: @php echo rand() @endphp <br> @if($purchaseNum) {{$purchaseNum->number}} @endif  </th>
	<th style="width: 40%;font-size: 20px;color: grey;text-align: center; font-family:sans-serif; ">ORDER</th>
	</thead>
	</div>
</table>
<hr>
<table  width="100%">
	<div>
		<thead> 
	<th style ="width: 60%;font-size: 16px;text-align: left;">To: 
        @if($organ_get)
            <address>
                {{$organ_get->orgAddress}}
            </address>
            <br> Email: {{$organ_get->orgEmail}}</th>
            @endif 
    <th style="width: 40%;font-size: 16px;text-align: left;">Ship To: <br>
        @if($organ_get)
        <address>
            {{$organ_get->orgAddress}}
        </address>
        <br> Email: {{$organ_get->orgEmail}}</th>
        @endif 
    </th>
	</thead>
	</div>
</table>
<table style="width: 100%;border:black;border-style:solid" >
	
		<thead> 
    <th style ="width: 20%;font-size: 14px;text-align: left;">P.O DATE</th>
    <th style ="width: 20%;font-size: 14px;text-align: left;">REQUISITIONER</th>
    <th style ="width: 20%;font-size: 14px;text-align: left;">SHIPPED VIA</th>
    <th style ="width: 20%;font-size: 14px;text-align: left;">F.O.B POINT</th>
    <th style ="width: 20%;font-size: 14px;text-align: left;">TERMS</th>
    </thead>

    <tbody>
        <tr style="">
            <td>@php echo date("d/m/Y"); @endphp</td>
            <td></td>
            <td></td>
            <td></td>
            <td>Due On Receipt</td>
        </tr>
    </tbody>
	
</table>
<hr>
<table style="width: 100%">
	
		<thead> 
	{{-- @if($organ_get)
	<th style ="width: 60%;font-size: 16px;text-align: left;padding-left: 30px;">Company Name:	{{$organ_get->orgName}} <br>Address:		{{$organ_get->orgAddress}} <br>Country:	Nigeria <br>GSTIN ID: <br>VAT No:</th>
	</thead>
	@endif --}}
	
</table>
<hr>
<table  style="border-collapse: collapse;width: 100%">
	<thead>
		<th  style="font-family: sans-serif;width: 10%;text-align: left">P/N</th>
	<th style="font-family: sans-serif;width: 10%;text-align: left">Quantity</th>
    <th style="font-family: sans-serif;width: 40%;text-align: left">Description</th>
	<th style="font-family: sans-serif;width: 20%;text-align: left">Unit Price</th>
	<th style="font-family: sans-serif;width: 20%;text-align: left">Total</th>
</thead>
</table>
<hr>
<table  style="width: 100%">
	<thead></thead>
	<tbody>
		{{-- @if($additem)
		    @php $dtotal=0; $total=0; $i=1; @endphp
		    @foreach($additem as $addition)
		    @php $total += $addition->quantity * $addition->unitcost; @endphp
            @php $dtotal += $addition->total - $addition->total*$addition->discount/100; @endphp --}}
            
            
            @if($items)
            @php $dtotal=0; $total=0; $i=1; @endphp
            @foreach ($items as $item)
            @php $total += $item->quantity * $item->unitcost; @endphp
            @php $dtotal += $item->total @endphp
        <tr style="text-align: left;">
			<td style="width: 10%;font-size:12px">POI-@php echo rand(100,1000) @endphp</td>
			<td style="width: 10%">{{$item->quantity}}</td>
			<td style="width: 40%">{{$item->description}}</td>
			<td  style="width: 20%">{{$item->unitcost}}</td>
			<td style="width: 20%">{{number_format($total,2 )}}</td>
            {{-- @if($addition->discount)
              <td  style="width: 20%">{{number_format($addition->total -$addition->total* $addition->discount/100,2 )}}</td>
              @else
              <td  style="width: 20%">{{number_format($addition->total,2 )}}</td>
              @endif --}}
			
		</tr>
		@endforeach
	</tbody>
</table>
<br>	
<br>	
<hr>	
<table style="width: 100%">	
		<thead></thead>
		<tbody>	
			<tr>	
			<td  style="width: 10%"></td>
			<td style="width: 30%"></td>
			<td  style="width: 10%"></td>
			<td  style="width: 20%" ></td>
			<td  style="font-size: 16px;width: 10%"><b>Subtotal:</b></td>
			<td  style="text-align: left;width:20%;">
				<b>{{number_format($dtotal,2 )}}</b>
			</td>
			</tr>
			{{-- <tr>	
			<td  style="width: 10%"></td>
			<td  style="width: 30%"></td>
			<td  style="width: 10%"></td>
			<td  style="width: 20%" ></td>
			<td  style="font-size: 16px;width: 10%"><b>Service.Charge:</b></td>
			<td  style="text-align: left;width:20%;">
				<b>  {{number_format($total * 0.12 ,2) }}</b>
			</td>
			</tr> --}}
			{{-- <tr>	
			<td  style="width: 10%"></td>
			<td  style="width: 30%"></td>
			<td  style="width: 10%"></td>
			<td  style="width: 20%" ></td>
			<td  style="font-size: 16px;width: 10%"><b>Total:</b></td>
			<td  style="text-align: left;width:20%;">
				<b> {{number_format($total + 0.12*$total ,2) }}</b>
			</td>
			</tr> --}}
			<tr>	
			<td  style="width: 10%"></td>
			<td  style="width: 30%"></td>
			<td  style="width: 10%"></td>
			<td  style="width: 20%" ></td>
			<td  style="font-size: 16px;width: 10%"><b>Tax Rate 8.6%:</b></td>
			<td  style="text-align: left;width:20%;">
				<b>{{number_format($dtotal *0.086,2 )}}</b>
			</td>
			</tr>
			<tr>	
			<td  style="width: 10%"></td>
			<td  style="width: 30%"></td>
			<td  style="width: 10%"></td>
			<td  style="width: 20%" ></td>
			<td  style="font-size: 16px;width: 10%"><b>TOTAL:</b></td>
			<td  style="text-align: left;width:20%;font-size: 16px;text-decoration: overline;">
				<b><u>
                       N{{number_format($dtotal + $dtotal *0.086,2 )}}
                </u></b>
			</td>
			</tr>
		</tbody>
		@endif
</table>
<br><br><br>
<hr>	
<table >	
		<thead></thead>
	<tbody>
		<tr style="text-align: center;">
			<td  style="width: 10%"></td>
			<td  style="width: 30%">Make All cheques Payable <br><br>Account Name:Snapnet Limited <br>Bank:Diamond Bank Plc. <br>Account #: 0073821499 <br>TIN:-02298067-0001 <br>For enquiries contact info@snapnet.com.ng</td>
			<td style="width: 10%"></td>
			<td  style="width: 10%"></td>
			<td  style="width: 20%"></td>
			<!-- <td  style="width: 20%;float:  : right">Payment Terms:80% <br>Upfront,20% on Delivery</td>  -->
			
		</tr>
		
	</tbody>
</table>
</div>
</body>
</html>