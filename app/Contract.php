<?php

namespace App;

use function Couchbase\defaultDecoder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Nexmo\Response;

class Contract extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contracts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['documentType', 'customer_id', 'documentDate', 'documentPath', 'fileType','fileSize'];

    public function saveFileToStorage($file, $customer)
    {
        $storage = Storage::disk('local');

        $storedFile = $storage->put('public/documents/CUST_' . $customer, new File($file));
//        dd($storeFile);


        return $storedFile;

    }

    public function propperIcon($mime)
    {
        switch ($mime) {
            case $mime === "application/pdf":
                return '<i class="fas fa-file-pdf fa-3x"></i>';
                break;
            case $mime === "image/jpeg":
                return '<i class="fas fa-image fa-3x"></i>';
                break;
            case $mime === "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
                return '<i class="fas fa-file-word fa-3x"></i>';
                break;
            case $mime === "application/zip":
                return '<i class="fas fa-file-archive fa-3x"></i>';
                break;
            default:
                return 'unknown';
                break;
        }
    }

    public function documentTypeIcon($documentType)
    {
        switch($documentType) {
            case $documentType === "contract":
                return 'Договор за покупко-продажба';
                break;
            case $documentType === "ppp":
                return 'Приемо-предавателен протокол';
                break;
            default:
                break;

        }
    }

    public function scopeGetMissingDocuments($query, $customerId)
    {
        $inf = $query->where('customer_id', $customerId)->where('documentType','ppp');
        $xc = $query->where('customer_id', $customerId)->where('documentType', 'contracts');


        return $inf;
    }
    public function icon($file)
    {
//        return $this->fileType;
        return $this->propperIcon($file->fileType);
    }
}
