<?php

#-----------------------------------------------------------------------
#   Custom non-Laravel helpers
#-----------------------------------------------------------------------

use App\Models\Settings;
use Illuminate\Support\Carbon;

if (!function_exists('format_price')) {
    /**
     * Return a complete objects of the website settings.
     *
     * @param  \App\Models\Settings $code
     * @param  null
     * @return $settings objects
     *
     */
    function format_price($amount=0)
    {
        return settings('currency'). number_format($amount, 2);
    }
}

if (!function_exists('settings')) {
    /**
     * Return a complete objects of the website settings.
     *
     * @param  \App\Models\Settings $code
     * @param  null
     * @return $settings objects
     *
     */
    function settings($key)
    {
        $value = Settings::where('key', $key)->first();
        return $value->value;
    }
}

if (!function_exists('get_error_response')) {
    /**
     * @param int $code : Error Code
     * @param string $msg  : Error Message
     * @param array $data : Error Message
     */
    function get_error_response(int $code, string $msg, array $data)
    {
        return [
            "status"    =>  $code,
            "message"   =>  $msg,
            "error"     =>  $data
        ];
    }
}

if (!function_exists('get_success_response')) {
    /**
     * @param int $code : Error Code
     * @param string $msg  : Error Message
     * @param array $data : Error Message
     */
    function get_success_response(array $data, int $code = 200)
    {
        return [
            "status"    =>  $code,
            "message"   =>  "success",
            "data"      =>  $data
        ];
    }
}

if (!function_exists('save_image')) {
    function save_image($path, $image): string
    {
        $image_path = '/storage/' . $path;
        $path = public_path($image_path);
        $filename = sha1(time()) . '.jpg';
        $image->move($path, $filename);
        $img_url = asset($image_path . '/' . $filename);
        return $img_url;
    }
}

if (!function_exists('get_greetings')) {
    /**
     */
    function get_greetings()
    {
        $hour = date('G');

        if ((int) $hour == 0 || (int) $hour <= 9) {
            $greet = 'Good Morning,';
        } elseif ((int) $hour >= 10 && (int) $hour <= 11) {
            $greet = 'Good Day,';
        } elseif ((int) $hour >= 12 || (int) $hour <= 15) {
            $greet = 'Good Afternoon,';
        } elseif ((int) $hour >= 16 || (int) $hour <= 23) {
            $greet = 'Good Evening,';
        } else {
            $greet = 'Welcome,';
        }

        return $greet . " \t";
    }
}

if (!function_exists('per_page')) {
    /**
     */
    function per_page($count=null)
    {
        if(null != $count){
            return $count;
        }
        return settings('list_per_page') ?? 10;
    }
}

if (!function_exists('to_array')) {
    /**
     * Convert data to array
     */
    function to_array($result)
    {
        if (is_array($result)) {
            return ($result);
        } elseif (is_object($result)) {
            return json_decode(json_encode($result), true);
        } else {
            return json_decode($result, true);
        }

    }
}

if (!function_exists('showAmount')) {

    function showAmount($amount, $decimal = 2, $separate = true, $exceptZeros = false)
    {
        // var_dump($amount); exit;
        $separator = '';
        if ($separate) {
            $separator = ',';
        }
        $printAmount = number_format((int) $amount, $decimal, '.', $separator);
        if ($exceptZeros) {
            $exp = explode('.', $printAmount);
            if ($exp[1] * 1 == 0) {
                $printAmount = $exp[0];
            } else {
                $printAmount = rtrim($printAmount, '0');
            }
        }
        return $printAmount;
    }
}

if (!function_exists('get_status')) {
    function get_status($status){
        switch ($status) {
            case 'cancel':
                return 3;
                break;
            
            case 'cancelled':
                return 3;
                break;
            
            case 'failed':
                return 3;
                break;
            
            case 'success':
                return 1;
                break;
            
            case 'approve':
                return 1;
                break;
            
            case 'successful':
                return 1;
                break;
            
            case 'pending':
                return 0;
                break;
            
            default:
                return 0;
                break;
        }
    }
}


if (!function_exists('showDateTime')) {
    function showDateTime($date, $format = 'Y-m-d h:i A')
    {
        $lang = session()->get('lang');
        Carbon::setlocale($lang);
        return Carbon::parse($date)->translatedFormat($format);
    }
}

#-----------------------------------------------------------------------
#
#-----------------------------------------------------------------------
