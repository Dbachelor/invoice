<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div style="width: 1000px">

	<table style="">
		<thead></thead>
		<tbody>
		<tr style="text-align: left;">
			<td style="text-align: center;" width="20%"><a href="//snapnet.com.ng/software-development/"><img height="50px" src="{{ asset('solutions/HCMatrix.png')}}" alt="Snapnet"></a></td>
			<td style="text-align: center;" width="20%"><a href="//snapnet.com.ng"><img height="50px" src="{{ asset('solutions/pali.png')}}" alt="PaliPro"></a></td>
			<td style="text-align: center; padding-left: 10px;padding-right: 10px" width="20%"><a href="//snapnet.com.ng/data-analytics/"><img height="50px" src="{{ asset('solutions/cellanalytics.png')}}" alt="Cell Analytics"></a></td>
			<td style="text-align: center;" width="20%"><a href="//snapnet.com.ng/software-development/"><img height="50px" src="{{ asset('solutions/rave.png')}}" alt="Rave"></a></td>
			<td style="text-align: center;" width="20%"><a href="//snapnet.com.ng/managed-services/"><img height="50px" src="{{ asset('solutions/Azure.png')}}" alt="Azure"></a></td>
		</tr>
		</tbody>
	</table>


	<br>
	<br>
	<br>
	<br>
	<hr style="color: black">

	<table border="0" width="100%">
		<div>
			<thead>
			<th style ="width: 60%;font-size: 48px;text-align: left"><img src="dist/img/logo.png" class="img" alt="User Image"></th>

			<th style="width: 40%;font-size: 16px;color: black;text-align: center; font-family:sans-serif; ">1B Abayomi Shonuga Crescent <br>Off Dele Adedeji Street, <br> Lekki Phase 1, <br> Lagos Nigeria.</th>
			</thead>
		</div>
	</table><hr style="color: black">
	<table border="0" width="100%">
		<div>
			<thead>
			<th style ="width: 60%;font-size: 16px;text-align: left;">Quote No: @php echo rand() @endphp <br>Quote Date: @php echo date("d/m/Y"); @endphp
	<!--<br> Due Date:@php echo date('d/m/Y', strtotime('+1 months'));  @endphp-->
			</th>
			<th style="width: 40%;font-size: 20px;color: blue;text-align: center; font-family:sans-serif; ">QUOTE</th>
			</thead>
		</div>
	</table>
	<hr>
	<table border="0" width="100%">
		<div>
			<thead>
			<th style ="width: 60%;font-size: 20px;text-align: left;">Details of Receiver (Billed To)</th>
			</thead>
		</div>
	</table>
	<hr>
	<table border="0" width="100%">
		<div>
			<thead>
			@if($organ_get)
				<th style ="width: 60%;font-size: 16px;text-align: left;">Company Name:	{{$organ_get->orgName}} <br>Address:		{{$organ_get->orgAddress}} <br>Country:	{{$organ_get->country}} <br>GSTIN ID: <br>VAT No:</th>
				<th style = "width:40%; font-size: 16px; text-align:center;margin-top: 0;"> @if($invoice_description) Product Description: @foreach($invoice_description as $product) {{$product->product_description}} @endforeach @endif </th>
			</thead>
			@endif
		</div>
	</table>
	<hr>
	<table border="0" width="100%" style="border-collapse: collapse;">
		<thead>
		<th width="10%" style="font-family: sans-serif;text-align: left">S/N</th>
		<th width="30%" style="font-family: sans-serif;text-align: left">Description</th>
		<th width="10%" style="font-family: sans-serif;text-align: left">Qty</th>
		<th width="20%" style="font-family: sans-serif;text-align: left">Unit Cost</th>
		<th width="10%" style="font-family: sans-serif;text-align: left">Discount(%)</th>
		<th width="20%" style="font-family: sans-serif;text-align: left">Total</th>
		</thead>
	</table>
	<hr>
	<table border="0" width="100%">
		<thead></thead>
		<tbody>
		@if($additem)
			@php $dtotal=0; $total=0; $i=1; @endphp
			@foreach($additem as $addition)
				@php $total += $addition->quantity * $addition->unitcost; @endphp
				@php $dtotal += $addition->total - $addition->total*$addition->discount/100; @endphp
				<tr style="text-align: left;">
					<td width="10%">{{$i++}}</td>
					<td width="30%" >{{$addition->description}}</td>
					<td width="10%">{{$addition->quantity}}</td>
					<td width="20%">{{number_format($addition->unitcost,2)}}</td>
					<td width="10%">{{number_format($addition->discount,2)}}%</td>
					@if($addition->discount)
						<td>{{number_format($addition->total -$addition->total* $addition->discount/100,2 )}}</td>
					@else
						<td>{{number_format($addition->total,2 )}}</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
	<br>
	<br>
	<hr>
	<table border="0" width="100%">
		<thead></thead>
		<tbody>
		<tr>
			<td width="10%"></td><td width="30%"></td><td width="10%"></td>

			<td width="20%" ></td>
			<td width="10%" style="font-size: 16px"><b>Subtotal:</b></td>
			<td width="20%" style="text-align: left;">
				<b>
					@if($addition->currency == 'dollar')
						$
					@else
						&#8358
					@endif

					{{number_format($dtotal ,2) }}</b>
			</td>
		</tr>

		<tr>
			<td width="10%"></td><td width="30%"></td><td width="10%"></td>

			<td width="20%" ></td>
			@if($invoice->hasvat=='1')
				<td width="10%" style="font-size: 16px"><b>VAT 7.5%:</b></td>
				<td width="20%" style="text-align: left;">
					<b> {!! $invoice->currency == 'dollar' ? '$' : '&#8358' !!} {{number_format($dtotal * 0.075 ,2) }}</b>
				</td>
			@elseif($invoice->hasvat=='0')

			@endif
		</tr>
		<tr>
			<td width="10%"></td><td width="30%"></td><td width="10%"></td>

			<td width="20%" ></td>
			<td width="10%" style="font-size: 16px"><b>TOTAL:</b></td>
			@if($invoice->hasvat == '1')
				<td width="20%" style="text-align: left;text-decoration: overline;">
					<b><u>
							{!! $addition->currency == 'dollar' ? '$' : '&#8358' !!}
							{{number_format(($dtotal * 0.075) + ($dtotal) ,2) }}
						</u></b>
				</td>
			@elseif($invoice->hasvat == '0')
				<td width="20%" style="text-align: left;text-decoration: overline;">
					<b><u>
							{!! $addition->currency == 'dollar' ? '$' : '&#8358' !!}
							{{number_format(($dtotal) ,2) }}
						</u></b>
				</td>
			@endif
		</tr>
		</tbody>
		@endif
	</table>
	<br><br><br>
	<hr>
	<table>
		<thead></thead>
		<tbody>
		<tr style="text-align: center;">
			@php($count=$invoice->banks->count())
			<td width="10%"></td>
			@php($bank=$invoice->banks[0])
			<td width="30%">Make All cheques Payable <br>
				<br>Account Name:{{ $bank->account_name }}<br>
				Bank:{{ $bank->bank_name }}<br>
				Account #: {{ $bank->account_no }}<br>
				Currency #: {{ strtoupper($bank->currency) }}<br>
				{!!  $bank->details ? $bank->details : ''  !!}
				TIN:-02298067-0001 <br>
				For enquiries contact sales@snapnet.com.ng</td>
			<td width="10%"></td>
			<td width="10%"></td>
			@if($count>1)
				@php($bank=$invoice->banks[1])
				<td width="30%">
					<br>Account Name:{{ $bank->account_name }}<br>
					Bank:{{ $bank->bank_name }}<br>
					Account #: {{ $bank->account_no }}<br>
					Currency #: {{ strtoupper($bank->currency) }}<br>
					{!!  $bank->details ? $bank->details : ''  !!}
					TIN:-02298067-0001 <br>
					For enquiries contact sales@snapnet.com.ng</td>
			@else
				<td width="30%"></td>
			@endif
			<td width="10%"></td>

		</tr>

		</tbody>
	</table>




	<table style=" position: absolute;bottom: 0;">
		<thead></thead>
		<tbody>
		<tr style="text-align: left;">
			<td style="text-align: center;" width="20%"><a href="//snapnet.com.ng"><img height="100px" src="{{ asset('solutions/SAP.png')}}" alt="SAP"></a></td>
			<td style="text-align: center;" width="20%"><a href="//snapnet.com.ng"><img height="100px" src="{{ asset('solutions/Microsoft.png')}}" alt="Microsoft"></a></td>
			<td style="text-align: center;" width="20%"><a href="//snapnet.com.ng"><img height="100px" src="{{ asset('solutions/Oracle.png')}}" alt="Oracle"></a></td>
			<td style="text-align: center;" width="20%"><a href="//snapnet.com.ng/security-solutions/"><img height="100px" src="{{ asset('solutions/checkpoint.png')}}" alt="Checkpoint"></a></td>
			<td style="text-align: center;" width="20%"><a href="//snapnet.com.ng"><img height="100px" src="{{ asset('solutions/Cisco.png')}}" alt="Cisco"></a></td>
		</tr>

		</tbody>
	</table>

</div>
</body>
</html>