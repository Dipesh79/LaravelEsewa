
# Laravel Esewa

This Laravel package allows you to create payment using Esewa.


## Usage/Examples
### Install Using Composer
```javascript
composer require dipesh79/laravel-esewa
```

### Add One Variable in .env
You can get marchant id from Esewa 
```
ESEWA_MERCHANT_ID="Esewa Merchant Id"
ESEWA_ENV = "Sandbox" or "Live"
```
### Publish Vendor File
```
php artisan vendor:publish --provider="Dipesh79\LaravelEsewa\EsewaServiceProvider"
```
or 
```
php artisan vendor:publish
```
And publish "Dipesh79\LaravelEsewa\EsewaServiceProvider"


Redirect the user to payment page from your controller

```
use Dipesh79\LaravelEsewa\LaravelEsewa;

//Your Controller Method
public function esewaPayment()
{
    //Store payment details in DB with pending status
    $payment = new LaravelEsewa();
    $amount = 123; 
    $order_id = 251264889; //Your Unique Order Id
    $tax_amount = 0; //Tax Amount. If there is not tax amount then keep it 0
    $service_charge = 0; // Serivce Charge. If there is no service charge then keep it 0
    $delivery_charge = 0; // Delivery Charge. If there is no delivery charge then keep it 0.
    $su = route('success.url);
    $fu = route('fail.url);
    return redirect($payment->esewaCheckout($amount,$tax_amount,$service_charge,$delivery_charge,$order_id,$su,$fu))
}

```

After Successfull Payment esewa will redirect the user to your success url and you can change the payment status to Success else you can change the status to Fail when esewa redirect user to fail url.

Success Payment Case
```
public function esewaSuccess(Request $request)
{
    $order_id = $request->oid;
    $payment = Payment::where('order_id', $order_id)->first();
    $payment->status = "Success";
    $payment->save();

    //Other Tasks
           
}
```
Fail Payment Case

```
public function esewaFail(Request $request)
{
    $payment = Payment::where('order_id', $request->oid)->first();
    $payment->status = "Fail";
    $payment->save();
    //Other Tasks           
}
```



## License

[MIT](https://choosealicense.com/licenses/mit/)


## Author

- [@Dipesh79](https://www.github.com/Dipesh79)


## Support

For support, email dipeshkhanal79@gmail.com.

