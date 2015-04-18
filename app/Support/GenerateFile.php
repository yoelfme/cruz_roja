<?php

namespace App\Support;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class GenerateFile
{
	public function get($url)
	{
		$base_url = __DIR__ . '/../../public/';
		$url = $base_url . $url;

		$mime_type = mime_content_type($url);;

		$uploaded = new UploadedFile(
			$url,
			$url,
			$mime_type,
			filesize($url),
			UPLOAD_ERR_OK,
			true
		);

		return $uploaded;
	}

}