<?php

namespace App;

class Payment extends BaseModel
{
    protected $fillable = [
        'city_id',
        'currency',
        'total_amount',
    ];

    protected $hidden = [
        'bitcoin_secret',
    ];

    public function requestBitcoinAddress()
    {
        if($this->status != 1) {
            return;
        }

        $xpub = 'xpub6C4JYxF2ZJbtY9CUkM57KSU4nS5zCFSFcXfRRYaXqyWYfCVmhZx2uanjWFNkL7zCrSGaW56dViRnKjgePDHvRprFgffFRX5kA6xD2jvdrMt';
        $key = 'e8a4a3ec-7462-4e05-bea7-703aae0d6480';
        $secret = encrypt($this->id);
        $secret = md5($secret);
        $url = 'https://api.blockchain.info/v2/receive?xpub=' . $xpub . '&callback=' . urlencode(url('blockchain/callback/payment') . '?secret=' . $secret) . '&key=' . $key;


        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $url);
        $data = json_decode($res->getBody(), true);
        if(isset($data['message'])) {
            throw new Error('address request failed');
        }
        $address = $data['address'];

        $this->bitcoin_secret = $secret;
        $this->bitcoin_address = $address;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
