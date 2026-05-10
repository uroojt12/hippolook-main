<!DOCTYPE html>
<html>

<head>
	<title><?= $email_subject; ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
</head>

<body>
	<table width="650" cellspacing="0" cellpadding="0" style="font-family:Arial; font-size:15px; color:#333; margin:0 auto; border:0">
		<tbody>
			<tr>
				<td>
					<table width="100%" cellspacing="0" cellpadding="0" style="padding:20px 0;border:0">
						<tbody>
							<tr>
								<td>
									<a href="<?= base_url(); ?>" target="_blank" style="display:block;width:220px;">
										<img src="<?= SITE_IMAGES . '/images/' . $site_settings->site_logo . '?v-' . $site_settings->site_version ?>" alt="<?= $site_settings->site_name ?> Logo" style="display:block;width:100%" />
									</a>
								</td>
								<td valign="top" style="font-size:12px;text-align:right">
									<strong><?= date("h:i a"); ?></strong>
									<br />
									<strong><?= date("m/d/Y"); ?><br></strong>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td style="background:#fafafa; padding:15px; border:1px solid #eee">
					<table width="100%" cellspacing="0" cellpadding="0" style="background:#fff; padding:5px 0; border:1px solid #eee">
						<tbody>
							<tr>
								<td style="padding:10px 15px; font-size:15px;">
									<strong> Hi! <?= $mem_data['to_name'] ?>, </strong>
								</td>
							</tr>
							<tr>
								<td style="padding:10px 15px; font-size:15px;"><?= $email_body ?></td>
							</tr>
							<?php if (!empty($mem_data['point_link'])) : ?>
								<tr>
									<td style="padding:10px 15px">
										<a href="<?= $mem_data['point_link'] ?>" style="display:inline-block;font-size: 13px; padding: 12px 20px; border-radius:5px; background:#ea1f66; color:#fff; text-decoration:none"><?= !empty($mem_data['point_text']) ? $mem_data['point_text'] : 'View'; ?></a>
									</td>
								</tr>
							<?php endif ?>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td style="background:#2f2f2f;color:#fff;font-size:12px;padding:15px;text-align:center">
					Copyright ©
					<?= date('Y') ?>
					<a href="<?= site_url() ?>" style="color: #2cb1ff; text-decoration: none;"> <?= $site_settings->site_name ?></a>.
					<br>
					<?php if ($site_settings->site_facebook != '') : ?>
						<a href="<?= $site_settings->site_facebook ?>" style="display:inline-block;margin-top:5px">
							<img src="<?= base_url('assets/images/social-facebook.png') ?>" style="width: 26px; height: 26px" alt="">
						</a>
					<?php endif ?>
					<?php if ($site_settings->site_twitter != '') : ?>
						<a href="<?= $site_settings->site_twitter ?>" style="display:inline-block;margin-top:5px">
							<img src="<?= base_url('assets/images/social-twitter.png') ?>" style="width: 26px; height: 26px" alt="">
						</a>
					<?php endif ?>
					<?php if ($site_settings->site_instagram != '') : ?>
						<a href="<?= $site_settings->site_instagram ?>" style="display:inline-block;margin-top:5px">
							<img src="<?= base_url('assets/images/social-instagram.png') ?>" style="width: 26px; height: 26px" alt="">
						</a>
					<?php endif ?>
					<?php if ($site_settings->site_youtube != '') : ?>
						<a href="<?= $site_settings->site_youtube ?>" style="display:inline-block;margin-top:5px">
							<img src="<?= base_url('assets/images/social-youtube.png') ?>" style="width: 26px; height: 26px" alt="">
						</a>
					<?php endif ?>
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>