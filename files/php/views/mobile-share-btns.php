<div class="franken-mobile-share-btns">
	<div id="frankenShuffle" class="share-btn btn" style="font-size: <?php echo $site_data->shareBtn->shuffleBtn->mobileSize; ?>;">
		<div class="frank_btn"><img src="files/images/mobile/frank_ui_shuffle_2x.png" /></div>
		<div class="btn-txt"><?php echo $site_data->shareBtn->shuffleBtn->value; ?></div>
	</div>
	<div id="frankenDownload" class="share-btn btn" style="font-size: <?php echo $site_data->shareBtn->downloadBtn->mobileSize; ?>;">
		<a href="" id="downloadLink" target="_blank">
			<div class="frank_btn"><img src="files/images/mobile/frank_ui_download_2x.png" /></div>
			<div class="btn-txt"><?php echo $site_data->shareBtn->downloadBtn->value; ?></div>
		</a>
	</div>
	<a href="" id="downloadLink" download="FrankenFriend"></a>
	<div id="frankenShare" class="share-btn btn" style="font-size: <?php echo $site_data->shareBtn->shareBtn->mobileSize; ?>;">
		<div class="frank_btn"><img src="files/images/mobile/frank_ui_share_2x.png" /></div>
		<div class="btn-txt"><?php echo $site_data->shareBtn->shareBtn->value; ?></div>
	</div>
	<div id="frankenRestart" class="share-btn btn" style="font-size: <?php echo $site_data->shareBtn->restartBtn->mobileSize; ?>;">
		<div class="frank_btn"><img src="files/images/mobile/frank_ui_restart_2x.png" /></div>
		<div class="btn-txt"><?php echo $site_data->shareBtn->restartBtn->value; ?></div>
	</div>
</div>
<div id="mobileShareOverlay" class="share-btns">
	<div class="modal-bg"></div>
	<div class="modal-close btn" style="font-size: <?php echo $site_data->facebookModal->closeBtn->size; ?>;"><?php echo $site_data->facebookModal->closeBtn->value; ?> <div class="close-x">x</div></div>
	<div class="modal-content">
		<div class="share-fb"><img src="files/images/mobile/frank_share_fb_2x.png" /></div>
		<div class="share-tw"><img src="files/images/mobile/frank_share_twitter_2x.png" /></div>
	</div>
</div>
