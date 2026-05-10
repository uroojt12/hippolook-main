<!DOCTYPE html>
<html>
	<head>
		<title><?= $email_subject; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet" />
	</head>
	<body>
		<table width="740" cellspacing="0" cellpadding="0" style="font-family: 'ABeeZee', sans-serif; font-size: 12px; color: #0f0f0f; margin: 0 auto; border: 1px solid #0f0f0f; padding: 20px; line-height: 1.4;">
			<thead>
				<tr>
					<th style="padding: 0 40px;">
						<table width="100%" cellspacing="0" cellpadding="0" style="border: 0;">
							<tbody>
								<tr>
									<td>
										<a href="<?= base_url(); ?>" target="_blank" style="display: block; width: 140px; margin: -10px 0;">
											<img src="<?= SITE_IMAGES.'/images/'.$site_settings->site_logo.'?v-'.$site_settings->site_version?>" alt="<?= $site_settings->site_name?> Email Logo" style="display: block; width: 100%;" />
										</a>
									</td>
									<td style="text-align: right;">
										<strong>Order number :<?= num_size($mem_data['row']->id);?></strong>
									</td>
								</tr>
							</tbody>
						</table>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="padding: 30px 40px 0;">
						<table width="100%" cellspacing="0" cellpadding="0" style="padding: 20px; border: 1px solid #0f0f0f;">
							<tbody>
								<tr>
									<td style="background: #fff; font-size: 24px; text-align: center; -webkit-text-stroke: 3px #0f0f0f; letter-spacing: 2.5px;">
										<strong>
											New Order has been placed
										</strong>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td style="padding: 0 40px;">
						<table width="100%" cellspacing="0" cellpadding="0" style="border: 0; border-bottom: 1px solid #0f0f0f; padding: 20px 0;">
							<tbody>
								<tr valign="top">
									<!-- <td>
										Dear <?= $mem_data['name']?>, <br />
										Thanks again for your purchase at <?= $site_settings->site_name?>. <br />
										<?php if (!empty($mem_data['order_line'])): ?>
											<?= $mem_data['order_line']?>
										<?php endif ?>
									</td>
									<td style="padding-left: 20px;"> -->
										<th>Name: </th>
										<td><?= $mem_data['row']->name?></td>
										<th>Email:</th>
										<td><?= $mem_data['row']->email?></td>
								</tr>
								<tr valign="top">
										<th>Phone: </th>
										<td><?= $mem_data['row']->phone?></td>
										<th>Address: </th>
										<td><?= $mem_data['row']->address?></td>
								</tr>
								<tr valign="top">
										<th>City: </th>
										<td><?= $mem_data['row']->city?></td>
										<th>Province: </th>
										<td><?= $mem_data['row']->state?></td>
								</tr>
								<tr valign="top">
										<th>Postal Code: </th>
										<td><?= $mem_data['row']->zip?></td>
										<th>Country: </th>
										<td><?= $mem_data['row']->country?></td>
									<!-- </td> -->
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td style="padding: 0 40px;">
						<table width="100%" cellspacing="0" cellpadding="0" style="border: 0; border-bottom: 1px solid #0f0f0f; padding: 20px 0;">
							<tbody>
								<tr>
									<td>Order number</td>
									<td style="padding-left: 20px; text-align: right;"><?= num_size($mem_data['row']->id);?></td>
								</tr>
								<tr>
									<td>Order date</td>
									<td style="padding-left: 20px; text-align: right;"><?= format_date($mem_data['row']->date, 'd F Y');?></td>
								</tr>
								<!-- <tr>
									<td>Customer ID Number</td>
									<td style="padding-left: 20px; text-align: right;">:<?= num_size($mem_data['row']->mem_id);?></td>
								</tr> -->
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td style="padding: 0 40px;">
						<table width="100%" cellspacing="0" cellpadding="0" style="border: 0; border-bottom: 1px solid #0f0f0f; padding: 20px 0;">
							<tbody>
								<tr style="-webkit-text-stroke: 0.5px #0f0f0f;">
									<!-- <td style="padding-bottom: 10px;">Article number</td> -->
									<td style="padding-left: 20px; padding-bottom: 10px; text-align: center;">Product</td>
									<td style="padding-left: 20px; padding-bottom: 10px; text-align: center;">Size</td>
									<td style="padding-left: 20px; padding-bottom: 10px; text-align: center;">Quantity</td>
									<td style="padding-left: 20px; padding-bottom: 10px; text-align: center;">Unit price</td>
									<td style="padding-left: 20px; padding-bottom: 10px; text-align: right;">Total</td>
								</tr>
								<?php $sub_total=0; foreach ($mem_data['row']->products as $key => $pro): ?>
									$sub_total +=$subtotal + $pro->total;
									<tr>
										<!-- <td style="color: #279b9b; padding-bottom: 20px;">
											<img src="<?= get_image_src($pro->image, 150); ?>" style="display: block; width: 36px; height: 36px; border: 1px solid #eee;" />
										</td> -->
										<td style="padding-left: 20px; padding-bottom: 20px; text-align: center;"><?= $pro->title?></td>
										<td style="padding-left: 20px; padding-bottom: 20px; text-align: center;"><?= $pro->size?></td>
										<td style="padding-left: 20px; padding-bottom: 20px; text-align: center;"><?= $pro->qty?></td>
										<td style="padding-left: 20px; padding-bottom: 20px; text-align: center;"><?= format_amount($pro->price)?></td>
										<td style="padding-left: 20px; padding-bottom: 20px; text-align: right;"><?= format_amount($pro->total)?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="6" style="padding-bottom: 5px; border-top: 1px solid #0f0f0f; border-bottom: 1px solid #0f0f0f;"></td>
								</tr>
								<tr style="-webkit-text-stroke: 0.5px #0f0f0f;">
									<!-- <td style="padding-top: 20px;">Delivery Cost</td> -->
									<!-- <td style="padding-left: 20px; padding-top: 20px; text-align: center;">TAX</td> -->
									<td style="padding-left: 20px; padding-top: 20px; text-align: center;">Total NET</td>
									<!-- <td style="padding-left: 20px; padding-top: 20px; text-align: center;">Total TAX</td> -->
									<?php if (!empty($mem_data['row']->discount_amount)): ?>
										<td style="padding-left: 20px; padding-top: 20px; text-align: center;">Discount</td>
									<?php endif ?>
									<?php if (!empty($mem_data['row']->delivery_cost)): ?>
										<td style="padding-left: 20px; padding-top: 20px; text-align: center;">Delivery</td>
									<?php endif ?>
									<td style="padding-left: 20px; padding-top: 20px; text-align: right;">TOTAL</td>
								</tr>
								<tr>
									<!-- <td style="color: #279b9b; padding-top: 10px;">0</td> -->
									<!-- <td style="padding-left: 20px; padding-top: 10px; text-align: center;"><?= $mem_data['row']->tax?>%</td> -->



									<!-- <td style="padding-left: 20px; padding-top: 10px; text-align: center;"><?= format_amount($mem_data['row']->product_total)?></td> -->
									<td style="padding-left: 20px; padding-top: 10px; text-align: center;"><?= format_amount($sub_total) ?></td>



									<!-- <td style="padding-left: 20px; padding-top: 10px; text-align: center;"><?= format_amount($mem_data['row']->tax_amount)?></td> -->
									<?php if (!empty($mem_data['row']->discount_amount)): ?>
										<td style="padding-left: 20px; padding-top: 10px; text-align: center;"><?= format_amount($mem_data['row']->discount_amount) ?></td>
									<?php endif ?>
									<?php if (!empty($mem_data['row']->delivery_cost)): ?>
										<td style="padding-left: 20px; padding-top: 10px; text-align: center;"><?= format_amount($mem_data['row']->delivery_cost) ?></td>
									<?php endif ?>



									<!-- <td style="padding-left: 20px; padding-top: 10px; text-align: right;"><?= format_amount($mem_data['row']->product_total-$mem_data['row']->discount_amount + $mem_data['row']->delivery_cost + $mem_data['row']->tax_amount)?></td> -->
									<td style="padding-left: 20px; padding-top: 10px; text-align: right;"><?= format_amount($sub_total-$mem_data['row']->discount_amount + $mem_data['row']->delivery_cost + $mem_data['row']->tax_amount)?></td>
								</tr>
							</tfoot>
						</table>
					</td>
				</tr>
				<!-- <tr>
					<td style="padding: 0 40px;">
						<table width="100%" cellspacing="0" cellpadding="0" style="border: 0; border-bottom: 1px solid #0f0f0f; padding: 20px 0;">
							<tbody>
								<tr>
									<td>
										<?= $email_body?>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr> -->
				<tr>
					<td style="padding: 0 40px;">
						<table width="100%" cellspacing="0" cellpadding="0" style="border: 0; padding: 20px 0 0;">
							<tbody>
								<tr>
									<td>
										<a href="<?= site_url()?>"><?= $site_settings->site_name?></a><!--  ONLINE NETHERLAND <br>
										KvK number   4353453243645<br>
										BTW id nr      NL245354365757 -->
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>
