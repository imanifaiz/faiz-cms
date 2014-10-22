<?php 

use Illuminate\Filesystem\Filesystem;

class MediaController extends Controller {
	/**
	 * The uploaded file
	 * @var Input
	 */
	protected $file;

	/**
	 * Directory for the uploaded file
	 * @var String 
	 */
	protected $dir;

	/**
	 * Process the uploaded file
	 * @return Response JSON 
	 */
	public function upload()
	{	
		// Grab the input file
		$this->file = Input::file('file');	

		// Validate rules
		$rules = array(
			'file' => 'image|max:2000'
		);

		// New Validator instance
		$validator = Validator::make(Input::all(), $rules);

		// Validate the file
		if ($validator->fails()) {
			// Grab all error messages
			$errors = $validator->messages();

			$err_msg = '';

			foreach ($errors->all(':message') as $error) {
				$err_msg .= $error .' ';
			}
			
			return Response::json(array('error' => $err_msg));
		}

		// Get the directory
		$this->dir = $this->getDirectory();
		// Move the file into the folder
		return $this->moveFile();
		
	}

	/**
	 * Create the directory for the uploaded file
	 * @return String The folder name
	 */
	public function getDirectory()
	{
		// Check if folder with name = current year exist (ie 2014)
	    $dir = 'uploads/' . Date('Y');

		if (!File::isDirectory($dir)) {
			// Create new folder for current year
			File::makeDirectory($dir);
		}

		// Check if folder with name = current month exist (ie 10 for oct)
		$upload_dir = 'uploads/' . Date('Y') . '/' . Date('m');

		if (!File::isDirectory($upload_dir)) {
			// Create new folder for current month
			File::makeDirectory($upload_dir);
		}

		return $upload_dir;
	}

	/**
	 * Move the uploaded file into folder
	 * @return Response JSON
	 */
	public function moveFile()
	{
		$thumbnail = Image::make($this->file)->resize(null, 100, function($constraint)
					{
						$constraint->aspectRatio();
						// $constraint->upsize();
					});

		// Move uploaded imagesto this folder
		$file_moved = $this->file->move($this->dir, $this->file->getClientOriginalName());

		// If successfully moved
		if ($file_moved) {
			// Generate thumbnail image
			$thumbnail->save(public_path() . '/' . $this->dir . '/thumb_' . $this->file->getClientOriginalName());

			return Response::json(array('filelink' => '/' . $this->dir . '/' . $this->file->getClientOriginalName()));
		}

	}

	/**
	 * Return JSON list of all uploaded images
	 * @return Response JSON 
	 */
	public function imagesManager()
	{
		$images = array();

		// Grab all images in the directory
		$files = File::allFiles(public_path() . '/uploads');

		foreach ($files as $file) {
			// Ignore thumbnail image
			if (!strpos($file, 'thumb_')) {
				// Get the image extension
				$ext = '.' . pathinfo($file, PATHINFO_EXTENSION);
				// Get the directory path for the image
				$path = explode( "/", substr($file,strpos($file,"/uploads")));
				// Remove file name to get only directory name
				array_pop($path);

				$image_path = implode("/", $path);

				$images[] = array("thumb" => $image_path .'/thumb_' . basename($file), "image" => $image_path .'/' . basename($file), "title" => basename($file, $ext), "link" => $image_path .'/' . basename($file));
			}
		}

		return Response::json($images);
	}

}