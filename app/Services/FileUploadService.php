<?php
namespace App\Services;

use Illuminate\Support\Str;

class FileUploadService
{
public function upload($file)
{
// Generate random file name
$randomName = Str::uuid()->toString();
$fileExtension = $file->getClientOriginalExtension();
$fileName = $randomName . '.' . $fileExtension;

// Move the file to the public/images directory
$file->move(public_path('images'), $fileName);

return $fileName;
}

public function deleteOldFile($fileName)
{
// Check if the file exists and delete it
if (file_exists(public_path('images/' . $fileName))) {
unlink(public_path('images/' . $fileName));
}
}
}