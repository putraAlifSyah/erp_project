<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A simple, clean, and responsive HTML invoice template</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		{{-- @php
			dd($data[0]['kode_order']);
		@endphp --}}
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/logo.png'))) }}" style="width: 20%; max-width: 300px" />
								</td>

								<td>
									Invoice #: {{ $tanggal->id }}<br />
									Created: {{ $tanggal->created_at }}<br />
									Due: {{ $tanggal->expired }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									PT. ERP Kelas C.<br />
									Jl. Sigura - Gura No.2, Sumbersari, Kec. Lowokwaru, <br />
									Kota Malang, Jawa Timur 65152d
								</td>

								<td>
									PT ERP<br />
									Ocha<br />
									ocha@gmail.com
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Costumer Information</td>
					<td></td>
				</tr>

				<tr>
					<td>Nama</td>
					<td>{{ $tanggal->PanggilCustomer['nama_customer'] }}</td>
				</tr>
				<tr>
					<td>Jenis Customer</td>
					<td>{{ $tanggal->PanggilCustomer['jenis_customer'] }}</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>{{ $tanggal->PanggilCustomer['alamat'] }}</td>
				</tr>
				<tr>
					<td>Handphone</td>
					<td>{{ $tanggal->PanggilCustomer['hp'] }}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>{{ $tanggal->PanggilCustomer['email'] }}</td>
				</tr> 
				
				<tr class="heading">
					<td>Produk</td>

					<td>Harga</td>
				</tr>

				@foreach ($datas as $data)
					<tr class="item">
						<td>{{$data->PanggilProduk['nama_produk']}}</td>
						<td>{{ $data->qty }}pcs/{{ $data->sub_total }}</td>
					</tr>					
				@endforeach

				<tr class="total">
					<td></td>

					<td>Total: Rp. {{ $total }}</td>
				</tr>
			</table>
		</div>
	</body>
</html>