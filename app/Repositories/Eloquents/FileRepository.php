<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\FileRepositoryInterface;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\File;
use Config;
use Carbon\Carbon;

class FileRepository extends EloquentRepository implements FileRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return File::class;
    }

    public function saveSingleImage($photo, $orientation, $category)
    {
        $imageName = $photo->getClientOriginalName();
        $baseFolder = env('IMAGE_UPLOAD_PATH') . '/public/uploads/' . $category;
        if(!file_exists($baseFolder)){
            mkdir($baseFolder, 755, true);
        }

        // upload image
        $imageRaw = Image::make($photo);

        switch ($orientation) {
            case 3:
                $deg = 180;
                break;
            case 6:
                $deg = 270;
                break;
            case 8:
                $deg = 90;
                break;
            default:
                $deg = 0;
                break;
        }
        $imageRaw->rotate($deg);

        // xử lý lưu ảnh gốc vào server
        $imageName = date('Ymd_His') . '_' . $imageName;
        $imageRaw->save($baseFolder . '/' . $imageName , 90);
        $arrData = [
            'name' => $imageName,
            'base_folder' => 'uploads/' . $category
        ];

        $file = $this->create($arrData);
        return $file;
    }
}