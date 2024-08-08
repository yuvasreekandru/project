<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory;
    protected $table = "system_settings";


    static public function getSingle()
    {
        return self::find(1);
    }

    public function getLogo()
    {
        if(!empty($this->logo) && file_exists('upload/settings/'.$this->logo))
        {

            return url('upload/settings/'.$this->logo);
        }
        else
        {
            return "";
        }
    }
    public function getfavicon()
    {
        if(!empty($this->favicon) && file_exists('upload/settings/'.$this->logo))
        {

            return url('upload/settings/'.$this->favicon);
        }
        else
        {
            return "";
        }
    }
    public function getFooterPayment()
    {
        if(!empty($this->footer_payment_icon) && file_exists('upload/settings/'.$this->logo))
        {

            return url('upload/settings/'.$this->footer_payment_icon);
        }
        else
        {
            return "";
        }
    }
}
