<?php
namespace App\Support;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UploadFile
{
	public static function uploadFile($file, $folder, $name)
    {
		$extension = $file->getClientOriginalExtension();

		// Verify if directory exists
		if(!is_dir($folder))
		{
			// Create directory
			Storage::disk('local')->makeDirectory($folder);
		}

		// Generate url to file
		$url = '/' . $folder . '/' . $name . '.' . $extension;

		// Put the file into folder
		try
		{
			Storage::disk('local')->put($url, File::get($file));
			return $url;
		}
		catch(\Exception $e)
		{
			// If copy file is wrong
			return null;
		}
	}

	public static function downloadFile($url, $name)
	{
		$file = public_path() . '/' . $url;
		$headers = array();
		return response()->download($file, $name, $headers);
	}

	public static function deleteFile($url)
	{
		return Storage::disk('local')->delete($url);
	}
}