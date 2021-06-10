
<!DOCTYPE html>
<html>
<head>
	<title>PDF</title>
</head>
<body style="font-family: sans-serif;">
	<div style="width: 1000px">
		<table border="0" width="100%">
	<thead> 
	<th style ="width: 60%;font-size: 48px;text-align: left"><img src="dist/img/logo.png" class="img" alt="User Image"></th>
	<th style="width: 40%;font-size: 40px;color: black;text-align: right; font-family:sans-serif; ">INVOICE</th>
	</thead>
	<tr><td>1B Abayomi Shonuga,</td></tr>
	<tr><td>off Dele Adedeji crescent</td></tr>
	<tr>
		<td>Lekki Phase 1 Lagos</td>
		<!-- <td style="float:left;">Date</td> -->
		<td><table style="float: right;">
			<tr><td>Date:</td><td>@php echo date("d/m/Y"); @endphp</td></tr>
		</table></td></tr>
	<tr>
		<td>Phone: +2347034076619</td>
		<td><table style="float: right">
			<tr><td>Invoice:</td><td># @php echo rand() @endphp</td></tr>
		</table></td>
	</tr>
	<tr>
		<td>Email:info@snapnet.com.ng</td>
		<td>
			<table style="float: right;">
		<tr><td>Customer ID:</td><td>@php echo rand(1000,9000) @endphp</td></tr>
			</table>
		</td>
	</tr>
	<tr><td>Website:www.snapnetsolutions.com</td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td style="background-color: black;color: white">Bill To</td>
		<td style="background-color: black;color: white">Ship To</td>
	</tr>

	<tr><td>The Procurement Manager</td><td>SAME</td></tr>
	@if($organ_get)
	<tr><td>{{$organ_get->orgName}}</td></tr>
	<tr><td>{{$organ_get->orgAddress}}</td></tr>
	@endif
	<tr><td></td></tr>
	<tr><td><strong>Attention Procurement Manager</strong></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<table border="0" width="100%">
		<tr>
			<th style="background-color: black;color: white;width: 5%;text-align: left">S/N</th>
			<th style="background-color: black;color: white;width: 60%;text-align: left">DESCRIPTION</th>
			<th style="background-color: black;color: white;width: 5%;text-align: left">QTY</th>
			<th style="background-color: black;color: white;width: 20%;text-align: left">UNIT COST(=N=)</th>
			<th style="background-color: black;color: white;width: 20%;text-align: left">TOTAL(=N=)</th>
			
		</tr>
		<tr>
			@if($additem)
		    @php $total=0; $i=1; @endphp
		    @foreach($additem as $addition)
		    @php $total += $addition->quantity * $addition->unitcost; @endphp
			<td>{{$i++}}</td>
			<td>{{$addition->description}}</td>
			<td>{{$addition->quantity}}</td>
			<td>{{number_format($addition->unitcost,2)}}</td>
			<td>{{number_format($addition->total,2)}}</td>
			
		</tr>
		@endforeach
		<tr>
			<td></td>
			<td><strong>Sub Total:</strong></td>
			<td></td>
			<td></td>
			<td style="border-top-color: black;border-bottom-color: black"><strong><u>N{{number_format($total ,2) }}</u></strong></td>
		</tr>
		<tr>
			<td style="background-color:white"></td>
			<td style="background-color:white"><strong>Service Charge - 12%:</strong></td>
			<td style="background-color:white"></td>
			<td style="background-color:white"></td>
			<td style="border-top-color: black;border-bottom-color: black;background-color:white">N{{number_format($total * 0.12 ,2) }}</td>
		</tr>
		<tr>
			<td></td>
			<td><strong>Total:</strong></td>
			<td></td>
			<td></td>
			<td style="border-top-color: black;border-bottom-color: black"><strong>N{{number_format($total + 0.12*$total ,2) }}</strong></td>
		</tr>
		<tr>
			<td></td>
			<td><strong>VAT - 7.5%:</strong></td>
			<td></td>
			<td></td>
			<td style="border-top-color: black;border-bottom-color: black">N{{number_format(($total + 0.12*$total)* 0.075 ,2) }}</td>
		</tr>
		<tr>
			<td></td>
			<td><strong>TOTAL:</strong></td>
			<td></td>
			<td></td>
			<td style="border-top-color: black;border-bottom-color: black"><strong><u>N{{number_format((($total + 0.12*$total) * 0.075) + ($total+ 0.12*$total) ,2) }}</u></strong></td>
		</tr>
		@endif
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td><td>Make All Cheques Payable</td><td></td><td>Delivery timeline - 30days Payment Terms:80% Upfront, 20% on delivery</td></tr>
	<tr><td></td><td>Account Name: Snapnet Limited</td><td></td></tr>
	<tr><td></td><td>Bank: Diamond Bank Plc.</td><td></td></tr>
	<tr><td></td><td>Account #: 0073821499</td></tr>
	<tr><td></td><td>TIN - 02298067-0001</td></tr>
	<tr><td></td><td>For enquiries contact  sales@snapnet.com.ng</td></tr>
	</table>

	</table>
</div>

	
</body>
</html>