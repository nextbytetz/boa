<?php
namespace App\Services\Notifications;


use Carbon\Carbon;

class Sms
{
    /**
     * @var
     */
    protected $phone;

    /**
     * @var string
     */
    protected $sender;

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $datetime;

    /**
     * @var
     */
    protected $message;

    /**
     * @var
     */
    protected $mobile_service_id;

    public function __construct($phone, $message)
    {
   
        $this->sender = "BAKWATA";
       $this->key = "Basic TUFMSUJBVEU6TmV4dHNtc0AyMDIw";
       // $this->key = "Basic TUFMSUJBVEU6TmV4dHNtc0AyMD";
        $this->message = $message;        
        $this->datetime = Carbon::now()->toDateTimeString();            
        $this->phone = str_replace("+", "", phone($phone,$country = ['TZ'], $format = 'E164'));      	
      

    }
    
    public function send()
    {
        $curl = curl_init();
       
        $data = [
            'from' => $this->sender,
            'to' => urlencode($this->phone),
            'text' => $this->message        
        ];


        $data = json_encode($data);     
   
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://messaging-service.co.tz/api/sms/v1/text/single",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER=>false,
            CURLOPT_SSL_VERIFYHOST=>false,            
            CURLOPT_POST => true,         
            CURLOPT_POSTFIELDS =>$data,
            CURLOPT_HTTPHEADER => array(           
                'Authorization:'.$this->key,
                'Content-Type:application/json',
                'Accept:application/json'
            ),
        ));
      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);

        if ($err) 
        {
            $return = "cURL Error #:" . $err;
           
        } else 
        {
            $return = $response;
        }
        return $return;
    }

    /**
     * @param $data
     * @return string
     */
 
}
