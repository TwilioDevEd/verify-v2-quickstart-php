<?php


namespace App\Verify;


interface Service
{
    /**
     * Start a phone verification process using an external service
     *
     * @param $phone_number
     * @param $channel
     * @return Result
     */
    public function startVerification($phone_number, $channel);


    /**
     * Check verification code using an external service
     *
     * @param $phone_number
     * @param $code
     * @return Result
     */
    public function checkVerification($phone_number, $code);

}