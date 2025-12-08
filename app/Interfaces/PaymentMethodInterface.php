<?php

namespace App\Interfaces;

interface PaymentMethodInterface
{
    public function pay($data);

    public function callback($transactionId);

    public function refund($transactionId);
}
