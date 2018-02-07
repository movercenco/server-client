<?php

namespace App;

class Order extends BaseModel
{
    protected $fillable = [
        'supplier_id',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_address_zip',
        'billing_address_1',
        'billing_address_2',
        'billing_address_zip',
        'total_amount',
        'delivery_cost',
        'satoshi_amount',
    ];

    protected $hidden = [
        'bitcoin_secret',
    ];

    protected $with = [
        'flags',
        'user'
    ];

    public function flags()
    {
        return $this->belongsToMany(Flag::class)->withPivot(['amount']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flagOrders()
    {
        return $this->hasMany(FlagOrder::class);
    }

    public function requestBitcoinAddress()
    {
        if($this->status != 1) {
            return;
        }

        $xpub = 'xpub6C4JYxF2ZJbtY9CUkM57KSU4nS5zCFSFcXfRRYaXqyWYfCVmhZx2uanjWFNkL7zCrSGaW56dViRnKjgePDHvRprFgffFRX5kA6xD2jvdrMt';
        $key = 'e8a4a3ec-7462-4e05-bea7-703aae0d6480';
        $secret = encrypt($this->id);
        $secret = md5($secret);
        $url = 'https://api.blockchain.info/v2/receive?xpub=' . $xpub . '&callback=' . urlencode(url('blockchain/callback/order') . '?secret=' . $secret) . '&key=' . $key;


        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $url);
        $data = json_decode($res->getBody(), true);
        if(isset($data['message'])) {
            throw new Error('address request failed');
        }
        $address = $data['address'];

        $this->bitcoin_secret = $secret;
        $this->bitcoin_address = $address;
        $this->status = 2;
        $this->save();
    }

    public function getTotalPrice()
    {
        return $this->total_amount;
    }

    public function deductInventory()
    {
        if(! $this->supplier_id) {
            abort(422);
        }

        $inventories = [];

        foreach($this->flagOrders as $flagOrder) {
            $inventory = Inventory::where('user_id', $this->supplier_id)->where('flag_id', $flagOrder->flag_id)->first();

            if(!$inventory) {
                abort(422);
            }

            $inventory->amount -= $flagOrder->amount;

            // if($inventory->amount < 0) {
            //     abort(422);
            // }

            $inventories[] = $inventory;
        }

        foreach($inventories as $inventory) {
            $inventory->save();
        }
    }
}
