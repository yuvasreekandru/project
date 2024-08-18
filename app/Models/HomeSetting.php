<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;

    protected $table = "home_settings";

    static public function getSingle()
    {
        return self::find(1);
    }
    public function getPaymentImage()
    {
        if(!empty($this->payment_delivery_image) && file_exists('upload/settings/'.$this->payment_delivery_image))
        {

            return url('upload/settings/'.$this->payment_delivery_image);
        }
        else
        {
            return "";
        }
    }
    public function getRefundImage()
    {
        if(!empty($this->refund_image) && file_exists('upload/settings/'.$this->refund_image))
        {

            return url('upload/settings/'.$this->refund_image);
        }
        else
        {
            return "";
        }
    }
    public function getSupportImage()
    {
        if(!empty($this->support_image) && file_exists('upload/settings/'.$this->support_image))
        {

            return url('upload/settings/'.$this->support_image);
        }
        else
        {
            return "";
        }
    }
    public function getSignupImage()
    {
        if(!empty($this->signup_image) && file_exists('upload/settings/'.$this->signup_image))
        {

            return url('upload/settings/'.$this->signup_image);
        }
        else
        {
            return "";
        }
    }
}
