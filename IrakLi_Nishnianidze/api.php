<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body{
			margin-top:20px;
			background:#eee;
		}

		.avatar {
			position: relative;
			display: inline-block;
			width: 40px;
			white-space: nowrap;
			border-radius: 1000px;
			vertical-align: bottom
		}

		.avatar i {
			position: absolute;
			right: 0;
			bottom: 0;
			width: 10px;
			height: 10px;
			border: 2px solid #fff;
			border-radius: 100%
		}

		.avatar img {
			width: 100%;
			max-width: 100%;
			height: auto;
			border: 0 none;
			border-radius: 1000px
		}

		.avatar-online i {
			background-color: #4caf50
		}

		.avatar-off i {
			background-color: #616161
		}

		.avatar-busy i {
			background-color: #ff9800
		}

		.avatar-away i {
			background-color: #f44336
		}

		.avatar-100 {
			width: 100px
		}

		.avatar-100 i {
			height: 20px;
			width: 20px
		}

		.avatar-lg {
			width: 50px
		}

		.avatar-lg i {
			height: 12px;
			width: 12px
		}

		.avatar-sm {
			width: 30px
		}

		.avatar-sm i {
			height: 8px;
			width: 8px
		}

		.avatar-xs {
			width: 20px
		}

		.avatar-xs i {
			height: 7px;
			width: 7px
		}

		.list-group-item {
			position: relative;
			display: block;
			padding: 10px 15px;
			margin-bottom: -1px;
			background-color: #fff;
			border: 1px solid transparent;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="row bootstrap snippets bootdey">
			<div class="col-md-8 col-xs-12">
				<div class="panel" id="followers">
					<div class="panel-heading">
						<h1>დავალება N2: </h1>
						<h3 class="panel-title">
							<form action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
							<div class="form-outline mb-4">
								<input type="text" name="username" class="form-control form-control-lg" placeholder="GitHub Username" />
							</div>
							<div class="form-outline mb-4">
								<select name="type">
									<option value="repos" selected>Repositories</option>
									<option value="followers">Followers</option>
								</select>
							</div>
							<input type="submit" value="ინფო" class="btn btn-primary btn-block mb-4">
							</form>
						</h3>
					</div>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>

<?php require 'function.php'; ?>

<?php foreach($page as $data): ?>
	<?php if (!$data['message'] == "Not Found"): ?>
		<?php if (strpos($_POST['type'], 'repos') !== false): ?>
     <div class="panel-body">
          <ul class="list-group list-group-dividered list-group-full">
            <li class="list-group-item">
              <div class="media">
                <div class="media-left">
                  <a class="avatar avatar-online" href="<?=$data['html_url']; ?>">
                    <img src="<?=$data['owner']['avatar_url']; ?>" alt="">
                  </a>
                </div>
                <div class="media-body">
                  <div><a class="name" href="<?=$data['html_url']; ?>"><?=$data['full_name']; ?></a></div>
                  <small><?=$data['html_url']; ?></small>
                </div>
              </div>
            </li>
          </ul>
        </div>
	<hr/>
<?php else: ?>
 <div class="panel-body">
          <ul class="list-group list-group-dividered list-group-full">
            <li class="list-group-item">
              <div class="media">
                <div class="media-left">
                  <a class="avatar avatar-online" href="<?=$data['html_url']; ?>">
                    <img src="<?=$data['avatar_url']; ?>" alt="">
                  </a>
                </div>
                <div class="media-body">
                  <div><a class="name" href="<?=$data['html_url']; ?>"><?=$data['login']; ?></a></div>
                  <small><?=$data['html_url']; ?></small>
                </div>
              </div>
            </li>
          </ul>
        </div>
	<hr/>
			<?php endif ?>
		<?php endif ?>
	<?php endforeach ?>
<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>