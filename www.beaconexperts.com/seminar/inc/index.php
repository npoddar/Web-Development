<?php



	include 'inc/config.php';

	

	switch(isset($_GET['a']) ? $_GET['a'] : NULL) {

		case 'admin':

			if ($Self) {

				if ($Self->mustChangePassword()) {

					include 'private/page/password_gate.php';

					exit;

				}

				switch(isset($_GET['b']) ? $_GET['b'] : NULL) {

					case 'logout':

						include 'private/page/logout.php';

						exit;

					case 'log':

						include 'private/page/index.php';

						exit;

					case 'video':

						switch(isset($_GET['c']) ? $_GET['c'] : NULL) {

							case 'create':

								include 'private/page/video/create.php';

								exit;

							default:

								if (isset($_GET['c'])) {

									if ($Video = Video::fetchWithId($_GET['c'])) {

										include 'private/page/video/edit.php';

										exit;

									}

								}

								include 'private/page/video/list.php';

								exit;

						}

					default:

						include 'private/page/video/list.php';

						exit;

				}

			} else {

				switch(isset($_GET['b']) ? $_GET['b'] : NULL) {

					case 'forgotten_password':

						include 'private/page/forgotten_password.php';

						exit;

					default:

						include 'private/page/login.php';

						exit;

				}

			}

		default:

			$Video = Video::fetchWithId(isset($_GET['b']) ? $_GET['b'] : NULL);

			include 'public/page/video/password.php';

			//include 'public/page/video/embed.php';

			exit;

	}



?>