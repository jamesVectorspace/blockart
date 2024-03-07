<?php

namespace Modules\StorageDriver\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Validator;
use App\Lib\Env;
use Aws\S3\S3Client;

class StorageDriver extends Model
{
    /**
     * trait to links a Eloquent model to a model factory
     */
    use HasFactory;
    /**
     * fields are to be considered - name
     */
    protected $fillable = ['name'];
    /**
     * Disabled timestamps (created_at, updated_at)
     */
    public $timestamps = false;

    /**
     * Validation
     * @param array $data
     * @return mixed validated data
     */
    protected static function validation($data = NULL)
    {
        $rules = [
            'name' => 'required|in:local,amazon-s3,digital-ocean,wasabi,bunny-cdn,ftp',
        ];
        $messages = [
            'name.required' => __('The Storage Driver field is required.'),
        ];
        return Validator::make($data, $rules, $messages);
    }

     /**
     * Store or Update
     * @param  array $data
     * process filesystem storage exists or not in env
     * update default filesystem in env
     * @return boolean
     */
    public function storeOrUpdate($data = [])
    {
        if (!empty($data)) {
            Env::set("FILESYSTEM_DRIVER", implode(" ", $data), envPath());
            \Artisan::call('optimize:clear');
            return true;
        }
        
        return false;
    }

     /**
     * Update
     * @param  array $data
     * @param  string $driver
     * specific name based filesystem storage config exixsts or not in env
     * update specific name based filesystem in env
     * @return boolean
     */
    public function storeOrUpdateConfig($data = [], $driver)
    {
        if (empty($driver)) {
            return false;
        }
        
        $checkingMethod = $this->getCheckingMethodName($driver);
        if (!$this->$checkingMethod($data)) {
            return false;
        }
        
        foreach($data as $key => $value){
            Env::set(strtoupper($key), $value, envPath());
        }
        
        try {
            \Artisan::call('config:cache');
            \Storage::disk($driver)->allDirectories('public');
            return true;
        } catch (\Exception $th) {
            foreach($data as $key => $value){
                Env::set(strtoupper($key), '', envPath());
            }
            
            return false;
        }
    }
    
    /**
     * Check credential
     */
    private function checkCredential(array $data): bool
    {
        try {
            $s3Client = new S3Client([
                'version' => 'latest',
                'region' => $data['region'],
                'credentials' => [
                    'key' => $data['key'],
                    'secret' => $data['secret'],
                ],
                'endpoint' => $data['endpoint'],
            ]);
        
            // Attempt to list objects in the specified bucket
            $s3Client->listObjects([
                'Bucket' => $data['bucket'],
            ]);
        
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    
    /**
     * Check Aws credential
     */
    private function checkAwsCredential(array $data): bool
    {
        return $this->checkCredential([
            'key' => $data['aws_access_key_id'],
            'secret' => $data['aws_secret_key'],
            'region' => $data['aws_default_region'],
            'endpoint' => $data['aws_endpoint'],
            'bucket' => $data['aws_bucket']
        ]);
    }
    
    /**
     * Check Digital Ocean credential
     */
    private function checkDigitalOceanCredential(array $data): bool
    {
        return $this->checkCredential([
            'key' => $data['do_access_key_id'],
            'secret' => $data['do_secret_key'],
            'region' => $data['do_default_region'],
            'endpoint' => $data['do_endpoint'],
            'bucket' => $data['do_bucket']
        ]);
    }
    
    /**
     * Check Wasabi credential
     */
    private function checkWasabiCredential(array $data): bool
    {
        return $this->checkCredential([
            'key' => $data['was_access_key_id'],
            'secret' => $data['was_secret_key'],
            'region' => $data['was_default_region'],
            'endpoint' => $data['was_url'],
            'bucket' => $data['was_bucket']
        ]);
    }
    
    /**
     * Get credential checking method name
     */
    private function getCheckingMethodName(string $driver): string
    {
        $data = [
            'digital-ocean' => 'checkDigitalOceanCredential',
            'amazon-s3' => 'checkAwsCredential',
            'wasabi' => 'checkWasabiCredential'
        ];
        
        return $data[$driver];
    }
}
