<?php
// require_once('../../vendor/autoload.php');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// require_once('/path/to/stripe-php/init.php');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
// require '../init.php';
// require_once('../../stripe-php-8.6.0/init.php');

require_once('vendor/autoload.php');


class StripeController

{
    public function  getSession($id)
    {
            // get consultation info
            $consultation=new ConsultationEcrite();
            $consultation=$consultation->readConsultaion($id);
        $stripe = new \Stripe\StripeClient(
            'sk_test_51L31WgJpb3Br7exniKGWe9BNIUUYADkBzM1JHpUGdmpMU3ttTFPRSAWJqdox8CZrRJ5InGRpFnt3IhqxmpVyALVA00y7ZSPryE'
        );
        // \Stripe\Stripe::setApiKey('sk_test_51L31WgJpb3Br7exniKGWe9BNIUUYADkBzM1JHpUGdmpMU3ttTFPRSAWJqdox8CZrRJ5InGRpFnt3IhqxmpVyALVA00y7ZSPryE');


        $checkout = $stripe->checkout->sessions->create([
            'success_url' => 'http://localhost:8080/avocatProfile/',
            'cancel_url' => 'http://localhost:8080/avocatProfile/',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'mad',
                        'unit_amount' => $consultation["prix"]*100,
                        'product_data' => [
                            'name' => "consultation ".$consultation["type"]
                        ]
                    ],

                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
        ]);
        // $checkout1 = $stripe->checkout->sessions->retrieve("cs_test_a1YpyuRq3lWzDjJWvzRmgvHSPmgKoXqCvKhvsZD79v0WJeJRNEpvxoidHW");

        //    $p= $stripe->paymentIntents->confirm(
        //         'pi_1DrDcW2eZvKYlo2CHci8WlW9',
        //         ['payment_method' => 'pm_card_visa']
        //     );
        //     $session = \Stripe\Checkout\Session::retrieve('pi_3L93cNJpb3Br7exn1a9Ij1lU_secret_Sdepmtzl7KlINrZ4gp9UHQvIFd');
        //     $customer = \Stripe\Customer::retrieve($session->customer);
        echo json_encode($checkout);
    }
    public function checkSession($id)
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51L31WgJpb3Br7exniKGWe9BNIUUYADkBzM1JHpUGdmpMU3ttTFPRSAWJqdox8CZrRJ5InGRpFnt3IhqxmpVyALVA00y7ZSPryE'
        );

        $checkout = $stripe->checkout->sessions->retrieve($id);
        // $checkout = $stripe->checkout->sessions->retrieve("cs_test_a1YpyuRq3lWzDjJWvzRmgvHSPmgKoXqCvKhvsZD79v0WJeJRNEpvxoidHW");

        if ($checkout->payment_status == "paid") {
            return true;
        }
        return false;
    }
}
