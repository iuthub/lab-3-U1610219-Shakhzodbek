<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>


		<div id="listarea">
			<ul id="musiclist">

				<?php if(isset($_REQUEST["playlist"])){
					$list_of_music = explode("\n", file_get_contents("songs/".$_REQUEST["playlist"]));
					foreach ($list_of_music as $key => $value) { ?>
						<li class="playlistitem"><a href="songs/<?=$value?>"><?= basename($value)?></a></li>
				<?php	}
				 }else{
						$path = "songs";
					foreach (glob($path."/*.mp3") as $music_file) {?>
						 <li class="mp3item"><a href="<?= $music_file ?>"><?= basename($music_file) ?></a> - <?= round(filesize($music_file)/1024, 2) ?> kb </li>
					<?php } ?>
					
					<?php foreach (glob($path."/*.txt") as $playlist) { ?>
						<li class="playlistitem"><a href="music.php?playlist=<?= basename($playlist) ?>"> <?= basename($playlist)?> </a> - <?= round(filesize($playlist)/1024, 2) ?> kb</li>
			<?php }
				} ?>
			</ul>
		
				
		</div>
	</body>
</html>
